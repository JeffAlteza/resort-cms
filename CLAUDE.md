# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Resort CMS - a resort/hospitality content management system built with Laravel 10 and Filament 3. It has a public-facing website (Blade views) and a Filament admin panel at `/admin`.

## Common Commands

```bash
# Development
php artisan serve              # Start dev server
npm run dev                    # Vite dev server (Tailwind + assets)
npm run build                  # Production build

# Database
php artisan migrate            # Run migrations
php artisan db:seed            # Seed database (User, Contact, Gallery, Feature, Banner, AboutUs, Feedback, FAQ)
php artisan migrate:fresh --seed  # Reset and seed

# Testing
php artisan test               # Run all tests (PHPUnit)
php artisan test --filter=TestName  # Run single test

# Linting
./vendor/bin/pint              # Laravel Pint (code style)

# Filament
php artisan filament:make-resource  # Create new Filament resource
php artisan make:filament-page      # Create custom Filament page
```

## Architecture

### Tech Stack
- **Backend:** Laravel 10, PHP 8.1+, MySQL
- **Admin Panel:** Filament 3 (includes Livewire internally)
- **Frontend:** Blade templates, Tailwind CSS 3, Vite
- **JS Libraries:** vanilla-calendar-pro, tw-elements, AOS (animate on scroll)

### Key Directories
- `app/Filament/Resources/` - 11 Filament CRUD resources (auto-discovered)
- `app/Filament/Pages/` - Custom pages: Calendar, Backup
- `app/Filament/Widgets/` - CalendarWidget, CalendarBookingWidget, InquiryOverview
- `app/Traits/` - `ExportToExcelTrait` (Excel export), `RedirectToIndexTrait`
- `app/Mail/` - BookingMail, InquiryMail, InquiryEmail (Markdown mailables)

### Routing
- **Public routes** (`routes/web.php`): `/`, `/gallery`, `/feature`, `/about-us`, `/contacts`, `/book`
- **API routes** (`routes/api.php`): `POST /api/inquiry-mail`, `POST /api/book-mail`
- **Admin panel**: `/admin` (Filament, auth-protected)

### Admin Panel Configuration
Defined in `app/Providers/Filament/AdminPanelProvider.php`:
- Auto-discovers resources, pages, and widgets from `app/Filament/`
- Plugins: FilamentFullCalendar, FilamentSpatieLaravelBackup
- Database notifications enabled
- Primary color: Green

### Data Model Patterns
- Most content models use **SoftDeletes** (Home, Gallery, Feature, AboutUs, Feedback, Inquiry, User)
- Content visibility controlled by boolean `is_visible` fields
- Booking status uses string enum: `new`, `accept`, `decline`
- Banner model has a `type` field for placement (home, contact, book)
- Controllers use private `getIndexData()` methods to gather view data

### Email System
- Booking and inquiry forms submit via API routes, which send emails
- `MAIL_TO` env variable controls recipient address
- Uses Laravel Markdown mailables

### Environment
- `MAIL_TO` - custom env var for email recipient
- Queue connection defaults to `sync` (no async processing)
- Single MySQL database connection

### n8n Telegram Chatbot
- **Workflow:** "Resort CMS Telegram Chatbot" (n8n Cloud, `jeff-n8n-workflows.app.n8n.cloud`), ID `UweMKt2C70qu1GCg`, project "Jeff Alteza <jepoyalteza@gmail.com>"
- **Flow:** Telegram Trigger → Normalize Telegram Input (Code) → Text Message? (IF, text only) → AI Agent → Telegram Send Message (Markdown). Non-text messages get "Unsupported Message Reply".
- **Model:** Groq Chat Model `openai/gpt-oss-120b`, with Window Buffer Memory keyed by Telegram chat ID.
- **AI Agent tools** (HTTP Request tools calling this app's API under `$vars.resort_url + /api/chatbot/...`, header `X-API-Key`):
  - `Get Resort Info` → `/resort-info`
  - `Get Features` → `/features`
  - `Get Gallery` → `/gallery`
  - `Get Feedback` → `/feedback`
  - `Check Availability` → `/availability?checkin=&checkout=`
  - `Create Booking` and `Create Inquiry` call the sub-workflow "Chatbot Submit (Booking & Inquiry)" (ID `vSNYtJUXdo2gyjxN`). It POSTs to `/bookings` or `/inquiries`, then sends an admin Telegram notification using `telegram_admin_chat_ID`.
  - Read-only tools retry 3 times with a 10s timeout. Booking and inquiry tools do not retry, to avoid duplicate submissions.
- **Telegram replies are plain text.** The system prompt forbids Markdown symbols.
- **Credentials:** the chatbot HTTP nodes use the Header Auth credential "Header Auth account" (ID `4EgXqvhWmMKKQRRo`, header `X-API-Key`). The key must match the server's `N8N_API_KEY`.
- **Booking validation:** `CreateBookingRequest` (Laravel) rejects check-in dates before today and check-out dates not after check-in.
- **Booking rules in the system prompt:** collect details → validate dates (Asia/Manila) → check availability → show summary → explicit confirmation → create booking once. Never invent resort info.
- **Error handling:** Error Trigger → Log Error to Google Sheets ("N8n Workflow Error Log") + Telegram admin alert. These exist in the **draft** only; the active version does not have them yet.
- **Known issues (draft):**
  - The published workflow may still be on an older version; check `activeVersionId` against the draft before assuming a change is live.
  - Telegram admin alert uses the `telegram_admin_chat_ID` variable. The API key lives in the Header Auth credential.
- **Server side:** `/api/chatbot/*` routes were added in commit `67a3c96`. The chatbot API key setting is `N8N_API_KEY` in `.env` (see `.env.example`).
- **Editing:** edits go through the n8n MCP tools (`update_workflow`). Publishing affects production, so confirm before publishing.

Before exploring the code, read `graphify-out/GRAPH_REPORT.md`, and use `graphify query` for structure questions.

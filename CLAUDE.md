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

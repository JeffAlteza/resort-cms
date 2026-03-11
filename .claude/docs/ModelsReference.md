# Models Reference

## Table of Contents

- [User](#user)
- [Booking](#booking)
- [Inquiry](#inquiry)
- [Home](#home)
- [Gallery](#gallery)
- [Feature](#feature)
- [Banner](#banner)
- [AboutUs](#aboutus)
- [Feedback](#feedback)
- [Contact](#contact)
- [FAQ](#faq)

---

## User

### Overview

Admin user model for authenticating into the Filament admin panel. Supports API token authentication via Laravel Sanctum. All admin users receive database notifications when new inquiries or bookings are submitted by site visitors.

### Database Schema

**Table:** `users`

| Column | Type | Nullable | Description |
|--------|------|----------|-------------|
| `id` | bigint (PK) | No | Auto-incrementing primary key |
| `name` | string | No | Full name of the admin user |
| `email` | string (unique) | No | Email address, used for login |
| `email_verified_at` | timestamp | Yes | Email verification timestamp |
| `password` | string | No | Hashed password |
| `remember_token` | string | Yes | Session remember token |
| `deleted_at` | timestamp | Yes | Soft delete timestamp |
| `created_at` | timestamp | Yes | Record creation timestamp |
| `updated_at` | timestamp | Yes | Record update timestamp |

**Relationships:** None defined. Used as the notification recipient for Filament database notifications.

### API Endpoints

| Method | Route | Auth | Description |
|--------|-------|------|-------------|
| `GET` | `/api/user` | Sanctum | Returns the authenticated user |

**Request Example:**
```
GET /api/user
Authorization: Bearer {token}
```

**Response Example:**
```json
{
  "id": 1,
  "name": "Admin",
  "email": "admin@example.com",
  "email_verified_at": null,
  "created_at": "2024-01-01T00:00:00.000000Z",
  "updated_at": "2024-01-01T00:00:00.000000Z"
}
```

### Business Logic & Rules

- Password is automatically hashed via the `hashed` cast.
- `password` and `remember_token` are hidden from serialization.
- Soft deletes are enabled; deleted users are retained in the database.
- All users receive Filament database notifications when bookings or inquiries are submitted (via `User::all()` as recipients).

### Feature Flow

**Admin Login:**
1. User navigates to `/admin`
2. Filament login page is presented
3. User enters email and password
4. On success, user is redirected to the admin dashboard

### Related Files

| Type | Path |
|------|------|
| Model | `app/Models/User.php` |
| Migration | `database/migrations/2014_10_12_000000_create_users_table.php` |
| Filament Resource | `app/Filament/Resources/UserResource.php` |
| Filament Pages | `app/Filament/Resources/UserResource/Pages/ManageUsers.php` |
| Seeder | `database/seeders/UserSeeder.php` |

---

## Booking

### Overview

Represents a guest booking request submitted through the public booking form. Contains guest contact details, check-in/check-out dates, and a status field that admins use to accept or decline the request. Accepted bookings are displayed on the admin calendar widget.

### Database Schema

**Table:** `bookings`

| Column | Type | Nullable | Default | Description |
|--------|------|----------|---------|-------------|
| `id` | bigint (PK) | No | — | Auto-incrementing primary key |
| `name` | string | Yes | `null` | Guest's full name |
| `email` | string | Yes | `null` | Guest's email address |
| `cellphone` | string | Yes | `null` | Guest's phone number |
| `checkin` | date | No | — | Check-in date |
| `checkout` | date | No | — | Check-out date |
| `message` | text | Yes | `null` | Optional message from the guest |
| `status` | string | No | `'new'` | Booking status: `new`, `accept`, or `decline` |
| `deleted_at` | timestamp | Yes | `null` | Soft delete timestamp |
| `created_at` | timestamp | Yes | — | Record creation timestamp |
| `updated_at` | timestamp | Yes | — | Record update timestamp |

**Relationships:** None defined.

### API Endpoints

| Method | Route | Auth | Description |
|--------|-------|------|-------------|
| `POST` | `/api/book-mail` | None | Submit a new booking request |

**Request Example:**
```
POST /api/book-mail
Content-Type: application/x-www-form-urlencoded

name=John+Doe&email=john@example.com&cellphone=09171234567&checkin=2024-03-15&checkout=2024-03-18&message=We+are+a+group+of+4
```

**Response:** Returns the contact page view with a `success` flag set.

### Business Logic & Rules

- All bookings are created with a default status of `new`.
- Status values are `new` (warning/yellow), `accept` (success/green), `decline` (danger/red) — displayed as colored badges in the admin table.
- Only bookings with status `accept` appear on the calendar widget.
- On submission, an email is sent to the `MAIL_TO` environment variable recipient using `BookingMail` (markdown template: `emails.book`).
- On submission, a Filament database notification is sent to **all** admin users.
- The booking page displays check-in dates of accepted bookings so the public calendar can show unavailable dates.
- Admin table supports date range filtering on `created_at`.
- Checkin and checkout are required in the admin form; they are nullable in the API validation.

### Feature Flow

**Submit Booking (Public):**
1. Visitor navigates to `/book`
2. Controller loads accepted booking check-in dates, banner (type `book`), FAQs, and contact info
3. Visitor fills out booking form (name, email, cellphone, checkin, checkout, message)
4. Form submits via `POST /api/book-mail`
5. Server validates input
6. Email sent to `MAIL_TO` recipient via `BookingMail`
7. `Booking` record created with status `new`
8. Database notification sent to all admin users
9. Contact page view returned with success message

**Manage Booking (Admin):**
1. Admin navigates to Booking resource in Filament panel
2. Bookings listed with name, email, cellphone, dates, and status badge
3. Admin clicks Edit to change status to `accept` or `decline`
4. Accepted bookings appear on the Calendar page widget

### Related Files

| Type | Path |
|------|------|
| Model | `app/Models/Booking.php` |
| Migration | `database/migrations/2023_12_21_051514_create_bookings_table.php` |
| Controller | `app/Http/Controllers/BookingController.php` |
| Filament Resource | `app/Filament/Resources/BookingResource.php` |
| Filament Pages | `app/Filament/Resources/BookingResource/Pages/ListBookings.php` |
| | `app/Filament/Resources/BookingResource/Pages/CreateBooking.php` |
| | `app/Filament/Resources/BookingResource/Pages/EditBooking.php` |
| Mail | `app/Mail/BookingMail.php` |
| Email Template | `resources/views/emails/book.blade.php` |
| Calendar Widget | `app/Filament/Widgets/CalendarWidget.php` |

---

## Inquiry

### Overview

Represents a contact/inquiry form submission from the public website. Tracks whether the admin has responded to the inquiry via a boolean toggle. Supports soft deletes and date range filtering.

### Database Schema

**Table:** `inquiries`

| Column | Type | Nullable | Default | Description |
|--------|------|----------|---------|-------------|
| `id` | bigint (PK) | No | — | Auto-incrementing primary key |
| `name` | string | Yes | `null` | Sender's full name |
| `email` | string | Yes | `null` | Sender's email address |
| `cellphone` | string | Yes | `null` | Sender's phone number |
| `subject` | string | Yes | `null` | Inquiry subject line |
| `message` | text | Yes | `null` | Inquiry message body |
| `responded` | boolean | No | `false` | Whether admin has responded |
| `deleted_at` | timestamp | Yes | `null` | Soft delete timestamp |
| `created_at` | timestamp | Yes | — | Record creation timestamp |
| `updated_at` | timestamp | Yes | — | Record update timestamp |

**Relationships:** None defined.

### API Endpoints

| Method | Route | Auth | Description |
|--------|-------|------|-------------|
| `POST` | `/api/inquiry-mail` | None | Submit a new inquiry |

**Request Example:**
```
POST /api/inquiry-mail
Content-Type: application/x-www-form-urlencoded

name=Jane+Doe&email=jane@example.com&cellphone=09179876543&subject=Room+Rates&message=What+are+your+rates+for+December?
```

**Response:** Returns the contact page view with a `success` flag set.

### Business Logic & Rules

- Inquiries are created with `responded` defaulting to `false`.
- Admin can toggle `responded` directly from the table list via a `ToggleColumn`.
- On submission, an email is sent to `config('app.MAIL_TO')` using `InquiryEmail` (markdown template: `emails.inquiry`). The email subject is set to the inquiry's `subject` field.
- On submission, a Filament database notification is sent to **all** admin users.
- Admin table is sorted by `created_at` descending by default.
- Admin table supports filtering by: trashed status, responded status, and date range on `created_at`.
- Admin actions: View, Edit, Delete, Restore.
- Grouped under the "Notification" navigation group in the admin panel.

### Feature Flow

**Submit Inquiry (Public):**
1. Visitor navigates to `/contacts`
2. Controller loads banner (type `contact`), FAQs, and contact info
3. Visitor fills out inquiry form (name, email, cellphone, subject, message)
4. Form submits via `POST /api/inquiry-mail`
5. Server validates input
6. Email sent to `MAIL_TO` config recipient via `InquiryEmail`
7. `Inquiry` record created with `responded = false`
8. Database notification sent to all admin users
9. Contact page view returned with success message

**Track Inquiry (Admin):**
1. Admin navigates to Inquiry resource under "Notification" group
2. Inquiries listed with email, cellphone, message, subject, responded toggle, and date
3. Admin toggles `responded` to mark inquiry as handled
4. Admin can view, edit, soft-delete, or restore inquiries

### Related Files

| Type | Path |
|------|------|
| Model | `app/Models/Inquiry.php` |
| Migration | `database/migrations/2023_12_12_123613_create_inquiries_table.php` |
| Controller | `app/Http/Controllers/ContactController.php` |
| Filament Resource | `app/Filament/Resources/InquiryResource.php` |
| Filament Pages | `app/Filament/Resources/InquiryResource/Pages/ManageInquiries.php` |
| Mail | `app/Mail/InquiryEmail.php` |
| Mail (unused) | `app/Mail/InquiryMail.php` |
| Email Template | `resources/views/emails/inquiry.blade.php` |

---

## Home

### Overview

Content model for the home page sections. Each record has a `type` field (e.g., `feature`) and a `visibility` toggle to control which items appear on the public site. The admin resource filters out records where `type = 'feature'` and the navigation is currently hidden (`shouldRegisterNavigation = false`).

### Database Schema

**Table:** `homes`

| Column | Type | Nullable | Description |
|--------|------|----------|-------------|
| `id` | bigint (PK) | No | Auto-incrementing primary key |
| `title` | string | No | Section title |
| `description` | text | Yes | Section description/content |
| `type` | string | No | Content type identifier (e.g., `feature`) |
| `visibility` | boolean | No | Whether the section is publicly visible |
| `image` | string | No | Image file path |
| `deleted_at` | timestamp | Yes | Soft delete timestamp |
| `created_at` | timestamp | Yes | Record creation timestamp |
| `updated_at` | timestamp | Yes | Record update timestamp |

**Relationships:** None defined.

### API Endpoints

No dedicated API endpoints. Data is loaded server-side via `HomeController::index()` and passed to the Blade view.

| Method | Route | Auth | Description |
|--------|-------|------|-------------|
| `GET` | `/` | None | Public home page |

### Business Logic & Rules

- The `type` field defaults to `feature` in the admin form and is disabled (non-editable by admin).
- The admin resource Eloquent query filters out records where `type = 'feature'` and includes soft-deleted records.
- Navigation is hidden in the admin panel (`shouldRegisterNavigation = false`).
- Visibility is controlled via a boolean radio button.
- Admin supports trashed filter and visibility ternary filter.
- Admin actions: View, Edit, Restore (no delete action).
- The HomeController gathers data from multiple models (Banner, AboutUs, Feature, Gallery, Feedback, Contact) to compose the home page.

### Feature Flow

**View Home Page (Public):**
1. Visitor navigates to `/`
2. `HomeController::getIndexData()` queries:
   - Banner where type = `home`
   - AboutUs where type = `about us`
   - Features where visibility = true (limit 3)
   - Gallery where visibility = true (random 6)
   - Feedback (limit 3)
   - Contact info (visible, specific titles)
3. Data passed to `pages.home.home-index` Blade view

### Related Files

| Type | Path |
|------|------|
| Model | `app/Models/Home.php` |
| Migration | `database/migrations/2023_11_08_072503_create_home_table.php` |
| Controller | `app/Http/Controllers/HomeController.php` |
| Filament Resource | `app/Filament/Resources/HomeResource.php` |
| Filament Pages | `app/Filament/Resources/HomeResource/Pages/ListHomes.php` |
| | `app/Filament/Resources/HomeResource/Pages/CreateHome.php` |
| | `app/Filament/Resources/HomeResource/Pages/EditHome.php` |
| View | `resources/views/pages/home/home-index.blade.php` |

---

## Gallery

### Overview

Stores gallery images displayed on the public gallery page. Each entry has a title, description, image, and visibility toggle. Supports soft deletes for safe removal and restoration.

### Database Schema

**Table:** `galleries`

| Column | Type | Nullable | Description |
|--------|------|----------|-------------|
| `id` | bigint (PK) | No | Auto-incrementing primary key |
| `title` | string | No | Image title |
| `description` | text | Yes | Image description |
| `visibility` | boolean | No | Whether the image is publicly visible |
| `image` | string | No | Image file path |
| `deleted_at` | timestamp | Yes | Soft delete timestamp |
| `created_at` | timestamp | Yes | Record creation timestamp |
| `updated_at` | timestamp | Yes | Record update timestamp |

**Relationships:** None defined.

### API Endpoints

No dedicated API endpoints. Data is loaded server-side.

| Method | Route | Auth | Description |
|--------|-------|------|-------------|
| `GET` | `/gallery` | None | Public gallery page |

### Business Logic & Rules

- Only records with `visibility = true` appear on the public gallery page.
- On the home page, 6 random visible gallery items are shown.
- Admin table sorted by `updated_at` descending by default.
- Admin Eloquent query includes soft-deleted records (removes `SoftDeletingScope`).
- Visibility is toggled inline via `ToggleColumn` in the admin table.
- Admin filters: trashed, responded (likely a copy-paste artifact from InquiryResource).
- Admin actions: View, Edit, Delete, Restore. Bulk: Delete, Restore.
- Grouped under "Site Management" navigation (sort: 3).

### Feature Flow

**View Gallery (Public):**
1. Visitor navigates to `/gallery`
2. `GalleryController::getIndexData()` queries visible galleries, banner (type `gallery`), and contact info
3. Data passed to `pages.gallery.gallery-index` Blade view

**Manage Gallery (Admin):**
1. Admin navigates to Gallery under "Site Management"
2. Gallery items listed with title, description, image, and visibility toggle
3. Admin can create, view, edit, soft-delete, or restore gallery items
4. Toggling visibility immediately updates public site display

### Related Files

| Type | Path |
|------|------|
| Model | `app/Models/Gallery.php` |
| Migration | `database/migrations/2023_11_20_071904_create_galleries_table.php` |
| Controller | `app/Http/Controllers/GalleryController.php` |
| Filament Resource | `app/Filament/Resources/GalleryResource.php` |
| Filament Pages | `app/Filament/Resources/GalleryResource/Pages/ManageGalleries.php` |
| Seeder | `database/seeders/GallerySeeder.php` |
| View | `resources/views/pages/gallery/gallery-index.blade.php` |

---

## Feature

### Overview

Represents resort features/amenities displayed on the public features page and the home page. Each feature has a title, description, image, and visibility control. Supports soft deletes.

### Database Schema

**Table:** `features`

| Column | Type | Nullable | Description |
|--------|------|----------|-------------|
| `id` | bigint (PK) | No | Auto-incrementing primary key |
| `title` | string | No | Feature title |
| `description` | text | Yes | Feature description |
| `visibility` | boolean | No | Whether the feature is publicly visible |
| `image` | string | No | Feature image file path |
| `deleted_at` | timestamp | Yes | Soft delete timestamp |
| `created_at` | timestamp | Yes | Record creation timestamp |
| `updated_at` | timestamp | Yes | Record update timestamp |

**Relationships:** None defined.

### API Endpoints

No dedicated API endpoints. Data is loaded server-side.

| Method | Route | Auth | Description |
|--------|-------|------|-------------|
| `GET` | `/feature` | None | Public features page |

### Business Logic & Rules

- Only records with `visibility = true` appear on the public site.
- On the home page, only the first 3 visible features are shown.
- On the features page, all visible features are shown.
- Visibility is a radio button (true/false) in the admin form, defaulting to true.
- Admin Eloquent query includes soft-deleted records (removes `SoftDeletingScope`).
- Admin filters: trashed, visibility ternary.
- Admin actions: View, Edit, Delete, Restore. Bulk: Restore.
- Grouped under "Site Management" navigation (sort: 2).

### Feature Flow

**View Features (Public):**
1. Visitor navigates to `/feature`
2. `FeatureController::getIndexData()` queries visible features, banner (type `feature`), and contact info
3. Data passed to `pages.feature.feature-index` Blade view

**Manage Features (Admin):**
1. Admin navigates to Feature under "Site Management"
2. Features listed with title, description, image, and inline visibility toggle
3. Admin can create, view, edit, soft-delete, or restore features

### Related Files

| Type | Path |
|------|------|
| Model | `app/Models/Feature.php` |
| Migration | `database/migrations/2023_12_12_031105_create_features_table.php` |
| Controller | `app/Http/Controllers/FeatureController.php` |
| Filament Resource | `app/Filament/Resources/FeatureResource.php` |
| Filament Pages | `app/Filament/Resources/FeatureResource/Pages/ListFeatures.php` |
| | `app/Filament/Resources/FeatureResource/Pages/CreateFeature.php` |
| | `app/Filament/Resources/FeatureResource/Pages/EditFeature.php` |
| Seeder | `database/seeders/FeatureSeeder.php` |
| View | `resources/views/pages/feature/feature-index.blade.php` |

---

## Banner

### Overview

Stores hero/banner images and text for different pages of the public website. Each banner is identified by a `type` field that maps to a specific page (e.g., `home`, `contact`, `book`, `gallery`, `feature`, `about us`). Banners are not soft-deletable and delete/bulk-delete actions are disabled in the admin.

### Database Schema

**Table:** `banners`

| Column | Type | Nullable | Description |
|--------|------|----------|-------------|
| `id` | bigint (PK) | No | Auto-incrementing primary key |
| `title` | string | Yes | Banner heading text |
| `description` | text | Yes | Banner body text |
| `image` | string | No | Banner image file path |
| `type` | string | No | Page identifier (e.g., `home`, `contact`, `book`, `gallery`, `feature`, `about us`) |
| `created_at` | timestamp | Yes | Record creation timestamp |
| `updated_at` | timestamp | Yes | Record update timestamp |

**Relationships:** None defined.

### API Endpoints

No dedicated API endpoints. Banners are queried server-side by controllers based on `type`.

### Business Logic & Rules

- The `type` field is disabled in the admin form (not editable after creation).
- Each page controller queries `Banner::where('type', '<page-type>')->first()` to retrieve the relevant banner.
- Delete actions are disabled in the admin panel — banners are meant to be edited, not removed.
- No soft deletes.
- Grouped under "Site Management" navigation (sort: 1).
- Admin actions: View, Edit only.

### Feature Flow

**Banner Display (Public):**
1. Any public page controller (Home, Gallery, Feature, AboutUs, Contact, Booking) queries the banner for its specific type
2. Banner data (title, description, image) passed to the Blade view
3. Rendered as the hero section of the page

### Related Files

| Type | Path |
|------|------|
| Model | `app/Models/Banner.php` |
| Migration | `database/migrations/2023_12_12_034127_create_banners_table.php` |
| Controller | `app/Http/Controllers/BannerController.php` (empty) |
| Filament Resource | `app/Filament/Resources/BannerResource.php` |
| Filament Pages | `app/Filament/Resources/BannerResource/Pages/ManageBanners.php` |
| Seeder | `database/seeders/BannerSeeder.php` |

---

## AboutUs

### Overview

Content model for the About Us page. Supports two types: `about us` (main about section with image and description) and `timeline` (historical milestones with dates). Timeline entries are ordered by date descending on the public site.

### Database Schema

**Table:** `about_us`

| Column | Type | Nullable | Description |
|--------|------|----------|-------------|
| `id` | bigint (PK) | No | Auto-incrementing primary key |
| `title` | string | Yes | Section title |
| `description` | text | Yes | Section description/content |
| `image` | string | Yes | Image file path |
| `type` | string | No | Content type: `about us` or `timeline` |
| `date` | date | Yes | Timeline event date (used only for `timeline` type) |
| `deleted_at` | timestamp | Yes | Soft delete timestamp |
| `created_at` | timestamp | Yes | Record creation timestamp |
| `updated_at` | timestamp | Yes | Record update timestamp |

**Relationships:** None defined.

### API Endpoints

No dedicated API endpoints. Data is loaded server-side.

| Method | Route | Auth | Description |
|--------|-------|------|-------------|
| `GET` | `/about-us` | None | Public about us page |

### Business Logic & Rules

- Two distinct types: `about us` (singleton-like, only the first record is used) and `timeline` (multiple entries).
- The `date` field is only shown in the admin form when `type = 'timeline'` (reactive/conditional visibility).
- The `type` selector defaults to `timeline` in the form.
- Delete action is hidden for `about us` type records (only timeline entries can be deleted).
- Admin supports trashed filter.
- Admin actions: View, Edit, Delete (timeline only), Restore.
- Grouped under "Site Management" navigation (sort: 4).

### Feature Flow

**View About Us (Public):**
1. Visitor navigates to `/about-us`
2. `AboutUsController::getIndexData()` queries:
   - Banner where type = `about us`
   - AboutUs where type = `about us` (first record — main content)
   - AboutUs where type = `timeline` (ordered by date desc — timeline entries)
   - Contact info
3. Data passed to `pages.about-us.about-us-index` Blade view

**Manage About Us (Admin):**
1. Admin navigates to "About Us" under "Site Management"
2. Records listed with title, image, type badge, and date
3. Admin can edit the main "about us" record or add/edit/delete timeline entries

### Related Files

| Type | Path |
|------|------|
| Model | `app/Models/AboutUs.php` |
| Migration | `database/migrations/2023_12_12_041104_create_about_us_table.php` |
| Controller | `app/Http/Controllers/AboutUsController.php` |
| Filament Resource | `app/Filament/Resources/AboutUsResource.php` |
| Filament Pages | `app/Filament/Resources/AboutUsResource/Pages/ManageAboutUs.php` |
| Seeder | `database/seeders/AboutUsSeeder.php` |
| View | `resources/views/pages/about-us/about-us-index.blade.php` |

---

## Feedback

### Overview

Stores customer testimonials/feedback displayed on the public home page. Each entry contains the customer's name, address, occupation, feedback text, and an optional photo. Supports soft deletes.

### Database Schema

**Table:** `feedback`

| Column | Type | Nullable | Description |
|--------|------|----------|-------------|
| `id` | bigint (PK) | No | Auto-incrementing primary key |
| `name` | string | Yes | Customer name |
| `address` | string | Yes | Customer address |
| `occupation` | string | Yes | Customer occupation |
| `feedback` | text | Yes | Testimonial text |
| `image` | string | Yes | Customer photo file path |
| `deleted_at` | timestamp | Yes | Soft delete timestamp |
| `created_at` | timestamp | Yes | Record creation timestamp |
| `updated_at` | timestamp | Yes | Record update timestamp |

**Relationships:** None defined.

### API Endpoints

No dedicated API endpoints. Feedback is displayed on the home page.

### Business Logic & Rules

- Up to 3 feedback entries are displayed on the home page (no visibility toggle — all records are shown).
- Admin table columns (name, address, occupation) are searchable.
- Admin supports trashed filter.
- Admin actions: View, Edit, Delete, Restore. Bulk: Restore.
- Grouped under "Site Management" navigation (sort: 6).
- The `FeedbackController` exists but is empty — feedback is loaded via `HomeController`.

### Feature Flow

**Display Feedback (Public):**
1. Visitor navigates to `/`
2. `HomeController::getIndexData()` queries `Feedback::limit(3)->get()`
3. Feedback data passed to home page view and rendered as testimonials

**Manage Feedback (Admin):**
1. Admin navigates to Feedback under "Site Management"
2. Feedback entries listed with name, address, occupation, and image
3. Admin can create, view, edit, soft-delete, or restore entries

### Related Files

| Type | Path |
|------|------|
| Model | `app/Models/Feedback.php` |
| Migration | `database/migrations/2023_12_12_044308_create_feedback_table.php` |
| Controller | `app/Http/Controllers/FeedbackController.php` (empty) |
| Filament Resource | `app/Filament/Resources/FeedbackResource.php` |
| Filament Pages | `app/Filament/Resources/FeedbackResource/Pages/ManageFeedback.php` |
| Seeder | `database/seeders/FeedbackSeeder.php` |

---

## Contact

### Overview

Stores dynamic contact information entries (email, phone, social media links, location) displayed across all public pages in the footer/contact section. Each entry has a `title` (e.g., "Cellphone", "Email", "Facebook") and a `description` (the actual value). Contacts are not soft-deletable, and delete actions are disabled in the admin.

### Database Schema

**Table:** `contacts`

| Column | Type | Nullable | Description |
|--------|------|----------|-------------|
| `id` | bigint (PK) | No | Auto-incrementing primary key |
| `title` | string | No | Contact type label (e.g., `Cellphone`, `Email`, `Location`, `Facebook`, `Instagram`, `Youtube`) |
| `description` | text | Yes | Contact value (phone number, email address, URL, etc.) |
| `type` | string | No | Category type identifier |
| `visibility` | boolean | No | Whether this contact entry is publicly visible |
| `created_at` | timestamp | Yes | Record creation timestamp |
| `updated_at` | timestamp | Yes | Record update timestamp |

**Relationships:** None defined.

### API Endpoints

No dedicated API endpoints. Contact data is queried server-side by every public page controller.

### Business Logic & Rules

- The `title` and `type` fields are disabled in the admin form (not editable after creation).
- Contact entries are meant to be edited (update description), not created or deleted.
- Every public page controller queries: `Contact::where('visibility', true)->whereIn('title', ['Cellphone', 'Email', 'Location', 'Facebook', 'Instagram', 'Youtube'])->pluck('description', 'title')->toArray()`.
- The result is a key-value array (e.g., `['Cellphone' => '0917...', 'Email' => 'info@...']`) passed to views as `$contact`.
- Delete actions are disabled in the admin panel.
- No soft deletes.
- Grouped under "Site Management" navigation (sort: 5).
- Admin actions: Edit only.

### Feature Flow

**Contact Display (Public):**
1. Any public page is loaded
2. The page's controller queries visible contact entries
3. Contact data rendered in the footer/contact section of every page

**Manage Contacts (Admin):**
1. Admin navigates to Contact under "Site Management"
2. Contact entries listed with title, description, and type badge
3. Admin edits the `description` field to update contact values (title and type are locked)

### Related Files

| Type | Path |
|------|------|
| Model | `app/Models/Contact.php` |
| Migration | `database/migrations/2023_11_20_020228_create_contacts_table.php` |
| Controller | `app/Http/Controllers/ContactController.php` |
| Filament Resource | `app/Filament/Resources/ContactResource.php` |
| Filament Pages | `app/Filament/Resources/ContactResource/Pages/ManageContacts.php` |
| Seeder | `database/seeders/ContactSeeder.php` |

---

## FAQ

### Overview

Stores frequently asked questions displayed on the public contact and booking pages. Simple question-and-answer pairs with no visibility control or soft deletes.

### Database Schema

**Table:** `faqs`

| Column | Type | Nullable | Description |
|--------|------|----------|-------------|
| `id` | bigint (PK) | No | Auto-incrementing primary key |
| `question` | text | No | The FAQ question |
| `answer` | text | No | The FAQ answer |
| `created_at` | timestamp | Yes | Record creation timestamp |
| `updated_at` | timestamp | Yes | Record update timestamp |

**Relationships:** None defined.

### API Endpoints

No dedicated API endpoints. FAQs are loaded server-side on the contact and booking pages.

### Business Logic & Rules

- All FAQ records are displayed (no visibility toggle or filtering).
- FAQs appear on both the `/contacts` page and the `/book` page.
- The model class name is lowercase (`faq`) — note the non-standard casing.
- No soft deletes.
- Admin actions: View, Edit, Delete. Bulk delete is disabled.
- Grouped under "Site Management" navigation (sort: 7, label: "FAQs").

### Feature Flow

**Display FAQs (Public):**
1. Visitor navigates to `/contacts` or `/book`
2. Controller queries `faq::all()`
3. FAQ data passed to the Blade view and rendered as an accordion or list

**Manage FAQs (Admin):**
1. Admin navigates to "FAQs" under "Site Management"
2. FAQs listed with question and answer (truncated to 50 chars)
3. Admin can create, view, edit, or delete FAQ entries

### Related Files

| Type | Path |
|------|------|
| Model | `app/Models/faq.php` |
| Migration | `database/migrations/2024_01_22_060110_create_faqs_table.php` |
| Filament Resource | `app/Filament/Resources/FaqResource.php` |
| Filament Pages | `app/Filament/Resources/FaqResource/Pages/ManageFaqs.php` |
| Seeder | `database/seeders/FaqSeeder.php` |

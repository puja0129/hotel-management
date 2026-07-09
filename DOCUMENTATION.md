# Hotel Management (Grand Hotel) — A–Z Documentation

This is a Laravel 12 hotel management web app with:
- Public website pages (rooms, services, gallery, contact, etc.)
- User login + booking + dummy payment + invoice PDF
- Admin panel (rooms, services, amenities, bookings, plus CMS content)

---

## 0) System Requirements (Local)

### Required
- **PHP**: 8.2+ (Laravel 12 requirement)
- **Composer**
- **Database**: MySQL/MariaDB (recommended for WAMP) or SQLite

### Optional (Frontend assets)
- **Node.js + npm** (only needed if you rebuild assets)

---

## 1) Project Structure (Quick Map)

- `routes/web.php` → all website + admin routes
- `app/Http/Controllers` → frontend controllers
- `app/Http/Controllers/Admin` → admin panel CRUD controllers
- `resources/views/hotel` → website pages (Blade)
- `resources/views/admin` → admin panel pages (Blade)
- `database/migrations` → DB tables
- `database/seeders` → sample data + admin credentials
- `public/` → public assets (`public/img`, CSS/JS)

---

## 2) Installation (Windows + WAMP Recommended)

### Step 1 — Install dependencies
If `vendor/` and `node_modules/` are already present you can skip these.

```bash
composer install
npm install
```

### Step 2 — Create `.env`

```bash
copy .env.example .env
php artisan key:generate
```

### Step 3 — Configure database

#### Option A (Recommended): MySQL (WAMP)
1. Open **phpMyAdmin**
2. Create a database named: `hotel_management`
3. Edit `.env`:
   - `DB_CONNECTION=mysql`
   - `DB_HOST=127.0.0.1`
   - `DB_PORT=3306`
   - `DB_DATABASE=hotel_management`
   - `DB_USERNAME=root`
   - `DB_PASSWORD=` (empty by default in many WAMP installs)

#### Option B (Quick): SQLite
1. Create empty file: `database/database.sqlite`
2. Edit `.env`:
   - `DB_CONNECTION=sqlite`

### Step 4 — Run migrations + seed demo data

```bash
php artisan migrate --seed
```

### Step 5 — Storage symlink (for uploaded images)

```bash
php artisan storage:link
```

---

## 3) Run the Project

### Option A: Laravel dev server (easiest)

```bash
php artisan serve
```

Open:
- Website: `http://127.0.0.1:8000`
- Admin: `http://127.0.0.1:8000/admin/dashboard`

### Option B: Run under WAMP / Apache

Important: Laravel must point the web root to the **`public/`** folder.

Two common approaches:
1. Create an Apache VirtualHost with DocumentRoot:
   - `c:/wamp64/www/hotel-management/public`
2. Or set an Alias to the same `public/` directory.

Then restart Apache and open your configured local domain.

---

## 4) Default Login Credentials (Seeder)

After `php artisan migrate --seed`:

### Admin
- Email: `admin@hotelier.com`
- Password: `password`

### User
- Email: `user@hotelier.com`
- Password: `password`

---

## 5) Database Tables (What Each Table Does)

Core:
- `users` → login + admin flag (`is_admin`)
- `rooms` → room catalog
- `bookings` → user bookings + payment fields
- `hotel_services` → simple service list shown on home/services pages
- `contacts` → contact form submissions
- `amenities` → amenities managed from admin

CMS (admin-manageable website content):
- `carousels` → homepage hero slider content
- `team_members` → “Team” page content
- `testimonials` → “Testimonials” page content
- `settings` → key/value settings (contact info, social links, etc.)

Infrastructure:
- `cache`, `jobs`, `sessions` → used because `.env` uses database cache/queue/sessions

---

## 6) Pages / Routes (Frontend + Admin)

### Public Website Pages
- `/` → Home (rooms + services preview)
- `/about` → About
- `/gallery` → Gallery
- `/rooms` → Rooms list
- `/room/{id}` → Room detail
- `/services` → Services list (dynamic module)
- `/services/{service}` → Service detail by slug-like key
- `/team` → Team page (DB-driven)
- `/testimonials` → Testimonials (DB-driven, fallback supported)
- `/contact` (GET/POST) → Contact page + submit form

### Authenticated User Pages
- `/dashboard` → user dashboard
- `/booking` → booking form
- `/payment/checkout/{booking}` → dummy checkout screen
- `/payment/success` → confirm dummy payment (marks paid + emails invoice)
- `/booking/{booking}/invoice` → invoice preview
- `/booking/{booking}/invoice/pdf` → invoice PDF download

### Admin Pages
All admin routes require login + admin user (`is_admin=1`).

- `/admin/dashboard`
- `/admin/rooms` (CRUD)
- `/admin/services` (CRUD)
- `/admin/amenities` (CRUD)
- `/admin/bookings` (manage bookings)
- `/admin/carousels` (CRUD)
- `/admin/team-members` (CRUD)
- `/admin/testimonials` (CRUD)
- `/admin/settings` (CRUD)

---

## 7) Admin Workflow (Recommended Order)

1. Admin login
2. Add/update **Rooms**
3. Add/update **Services** and **Amenities**
4. Add **Carousels** (hero slider)
5. Add **Team Members**
6. Add **Testimonials**
7. Update **Settings** (footer contact + social links)

---

## 8) Mail / SMTP Notes (Important)

This project can send booking confirmation email with PDF invoice from:
- `app/Http/Controllers/PaymentController.php`

For local development, the safest option is:
- set `MAIL_MAILER=log` in `.env`
Then Laravel will write emails to logs instead of sending.

If you use Gmail SMTP, use a Gmail **App Password** and keep it only in `.env`.

---

## 9) Common Errors + Fixes

### “Table 'sessions' doesn't exist”
Run:
```bash
php artisan migrate
```

### Images not loading from `storage/`
Run:
```bash
php artisan storage:link
```

### Reset everything (DEV only)
```bash
php artisan migrate:fresh --seed
```

---

## 10) Where to Customize

- Navbar links: `resources/views/partials/navbar.blade.php`
- Footer contact/social: `resources/views/partials/footer.blade.php` (reads `settings` table)
- Hero carousel: `resources/views/partials/hero_carousel.blade.php` (reads `carousels` table)
- Theme + layout: `resources/views/layouts/services_layout.blade.php`


# UI Redesign & CRUD Implementation Plan

This plan addresses the requirement to make the frontend UI look like a "real hotel" and to fix the missing CRUD form functionality in the admin panel.

## Proposed Changes

### 1. Fix Admin Form CRUD Operations
The user encountered issues adding and editing data because the views `admin.rooms.create` and `admin.rooms.edit` are missing. However, a unified `admin.rooms.form` exists.
- **[app/Http/Controllers/Admin/RoomController.php](file:///c:/wamp64/www/hotel-management/app/Http/Controllers/Admin/RoomController.php)**: Update the [create()](file:///c:/wamp64/www/hotel-management/app/Http/Controllers/Admin/RoomController.php#17-21) and [edit()](file:///c:/wamp64/www/hotel-management/app/Http/Controllers/Admin/RoomController.php#49-53) methods to return `view('admin.rooms.form')` instead of the missing component views. This single change will restore Create and Update functionality for rooms.

### 2. Frontend Premium UI Redesign (Luxurious "Real Hotel" Look)
We will revamp the UI to step away from standard generic bootstrap and introduce a premium, tailored hotel feel.
- **[resources/views/layouts/app.blade.php](file:///c:/wamp64/www/hotel-management/resources/views/layouts/app.blade.php)**: 
  - Change fonts from `Heebo/Montserrat` to a premium serif like `Playfair Display` for headings and a clean sans-serif like `Inter` or `Lato` for body text.
- **[public/css/style.css](file:///c:/wamp64/www/hotel-management/public/css/style.css)** (or inline custom styles):
  - **Color Palette**: Replace the default primary blue with an elegant Gold/Champagne (`#D4AF37`) and deep Navy/Charcoal for accents.
  - **Micro-animations**: Add smooth hover states on buttons and room cards.
- **[resources/views/hotel/index.blade.php](file:///c:/wamp64/www/hotel-management/resources/views/hotel/index.blade.php)**:
  - **Glassmorphism**: Update the booking form overlay to use a frosted glass effect (`backdrop-filter`) instead of a solid white box.
  - Refine the spacing and layout of standard components.

## Verification Plan

### Automated/Manual Verification
1. **CRUD Testing**: In the browser, navigate to `/admin/rooms`, click "Add New Room", fill the form, submit, and verify it appears in the list. Edit an existing room and verify changes persist.
2. **UI Testing**: Open `http://localhost:8000/` in the browser and visually confirm the new fonts, premium colors, and glassmorphic booking bar. Verify responsive behavior.

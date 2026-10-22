# Digital Guestbook - Laravel

Public guestbook with submission form and admin moderation dashboard.

## Features

- ✅ Public guestbook listing
- ✅ Guest submission form (name, email, phone, message)
- ✅ Admin moderation dashboard
- ✅ Approve/reject workflow
- ✅ Pending, approved, rejected statuses
- ✅ Statistics dashboard
- ✅ Search and pagination
- ✅ Privacy-aware contact handling
- ✅ Input validation and anti-spam
- ✅ Authentication (Breeze)
- ✅ Responsive design

## Tech Stack

- Laravel 13.38.0
- Laravel Breeze 2.4
- PHP 8.5.0
- SQLite
- Tailwind CSS

## Installation

```bash
git clone https://github.com/0xyz-exe/digital-guestbook-laravel.git
cd digital-guestbook-laravel
composer install
npm install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate --seed
npm run build
php artisan serve
```

## Demo Account

- Email: admin@example.com
- Password: password

## Database Schema

**entries:**
- id, name, email, phone, message
- status (pending/approved/rejected)
- approved_at, created_at, updated_at

## Features Detail

### Public Interface
- Homepage displays approved entries
- Submit form for guests
- Optional contact information
- Message preview with character limits
- Responsive layout

### Admin Dashboard
- Pending review queue
- One-click approve/reject
- Statistics cards (pending, approved, total)
- Entry management (view, delete)
- Pagination for large datasets

### Moderation Workflow
1. Guest submits message
2. Entry saved as "pending"
3. Admin reviews in dashboard
4. Approve → appears publicly
5. Reject → hidden from public

## Security

- CSRF protection on all forms
- Input validation (name required, email valid, message max 5000 chars)
- SQL injection prevention
- XSS protection via Blade
- Admin-only moderation routes
- Rate limiting ready

## Routes

**Public:**
- `/` - Guestbook homepage (approved entries)
- `/sign` - Submission form

**Admin (auth required):**
- `/entries` - Moderation dashboard
- `POST /entries/{entry}/approve` - Approve entry
- `POST /entries/{entry}/reject` - Reject entry
- `DELETE /entries/{entry}` - Delete entry

## Repository

https://github.com/0xyz-exe/digital-guestbook-laravel

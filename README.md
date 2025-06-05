# Laravel API-Only Starter (v12+)

A clean, Laravel 12.x API-only application with:
- Sanctum authentication
- JSON-only requests and responses
- Custom exception handling
- Feature test suite using PHPUnit
- No Blade or web routes

---

## 🚀 Features

- Register/Login with token-based auth (`Sanctum`)
- Email verification via `MustVerifyEmail`
- All requests must be JSON (`expectsJson` enforced)
- Centralized JSON error responses
- Clean folder structure with `Controllers`, `Requests`, and `Middleware` separated
- PHPUnit tests for auth endpoints

---

## 🧑‍💻 Requirements

- PHP 8.2+
- Composer
- Laravel 12.x
- SQLite (for tests) or MySQL (for development)
- Laravel Sanctum

---

## 📦 Installation

```bash
git clone https://github.com/your-username/your-api-project.git
cd your-api-project

composer install
cp .env.example .env
php artisan key:generate

# Optional: configure DB in .env
php artisan migrate
php artisan db:seed # if you have seeders
```

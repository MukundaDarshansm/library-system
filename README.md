# 📚 Library Management System (Laravel + Modules)

A modular Laravel application for managing books with role-based access control.  
Built using [nwidart/laravel-modules](https://nwidart.com/laravel-modules), featuring **Auth** and **Library** modules.

---

## 🚀 Live Demo
🔗 **URL:** https://task.oreocoderz.com/

---

## 👤 Admin Credentials
Use these credentials to log in as an administrator:

- **Email:** `admin@example.com`  
- **Password:** `password`  

A default user account also exists:

- **Email:** `user@example.com`  
- **Password:** `password`  

---

## ⚙️ Setup Instructions

### 1. Clone the repository
```bash
git clone https://github.com/MukundaDarshansm/library-system.git
cd library-system

# Install dependencies
composer install
npm install
npm run dev

# Environment setup
cp .env.example .env
php artisan key:generate

# Database migration & seeding
php artisan migrate --seed

# Start dev server
php artisan serve


| Method | Endpoint          | Description         | Role  |
| ------ | ----------------- | ------------------- | ----- |
| GET    | `/api/books`      | List all books      | All   |
| GET    | `/api/books/{id}` | Book details        | Admin |
| POST   | `/api/books`      | Create new book     | Admin |
| PUT    | `/api/books/{id}` | Update book details | Admin |
| DELETE | `/api/books/{id}` | Delete book         | Admin |


Notes

Laravel 12.x, PHP 8.x, MySQL

Modular via nwidart/laravel-modules

Blade UI with Bootstrap

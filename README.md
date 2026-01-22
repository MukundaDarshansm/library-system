Library Management System

A modular Laravel Library Management System with role-based authentication (Admin/User), Books CRUD, and REST APIs.

Live Demo: https://task.oreocoderz.com/


Features

Admin/User authentication & role-based access
CRUD for Books (Admin)
View-only access for Users
REST API endpoints for integration
Modular architecture using nwidart/laravel-modules
Blade templates with Bootstrap

Admin Credentials:
Email:admin@example.com
Password:password

User Credentials:
Email:user@example.com
Password:password


# Clone repo
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

Books
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
Blade UI with Bootstrap/Tailwind

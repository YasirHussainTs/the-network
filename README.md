# The Network Leads Admin Panel

A clean **Laravel CRUD application** to manage property leads and activities for the UAE real estate market.  
Built using **Laravel 10**, **Blade templates**, and **Bootstrap 5** — focused on simplicity, relationships, and proper structure.

---

## Features
- Add, edit, delete, and view leads  
- Filter leads by **status** or **source**  
- Add related **activities** (Note, Viewing, Meeting) for each lead  
- Simple and responsive **Bootstrap UI**  

---

## Tech Stack
- Laravel 10+
- Blade Templates (HTML + CSS + Bootstrap 5)
- MySQL / MariaDB
- PHP 8.1+
- JQuery + JS

---

## Setup Instructions

### Clone the Repository
```bash
git clone https://github.com/YasirHussainTs/the-network.git
cd the-network

### Install Dependencies
```bash
composer install
npm install

### Create Environment File
```bash
cp .env.example .env


### Update your database credentials:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password

### Generate App Key
```bash
php artisan key:generate

### Run Migrations
```bash
php artisan migrate

### Serve the Application
```bash
php artisan serve


### Now open: http://localhost:8000

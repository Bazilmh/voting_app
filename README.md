# 🗳️ Election Voting System (Laravel 7/8 & PHP 7.4)

A lightweight voting application where users can cast votes for fictitious candidates and administrators can view real-time results. Designed to run without Node.js/NPM by using Bootstrap via CDN.

## 🚀 Features
- **Role-Based Dashboards**: Automatic switching between Admin (Results) and User (Ballot) views.
- **Single Vote Enforcement**: Users can only vote once; the form is hidden after submission.
- **Fictitious Data**: Pre-loaded with creative candidate and party names.
- **No-Build UI**: Zero dependency on Vite or Laravel Mix for styling.

---

## ⚙️ Installation & Setup

Follow these steps to get the application running on your local machine:

### 1. Environment Setup
Clone the repository and install the PHP dependencies:

composer install

### 2. Configure Database

Create a new database in your MariaDB/MySQL server.
Copy .env.example to .env and update the following lines:
env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3303
DB_DATABASE=your_db_name
DB_USERNAME=your_username
DB_PASSWORD=your_password

### 3. Initialize Database & Seed Data

This command runs all migrations (creating tables for Users and Candidates) and executes the DatabaseSeeder.php file to create the Admin user and Election candidates:
bash
php artisan migrate:fresh --seed

### 4. Application Key

Generate the secure application key:
bash
php artisan key:generate

### 5. Launch the App

Start the local development server:
bash
php artisan serve

Visit http://127.0.0.1:8000 in your browser.

🔑 Default Credentials
Use these to test the different dashboard views:

Admin User
Username (Email): admin@example.com
Password: user@123

Standard User
Register a new account via the UI or create one manually in the database.



## This project is a simple ToDoList application built using the Laravel framework. Follow the steps below to set up and run the project locally.

## Prerequisites
PHP (>= 7.3)
Composer
Node.js & npm
MySQL or any other supported database
Setup Instructions
Clone the Repository to Local Machine

# Clone the Repository to Local Machine
git clone https://github.com/luqman305/toDoJobstore.git
cd todolist-laravel


# Set Up Environment Configuration
Copy the .env.example file to .env

# env
APP_NAME=ToDoList
APP_ENV=local
APP_KEY=base64:YourAppKeyHere
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=todoJobStore
DB_USERNAME=root
DB_PASSWORD=yourpassword

# Install PHP Dependencies
composer install

# Generate Key
php artisan key:generate

# Install Frontend Dependencies
npm install

# Compile Frontend Assets
npm run dev

# Set Up Local Database
1. Ensure your database server is running.
2. Create a new database called todoJobStore.

# Run Migrations
php artisan migrate

# Start the Development Server
php artisan serve

# Open the Project in Browser

Navigate to http://localhost:8000 in your browser to access the ToDoList application.
You can now test the application and manage your tasks.

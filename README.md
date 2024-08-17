# Customer Management System with CodeIgniter 4

## Overview

This project is a customer management system built with PHP and CodeIgniter 4. It provides functionality for both administrators and customers.

- **Admin Functionality**: Admins can view all customers, see the messages sent by each customer, and view registration dates. Admins can perform CRUD (Create, Read, Update, Delete) operations on customers.
- **Customer Functionality**: Customers can register, update their details, and send messages. They can also restore their password if forgotten.
- **Email Notifications**: Upon registration, customers receive a confirmation email. Both admins and customers can restore passwords via email.

## Features

### Admin Features
- View all customers
- View messages sent by each customer
- View registration dates of customers
- Perform CRUD operations on customer records

### Customer Features
- Register an account
- Update personal details
- Send messages to the admin
- Password recovery via email
- Email confirmation upon registration

## Requirements

- PHP 7.3 or higher
- MySQL or MariaDB
- Composer
- CodeIgniter 4

## Installation

Follow these steps to set up the project on your local machine:

### 1. Clone the Repository
Clone the repository to your local machine using the following command:

```bash
git clone https://github.com/iouliakan/PhpApplication.git
cd PhpApplication

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

```
### 2. Install Dependencies 
Install the project dependencies using Composer:
```bash
composer install
```

### 3. Environment Configuration 
Create a copy of the .env file:

```
cp env.example .env
```

Open the .env file and set your database connection details:
```bash
database.default.hostname = localhost
database.default.database = your_database_name
database.default.username = your_database_user
database.default.password = your_database_password
database.default.DBDriver = MySQLi
```

### 4. Set Up the Database
Run the migrations to create the database schema:
```bash
php spark migrate
```

### 5. Configure Email Settings
In the app/Config/Email.php configure the  email settings to enable email notifications:
    ```bash 
    
    public string $fromEmail  = 'your_email@example.com';
    public string $fromName   = 'Your Name';

    public string $SMTPHost = 'smtp.example.com';  // Replace with your SMTP server
    public string $SMTPUser = 'your_smtp_username'; // Replace with your SMTP username
    public string $SMTPPass = 'your_smtp_password'; // Replace with your SMTP password
    public int $SMTPPort = 587;                     // Replace with your SMTP port
    public string $SMTPCrypto = 'tls';              // Replace with your SMTP encryption ('tls' or 'ssl')
    ```


Make sure to replace:
- `your_email@example.com` with your actual email address.
- `Your Name` with your name or your project's name.
- `smtp.example.com` with your SMTP server address.
- `your_smtp_username` with your SMTP username.
- `your_smtp_password` with your SMTP password.
- `587` with the port your SMTP server uses (commonly 587 for TLS or 465 for SSL).
- `tls` with the appropriate encryption type (`tls` or `ssl`).

These changes are necessary for the application to send emails for actions such as user registration confirmation and password recovery.


### 6. Set Up Admin Password
To set up the admin password, follow these steps:
In the app/Views/admin/encrypt_password.php  manually enter the password, run the code, and then enter the resulting hash into the password field in the admin's table.


### 7. Start the Development Server
Start the CodeIgniter development server:
```bash
php spark serve
```
Now you can access the application at `http://localhost:8080.`


#### License
This project is licensed under the MIT License. See the LICENSE file for details.



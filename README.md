# Overview 
This project is a customer management system built with PHP and CodeIgniter 4. It provides functionality for both administrators and customers.

**Admin Functionality:**
Admins can view all customers, see the messages sent by each customer, and view registration dates.
Admins can perform CRUD (Create, Read, Update, Delete) operations on customers.
**Customer Functionality:** 
Customers can register, update their details, and send messages. They can also restore their password if forgotten.
**Email Notifications:** 
Upon registration, customers receive a confirmation email. Both admins and customers can restore passwords via email.

# Feautures 
**Admin Feautures**
-View all customers
-View messages sent by each customer
-View registration dates of customers
-Perform CRUD operations on customer records

**Customer Feautures**
-Register an account
-Update personal details
-Send messages
-Password recovery via email
-Email confirmation upon registration


# Requirements 
-PHP 7.3 or higher
-MySQL or MariaDB
-Composer
-CodeIgniter 4


# Installation 









Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

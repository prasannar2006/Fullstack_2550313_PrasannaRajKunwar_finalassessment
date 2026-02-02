# Meridian Suite Hotel – Room Booking System

This project is a full-stack web application built using PHP and MySQL as part of the Full Stack Development module. The system represents a real-world hotel or hostel room booking platform, allowing administrators to manage rooms and bookings while guests can view hotel information and make reservations. The application focuses on secure backend development, database interaction, and the use of Ajax for improved user experience.


## Project Overview

The Meridian Suite Hotel Booking System is designed to simulate how an actual hotel management system works. Administrators can add, edit, view, and remove room records, manage occupants, and monitor room availability. Guests can access a public homepage, view hotel details, and submit room bookings.

The project demonstrates important backend concepts such as database design, session-based authentication, secure form handling, and asynchronous communication using Ajax.


## Technologies Used

Backend: PHP (PDO)  
Database: MySQL  
Frontend: HTML5, CSS3, JavaScript  
Ajax: JavaScript Fetch API  
Server: Apache (XAMPP / Student Server)  
Version Control: Git  


## Project Structure

meridian_suite_hotel/

assets/  
css/  
style.css  
js/  
script.js  
images/  

config/  
db.php  

includes/  
header.php  
footer.php  
functions.php  

public/  
home.php  
login.php  
logout.php  
index.php  
rooms.php  
add_room.php  
edit_room.php  
delete_room.php  
occupants.php  
book.php  
book_public.php  
availability.php  
search_rooms.php  

meridian_suite_hotel.sql  
README.md  


## Database Structure

The system uses the following main database tables:

users – stores administrator login credentials  
rooms – stores room information such as number, type, capacity, and price  
occupants – stores guest information  
bookings – stores booking records with check-in and check-out dates  

The database structure and sample data are included in the file:

meridian_suite_hotel.sql


## Authentication

Session-based authentication is implemented to protect the administrative section of the system. Only authenticated users can access management pages such as room and occupant management. Passwords are securely stored in the database using PHP’s password hashing functions.

Demo Login Credentials:

Username: admin  
Password: admin123  


## Features Implemented

CRUD Functionality  
The system allows administrators to create, read, update, and delete room records. Occupants can be added and viewed, and bookings can be created through the public booking interface.

Search Functionality  
A live search feature is implemented on the Rooms page, allowing administrators to search for rooms by room number or room type using Ajax.

Ajax Features  
The system includes a real-time room availability checker that updates automatically when dates are selected, as well as a live room search that works without page reloads.

Security Measures  
Prepared statements are used to prevent SQL injection. All dynamic output is escaped using htmlspecialchars to prevent XSS attacks. CSRF protection is implemented for POST requests, and form validation is applied on both the client and server sides.

Public and Admin Areas  
The application includes a public homepage where users can view hotel information and make bookings. An admin dashboard is provided for managing rooms, occupants, and bookings.


## Setup Instructions

1. Clone or extract the project into your server directory, for example inside the htdocs folder.

2. Create a MySQL database named:
   meridian_suite_hotel

3. Import the database by opening phpMyAdmin and importing the file:
   meridian_suite_hotel.sql

4. Update database credentials if required in:
   config/db.php

5. Access the system using the following URLs:

Public homepage:  
http://localhost/meridian_suite_hotel/public/home.php  

Admin login:  
http://localhost/meridian_suite_hotel/public/login.php  


## How to Test the System

Log in as an administrator and manage room records. Add, edit, and delete rooms to verify CRUD functionality. Use the live room search feature to filter rooms dynamically. Check room availability using the date selection feature. Make a booking from the public booking page and confirm that the data is stored correctly in the database.


## Known Issues and Limitations

Editing and deleting occupants is limited. Role-based access control is not implemented. Booking edit and delete functionality is not included, as it was outside the project scope.


## Possible Future Enhancements

Future improvements could include role-based access control, email booking confirmation, pagination for large datasets, and more advanced booking management features.


## Author

Meridian Suite Hotel – Booking System  
Developed as part of academic coursework for the Full Stack Development module.


## Compliance with Assignment Requirements

PHP and MySQL are used for backend development.  
Full CRUD operations are implemented.  
Search functionality is provided.  
Ajax is used for real-time interactions.  
Secure coding practices are applied.  
Session-based authentication is implemented.  
The project follows a real-world, structured design.

# Padma Toll Management

A web-based toll management system designed to streamline vehicle data entry, ownership tracking, toll calculation, and record operations for toll booths like those on the Padma Bridge.

---

## 🚀 Features
- Vehicle registration and updates
- Owner information management
- Toll calculation based on vehicle type
- Search and filter functionality
- Record operations and warning system for deletion
- User-friendly interface with basic styling
  
---

## 🗂️ Project Structure

├── README.md
├── View.css
├── View.php
├── calculating.php
├── car.php
├── connect.php
├── delete_warning.php
├── font.css
├── index.php
├── no_item_found.html
├── operations.php
├── owner.php
├── padma.png
├── post.php
├── search.css
├── search.jpg
├── sorting_searching.php
├── update_car.php
├── update_owner.php

---

## 📄 Key Files

- index.php: Main entry point.
- connect.php: Database connection logic.
- car.php / update_car.php: Manage car details.
- owner.php / update_owner.php: Handle owner details.
- calculating.php: Toll calculation logic.
- operations.php: Perform data-related operations.
- sorting_searching.php: Search and filter functionalities.
- delete_warning.php: Warning prompt before deletion.
- no_item_found.html: Displayed when a search yields no results.

---

## 🎨 Assets

- View.css / font.css / search.css: Custom stylesheets.
- padma.png / search.jpg: Image resources for UI.

---

## 🛠️ Technologies Used

- PHP
- HTML/CSS
- MySQL (assumed, based on connect.php)

---

## ⚙️ Setup Instructions

- Clone the repository:
git clone https://github.com/MunnaHasan13/padma_toll_management.git

- Place the folder in your local web server directory (e.g., htdocs for XAMPP).
- Create a MySQL database and import necessary tables (not provided here, add SQL file if available).
- Update connect.php with your database credentials.
- Run the application through your local server:
http://localhost/padma_toll_management/

---

## 📌 Notes

- Make sure your PHP environment is correctly set up.
- This project does not currently implement authentication.

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

## 📷 Screenshots

- Index Page
  
  ![Screenshot 2025-04-23 133226](https://github.com/user-attachments/assets/e0d32878-be19-404b-9ed6-6745390ed6f5)

- Operation Page
  
 ![Screenshot 2025-04-23 133251](https://github.com/user-attachments/assets/e6006ff4-ac0a-405b-a5d0-ef7b25da8007)

- Car Owner Information

  ![Screenshot 2025-04-23 133313](https://github.com/user-attachments/assets/801b2743-d8fd-4505-aec7-c891b40fb7a9)

- Car Information

  ![Screenshot 2025-04-23 133338](https://github.com/user-attachments/assets/57086bea-1515-4efa-8772-09db7c101424)

- Details

  ![Screenshot 2025-04-23 133422](https://github.com/user-attachments/assets/73a7af84-3373-4263-82ec-cf64f4c37478)


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
- This is the first Toll Management Project I have ever completed.
- There are so many confusion as we can see in our apps.
- In the details page where we can see the details information based on Vehicle owner & Vehicle that will help us to find the actual toll
  amount for the vehicle that mention in the input.

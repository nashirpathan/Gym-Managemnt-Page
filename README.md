# Smart Gym Management System with Admin Panel and Calorie Calculator
**Developed By:** Nashir Husain Pathan  
**Course:** Bachelor of Computer Applications (BCA)  
**Semester:** 6th Semester Project

---

## Project Overview
A modern, responsive gym management system built for final year BCA projects. It features a dark-themed user interface and a powerful admin panel to manage gym operations dynamically.

## Tech Stack
- **Frontend:** HTML5, CSS3, Bootstrap 5, JavaScript
- **Backend:** Core PHP (Easy for beginners)
- **Database:** MySQL
- **Local Server:** XAMPP

---

## Key Features
### User Side:
1. **Dynamic Homepage:** Sections for hero banners, plans, trainers, and testimonials.
2. **BMI Calculator:** Real-time calculation using JavaScript.
3. **Calorie Intake Calculator:** Daily calorie, water, and protein needs based on user goals.
4. **Membership Inquiry System:** Users can submit inquiries for specific plans.
5. **Trainer Profiles:** View certified trainers with their specialization and experience.
6. **Gallery:** Responsive grid to showcase gym facilities.
7. **User Auth:** Login and Registration system.

### Admin Side:
1. **Secure Login:** Session-based authentication.
2. **Dashboard Analytics:** Quick view of total inquiries, plans, trainers, and users.
3. **Inquiry Management:** View, search, update status, and delete member inquiries.
4. **Content Management:** Dynamically update plans, trainers, gallery images, and testimonials.
5. **Homepage Editor:** Change hero section text without editing code.

---

## Setup Instructions (XAMPP)

1. **Download and Install XAMPP:**
   - Download from: [apachefriends.org](https://www.apachefriends.org/)
   - Install it on your C: drive (default).

2. **Copy Project Folder:**
   - Copy the `gym-management` folder.
   - Paste it inside `C:\xampp\htdocs\`.

3. **Start XAMPP Services:**
   - Open **XAMPP Control Panel**.
   - Start **Apache** and **MySQL**.

4. **Import Database:**
   - Open your browser and go to `http://localhost/phpmyadmin/`.
   - Click on **New** in the left sidebar.
   - Enter Database Name: `gym_db` and click **Create**.
   - Click on the newly created `gym_db`.
   - Go to the **Import** tab.
   - Choose the file `gym-management/database/gym_db.sql`.
   - Scroll down and click **Import** (or **Go**).

5. **Run the Project:**
   - **User Website:** `http://localhost/gym-management/`
   - **Admin Panel:** `http://localhost/gym-management/admin/login.php`

---

## Login Credentials

### Admin Login:
- **URL:** `http://localhost/gym-management/admin/login.php`
- **Username:** `admin`
- **Password:** `admin123`

### User Login:
- Register a new account via the **Register** page to test user login.

---

## Project Structure
```text
/gym-management
│
├── /admin                # Admin Panel Files
│   ├── /includes         # Admin-specific headers/sidebars
│   ├── dashboard.php
│   ├── manage-inquiries.php
│   ├── manage-plans.php
│   ├── manage-trainers.php
│   └── ...
│
├── /assets               # CSS, JS, and Static Images
│   ├── /css/style.css
│   ├── /js/main.js
│   └── /images
│
├── /includes             # Shared PHP files (Navbar, Footer, DB Conn)
│   ├── db_conn.php
│   ├── header.php
│   ├── navbar.php
│   └── footer.php
│
├── /database             # SQL Database File
├── /uploads              # Folder for uploaded images
│
├── index.php             # Home Page
├── bmi-calculator.php    # BMI Tool
├── calorie-calculator.php # Calorie Tool
├── inquiry.php           # Registration/Inquiry Form
└── ...
```

---

## Developed By
**Nashir Husain Pathan**  
BCA 6th Semester Project  
*Transform Your Body, Transform Your Life.*

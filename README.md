# 🍴 FoodHub – Real-World Full Stack Project (Task 4, Apex Planet)
```
> A full-stack **Online Food Ordering System** built with **PHP + MySQL**, featuring user authentication, food browsing, ordering, and an admin dashboard for managing users and orders.



## 🚀 Project Overview
This project was developed as part of **Task 4 – Real-World Full Stack Project** from the **Apex Planet Internship Program**.

**Objective:**  
Apply learned full-stack development skills to build a real-world web application with CRUD operations and an admin panel.

```

## 🧩 Features


```
### 👨‍🍳 User Side
- User Registration & Login  
- Browse Food Items with Images  
- Add Items to Cart & Place Orders  
- View “My Orders”  
- Responsive Dark-Elegant UI  

### 🛠 Admin Panel
- Secure Admin Login  
- Dashboard showing key stats  
- Manage Users & Orders  
- Analytics (Orders per day, Active Users)  
- CRUD Operations on Food Items  

```

## 🗂 Project Structure

```

│
├── admin/
│ ├── admin_login.php
│ ├── dashboard.php
│ ├── manage_orders.php
│ ├── manage_users.php
│ └── logout.php
│
├── assets/
│ ├── style.css
│ └── images/
│ ├── burger.jpg
│ ├── pizza.jpg
│ ├── pasta.jpg
│ └── … more food images
│
├── config/
│ └── db.php
│
├── home.php
├── login.php
├── register.php
├── order.php
└── my_orders.php

```

## 💾 Database Setup
```
### Database: `foodhub_db`

```sql
CREATE DATABASE foodhub_db;

USE foodhub_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE food_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    price DECIMAL(10,2),
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    item_name VARCHAR(100),
    quantity INT,
    total DECIMAL(10,2),
    status VARCHAR(50) DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

```

# ⚙️ How to Run Locally
```
Install XAMPP and start Apache & MySQL.

Create database foodhub_db in phpMyAdmin.

Import the SQL tables above.

Place the project folder inside:

C:\xampp\htdocs\


Open the project in your browser:
👉 http://localhost/APEX_TASK4/

Admin Panel:
👉 http://localhost/APEX_TASK4/admin/admin_login.php

```

# 🖤 Theme & UI

```
Dark Elegant Theme

Responsive Design using HTML + CSS + Flexbox

Smooth hover and transition effects

```

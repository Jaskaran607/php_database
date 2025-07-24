# 💻 PHP & MySQL Employee Management System

A lightweight, beginner-to-advanced level project using **PHP** and **MySQL** to:

- Create a database
- Create a table
- Insert sample employee records
- Display them in a dynamic HTML table

---

## 🚀 Technologies Used

| Technology      | Purpose                    |
|-----------------|----------------------------|
| PHP             | Server-side scripting      |
| MySQL/MariaDB   | Database management        |
| Apache/XAMPP    | Local server               |
| Visual Studio Code | Code editor             |
| Git & GitHub    | Version control & hosting |

---

## 📂 Project Setup

### 1️⃣ Requirements

- [XAMPP](https://www.apachefriends.org/index.html)
- [VS Code](https://code.visualstudio.com/)
- # 📝 iNotes - PHP MySQL CRUD App

iNotes is a simple and responsive Notes Management web app built using **PHP**, **MySQL**, **Bootstrap 4**, and **DataTables**. It allows users to **Create**, **Read**, **Update**, and **Delete** (CRUD) personal notes.

## 🚀 Features

- 📌 Add new notes with title and description
- ✏️ Edit existing notes with modal popup
- ❌ Delete notes with confirmation
- 🔍 Search and sort notes using DataTables
- 💡 Alerts on successful insert, update, or delete

## 🖥️ Tech Stack

- **Frontend**: HTML, Bootstrap 4, jQuery, DataTables
- **Backend**: PHP (Procedural)
- **Database**: MySQL

---

## 🧱 Database Setup

1. Create a database named `notes`.
2. Run the following SQL query to create the table:

```sql
CREATE TABLE `notes` (
  `sno` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(255) NOT NULL,
  `description` TEXT NOT NULL,
  `tstamp` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

- Git & GitHub

### 2️⃣ Run the Project

1. Start **Apache** and **MySQL** via XAMPP.
2. Place the project in `htdocs/` folder (e.g., `C:/xampp/htdocs/mysql-php-project`)
3. Open browser and go to:


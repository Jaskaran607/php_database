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

sql
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
# 📂 PHP File Handling Demo

This project demonstrates how to use PHP file handling functions — `fopen()`, `fread()`, `fwrite()`, and `fclose()` — using **all major file modes** (`r`, `w`, `a`, `x`, and their + variants) in a single PHP file.

# 📦 PHP MySQL CRUD Application

This project demonstrates a simple **CRUD (Create, Read, Update, Delete)** system using **PHP and MySQL**. It includes a responsive interface to manage records from a database using HTML, Bootstrap (optional), and plain PHP.

---

## CRUD operation app
## 🚀 Features

- ➕ Add New Records
- 📄 View All Records
- ✏️ Edit Existing Records
- ❌ Delete Records with Confirmation
- 💬 Success/Error Alerts

---

## 💡 Technologies Used

- 🐘 PHP (Core PHP, no framework)
- 🛢 MySQL (MariaDB)
- 🖥 HTML5 / CSS3
- ✅ Bootstrap 4/5 (optional for styling)
- 🧠 SQL (Structured Query Language)

---

## file hanlder php 
## 📌 Features

- ✅ User-friendly HTML form
- 📝 Accepts input to write to a file
- 🔄 Supports all file modes (`r`, `r+`, `w`, `w+`, `a`, `a+`, `x`, `x+`)
- 📖 Displays contents of the file after operation
- ⚠️ Handles exceptions and file errors gracefully
- 🧰 Uses only **core PHP** (no frameworks needed)

---

## 💻 Technologies Used

- PHP
- HTML5
- No external libraries/frameworks

---

## 🚀 Getting Started

### 1. Clone the Repo

```bash
git clone https://github.com/yourusername/php-file-handler.git
cd php-file-handler


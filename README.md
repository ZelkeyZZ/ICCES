# ICCES: Informatics College Clearance Evaluation System 🎓📋
### *An Integrated College Clearance Electronic System*

[![Language](https://img.shields.io/badge/Language-PHP%20%7C%20HTML%20%7C%20CSS%20%7C%20JS-blue.svg?style=flat-square)](https://www.php.net/)
[![Database](https://img.shields.io/badge/Database-MySQL-orange.svg?style=flat-square&logo=mysql)](https://www.mysql.com/)
[![Environment](https://img.shields.io/badge/Environment-XAMPP-fb7a24.svg?style=flat-square)](https://www.apachefriends.org/)
[![Project Type](https://img.shields.io/badge/Type-Thesis%20%2F%20Capstone%20Proposal-brightgreen.svg?style=flat-square)]()

**ICCES** is a web-based automated evaluation and clearance management platform tailored specifically for Informatics College. Developed as a Capstone/Thesis proposal, this **Integrated College Clearance Electronic System** digitizes the graduation clearance workflow, allowing students to fulfill institutional and departmental requirements entirely online. By automating tracking and evaluations, it eliminates the traditional need for students to manually track down faculty members and instructors across campus in person.

---

## 📸 System Screenshots

| Login / Portal Interface | Student Clearance Dashboard |
| :---: | :---: |
| ![Login Page](assets/images/screenshot_login.png) | ![Dashboard](assets/images/screenshot_dashboard.png) |

> 💡 *Note: To render your own screenshots here, upload your system images to an `assets/images/` folder inside your repository and replace the file paths above.*

---

## 🎯 Problem Statement & Solution

### The Problem
The traditional graduation clearance process is notoriously stressful, manual, and inefficient. Graduating students are forced to carry physical clearance forms across campus, tracking down specific professors, department heads, and administrative offices to obtain manual signatures. This manual method often suffers from:
- **Scheduling Conflicts:** Instructors being out-of-office, in lectures, or away on research leave.
- **Physical Wear & Loss:** High risks of losing or damaging physical clearance sheets.
- **Inefficient Tracking:** Lack of visibility for students regarding which specific requirements are holding up their final approval.

### The Solution (ICCES)
ICCES bridges this communication gap by acting as a centralized, web-based digital portal. Faculty can review and evaluate a student's clearance status asynchronously from any web browser, while students gain real-time visibility into their graduation progress directly from a secure dashboard.

---

## ✨ Key System Features

### 👨‍🎓 Student Module
- **Real-Time Progress Tracking:** Visual checklist indicating pending, approved, or rejected requirements categorized by department (e.g., Library, Laboratory, Accounting, Registrar).
- **Digital Requirement Submission:** Upload necessary documents or proof of completion directly through the web portal.
- **Asynchronous Communication:** Receive notes or evaluation feedback from instructors explaining why a certain milestone was marked as pending or rejected.

### 👩‍🏫 Faculty & Instructor Module
- **Pending Approvals Queue:** A clean dashboard displaying all students currently requesting clearance verification for their respective courses/departments.
- **One-Click Actions:** Rapidly approve or reject clearance status with the optional capability to attach evaluation remarks.
- **Batch Processing:** Filter and sort students by course, year, or section to process sign-offs in bulk.

### ⚙️ Admin Module (Registrar / Superuser)
- **User Management:** Create, update, and manage accounts for students, instructors, and administrative staff.
- **Clearance Master Control:** Generate and manage overall clearance templates required for graduating classes.
- **Report Generation:** Export comprehensive clearance summaries to track which students are fully cleared for graduation.

---

## 🛠️ Tech Stack & Tools

- **Frontend:** HTML5, CSS3 (Custom Responsive Layouts), JavaScript (Dynamic UI elements and async operations)
- **Backend:** PHP (Procedural logic handling session tokens, security controls, and routing)
- **Database:** MySQL (Relational database hosting users, logs, and requirement state relations)
- **Local Server Environment:** XAMPP (Apache HTTP Server + MariaDB/MySQL)

---

## 💾 Database Configuration & Architecture

The system utilizes a relational database containing tables mapped for users, clearance steps, roles, and evaluation logs.

### Core Database Tables:
* `users` - Stores account credentials (hashed passwords), names, institutional IDs, and emails.
* `roles` - Categorizes account clearance permissions (Admin, Faculty, Student).
* `clearance_status` - Tracks individual records of who has cleared what step, timestamps, and active status.
* `requirements` - Definitions of conditions required to clear each department.

---

## 🚀 Installation & Local Deployment Guide

Follow these steps to run the **ICCES** portal locally using **XAMPP**:

### Prerequisites
- Install [XAMPP](https://www.apachefriends.org/) (Version 8.0 or higher recommended for PHP compatibility).
- A Git client installed locally or download the source code zip.

### Step-by-Step Setup

1. **Clone the Repository:**
   Clone the repository directly into your XAMPP local server root directory (`htdocs`):
   ```bash
   cd C:/xampp/htdocs
   git clone [https://github.com/ZelkeyZZ/ICCES.git](https://github.com/ZelkeyZZ/ICCES.git)

2. **Start XAMPP Services:**
- Open the XAMPP Control Panel.
- Start the Apache module.
- Start the MySQL module.

3. **Import the Database:**
- Open your web browser and navigate to http://localhost/phpmyadmin/.
- Click on New in the left sidebar to create a new database. Name it exactly what is referenced in your backend script (e.g., icces_db).
- Select the newly created database, navigate to the Import tab at the top.
- Click Choose File and locate your SQL dump file (look for a .sql file, usually named icces_db.sql or similar within your repo's root folder or a /database directory).
- Scroll down and click Import.

4. Configure Database Connection:
If your database connection configurations differ (like database name or custom passwords), open and edit your configuration file (usually named config.php, db.php, or connection.php).
   ```php
   $servername = "localhost";
   $username = "root";
   $password = ""; // Leave blank for default XAMPP configuration
   $dbname = "icces_db;

5. Launch the Application:
Open your browser and navigate to the local site directory:
   ```url
   http://localhost/ICCES/

## 📂 Project Directory Breakdown
    
    ICCES/
    ├── assets/             # CSS stylesheets, Javascript modules, and branding assets
    ├── config/             # Database connection setups (`db.php`, global parameters)
    ├── includes/           # Reusable UI partials (header, footer, navbars, sidebars)
    ├── student/            # Student dashboard views, request sub-systems
    ├── faculty/            # Instructor portal queues, response systems
    ├── admin/              # Full system control panels and user configuration suites
    ├── database/           # Contains raw `.sql` database schema blueprints
    └── index.php           # Main landing, sign-in gateway router

## ⚠️ Current Project Status & Known Limitations
As this repository serves as a Thesis/Capstone Proposal prototype, certain modules are currently in a proof-of-concept state and are pending optimization for full production deployment:
Email Verification Module: The automated email notification and verification workflow is currently non-functional. It requires integration with a live SMTP mail server or a dedicated third-party API (e.g., PHPMailer, SendGrid).
Unpolished Features: Select UI components, edge-case validation checks, and secondary administration sub-pages are currently unfinished or utilize placeholder layouts.

## 🚀 Future Roadmap (Scope for Future Research)
For future researchers or developers looking to expand upon the ICCES framework, the following enhancements are recommended:
1. ​Live Communication Gateway: Properly configure a mail server setup or integrate an SMS API gateway (such as Twilio) to send real-time clearance status updates directly to students' devices.
2. ​Comprehensive Exception Handling: Polish form inputs to enforce stricter server-side data validation and prevent duplicate requirement submissions.
3. ​Advanced UI Refinement: Enhance layout responsiveness across all screen breakpoints, ensuring the system runs flawlessly on older mobile devices often used by busy faculty on the move.
   
## 📄 License & Academic Integrity
This project was built and submitted as part of an official Thesis/Capstone Project Proposal. All rights to the structural workflow, architecture layouts, and custom code are preserved under academic research boundaries. Unauthorized commercial monetization or direct plagiarism without citing the author is prohibited.

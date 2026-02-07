LTO-TICKETING

(Web Application with Bluetooth Printing)

📄 Description

LTO-TICKETING is a web-based ticketing and traffic violation management system designed to streamline the recording, processing, and monitoring of traffic violations following Land Transportation Office (LTO)–style workflows. The system integrates with a Bluetooth-enabled printing device, allowing traffic officers to instantly print violation tickets directly from the system.

The platform reduces manual paperwork, improves accuracy of violation records, and enhances operational efficiency by connecting digital ticket issuance with real-time physical printing. Built using Laravel, the system is suitable for academic projects, government-system simulations, and professional portfolio use.

🚀 Features
🚓 Ticket & Violation Management

Traffic violation recording

Digital ticket issuance

Violation history per motorist

Fine and penalty computation

🖨️ Bluetooth Printing Integration

Bluetooth device pairing with the system

Direct ticket printing after issuance

Real-time print confirmation

Portable printer support for field operations

👤 Motorist Management

Motorist profile records

Vehicle and license information

Violation history tracking

🧾 Payments & Settlements

Fine computation and assessment

Payment status tracking

Cleared and pending violations monitoring

👥 User & Access Control

Secure user authentication

Role-based access (Admin, Traffic Officer, Clerk)

Account and profile management

🛠️ Tech Stack

Backend: Laravel

Frontend: Blade / Bootstrap 5

Database: MySQL / SQL Server

Bluetooth Integration: Web Bluetooth / Device SDK (printer-dependent)

Authentication: Laravel Auth

Server: Apache / Nginx / IIS

📂 Project Structure
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   ├── Middleware/
│   │   └── Requests/
│   ├── Models/
│   └── Services/
├── database/
│   ├── migrations/
│   └── seeders/
├── routes/
│   ├── web.php
│   └── api.php
├── resources/
│   ├── views/
│   └── js/
├── public/
├── .env
├── composer.json
└── README.md

⚙️ Installation & Setup
1️⃣ Clone the repository
git clone https://github.com/your-username/LTO-TICKETING.git
cd LTO-TICKETING

2️⃣ Install dependencies
composer install

3️⃣ Environment configuration
cp .env.example .env
php artisan key:generate


Update database settings in .env:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lto_ticketing_db
DB_USERNAME=root
DB_PASSWORD=

4️⃣ Run migrations
php artisan migrate

5️⃣ Run the application
php artisan serve


Access the system:

http://127.0.0.1:8000

🔗 Bluetooth Printer Setup

Pair the Bluetooth printer with the device (laptop/tablet/mobile)

Ensure the printer supports ESC/POS or compatible protocol

Connect the printer through the system’s print module

Issue a ticket and print automatically after confirmation

Printer compatibility may vary depending on device model.

🔐 User Roles

Admin – Full system access and configuration

Traffic Officer – Issue tickets and print via Bluetooth

Clerk – Manage payments and violation records

🧪 Testing
php artisan test

📈 Future Enhancements

Mobile app for traffic officers

QR code validation on printed tickets

Online fine payment integration

SMS / email notifications

Audit trail and activity logs

Offline mode with sync support

🤝 Contribution

Contributions are welcome!

Fork the repository

Create a feature branch

Commit your changes

Submit a pull request

📄 License

This project is licensed under the MIT License.

👨‍💻 Author

Kee Ken
Laravel & ASP.NET Developer
📍 Philippines

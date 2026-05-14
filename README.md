# 🌸 Bobo Hotel Booking

Bobo Hotel Booking adalah website booking hotel aesthetic berbasis Laravel 12 dengan fitur multi role admin dan user.

---

## ✨ Features

### 👤 User
- Register & Login
- Lihat daftar hotel
- Booking hotel
- Hitung total harga otomatis
- Riwayat booking

### 👑 Admin
- Dashboard admin
- Tambah hotel
- Edit hotel
- Hapus hotel
- Insight hotel terlaris

### 🔥 API
- GET hotel
- POST hotel
- PUT hotel
- DELETE hotel

### 🛡 Security
- Laravel Sanctum
- Middleware admin

### 🧪 Testing
- Feature Test
- Unit Test

---

## 🛠 Tech Stack

- Laravel 12
- TailwindCSS
- MySQL
- Sanctum
- Postman

---

## 🗂 Database

### Tabel utama:
- users
- hotels
- bookings

---

## 🔗 API Endpoint

| Method | Endpoint |
|---|---|
| GET | /api/hotels |
| POST | /api/hotels |
| PUT | /api/hotels/{id} |
| DELETE | /api/hotels/{id} |

---

## 🚀 Cara Menjalankan Project

```bash
composer install
npm install
php artisan migrate
php artisan db:seed
php artisan serve
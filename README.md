# Latihan Flutter REST API

Project latihan REST API menggunakan **CodeIgniter 4 (Backend)** dan **Flutter (Frontend)** dengan implementasi CRUD sederhana untuk manajemen produk.

---

## 📋 Fitur

### Backend (CodeIgniter 4)
- ✅ REST API CRUD untuk resource `products`
- ✅ CORS support untuk Flutter Web
- ✅ Database MySQL/MariaDB
- ✅ Validasi input
- ✅ Response JSON format

### Frontend (Flutter)
- ✅ List produk dengan UI modern
- ✅ Tambah produk dengan form validasi
- ✅ Hapus produk
- ✅ Material 3 design
- ✅ Error handling dengan SnackBar
- ✅ Gradient background

---

## 🛠 Tech Stack

- **Backend**: CodeIgniter 4.6.4
- **Frontend**: Flutter 3.35.6 / Dart 3.9.2
- **Database**: MySQL (via XAMPP)
- **HTTP Client**: package `http` 1.2.2

---

## 📦 Struktur Project

```
├── backend-ci4/              # CodeIgniter 4 REST API
│   ├── app/
│   │   ├── Controllers/Api/  # Products API Controller
│   │   ├── Models/           # ProductModel
│   │   ├── Database/Migrations/
│   │   └── Config/           # Routes, CORS, Filters
│   ├── public/
│   ├── writable/
│   └── .env                  # Database config
│
├── flutter_app/              # Flutter Application
│   ├── lib/
│   │   ├── models/           # Product model
│   │   ├── services/         # ProductApi HTTP service
│   │   └── main.dart         # UI
│   └── pubspec.yaml
│
├── README_SETUP.md           # Setup instructions
├── .gitignore
└── README.md
```

---

## 🚀 Cara Menjalankan

### 1️⃣ Backend (CodeIgniter 4)

**Prerequisites:**
- PHP 8.2+ & Composer
- MySQL (XAMPP/MAMP)

**Langkah-langkah:**
```bash
# 1. Masuk ke folder backend
cd backend-ci4

# 2. Install dependencies (jika belum)
composer install

# 3. Buat database MySQL
CREATE DATABASE ci4_flutter_api;

# 4. Jalankan migrasi
php spark migrate

# 5. Jalankan server
php spark serve --host 0.0.0.0 --port 8080
```

**API Endpoints:**
- `GET    /api/products`       - List semua produk
- `GET    /api/products/{id}`  - Detail 1 produk
- `POST   /api/products`       - Tambah produk baru
- `PUT    /api/products/{id}`  - Update produk
- `DELETE /api/products/{id}`  - Hapus produk

---

### 2️⃣ Frontend (Flutter)

**Prerequisites:**
- Flutter SDK 3.x

**Langkah-langkah:**
```bash
# 1. Masuk ke folder flutter
cd flutter_app

# 2. Install dependencies
flutter pub get

# 3. Jalankan aplikasi
flutter run -d chrome          # Untuk Web (Chrome)
flutter run -d windows         # Untuk Windows Desktop
flutter run                    # Pilih device yang tersedia
```

**⚠️ Penting untuk Flutter:**

- **Chrome/Web**: URL API sudah benar (`http://localhost:8080`)
- **Android Emulator**: Ubah `baseUrl` di `lib/main.dart` jadi `http://10.0.2.2:8080`
- **HP Fisik**: Ubah `baseUrl` jadi `http://[IP-PC-kamu]:8080` (misal `http://192.168.1.10:8080`)

---

## 🎨 Screenshot

*(Tambahkan screenshot aplikasi di sini)*

---

## 📝 API Documentation

### POST /api/products (Create Product)
**Request Body:**
```json
{
  "name": "Laptop ASUS",
  "price": 8500000,
  "stock": 10
}
```

**Response (201 Created):**
```json
{
  "message": "Created",
  "data": {
    "id": "1",
    "name": "Laptop ASUS",
    "price": "8500000.00",
    "stock": "10",
    "created_at": "2025-12-24 15:00:00",
    "updated_at": "2025-12-24 15:00:00"
  }
}
```

### GET /api/products (List Products)
**Response (200 OK):**
```json
{
  "data": [
    {
      "id": "1",
      "name": "Laptop ASUS",
      "price": "8500000.00",
      "stock": "10",
      "created_at": "2025-12-24 15:00:00",
      "updated_at": "2025-12-24 15:00:00"
    }
  ]
}
```

---

## 🐛 Troubleshooting

### Backend Error 500
- **Cek log:** `backend-ci4/writable/logs/log-[tanggal].log`
- **Pastikan MySQL running** di XAMPP
- **Cek .env:** Database credentials benar

### Flutter Connection Error
- **Pastikan backend sudah running** di `http://localhost:8080`
- **Test di browser:** Buka `http://localhost:8080/api/products`
- **CORS error:** Sudah dihandle di `backend-ci4/app/Config/Cors.php`

---

## 📚 Dokumentasi Referensi

- [CodeIgniter 4 Docs](https://codeigniter.com/user_guide/)
- [Flutter Docs](https://docs.flutter.dev/)
- [REST API Best Practices](https://restfulapi.net/)

---

## 👨‍💻 Author

**[Nama Kamu]**  
Latihan REST API - Pak Fauzan Flutter Course

---

## 📄 License

Project ini dibuat untuk keperluan latihan/tugas kuliah.

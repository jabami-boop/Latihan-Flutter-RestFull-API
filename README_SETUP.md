## CI4 + Flutter (REST API)

### Backend (CodeIgniter 4)

1) Pastikan Apache + MySQL (XAMPP) sudah jalan.

2) Buat database:

`CREATE DATABASE ci4_flutter_api;`

3) Migrasi + jalankan server:

`cd backend-ci4`

`php spark migrate`

`php spark serve --host=0.0.0.0 --port=8080`

Endpoint:

- `GET http://localhost:8080/api/products`
- `POST http://localhost:8080/api/products` body JSON: `{ "name": "A", "price": 1000, "stock": 5 }`
- `DELETE http://localhost:8080/api/products/{id}`

### Flutter

1) Install dependency:

`cd flutter_app`

`flutter pub get`

2) Run:

`flutter run`

Catatan base URL:

- Android emulator biasanya perlu `http://10.0.2.2:8080` (bukan `localhost`).
- Device fisik perlu IP PC kamu (mis. `http://192.168.1.10:8080`).
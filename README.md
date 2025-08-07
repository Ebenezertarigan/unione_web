# 🌐 Unione

**Unione** adalah aplikasi media lowongan pekerjan yang dirancang untuk:

- Membagikan profil pengguna 👤
- Melamar dan membuat pekerjaan
- Menyalurkan referensi pekerjaan atau pembelajaran 🔗  
- Menyediakan forum diskusi 💬  
- Memberikan ruang untuk berbagi keterampilan dan pengalaman 🛠️  
- Mendorong kolaborasi dan perluasan relasi melalui komunitas 🤝  

Aplikasi ini membantu pengguna untuk berinteraksi dan berkolaborasi, serta memperluas jaringan mereka dengan bergabung bersama komunitas.

---

## ✨ Fitur Utama

- Sistem autentikasi pengguna (register & login)
- Profil pengguna dengan portofolio
- Forum komunitas & diskusi topik
- Posting dan komentar
- Sistem komunitas: buat, gabung, keluar
- 
🚧 **Beberapa fitur saat ini masih dalam tahap pengembangan (Under Maintenance)**  
---

## 🛠️ Instalasi dan Setup

Ikuti langkah-langkah berikut untuk menjalankan proyek ini secara lokal:

### 1. Clone Repository

Buka terminal dan jalankan perintah berikut:

```bash
git clone https://github.com/Ebenezertarigan/unioneWeb.git
```
2. Masuk ke Folder Proyek
```Copy
cd unioneWeb
```
3. Install Dependency PHP menggunakan Composer
Pastikan Composer telah terinstal. Jalankan perintah:

```Copy
composer install
```
4. Kemudian copy file .env.example ke .env atau ganti nama filenya dari .env.example menjadi .env
Cara untuk copy filenya jalankan perintah:
```Copy
cp .env.example .env
```
5. Kemudian generate key
Jangan lupa untuk generate key dengan cara jalankan perintah ini :
```
php artisan key:generate
```
6. Migrate database
Kemudian migrate database dengan cara :
```
php artisan migrate
```
> <span style="color:red">⚠️ Jangan lupa untuk membuat databasenya terlebih dahulu!</span>

7. Jalankan web tersebut di perangkat lokal anda
untuk menjalankannya diperangkat lokal anda cukup jalankan perintah ini
```
php artisan serve
```
📌 Catatan
Aplikasi ini masih dalam tahap pengembangan aktif.
Dokumentasi dan fitur akan diperbarui secara bertahap.

📄 Lisensi
Proyek ini bersifat open-source 

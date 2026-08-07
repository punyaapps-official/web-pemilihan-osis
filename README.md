# Aplikasi Pemilihan Ketua OSIS

Aplikasi web untuk pemilihan Ketua OSIS berbasis PHP dan MySQL. Peserta (siswa) dapat login dan memilih kandidat, sementara admin dapat mengelola data kandidat, data pemilih, dan melihat hasil rekap suara secara real-time.

## Tech Stack

- **Backend:** PHP (native, mysqli)
- **Database:** MySQL
- **Frontend:** HTML, CSS, JavaScript, jQuery, Chart.js

## Fitur

- Login peserta & pemilihan kandidat
- Login admin
- Manajemen data kandidat (tambah, ubah, import Excel)
- Manajemen data pemilih & data kelas (tambah, ubah, import/export Excel)
- Rekap hasil suara & laporan (per kelas, kehadiran)
- Backup & restore database

## Instalasi & Setup Lokal

### Kebutuhan
- [XAMPP](https://www.apachefriends.org/) (Apache + PHP + MySQL)

### Langkah-langkah

1. Clone repository ini ke dalam folder `htdocs` milik XAMPP:
   ```
   git clone <URL_REPO_INI>
   ```
2. Salin `config.example.php` menjadi `config.php`, lalu sesuaikan kredensial database jika perlu.
3. Jalankan XAMPP, aktifkan **Apache** dan **MySQL**.
4. Buka browser ke:
   ```
   localhost/web-pemilihan-osis/admin/tombol_buat_db/index.php
   ```
   Masukkan password `OSIS-muhibuddin` untuk generate database `db_pilosis` beserta tabel-tabelnya secara otomatis.
5. Login sebagai admin di:
   ```
   localhost/web-pemilihan-osis/admin/login.php
   ```
   Username: `admin` — Password: `admin`
6. Halaman peserta dapat diakses di:
   ```
   localhost/web-pemilihan-osis/
   ```

## Struktur Database

| Tabel | Keterangan |
|---|---|
| `tb_admin` | Data akun admin |
| `tb_identitassekolah` | Identitas sekolah (nama, logo, dsb) |
| `tb_kandidat` | Data kandidat ketua OSIS |
| `tb_kelas` | Data kelas |
| `tb_pemilih` | Data pemilih (siswa) |
| `tb_pilih` | Data hasil pemilihan (relasi pemilih–kandidat) |
| `cek_login` | Pencatat sesi login |

## Struktur Folder

```
web-pemilihan-osis/
├── admin/              # Halaman & proses backend admin
├── css/                 # Stylesheet
├── js/                   # Script JS & library (jQuery, Chart.js)
├── image/                # Aset gambar & foto kandidat
├── template/             # Template Excel untuk import data
├── config.php            # Koneksi database (jangan di-commit, lihat .gitignore)
└── index.php             # Halaman utama peserta
```

## Tim

- Frontend: Moh. Zidane H. S.
- Backend & Database: Bryan Y. P.

## Status

🚧 Dalam tahap pengembangan — testing lokal berhasil, deployment ke server sekolah sedang berjalan.

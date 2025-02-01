# Project Crud Produk

## Deskripsi Project ini

- Project ini dibuat dengan framework codeigniter 4 dan menggunakan bootstrap. Karena PHP yang digunakan adalah PHP 8.2 sehingga tidak memungkin menggunakan codeigniter 3
- Project ini memiliki fitur CRUD pada halaman produk lengkap dengan pagination dan filter.
- Database yang digunakan adalah MySQL

## Fitur Project ini

- CRUD pada halaman produk

## Menjalankan Project ini

- Untuk menjalankan project ini, silahkan download project ini
- Masuk ke folder project tersebut
- import database yang sudah disediakan, di folder `database/`
- Edit file `env` menjadi file `.env` yang sudah disediakan
- Kemudian Hilangkan komentar pada file `.env` dan edit sesuai dengan kebutuhan
  ![Edit File .env](https://pbs.twimg.com/media/GiuO_9ya0AEWHFL?format=png&name=small)
- Lalu, silahkan jalankan perintah berikut di terminal

```
php spark serve
```

## Penjelasan Folder Project ini

- Untuk Mengatur route, silahkan masuk ke folder `app/Config/Routes.php`
- Untuk Mengatur controller, silahkan masuk ke `folder app/Controllers/`
- Untuk Mengatur model, silahkan masuk ke folder `app/Models/`
- Untuk Mengatur view, silahkan masuk ke folder `app/Views/`
- Untuk Mengatur database, silahkan isi file `.env` pada contoh environment yang sudah disediakan
- Untuk Mengatur folder public, silahkan masuk ke folder `public/`, dan isi folder tersebut dengan folder assets yang sudah disediakan

## Cara Penggunaan Project ini

- Dashboard berada pada halaman `/dashboard`
  ![Dashboard](https://pbs.twimg.com/media/GiuNgGObQAAXwuN?format=jpg&name=large)
- Untuk mengakses halaman produk, silahkan klik menu produk pada halaman dashboard
  ![Produk](https://pbs.twimg.com/media/GiuNiuPawAECJkj?format=jpg&name=large)
- Untuk menambahkan produk, silahkan klik tombol tambah pada halaman produk
  ![Tambah Produk](https://pbs.twimg.com/media/GiuNlLlbcAAgPjH?format=jpg&name=large)
- Untuk mengedit produk, silahkan klik tombol edit pada halaman produk
  ![Edit Produk](https://pbs.twimg.com/media/GiuNn-MbIAAGuyP?format=jpg&name=large)
- Untuk menghapus produk, silahkan klik tombol hapus pada halaman produk
  ![Hapus Produk](https://pbs.twimg.com/media/GiuNr9gbIAAlzbm?format=jpg&name=large)

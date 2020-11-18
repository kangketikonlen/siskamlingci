# Sistem Penerimaan Mahasiswa Baru
Sistem untuk membantu administrasi akademik kampus. 

# Memulai Program
Pada instruksi di bawah ini, anda akan mendapatkan salinan program dan menjalankan aplikasi pada server development lokal untuk berbagai kebutuhan.

### Kebutuhan Sistem
1. Apache 2
2. PHP versi 7.x
3. Mariadb versi 10.x
4. Chrome versi 80.x

### Pemasangan Program
1. Buka *terminal* atau *command prompt* kemudian ubah direktori ke folder root `localhost` misal `cd /var/www/html`.
2. Ketikkan `git clone https://github.com/fathtech/siakad.git`.
3. Pada tahap ini, anda sudah memiliki salinan aplikasi sistem ini.
4. Buatlah sebuah folder bernama `development` pada direktori `application/config/`.
5. Buka folder `application/config/production/` kemudian copy isi file tersebut ke dalam `application/config/development`.
6. Edit file `application/config/development/config.php` kemudian ubah baris `$config['base_url'] = 'https://'.$_SERVER['HTTP_HOST'].'/';` menjadi `$config['base_url'] = 'http://'.$_SERVER['HTTP_HOST'].'/siakad/';`.
7. Edit file `application/config/development/database.php` kemudian ubah hostname, username, password dan database sesuaikan dengan lingkungan database anda.

# Di Bangun Menggunakan
* [Codeigniter versi 3.1.11](https://codeigniter.com/) - Sebagai Framework PHP.
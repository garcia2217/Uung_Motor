UungMotor

Kelompok 14:

Kent Dylan Sanjaya 535220063
Figo Vincenzo 535220087
Emmanuel Garcia Sumargo 535220103
Topik Apps: Website Toko Motor Bekas

Pembagian Tugas:
Product Owner (Pemilik Produk)
Peran product owner ini menjadi sosok penting dari berjalannya sebuah proyek. 
Mereka akan bertanggung jawab sebagai pemilik produk dengan visi khusus. 
Tugas utamanya adalah sebagai stakeholder atau pemegang saham. Selain itu, 
product owner juga akan menjelaskan Product Backlog kepada Development 
Team. Peran ini adalah peran dari UUNG (Anggota Kelompok Kent).
2. Master Scrum
Singkatnya, master scrum ini adalah “mandor” dari pelaksanaan metode scrub. 
Sebab, seorang master scrum pasti akan memastikan bagaimana prosedur dapat 
diikuti, memberikan arahan sesuai dengan metodenya, memastikan hal-hal 
berjalan lancar, hingga mengatasi hambatan dalam proyeknya. Peran ini dipegang 
oleh Emmanuel.
3. Development Team
Dalam development team akan memegang peran terakhir dari kinerja metode 
scrum. Peran ini dilakukan oleh Figo

step installation:
1. clone project ini ke ke dalam folder yang anda inginkan (git clone https://github.com/garcia2217/Uung_Motor.git), link bisa di dapat dengan memencet tombol Code dengan warna hijau lalu copy link HTTPS
2. setelah mengclone project, setup database pada file .env.example anda
```bash
DB_CONNECTION=UungMotor
DB_HOST=127.0.0.1 (sesuaikan dengan localhost anda)
DB_PORT=5432 (sesuaikan dengan port anda)
DB_DATABASE=UungMotor (anda dapat menggunakan nama database lain tidak harus UungMotor, namun pastikan file UungMotor.sql yang anda restore ada pada database tersebut.
DB_USERNAME=postgres (sesuaikan dengan username anda)
DB_PASSWORD=postgre (sesuaikan dengan password anda)
```
4. setelah melakukan setup pada file .env.example, copy file tersebut dan paste dengan nama baru yaitu '.env'
5. buka terminal anda (CTRL + Shift + `) dan tulis command berikut pada terminal anda
``` bash
- composer install
- php artisan storage:link
- php artisan key:generate
- php artisan jwt:secret
```
5. buka administrator database anda, pada contoh ini saya menggunakan PostgreSQL
- buat database baru, klik kanan pada Databases
![Screenshot (972)](https://github.com/garcia2217/Uung_Motor/assets/118705093/35330e54-fb2b-4731-b73e-b6a26f910f5a)
- masukkan nama database, pastikan sesuai dengan yang anda setup pada .env
![Screenshot (973)](https://github.com/garcia2217/Uung_Motor/assets/118705093/deb42803-fac2-454f-8c4c-dd8b116ceff2)
- klik kanan pada database yang baru saja dibuat, lalu pilih restore
![Screenshot (974)](https://github.com/garcia2217/Uung_Motor/assets/118705093/99bbdf0a-968b-4b94-a98d-5dcd55922718)
- lalu import file UungMotor.sql
![Screenshot (975)](https://github.com/garcia2217/Uung_Motor/assets/118705093/e80e70b5-d16d-4140-8f4b-7bb2d11c47d2)
6. setup selesai anda bisa run aplikasi dengan menulis command "php artisan serve" pada terminal
7. akun admin:
``` bash
email: admin@gmail.com
password: admin
```
8. akun user yang sudah ada:
``` bash
email: garcia@gmail.com
password: kucing
```

# Janji
Saya Syahraini Revita Puri dengan NIM 2301895 berjanji mengerjakan TP9 DPBO dengan keberkahan-Nya, maka saya tidak akan melakukan kecurangan sesuai yang telah di spesifikasikan, Aamiin

# Desain Program


**1. Database:**

**a. Tabel products:**: 
- id (int, PRIMARY KEY),
- name (varchar),
- descripton (text),
- price (decimal(10,2)),
- created_at (timestamp)

**b. Tabel bakers:**: 
- id (int, PRIMARY KEY),
- name (varchar),
- specialty (varchar),
- join_date (date),
- contact (varchar),
- created_at (timestamp)

**c. Tabel orders:**: 
- id (int, PRIMARY KEY),
- product_id (int, FOREIGN KEY ke tabel products),
- baker_id (int, FOREIGN KEY ke tabel bakers),
- quantity (int),
- order_date (datetime),
- status (varchar),
- created_at (timestamp)

**2. MVVM:**

**model:** tempat menyimpan model object dari masing masing table 

**view:** tempat menyimpan elemen html yang hanya tinggal di-render webpage 

**viewmodel:** tempat menyimpan logika presentasi sebelum di-render ke view

![image](https://github.com/user-attachments/assets/d2d90b83-60c6-4dea-a239-5b7a79753515)

# Alur Program

Request → Routing → Data dari ViewModel → Data Binding → View Render → Response, dengan proses CRUD yang loop kembali jika ada form submission

# Dokumentasi

🎥 [Screenrecord disini kang](https://drive.google.com/file/d/1AepFe93zo2tVph-Bj2JAK3bF_hUqfx9i/view?usp=sharing)

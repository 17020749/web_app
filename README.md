# Ứng dụng sáng kiến a Toàn

### Yêu cầu môi trường
- PHP >= 8.0
- BCMath PHP Extension
- Ctype PHP Extension
- cURL PHP Extension
- DOM PHP Extension
- Fileinfo PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PCRE PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

- Nginx / Apache
- DB admin: mysql 5.7+ / MariaDB 10.3+
- DB data 1,2, report: SQL Server 2017+
- DB data 3: Oracle
- DB cache: redis
- Queue job: redis

### Hướng dẫn chạy

1. Clone code về

    ```shell
      git clone https://github.com/strongnguyen29/atoan-app.git
    ```
2. Install các thư viện php

    ```shell
    composer install
    ```

3. Cấu hình biến môi trường .env
    
    ```shell
    cp .env.example .env
   
    # Tạo key mã hóa
    php artisan key:generate
    ```
    
    Điền các thông số kết nối DB mysql, sql server, redis...

4. Chạy migrate DB user

    ```shell
    # Tạo các bảng
    php artisan migrate
   
    # Tạo dữ liệu user root
    php artisan db:seed
    ```
5. Chạy cài đặt thư viện javascript cho giao diệ
    
    ```shell
    npm install
   
    npm run dev 
```

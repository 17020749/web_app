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

1. Install các thư viện php

    ```shell
    composer install
    ```

2. Cấu hình biến môi trường .env
    
    ```shell
    cp .env.example .env
   
    # Tạo key mã hóa
    php artisan key:generate
    ```
    
    Điền các thông số kết nối DB mysql, sql server, redis...

3. Chạy migrate DB user

    ```shell
    # Tạo các bảng
    php artisan migrate
   
    # Tạo dữ liệu user root
    php artisan db:seed
    ```
4. Chạy cài đặt thư viện javascript cho giao diệ
    
    ```shell
    npm install
   
    npm run dev 
    ```

### Cài đặt php driver trên window
1. Download drive: 
    ```url
   https://windows.php.net/downloads/pecl/releases/oci8/3.2.1/php_oci8-3.2.1-8.1-ts-vs16-x64.zip
   ```
   - Giải nén, copy file .dll vào thư mục /ext trong folder cài php
   - Sửa file php.ini, bật drive phù hợp với version DB
   
   ```ini
    ;extension=oci8_11g
    ;extension=oci8_12c  ; Use with Oracle Database 12c Instant Client
    extension=oci8_19  ; Use with Oracle Database 19 Instant Client
    ```
2. Cài đặt Oracle Instant Client for Microsoft Windows

    ```url
   https://download.oracle.com/otn_software/nt/instantclient/1918000/instantclient-basic-windows.x64-19.18.0.0.0dbru.zip
    ```
   - Giải nén thành thư mục: `C:\instantclient_19_18`
   - Thêm `C:\instantclient_19_18` vào biến môi trường PATH của window để chạy oracle driver.

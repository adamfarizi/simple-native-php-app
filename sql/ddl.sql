-- Active: 1717404743217@@127.0.0.1@3306@simple-native-php-app
-- Hapus tabel kalau ada
DROP TABLE IF EXISTS products;
DROP TABLE IF EXISTS users;

-- Buat tabel users
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255),
    role ENUM('admin', 'user') DEFAULT 'user'
);

-- Masukkan user admin (password = admin123)
INSERT INTO users (username, password, role)
VALUES ('admin', '$2y$10$w3gojU/23cYb3rV0zHkm.eSWCJfTg67SaFKatajqtu3zH.ZuX9CHG', 'admin');
-- Note: Ganti hash di atas dengan hasil dari password_hash('admin123', PASSWORD_DEFAULT)

-- Buat tabel produk
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    price DECIMAL(10, 2),
    stock INT
);

CREATE DATABASE IF NOT EXISTS db_mrs_garing;
USE db_mrs_garing;

CREATE TABLE produk (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100),
  harga INT,
  stok INT,
  foto VARCHAR(100)
);

CREATE TABLE admin (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50),
  password VARCHAR(100)
);

INSERT INTO admin (username, password) VALUES ('admin', 'admin123');
INSERT INTO produk (nama, harga, stok) VALUES ('Garing Original', 15000, 100);
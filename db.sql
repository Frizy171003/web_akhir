-- Active: 1697640005246@@127.0.0.1@3306@web_uas
CREATE DATABASE IF NOT EXISTS web_uas;

USE web_uas;

CREATE TABLE pesan (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  no_hp VARCHAR(50) NOT NULL,
  menu VARCHAR(50) NOT NULL,
  pesan VARCHAR(100) NOT NULL,
  tanggal DATE NULL,
  submit VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(50) NOT NULL UNIQUE,
  role ENUM('pelanggan', 'admin') NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Contoh data awal
INSERT INTO users (username, password, email, role) 
VALUES 
('admin', 'admin123', 'admin@example.com', 'admin'), 
('pelanggan', 'pelanggan123', 'pelanggan@example.com', 'pelanggan');



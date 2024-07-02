-- Active: 1715206504621@@127.0.0.1@3306@online_cat


DROP DATABASE IF EXISTS online_cat;
CREATE DATABASE online_cat;
USE online_cat;

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    registration_number VARCHAR(20) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    school VARCHAR(100) NOT NULL,
    year_of_study INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


DROP TABLE IF EXISTS admins;
CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
     email VARCHAR(255)  NOT NULL
);






-- mysqldump -u root -p online_cat > online_cat_dump.sql
SELECT * FROM online_cat.question;

CREATE DATABASE db_19 CHARACTER SET utf8 COLLATE utf8_genaral_ci;
USE db_19;
CREATE TABLE students (
id INT(11) PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(255) NOT NULL,
age INT(11) DEFAULT NULL ,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)
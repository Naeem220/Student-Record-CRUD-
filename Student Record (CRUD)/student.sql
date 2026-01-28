CREATE DATABASE student_crud;
USE student_crud;

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    phone VARCHAR(20),
    image VARCHAR(255)
);

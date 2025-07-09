-- Create database if it doesn't exist
CREATE DATABASE IF NOT EXISTS uascloud;

-- Use the database
USE uascloud;

-- Create table if it doesn't exist
CREATE TABLE IF NOT EXISTS mahasiswa (
    nim VARCHAR(20) PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);
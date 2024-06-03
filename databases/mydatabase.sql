-- Create the userdb database
CREATE DATABASE IF NOT EXISTS userdb;

-- Switch to the userdb database
USE userdb;

-- Create the 'user' table
CREATE TABLE IF NOT EXISTS 'user' (
    'username' VARCHAR(50) PRIMARY KEY,
    'email' VARCHAR(100) UNIQUE,
    'password' VARCHAR(100)
);

-- Create the 'personal_info' table
CREATE TABLE IF NOT EXISTS `personal_info` (
    'username' VARCHAR(50),
    'fname' VARCHAR(50),
    'lname' VARCHAR(50),
    'email' VARCHAR(100),
    'phone_number' VARCHAR(20),
    'country' VARCHAR(50),
    'city' VARCHAR(50),
    FOREIGN KEY ('username') REFERENCES 'user'('username')
);

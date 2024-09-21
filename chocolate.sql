-- Create the database
CREATE DATABASE IF NOT EXISTS chocolate;

-- Use the database
USE chocolate;

-- Create the "chocolateStore" table
CREATE TABLE IF NOT EXISTS chocolateStore (
    id INT AUTO_INCREMENT PRIMARY KEY,
    chocolateImage VARCHAR(255) NOT NULL,
    chocolateName VARCHAR(100) NOT NULL,
    chocolatePrice DECIMAL(10, 2) NOT NULL
);

-- Insert sample data into the "chocolateStore" table
INSERT INTO chocolateStore (chocolateImage, chocolateName, chocolatePrice) VALUES
('chocolate5.jpg', 'Chocolate Bar 5', 4.29);

-- Create the "Role" table
CREATE TABLE IF NOT EXISTS role (
    roleID INT AUTO_INCREMENT PRIMARY KEY,
    roleName VARCHAR(50) NOT NULL
);
INSERT INTO role (roleId, roleName) VALUES
(1, 'admin'),
(2, 'user');


CREATE TABLE register (
    id INT PRIMARY KEY AUTO_INCREMENT,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(100) NOT NULL,
    phoneNumber VARCHAR(20) NOT NULL,
    password VARCHAR(100) NOT NULL,
    address VARCHAR(100) NOT NULL,
    roleId INT NOT NULL,
    FOREIGN KEY (roleId) REFERENCES role (roleId)
);

INSERT INTO register (firstName, lastName, phoneNumber, password, address, roleId)
VALUES ('Prakash', 'Ghimire', '9803494619', '210623', 'Balaju', '1');

INSERT INTO register (firstName, lastName, phoneNumber, password, address, roleId)
VALUES ('Jamuna', 'Tamang', '9823019832', '210619', 'Jorpati', '1');


CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    address TEXT NOT NULL,
    total_price DECIMAL(10, 2) NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);






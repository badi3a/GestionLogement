CREATE DATABASE gestion_logements;
USE gestion_logements;

CREATE TABLE logements (
                           id INT AUTO_INCREMENT PRIMARY KEY,
                           adresse VARCHAR(255) NOT NULL,
                           prix DECIMAL(10, 2) NOT NULL,
                           description TEXT NOT NULL,
                           date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

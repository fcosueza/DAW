-- Ejemplo de script de implementación de BBDD ('modelo.sql')
-- Creamos y empezamos a usar la BBDD

DROP DATABASE IF EXISTS examen_dwes_bbdd;
CREATE DATABASE examen_dwes_bbdd;
USE examen_dwes_bbdd;

DROP TABLE IF EXISTS smartphones;

-- Implementación en SQL del modelo de base de datos

CREATE TABLE smartphones (
  id INT AUTO_INCREMENT PRIMARY KEY,
  marca VARCHAR(255) NOT NULL,
  modelo VARCHAR(255) NOT NULL,
  memoria_ram INT NOT NULL,
  almacenamiento INT NOT NULL
);

-- Inserciones de ejemplo

INSERT INTO smartphones (marca, modelo, memoria_ram, almacenamiento) VALUES
('Samsung', 'Galaxy S21', 8, 128),
('Samsung', 'Galaxy S20', 12, 128),
('Samsung', 'Galaxy Note 20', 8, 256),
('Apple', 'iPhone 12', 4, 64),
('Apple', 'iPhone 12 Pro', 6, 128),
('Apple', 'iPhone 11', 4, 64),
('Google', 'Pixel 5', 8, 128),
('Google', 'Pixel 4a', 6, 128),
('Google', 'Pixel 4', 6, 64),
('Xiaomi', 'Mi 11', 8, 128),
('OnePlus', '8T', 12, 256),
('Huawei', 'P40 Pro', 8, 256),
('Sony', 'Xperia 1 II', 8, 256),
('LG', 'Velvet', 6, 128),
('Motorola', 'Edge', 6, 128),
('Nokia', '8.3 5G', 8, 128);

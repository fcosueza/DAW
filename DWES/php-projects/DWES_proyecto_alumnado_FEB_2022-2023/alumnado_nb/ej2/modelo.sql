-- Ejemplo de script de implementación de BBDD (por ejemplo, 'modelo.sql')
-- Creamos y empezamos a usar la BBDD

DROP DATABASE IF EXISTS examen_dwes_bbdd;
CREATE DATABASE examen_dwes_bbdd;
USE examen_dwes_bbdd;

DROP TABLE IF EXISTS peliculas;

-- Implementación en SQL del modelo de base de datos

CREATE TABLE peliculas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(255) NOT NULL,
  fecha_estreno DATE NOT NULL,
  duracion INT NOT NULL,
  genero VARCHAR(255) NOT NULL,
  director VARCHAR(255) NOT NULL
);

-- Inserciones de ejemplo

INSERT INTO peliculas (titulo, fecha_estreno, duracion, genero, director) VALUES
('El Señor de los Anillos: La Comunidad del Anillo', '2001-12-19', 178, 'Aventura', 'Peter Jackson'),
('Matrix', '1999-03-31', 136, 'Ciencia ficción', 'Larry Wachowski'),
('Forrest Gump', '1994-07-06', 142, 'Drama', 'Robert Zemeckis'),
('La lista de Schindler', '1993-12-15', 195, 'Drama', 'Steven Spielberg'),
('El Rey León', '1994-06-24', 88, 'Animación', 'Rob Minkoff');

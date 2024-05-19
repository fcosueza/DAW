DROP TABLE IF EXISTS Disponible_en ;
DROP TABLE IF EXISTS Plataformas ;
DROP TABLE IF EXISTS Peliculas ;

--
-- Estructura de las tablas
--

CREATE TABLE IF NOT EXISTS Peliculas(
    codigo int NOT NULL PRIMARY KEY auto_increment,
    titulo varchar(30) NOT NULL,
    sinopsis varchar(200) NOT NULL,
    fEstreno DATE NOT NULL
);

CREATE TABLE IF NOT EXISTS Plataformas (
    codigo int NOT NULL PRIMARY KEY auto_increment,
    nombre varchar(20) NOT NULL,
    urlLogotipo varchar(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS Disponible_en (
    codPelicula int NOT NULL,
    codPlataforma INT NOT NULL,
    fDisponibilidad DATE NOT NULL,
    FOREIGN KEY(codPelicula) REFERENCES PUBLIC.Peliculas(codigo) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY(codPlataforma) REFERENCES PUBLIC.Plataformas(codigo) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT PK_Disponible PRIMARY KEY (codPelicula, codPlataforma, fDisponibilidad)

)
CREATE DATABASE proto;
USE proto;
CREATE TABLE estados (
    idEst INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL
);

INSERT INTO estados (nombre) VALUES
('Pendiente'),
('Aprobada'),
('Rechazada');
CREATE TABLE facultades (
    idFac INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL
);

INSERT INTO facultades (nombre) VALUES
('FES Aragón'),
('FI'),
('Geo física');

CREATE TABLE solicitudes (
    idsol INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    correo VARCHAR(150) UNIQUE NOT NULL,
    fSolicitud DATE NOT NULL,
    idEst INT NOT NULL,
    idFac INT NOT NULL,
    FOREIGN KEY (idEst) REFERENCES estados(idEst),
    FOREIGN KEY (idFac) REFERENCES facultades(idFac)
);

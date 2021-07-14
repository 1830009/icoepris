DROP DATABASE IF EXISTS coepris;
CREATE DATABASE coepris;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


DROP TABLE IF EXISTS empleado;
CREATE TABLE empleado(
	id_empleado INT AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(50) NOT NULL,
    apellido_pat varchar(50) NOT NULL,
    apelldio_mat varchar(50) NOT NULL,
    rfc varchar(20) unique,
    email varchar(100) unique,
    telefono varchar(50)
);

DROP TABLE IF EXISTS login;
CREATE TABLE login(
	id_login INT AUTO_INCREMENT PRIMARY KEY,
    usuario varchar(50) NOT NULL unique,
    pass varchar(100) NOT NULL,
    tipo varchar(50) NOT NULL,
    id_empleado INT,
    FOREIGN KEY (id_empleado) REFERENCES empleado(id_empleado)
);

DROP TABLE IF EXISTS fecha_entrada;
CREATE TABLE fecha_entrada(
	id_entrada INT AUTO_INCREMENT PRIMARY KEY,
    fecha_hora timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    cantidad INT NOT NULL,
    tabla varchar(50) NOT NULL,
    id_producto INT,
    id_empleado INT,
    FOREIGN KEY(id_empleado) REFERENCES empleado(id_empleado)
);    

DROP TABLE IF EXISTS fecha_salida;
CREATE TABLE fecha_salida(
	id_salida INT AUTO_INCREMENT PRIMARY KEY,
    fecha_hora timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    cantidad INT NOT NULL,
    tabla varchar(50) NOT NULL,
    empleado varchar(100) NOT NULL,
    id_producto INT,
    id_empleado INT,
    FOREIGN KEY(id_empleado) REFERENCES empleado(id_empleado)
);    

DROP TABLE IF EXISTS proyecto_federal;
CREATE TABLE proyecto_federal(
	id_federal INT AUTO_INCREMENT PRIMARY KEY,
    codigo varchar(20) NOT NULL unique,
    nombre varchar(150) NOT NULL,
    cantidad double NOT NULL,
    unidad varchar(50),
    marca varchar(50),
    color varchar(50)
);

DROP TABLE IF EXISTS vale_entrada;
CREATE TABLE vale_entrada(
    folio VARCHAR(20) PRIMARY KEY,
    fecha  DATE NOT NULL,
    tabla VARCHAR(50) NOT NULL,
    cargo VARCHAR(255) NOT NULL,
    partida VARCHAR(255) NOT NULL,
    programa VARCHAR(255) NOT NULL,
    pedido VARCHAR(30) NOT NULL,
    proveedor VARCHAR(255) NOT NULL,
    fondo VARCHAR(255) NOT NULL,
    factura VARCHAR(20) NOT NULL,
    entrada VARCHAR(40) NOT NULL,
    solicitado VARCHAR(255) NOT NULL,
    director VARCHAR(255) NOT NULL,
    autorizado VARCHAR(255) NOT NULL,
    estado BOOLEAN NOT NULL DEFAULT 0,
);
DROP TABLE IF EXISTS in_federal;
CREATE TABLE in_federal(
	id_entrada INT AUTO_INCREMENT PRIMARY KEY,
    folio varchar(20) NOT NULL,
    id_producto INT,
    cantidad_solicitada INT NOT NULL,
    cant_surtida INT NOT NULL,
    cant_recibida INT NOT NULL,
    id_empleado INT,
    observacion VARCHAR(255) NOT NULL,
    FOREIGN KEY(id_empleado) REFERENCES empleado(id_empleado),
    FOREIGN KEY(id_producto) REFERENCES proyecto_federal(id_federal)
);

DROP TABLE IF EXISTS recurso_estado;
CREATE TABLE recurso_estado(
	id_estado INT AUTO_INCREMENT PRIMARY KEY,
    codigo varchar(20) NOT NULL unique,
    nombre varchar(150) NOT NULL,
    cantidad double NOT NULL,
    unidad varchar(50),
    marca varchar(50),
    color varchar(50)
);
DROP TABLE IF EXISTS in_estado;
CREATE TABLE in_estado(
	id_entrada INT AUTO_INCREMENT PRIMARY KEY,
    folio varchar(20) NOT NULL,
    id_producto INT,
    cantidad_solicitada INT NOT NULL,
    cant_surtida INT NOT NULL,
    cant_recibida INT NOT NULL,
    id_empleado INT,
    observacion VARCHAR(255) NOT NULL,
    FOREIGN KEY(id_empleado) REFERENCES empleado(id_empleado),
    FOREIGN KEY(id_producto) REFERENCES recurso_estado(id_estado)
);

DROP TABLE IF EXISTS papeleria;
CREATE TABLE papeleria(
	id_papeleria INT AUTO_INCREMENT PRIMARY KEY,
    codigo varchar(20) NOT NULL unique,
    nombre varchar(150) NOT NULL,
    cantidad double NOT NULL,
    unidad varchar(50),
    marca varchar(50),
    color varchar(50)
);

DROP TABLE IF EXISTS in_papeleria;
CREATE TABLE in_papeleria(
	id_entrada INT AUTO_INCREMENT PRIMARY KEY,
    folio varchar(20) NOT NULL,
    id_producto INT,
    cantidad_solicitada INT NOT NULL,
    cant_surtida INT NOT NULL,
    cant_recibida INT NOT NULL,
    id_empleado INT,
    observacion VARCHAR(255) NOT NULL,
    FOREIGN KEY(id_empleado) REFERENCES empleado(id_empleado),
    FOREIGN KEY(id_producto) REFERENCES papeleria(id_papeleria)
);

DROP TABLE IF EXISTS donacion;
CREATE TABLE donacion(
	id_donacion INT AUTO_INCREMENT PRIMARY KEY,
    codigo varchar(20) NOT NULL unique,
    cantidad double NOT NULL,
    tabla varchar(50) NOT NULL
);

DROP TABLE IF EXISTS activos;
CREATE TABLE activos(
	id_activos INT AUTO_INCREMENT PRIMARY KEY,
    n_serie varchar(50) NOT NULL unique,
    nombre varchar(100) NOT NULL,
    cantidad double NOT NULL,
    unidad varchar(50),
    marca varchar(50),
    color varchar(50),
    descripcion varchar(250)
);

DROP TABLE IF EXISTS checklist;
CREATE TABLE checklist(
	id_check INT AUTO_INCREMENT PRIMARY KEY,
    boleta varchar (35) NOT NULL,
    cotejo varchar (35) NOT NULL,
    sistema varchar (35) NOT NULL,
    archivado varchar (35) NOT NULL,
    disco varchar (35) NOT NULL,
    folio varchar (35) NOT NULL,
    relacionado varchar (35) NOT NULL
);

DROP TABLE IF EXISTS archivo;
CREATE TABLE archivo(
	id_archivo INT AUTO_INCREMENT,
    nombre varchar(100) NOT NULL,
    fecha date NOT NULL,
    tipo varchar(50) NOT NULL,
    observacion varchar(300),
    aclaracion int DEFAULT 0, 
    checklist int,
     FOREIGN KEY(checklist) REFERENCES checklist(id_check),
    PRIMARY KEY(id_archivo,aclaracion)
);

DROP TABLE IF EXISTS limpieza;
CREATE TABLE limpieza(
	id_limpieza INT AUTO_INCREMENT PRIMARY KEY,
    codigo varchar(20) NOT NULL unique,
    nombre varchar(100) NOT NULL,
    cantidad double NOT NULL,
    unidad varchar(50),
    marca varchar(50),
    material varchar(50),
    color varchar(50),
    observacion varchar(250)
);

DROP TABLE IF EXISTS in_limpieza;
CREATE TABLE in_limpieza(
	id_entrada INT AUTO_INCREMENT PRIMARY KEY,
    folio varchar(20) NOT NULL,
    id_producto INT,
    cantidad_solicitada INT NOT NULL,
    cant_surtida INT NOT NULL,
    cant_recibida INT NOT NULL,
    id_empleado INT,
    observacion VARCHAR(255) NOT NULL,
    FOREIGN KEY(id_empleado) REFERENCES empleado(id_empleado),
    FOREIGN KEY(id_producto) REFERENCES limpieza(id_limpieza)
);
DROP TABLE IF EXISTS `formato`;
CREATE TABLE `formato` (
  `id_formato` int(11) NOT NULL,
  `logo_header` varchar(200) NOT NULL,
  `logo_footer` varchar(200) NOT NULL,
  `color` varchar(20) NOT NULL,
  `autorizo` varchar(200) NOT NULL,
  `vobo` varchar(200) NOT NULL
);
INSERT INTO `formato` (`id_formato`, `logo_header`, `logo_footer`, `color`, `autorizo`, `vobo`) VALUES
(0, 'img/logo.jpg', 'img/coepris.png', '208,70,11', 'Lic. Pedro Price', 'Lic. Netinho');








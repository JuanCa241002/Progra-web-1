CREATE DATABASE db_mueblesinti;
USE db_mueblesinti;

CREATE TABLE Permisos (
    id BIGINT PRIMARY KEY AUTO_INCREMENT
);

CREATE TABLE Proveedor (
    id BIGINT PRIMARY KEY AUTO_INCREMENT
);

CREATE TABLE Busqueda (
    id BIGINT PRIMARY KEY AUTO_INCREMENT
);

CREATE TABLE Productos (
    id BIGINT PRIMARY KEY AUTO_INCREMENT
);

CREATE TABLE Rol (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    idPermisos BIGINT NOT NULL,
    FOREIGN KEY (idPermisos) REFERENCES Permisos(id)
);

CREATE TABLE Usuario (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    idRol BIGINT NOT NULL,
    FOREIGN KEY (idRol) REFERENCES Rol(id)
);

CREATE TABLE Cliente (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    idUsuario BIGINT NOT NULL,
    FOREIGN KEY (idUsuario) REFERENCES Usuario(id)
);

CREATE TABLE Vendedor (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    idUsuario BIGINT NOT NULL,
    FOREIGN KEY (idUsuario) REFERENCES Usuario(id)
);

CREATE TABLE CarritoDeVentas (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    idCliente BIGINT NOT NULL,
    FOREIGN KEY (idCliente) REFERENCES Cliente(id)
);

CREATE TABLE ProcesoDePago (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    idCarritoDeVentas BIGINT NOT NULL,
    idVendedor BIGINT NOT NULL,
    FOREIGN KEY (idCarritoDeVentas) REFERENCES CarritoDeVentas(id),
    FOREIGN KEY (idVendedor) REFERENCES Vendedor(id)
);

CREATE TABLE DetalleProducto (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    idCarritoDeVentas BIGINT NOT NULL,
    idProductos BIGINT NOT NULL,
    FOREIGN KEY (idCarritoDeVentas) REFERENCES CarritoDeVentas(id),
    FOREIGN KEY (idProductos) REFERENCES Productos(id)
);

CREATE TABLE Catalogo (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    idBusqueda BIGINT NOT NULL,
    FOREIGN KEY (idBusqueda) REFERENCES Busqueda(id)
);

CREATE TABLE Reseña (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    idCatalogo BIGINT NOT NULL,
    FOREIGN KEY (idCatalogo) REFERENCES Catalogo(id)
);

CREATE TABLE Ofertas (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    idCatalogo BIGINT NOT NULL,
    FOREIGN KEY (idCatalogo) REFERENCES Catalogo(id)
);

CREATE TABLE ComprasPorMayor (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    idProveedor BIGINT NOT NULL,
    idVendedor BIGINT NOT NULL,
    FOREIGN KEY (idProveedor) REFERENCES Proveedor(id),
    FOREIGN KEY (idVendedor) REFERENCES Vendedor(id)
);

CREATE TABLE DetalleCompra (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    idProctos BIGINT NOT NULL,
    idComprasPorMayor BIGINT NOT NULL,
    FOREIGN KEY (idProctos) REFERENCES Productos(id),
    FOREIGN KEY (idComprasPorMayor) REFERENCES ComprasPorMayor(id)
);

CREATE TABLE ItemCatalogo (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    idCatalogo BIGINT NOT NULL,
    idProductos BIGINT NOT NULL,
    FOREIGN KEY (idCatalogo) REFERENCES Catalogo(id),
    FOREIGN KEY (idProductos) REFERENCES Productos(id)
);

-- Alter table Permisos
ALTER TABLE Permisos
ADD COLUMN nombre VARCHAR(50),
ADD COLUMN descripcion TEXT;

-- Alter table Proveedor
ALTER TABLE Proveedor
ADD COLUMN nombre VARCHAR(255),
ADD COLUMN contacto VARCHAR(255),
ADD COLUMN direccion VARCHAR(255),
ADD COLUMN email VARCHAR(255),
ADD COLUMN telefono VARCHAR(20);

-- Alter table Busqueda
ALTER TABLE Busqueda
ADD COLUMN FechaBusqueda DATE,
ADD COLUMN TerminoBusqueda date;

-- Alter table Productos
ALTER TABLE Productos
ADD COLUMN NombreProducto VARCHAR(255),
ADD COLUMN descripcion VARCHAR(255),
ADD COLUMN Imagen longblob,
ADD COLUMN stock INT,
ADD COLUMN precioUnitario DECIMAL(10,2);

-- Alter table Rol
ALTER TABLE Rol
ADD COLUMN nombre VARCHAR(255),
ADD COLUMN descripcion VARCHAR(255);

-- Alter table Usuario
ALTER TABLE Usuario
ADD COLUMN Nombre VARCHAR(255),
ADD COLUMN Apellido VARCHAR(255),
ADD COLUMN nombreUsuario VARCHAR(255),
ADD COLUMN contraseña VARCHAR(255),
ADD COLUMN email VARCHAR(255);

-- Alter table Vendedor
ALTER TABLE Vendedor
ADD COLUMN Area VARCHAR(255),
ADD COLUMN telefono VARCHAR(20);

-- Alter table CarritoDeVentas
ALTER TABLE CarritoDeVentas
ADD COLUMN Descripcion VARCHAR(255),
ADD COLUMN PrecioTotal DECIMAL(10,2),
ADD COLUMN PrecioUnitario DECIMAL(10,2);

-- Alter table ProcesoDePago
ALTER TABLE ProcesoDePago
ADD COLUMN EstadoDeLaTransaccion VARCHAR(255),
ADD COLUMN FechaPago DATE,
ADD COLUMN MetodoPago VARCHAR(255),
ADD COLUMN TotalPagado DECIMAL(10,2);

-- Alter table DetalleProducto
ALTER TABLE DetalleProducto
ADD COLUMN Nombre VARCHAR(255),
ADD COLUMN Precio DECIMAL(10,2),
ADD COLUMN Stock INT,
ADD COLUMN Descripcion VARCHAR(255);

-- Alter table Catalogo
ALTER TABLE Catalogo
ADD COLUMN Descripcion VARCHAR(255),
ADD COLUMN FechaCreacion DATE,
ADD COLUMN NombreCatalogo VARCHAR(255);

-- Alter table Reseña
ALTER TABLE Reseña
ADD COLUMN Calificacion DECIMAL(10,2),
ADD COLUMN Comentario VARCHAR(255),
ADD COLUMN Fecha DATE;

-- Alter table Ofertas
ALTER TABLE Ofertas
ADD COLUMN FechaInicio DATE,
ADD COLUMN FechaFinalizacion DATE,
ADD COLUMN PorcentajeDescuento INT;

-- Alter table ComprasPorMayor
ALTER TABLE ComprasPorMayor
ADD COLUMN Cantidad INT,
ADD COLUMN Fecha DATE,
ADD COLUMN proveedor BIGINT,
ADD COLUMN TotalCompra DECIMAL(10,2);

-- Alter table DetalleCompra
ALTER TABLE DetalleCompra
ADD COLUMN Cantidad INT,
ADD COLUMN PrecioUnitario DECIMAL(10,2),
ADD COLUMN Producto BIGINT,
ADD COLUMN Subtotal DECIMAL(10,2);

-- Alter table ItemCatalogo
ALTER TABLE ItemCatalogo
ADD COLUMN Descripcion VARCHAR(255),
ADD COLUMN Precio DECIMAL(10,2);
--
Insert into Permisos(Nombre,decripcion) 
values('leer','solo lectura de los datos');
--
Insert into Proveedor(Nombre,contacto,direccion,email,telefono) 
values('Andina Forestal SRL','Mauricio SRL','AndinaForestal@gmail.com',63729624);
--
Insert into Busqueda(FechaBusqueda,TerminoBusqueda)
values(06-01-2024,06-01-2024);
--
Insert into Producto(NombreProducto,descripcion,imagenes,precio)
values('Silla','silla para esteriores','google.com',500);
--
insert into Rol(nombre,descripcion)
values('administrador','lectura y escritura del empleado');
--
insert into Usuario(Nombre,Apellido,nombreUsuario,contraseña,email)
values('carlos','ramirez','calosgoku','1234abc','carlosramires@gmail.com');
--
insert into Vendedor(Area,telefono)
values('tienda',67530012);
--
insert into CarritoDeVentas(Descripcion,PrecioTotal,PrecioUnitario)
values('productos varios',500,'100,100,200,100');
--
insert into ProcesoDePago(EstadoDeLaTransaccion,FechaPago,MetodoPago,TotalPagado)
values('Finalizado', 06-01-2024,'QR', 500);
--
insert into DetalleProducto(Nombre,Precio,Stock,Descripcion)
values('silla',30, 200, 'silla de exteriores');
--
insert into Catalogo(Descripcion,FechaCreacion,Nombre)
values('sillas de diferente materiales',06-06-2023,'sillas');
--
insert into Reseña(Calificacion,Comentario,fecha)
values('5 estrellas','las silla es muy comoda',06-11-2023);
--
insert into Ofertas(FechaInicio,FechaFinalizacion,PorcentajeDescuento)
values(11-10-2023-11-01-2024-'50%');
--
insert into ComprasPorMayor(Cantidad,fecha,proveedor,TotalCompra)
values('500',11-10-2023,'Andina Forestal SRL', 500);
--
insert into DetalleCompra(Cantidad,PrecioUnitario,Producto,Subtotal)
values (20,40,'sillas','400 doll');
--
insert into ItemCatalogo(Descripcion,precio)
values ('silla',40);
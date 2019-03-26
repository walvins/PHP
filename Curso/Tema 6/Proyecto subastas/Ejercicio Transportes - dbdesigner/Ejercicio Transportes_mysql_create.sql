CREATE TABLE `Clientes` (
	`dni_cli` varchar(9) NOT NULL,
	`email` varchar(30) NOT NULL,
	`tlf` varchar(20) NOT NULL,
	`password` varchar(40) NOT NULL,
	`nombre` varchar(40) NOT NULL,
	`activo` bool NOT NULL,
	PRIMARY KEY (`dni_cli`)
);

CREATE TABLE `Transportistas` (
	`dni_transp` varchar(9) NOT NULL,
	`nombre` varchar(40) NOT NULL,
	`matricula` varchar(7) NOT NULL,
	`email` varchar(30) NOT NULL,
	`tlf` varchar(20) NOT NULL,
	`password` varchar(40) NOT NULL,
	`activo` bool NOT NULL,
	PRIMARY KEY (`dni_transp`)
);

CREATE TABLE `Vehiculos` (
	`matricula` varchar(7) NOT NULL,
	`carga_max` numeric(4) NOT NULL,
	PRIMARY KEY (`matricula`)
);

CREATE TABLE `TipoVehiculo` (
	`id_tipo` tinyint NOT NULL AUTO_INCREMENT,
	`desc` varchar(10) NOT NULL,
	PRIMARY KEY (`id_tipo`)
);

CREATE TABLE `RelacionTipos` (
	`matricula` varchar(7) NOT NULL,
	`id_tipo` tinyint NOT NULL
);

CREATE TABLE `Pedidos` (
	`id_pedido` int NOT NULL AUTO_INCREMENT,
	`cliente` varchar(9) NOT NULL,
	`fecha_recogida` DATE NOT NULL,
	`fecha_entrega` DATE NOT NULL,
	`origen` varchar(100) NOT NULL,
	`destino` varchar(100) NOT NULL,
	`descripcion` varchar(50) NOT NULL,
	`requerimientos` varchar(10) NOT NULL,
	`peso` numeric(4) NOT NULL,
	`precio_max` DECIMAL(7) NOT NULL,
	PRIMARY KEY (`id_pedido`)
);

CREATE TABLE `Pujas` (
	`id_puja` int NOT NULL AUTO_INCREMENT,
	`pedido` int NOT NULL,
	`transportista` varchar(9) NOT NULL,
	`precio` DECIMAL(7) NOT NULL,
	PRIMARY KEY (`id_puja`)
);

CREATE TABLE `Historial` (
	`id_hist` int NOT NULL AUTO_INCREMENT,
	`puja` int NOT NULL,
	`calif_cli` tinyint NOT NULL,
	`calif_transp` tinyint NOT NULL,
	PRIMARY KEY (`id_hist`)
);

CREATE TABLE `Administradores` (
	`id_admin` varchar(9) NOT NULL,
	`password` varchar(40) NOT NULL,
	PRIMARY KEY (`id_admin`)
);

ALTER TABLE `Transportistas` ADD CONSTRAINT `Transportistas_fk0` FOREIGN KEY (`matricula`) REFERENCES `Vehiculos`(`matricula`);

ALTER TABLE `RelacionTipos` ADD CONSTRAINT `RelacionTipos_fk0` FOREIGN KEY (`matricula`) REFERENCES `Vehiculos`(`matricula`);

ALTER TABLE `RelacionTipos` ADD CONSTRAINT `RelacionTipos_fk1` FOREIGN KEY (`id_tipo`) REFERENCES `TipoVehiculo`(`id_tipo`);

ALTER TABLE `Pedidos` ADD CONSTRAINT `Pedidos_fk0` FOREIGN KEY (`cliente`) REFERENCES `Clientes`(`dni_cli`);

ALTER TABLE `Pujas` ADD CONSTRAINT `Pujas_fk0` FOREIGN KEY (`pedido`) REFERENCES `Pedidos`(`id_pedido`);

ALTER TABLE `Pujas` ADD CONSTRAINT `Pujas_fk1` FOREIGN KEY (`transportista`) REFERENCES `Transportistas`(`dni_transp`);

ALTER TABLE `Historial` ADD CONSTRAINT `Historial_fk0` FOREIGN KEY (`puja`) REFERENCES `Pujas`(`id_puja`);


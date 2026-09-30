Create table libros (
	id INT auto_increment PRIMARY KEY,
	titulo varchar(150) NOT NULL,
	autor varchar(100) NOT NULL,
	anio_publicacion INT NOT NULL,
	cantidad_paginas INT NOT NULL
);
INSERT INTO libros (titulo, autor , anio_publicacion, cantidad_paginas) VALUES
('El Lapicito Verde', 'Susana Olaondo', 2006, 46),
('Don Juan el Zorro', 'Francisco Espinola', 1957, 51),
('El hombre invisible', 'Hawley Griffin Wells',1897,97);

CREATE TABLE socios (
	id INT AUTO_INCREMENT PRIMARY KEY,
	nombre VARCHAR(100) NOT NULL,
	num_socio INT NOT NULL,
	email VARCHAR(150) NOT NULL
);

CREATE TABLE prestamos (
	id INT AUTO_INCREMENT PRIMARY KEY,
	socio_id INT NOT NULL,
	libro_id INT NOT NULL,
	fecha_prestamo DATE NOT NULL,
	fecha_devolucion DATE NOT NULL,
	CONSTRAINT fk_prestamos_socio FOREIGN KEY (socio_id) REFERENCES socios(id) ON DELETE RESTRICT,
	CONSTRAINT fk_prestamos_libro FOREIGN KEY (libro_id) REFERENCES libros(id) ON DELETE RESTRICT
);

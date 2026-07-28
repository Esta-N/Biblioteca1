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

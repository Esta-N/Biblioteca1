# Roadmap de tareas exactas para los próximos 2 meses

## Objetivo
Cerrar la base del sistema, dejar la arquitectura MVC estable, implementar login funcional, socios, préstamos, y modernizar la interfaz visual del proyecto.

---

## Fase 1: Preparación y base del sistema

### Semana 1

#### Tarea 1.1: Revisar la arquitectura actual
- [ ] Revisar [index.php](index.php)
- [ ] Revisar [controllers/LibroController.php](controllers/LibroController.php)
- [ ] Revisar [models/Libro.php](models/Libro.php)
- [ ] Revisar [views/libros/form.php](views/libros/form.php)
- [ ] Revisar [views/libros/listado.php](views/libros/listado.php)
- [ ] Confirmar que todas las rutas apuntan al flujo correcto

#### Tarea 1.2: Corregir flujo principal MVC
- [ ] Dejar [index.php](index.php) como punto único de entrada
- [ ] Arreglar `require` de controlador y vistas
- [ ] Ajustar casos del `switch` (`listar`, `crear`, `editar`, `eliminar`, etc.)
- [ ] Validar que cada acción del formulario coincida con la acción del `index`

#### Tarea 1.3: Validar conexión a base de datos
- [ ] Revisar [conexion.php](conexion.php)
- [ ] Corregir `PDOException`
- [ ] Verificar conexión con la base `biblioteca`
- [ ] Confirmar credenciales y host correctos

#### Tarea 1.4: Revisión de la estructura de tablas
- [ ] Revisar `libros.SQL`
- [ ] Confirmar columnas reales: `id`, `titulo`, `autor`, `anio_publicacion`, `cantidad_paginas`
- [ ] Confirmar que no haya nombres inconsistentes de columnas

#### Tarea 1.5: Testing base
- [ ] Ejecutar validación de sintaxis en PHP
- [ ] Confirmar que no haya errores en los archivos del flujo principal

---

### Semana 2

#### Tarea 2.1: Implementar sistema login básico
- [ ] Crear tabla `usuarios`
- [ ] Definir columnas: `id`, `usuario`, `password`, `rol` (opcional)
- [ ] Crear modelo `Usuario`
- [ ] Crear controlador `AuthController`
- [ ] Crear vista `login.php`
- [ ] Implementar formulario de login
- [ ] Validar usuario y contraseña
- [ ] Guardar sesión con `$_SESSION`

#### Tarea 2.2: Protecciones por sesión
- [ ] Crear comprobación de autenticación
- [ ] Redirigir a login si no hay sesión activa
- [ ] Crear botón de logout
- [ ] Verificar que rutas privadas no se puedan abrir sin login

#### Tarea 2.3: Panel principal del sistema
- [ ] Crear pantalla principal luego del login
- [ ] Agregar menú de navegación
- [ ] Incluir acceso a libros, socios, préstamos e informes

#### Tarea 2.4: Testing del login
- [ ] Probar login con credenciales válidas
- [ ] Probar login con credenciales inválidas
- [ ] Probar logout
- [ ] Probar acceso a rutas protegidas sin sesión

---

## Fase 2: CRUD de libros y diseño visual base

### Semana 3

#### Tarea 3.1: Revisar funcionalidad de libros
- [ ] Revisar [models/Libro.php](models/Libro.php)
- [ ] Revisar [controllers/LibroController.php](controllers/LibroController.php)
- [ ] Revisar [views/libros/form.php](views/libros/form.php)
- [ ] Revisar [views/libros/listado.php](views/libros/listado.php)

#### Tarea 3.2: Corregir CRUD completo de libros
- [ ] `listarLibros()` debe cargar todos los libros
- [ ] `crearLibro()` debe validar todos los campos
- [ ] `formEditarLibro()` debe cargar un libro por id
- [ ] `editar()` debe actualizar el libro correcto
- [ ] `eliminarLibro()` debe borrar por id
- [ ] Redirigir siempre a `index.php?accion=listar`

#### Tarea 3.3: Mejorar validaciones
- [ ] Validar `titulo` no vacío
- [ ] Validar `autor` no vacío
- [ ] Validar `anio_publicacion` numérico
- [ ] Validar `cantidad_paginas` numérico y mayor a cero
- [ ] Mostrar errores amigables al usuario

#### Tarea 3.4: Mejorar diseño del módulo libros
- [ ] Cambiar estilo general de la tabla
- [ ] Mejorar botones de editar / eliminar / nuevo
- [ ] Mejorar formulario visual
- [ ] Añadir espaciado y títulos consistentes

---

### Semana 4

#### Tarea 4.1: Rediseño visual base del sistema
- [ ] Revisar [views/header.php](views/header.php)
- [ ] Revisar [views/footer.php](views/footer.php)
- [ ] Crear estilo consistente para todas las páginas
- [ ] Mejorar nav, botones, tablas y formularios
- [ ] Aplicar colores y tipografía coherentes

#### Tarea 4.2: Mejorar navegación
- [ ] Agregar menú con links a: inicio, libros, socios, préstamos
- [ ] Mostrar nombre del usuario autenticado
- [ ] Crear botón de logout
- [ ] Arreglar accesos rápidos entre pantallas

#### Tarea 4.3: Testing del módulo libros
- [ ] Probar crear libro válido
- [ ] Probar crear libro vacío
- [ ] Probar editar libro
- [ ] Probar eliminar libro
- [ ] Verificar redirección al listado

---

## Fase 3: Módulo de socios

### Semana 5

#### Tarea 5.1: Crear modelo de socios
- [ ] Crear archivo `models/Socio.php`
- [ ] Definir propiedades: `id`, `nombre`, `apellido`, `email`, etc.
- [ ] Crear métodos: `listar`, `crear`, `editar`, `eliminar`, `buscarPorId`

#### Tarea 5.2: Crear controlador de socios
- [ ] Crear archivo `controllers/SocioController.php`
- [ ] Implementar `listarSocios()`
- [ ] Implementar `crearSocio()`
- [ ] Implementar `editarSocio()`
- [ ] Implementar `eliminarSocio()`
- [ ] Implementar `formSocio()` y `formEditarSocio()`

#### Tarea 5.3: Crear vistas de socios
- [ ] Crear carpeta `views/socios/`
- [ ] Crear `listado.php`
- [ ] Crear `form.php`
- [ ] Incluir header y footer

#### Tarea 5.4: Preparar base de datos
- [ ] Revisar si existe tabla de socios
- [ ] Crear tabla si hace falta
- [ ] Confirmar estructura de columnas

---

### Semana 6

#### Tarea 6.1: Integración de socios
- [ ] Conectar las vistas con el controlador
- [ ] Agregar enlaces en la navegación principal
- [ ] Crear botón “Nuevo socio”
- [ ] Probar alta/edición/baja

#### Tarea 6.2: Validaciones de socios
- [ ] Nombre requerido
- [ ] Apellido requerido
- [ ] Email válido
- [ ] Mostrar mensajes de error

#### Tarea 6.3: Testing del módulo socios
- [ ] Probar crear socio
- [ ] Probar listar socios
- [ ] Probar editar socio
- [ ] Probar eliminar socio
- [ ] Verificar validaciones

---

## Fase 4: Módulo de préstamos

### Semana 7

#### Tarea 7.1: Crear modelo de préstamos
- [ ] Crear archivo `models/Prestamo.php`
- [ ] Definir propiedades: `id`, `id_libro`, `id_socio`, `fecha_prestamo`, `fecha_devolucion`, `estado`
- [ ] Crear métodos básicos

#### Tarea 7.2: Crear controlador de préstamos
- [ ] Crear `controllers/PrestamoController.php`
- [ ] Implementar `listarPrestamos()`
- [ ] Implementar `crearPrestamo()`
- [ ] Implementar `devolverPrestamo()`
- [ ] Validar si el libro está disponible

#### Tarea 7.3: Preparar base de datos
- [ ] Crear tabla `prestamos` si no existe
- [ ] Definir relación con libros y socios
- [ ] Validar estado y fechas

---

### Semana 8

#### Tarea 8.1: Crear vistas de préstamos
- [ ] Crear `views/prestamos/viewPrestamos.php` o estructura nueva
- [ ] Crear formulario de préstamo
- [ ] Crear listado de préstamos
- [ ] Crear vista de devoluciones

#### Tarea 8.2: Integrar lógica real
- [ ] Mostrar libro seleccionado
- [ ] Mostrar socio seleccionado
- [ ] Validar que libro no esté ya prestado
- [ ] Registrar fecha de préstamo
- [ ] Registrar fecha de devolución

#### Tarea 8.3: Testing del módulo préstamos
- [ ] Prestar libro a socio válido
- [ ] Probar préstamo de libro ya prestado
- [ ] Probar devolución correcta
- [ ] Verificar historial de préstamos

---

## Fase 5: Overhaul visual y experiencia final

### Semana 9

#### Tarea 9.1: Rediseño global
- [ ] Revisar estilos actuales en `style.css`
- [ ] Mejorar paleta de colores
- [ ] Definir fuente y tamaños
- [ ] Ajustar layout principal

#### Tarea 9.2: Formularios mejorados
- [ ] Estilizar inputs
- [ ] Mejorar botones
- [ ] Mejorar alertas
- [ ] Mejorar tablas
- [ ] Mejorar labels y espacios

#### Tarea 9.3: Mejorar navegación
- [ ] Sidebar o navbar moderno
- [ ] Mejorar accesibilidad visual
- [ ] Espacio entre secciones

---

### Semana 10

#### Tarea 10.1: Mejorar vistas de listados
- [ ] Tabla con mejor contraste
- [ ] Mejor separación visual
- [ ] Paginado si es necesario
- [ ] Mensajes vacíos claros

#### Tarea 10.2: Mejorar dashboard general
- [ ] Añadir tarjetas resumen
- [ ] Mostrar cantidad de libros
- [ ] Mostrar cantidad de socios
- [ ] Mostrar préstamos activos

#### Tarea 10.3: Testing visual
- [ ] Revisar diseño en escritorio
- [ ] Revisar diseño en móvil
- [ ] Revisar legibilidad de textos
- [ ] Validar que todos los botones funcionen

---

## Fase 6: QA final y estabilidad

### Semana 11

#### Tarea 11.1: Validar flujo completo del sistema
- [ ] Login válido
- [ ] Login inválido
- [ ] Listado de libros
- [ ] Nuevo libro
- [ ] Editar libro
- [ ] Eliminar libro
- [ ] Nuevo socio
- [ ] Editar socio
- [ ] Eliminar socio
- [ ] Nuevo préstamo
- [ ] Devolución

#### Tarea 11.2: Validar seguridad básica
- [ ] Evitar acceso sin login
- [ ] Filtrar entradas de usuario
- [ ] Escapar HTML en vistas
- [ ] Evitar mostrar errores de SQL al usuario

---

### Semana 12

#### Tarea 12.1: Corrección final
- [ ] Arreglar bugs encontrados durante QA
- [ ] Revisar rutas rotas
- [ ] Corregir errores visuales
- [ ] Corregir validaciones faltantes

#### Tarea 12.2: Documentación final
- [ ] Actualizar README o documentación interna
- [ ] Explicar flujo MVC del sistema
- [ ] Dejar notas de uso para el equipo

#### Tarea 12.3: Entrega final
- [ ] Validar que todos los módulos funcionan
- [ ] Hacer prueba final del sistema completo
- [ ] Dejar proyecto ordenado y documentado

---

## Criterios de aceptación globales

- [ ] Login funcional con sesión
- [ ] CRUD de libros funcionando
- [ ] CRUD de socios funcionando
- [ ] Módulo de préstamos funcionando
- [ ] Diseño visual modernizado
- [ ] MVC consistente y unificado
- [ ] Sin errores de sintaxis PHP
- [ ] App usable sin fallos principales

---

## Prioridad recomendada
1. Login + protección de rutas
2. CRUD libros
3. CRUD socios
4. CRUD préstamos
5. Rediseño visual
6. QA final

---

## Resumen ejecutivo
Si ejecutamos este roadmap en orden, en 2 meses el sistema quedará con una base sólida, funcionalidades reales de biblioteca y una interfaz mucho más profesional.

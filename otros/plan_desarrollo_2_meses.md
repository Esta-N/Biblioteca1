# Plan de desarrollo para los próximos 2 meses

## 1. Objetivo general
Construir una biblioteca web completa, funcional y visualmente moderna, con una arquitectura MVC sólida, autenticación de usuarios, gestión de libros, socios, préstamos y una interfaz clara y responsiva.

---

## 2. Alcance principal

### Módulos a desarrollar
- Login funcional y seguro
- Panel principal de la biblioteca
- Gestión de libros
- Gestión de socios
- Gestión de préstamos
- Mejoras visuales generales
- Corrección de arquitectura MVC
- Base de datos consistente y validada
- Protección de rutas por sesión

---

## 3. Metas del proyecto

### Meta 1: Arquitectura estable y limpia
- Mantener MVC consistente para cada módulo
- Separar controlador, modelo y vista
- Usar una sola entrada principal por flujo
- Evitar lógica de negocio dentro de las vistas

### Meta 2: Login funcional
- Registro y login de usuarios
- Protección de rutas privadas
- Sesiones activas
- Cierre de sesión
- Validación de credenciales y mensajes de error

### Meta 3: CRUD completo de libros
- Listado
- Crear
- Editar
- Eliminar
- Validación de campos
- Diseño responsive

### Meta 4: Gestión de socios
- Alta, baja y edición de socios
- Listado con datos básicos
- Relación con préstamos

### Meta 5: Gestión de préstamos
- Registrar préstamo de libro a socio
- Validar disponibilidad
- Registrar devolución
- Mostrar historial

### Meta 6: Overhaul visual
- Rediseño de la interfaz
- Navbar con estructura clara
- Formularios modernos
- Mensajes visuales de éxito/error
- Tablas con mejor legibilidad
- Responsividad para escritorio y móvil

---

## 4. Metodología de trabajo
Se trabajará por sprints de 2 semanas, con entregas cortas y verificables.

### Criterio de entrega por sprint
Cada sprint debe entregar:
- funcionalidad terminada
- validación de flujo
- revisión de errores
- limpieza de código
- pruebas rápidas del módulo trabajado

---

## 5. Sprint 1: Base sólida y login
### Duración: semanas 1-2

### Objetivos
- Corregir la estructura MVC de toda la app
- Arreglar el flujo principal del sistema
- Crear el módulo de autenticación
- Preparar la base para socios y préstamos

### Tareas
1. Revisar y normalizar rutas del proyecto
2. Dejar index.php como punto de entrada único
3. Mantener un controlador por módulo: libros, socios, prestamos, auth
4. Crear la tabla de usuarios para login
5. Implementar login con:
   - usuario
   - contraseña
   - sesión activa
   - logout
6. Proteger páginas privadas
7. Crear pantalla principal del sistema
8. Preparar diseño base y estructura visual

### Entregables
- Login funcionando
- Protección por sesión
- Layout base del sistema
- MVC funcionando de forma consistente

### Criterios de éxito
- El usuario puede iniciar sesión con credenciales válidas
- Si no está autenticado no puede entrar a paneles privados
- Las rutas principales cargan bien
- El proyecto responde sin errores de MVC

---

## 6. Sprint 2: CRUD de libros y mejora visual
### Duración: semanas 3-4

### Objetivos
- Completar gestión de libros
- Mejorar el sistema visual
- Validar formulario y mensajes de errores

### Tareas
1. Revisar listado de libros y su diseño
2. Mejorar formulario de alta/edición
3. Validar reglas de negocio básicas
4. Corregir mensajes de error y éxito
5. Mejorar estilo con Bootstrap o CSS modular
6. Añadir botón de navegación para libros
7. Crear vista resumen o panel administrativo

### Entregables
- CRUD de libros funcionando
- Interfaz más clara y moderna
- Validaciones visuales y backend

### Criterios de éxito
- Se puede crear, editar y borrar libros sin errores
- La interfaz se ve ordenada y clara
- Los mensajes de éxito/error son visibles

---

## 7. Sprint 3: Módulo de socios
### Duración: semanas 5-6

### Objetivos
- Crear la gestión completa de socios
- Integrarlo con el flujo de la biblioteca

### Tareas
1. Crear modelo `Socio`
2. Crear controller `SocioController`
3. Crear vistas de listado y formulario
4. Agregar alta, edición y baja de socios
5. Validar datos obligatorios
6. Vincular la vista con el menú principal
7. Revisión visual del módulo

### Entregables
- CRUD de socios funcionando
- Listado con datos completos
- Formulario con validación

### Criterios de éxito
- Se pueden registrar socios correctamente
- Los datos aparecen en listado
- La edición y eliminación funcionan

---

## 8. Sprint 4: Módulo de préstamos
### Duración: semanas 7-8

### Objetivos
- Implementar el sistema de préstamo y devolución
- Evitar inconsistencias en la lógica de uso

### Tareas
1. Crear modelo `Prestamo`
2. Crear controller `PrestamoController`
3. Diseñar tabla de préstamos
4. Registrar nuevo préstamo
5. Validar disponibilidad del libro
6. Registrar devolución del libro
7. Mostrar historial y estado actual
8. Integrar con socios y libros

### Entregables
- Sistema de préstamos funcional
- Estado de libros disponible/prestado
- Historial de préstamos

### Criterios de éxito
- Un libro no puede prestarse dos veces si ya está prestado
- El socio puede devolver el libro y actualizar su estado
- El sistema refleja la situación real del catálogo

---

## 9. Sprint 5: Overhaul visual y refactor final
### Duración: semanas 9-10

### Objetivos
- Pulir toda la app visualmente
- Mejorar experiencia de usuario
- Asegurar calidad general del sistema

### Tareas
1. Rediseñar layout principal
2. Mejorar CSS global
3. Estilizar botones, tablas y formularios
4. Determinar paleta visual coherente
5. Mejorar mensajes de error y éxito
6. Ajustar componentes responsivos
7. Revisar consistencia visual en todos los módulos
8. Hacer pruebas finales de flujo completo

### Entregables
- Aplicación visualmente mejorada
- Sistema coherente en toda la web
- Todo funcionando de extremo a extremo

### Criterios de éxito
- La app se ve moderna y limpia
- Los módulos tienen el mismo estilo visual
- El usuario puede completar tareas sin confusión

---

## 10. Sprint 6: Stabilization y QA final
### Duración: semanas 11-12

### Objetivos
- Hacer limpieza final
- Corregir errores detectados
- Dejar la app lista para uso

### Tareas
1. Validar flujos completos
2. Revisar errores de seguridad básica
3. Corregir casos borde
4. Optimizar consulta de listado
5. Revisar validaciones de entrada
6. Guardar datos consistentes en DB
7. Hacer prueba final del login y CRUD

### Entregables
- Sistema estable y funcional
- Documentación final del proyecto
- Checklist de QA

### Criterios de éxito
- El sistema corre sin errores de lógica
- El flujo de login, libros, socios y préstamos funciona
- La app está lista para mostrar al cliente o para seguir ampliando

---

## 11. Otras mejoras recomendadas
Además de los módulos principales, considero necesarias estas mejoras:

### 11.1 Validación de seguridad básica
- no mostrar errores de SQL al usuario
- usar `htmlspecialchars` en salidas
- validar `$_GET` y `$_POST`
- evitar la inyección SQL y XSS básica

### 11.2 Mejoras de UX
- mensajes de éxito y error amigables
- confirmaciones antes de borrar
- botón de volver al listado
- paginado si crece el volumen de datos

### 11.3 Mejoras de mantenibilidad
- crear una carpeta `helpers` si hace falta
- centralizar validaciones de datos
- usar nombres homogéneos en todo el proyecto
- documentar cada módulo con comentarios breves

### 11.4 Base de datos
- revisar estructura de tablas
- asegurar claves primarias y foráneas
- definir campos como fechas, estados y llaves de relación

---

## 12. Orden de prioridad recomendado
1. Login y protección de rutas
2. CRUD de libros
3. CRUD de socios
4. CRUD de préstamos
5. Overhaul visual
6. QA final y mejoras de seguridad

---

## 13. Recomendación clave
La prioridad no es solo “hacer todas las pantallas”, sino dejar una base sólida en la que cada módulo encaje bien. Si la arquitectura corta o la lógica de datos está mal hecha, más adelante cada nueva funcionalidad se volverá más difícil de integrar.

Por eso, el primer objetivo real debe ser: login + MVC limpio + CRUD de libros + socios + préstamos + diseño coherente.

---

## 14. Resumen ejecutivo
Los próximos 2 meses se pueden dividir así:
- 4 semanas: base, login, CRUD de libros, visual base
- 4 semanas: socios + préstamos
- 2 semanas: overhaul visual
- 2 semanas: QA, seguridad, estabilización final

Con ese orden, el proyecto puede quedar completamente funcional y con una buena base para seguir creciendo.

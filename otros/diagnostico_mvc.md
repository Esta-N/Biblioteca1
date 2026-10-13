# Diagnóstico del sistema MVC y batería de testing

## 1. Problemas que tenía el proyecto

### 1.1 Ruta incorrecta del controlador
**Problema:**
En el archivo principal se hacía una inclusión con una ruta mal escrita:

```php
require __DIR__ . '../controllers/LibroController.php';
```

Falta la barra `/` antes de `controllers` y además la concatenación no apuntaba al archivo correcto.

**Solución:**
```php
require __DIR__ . '/controllers/LibroController.php';
```

---

### 1.2 La vista que se cargaba no existía
**Problema:**
Se intentaba cargar una vista en una ruta que no estaba creada:

```php
require __DIR__ . '/views/form.php';
```

La vista correcta estaba en:

```php
/views/libros/form.php
```

**Solución:**
```php
require __DIR__ . '/views/libros/form.php';
```

---

### 1.3 Los nombres de campos del formulario no coincidían con el backend
**Problema:**
El controlador leía `fecha` y `paginas`, pero el formulario enviaba `anio_publicacion` y `cantidad_paginas`.

Esto hacía que el servidor recibiera valor vacío o nulo y la validación fallaba.

**Solución:**
Usar siempre el mismo nombre en todas las capas:

```php
$_POST['anio_publicacion']
$_POST['cantidad_paginas']
```

---

### 1.4 Falta de validación del `id` al editar
**Problema:**
En el método `editar()` usaba una variable `$id` que no se definía antes.

**Solución:**
```php
$id = (int)($_POST['id'] ?? 0);
```

Y luego validar:

```php
if ($id <= 0 || $titulo === '' || $autor === '' || $anioPublicacion === '' || $cantidadPaginas === '') {
```

---

### 1.5 El modelo tenía un SQL inválido
**Problema:**
El método `editar()` tenía un `UPDATE` con columnas que no existen:

```php
"UPDATE libros SET titulo=?, autor=?, imagen=?, fechaPublicacion=?, cantidadPaginas=? WHERE id=?"
```

La tabla tiene columnas como:
- `anio_publicacion`
- `cantidad_paginas`

**Solución:**
```php
"UPDATE libros SET titulo=?, autor=?, anio_publicacion=?, cantidad_paginas=? WHERE id=?"
```

Y ejecutar con un único arreglo:

```php
$stmt->execute([$titulo, $autor, $anioPublicacion, $cantidadPaginas, $id]);
```

---

### 1.6 Se estaban usando archivos fuera del flujo MVC
**Problema:**
Había archivos como `crear.php`, `editar.php` y `eliminar.php` que hacían lógica directa en la vista y no pasaban por el controlador.

Eso rompe la separación de responsabilidades.

**Solución:**
Centralizar todo por `index.php` y el controlador.

---

### 1.7 La conexión tenía un error tipográfico
**Problema:**
Se capturaba `PDOEException`, que no existe.

Eso impide que la excepción se capture correctamente.

**Solución:**
```php
catch (PDOException $e) {
```

---

## 2. Regla de oro del MVC aplicada
El flujo correcto debe ser:

1. Usuario entra a `index.php?accion=...`
2. El `index.php` decide la acción
3. El controlador procesa la petición
4. El modelo accede a la base de datos
5. La vista renderiza el HTML

No se debe mezclar lógica de negocio con HTML ni crear rutas alternativas que hagan lo mismo.

---

## 3. Batería de testing del sistema

### 3.1 Testing de sintaxis PHP
Validar cada archivo con `php -l`.

Objetivo:
- comprobar que no haya errores de sintaxis
- asegurar que el proyecto no tenga fallas de parsing

**Comandos sugeridos:**
```bash
C:\xampp\php\php.exe -l C:\xampp\htdocs\bIBLIOTECA3\index.php
C:\xampp\php\php.exe -l C:\xampp\htdocs\bIBLIOTECA3\controllers\LibroController.php
C:\xampp\php\php.exe -l C:\xampp\htdocs\bIBLIOTECA3\models\Libro.php
C:\xampp\php\php.exe -l C:\xampp\htdocs\bIBLIOTECA3\conexion.php
C:\xampp\php\php.exe -l C:\xampp\htdocs\bIBLIOTECA3\views\libros\form.php
C:\xampp\php\php.exe -l C:\xampp\htdocs\bIBLIOTECA3\views\libros\listado.php
```

---

### 3.2 Testing de flujo de listado
**Caso 1:** Entrar a:
```text
index.php?accion=listar
```

**Resultado esperado:**
- debe cargar el listado de libros
- debe mostrar la tabla con columnas: título, autor, año, páginas
- si no hay registros, debe mostrar texto de “No hay libros cargados todavía”

---

### 3.3 Testing de formulario de creación
**Caso 2:** Entrar a:
```text
index.php?accion=formCrear
```

**Resultado esperado:**
- debe mostrar el formulario con los campos:
  - título
  - autor
  - año de publicación
  - cantidad de páginas

**Caso 3:** Enviar formulario vacío:
```text
index.php?accion=crear
```

**Resultado esperado:**
- mostrar alerta: "Todos los campos son obligatorios"

**Caso 4:** Enviar datos válidos:
- título: "El Quijote"
- autor: "Cervantes"
- anio_publicacion: 1605
- cantidad_paginas: 400

**Resultado esperado:**
- debe insertarse en la base
- redirigir a `index.php?accion=listar`

---

### 3.4 Testing de edición
**Caso 5:** Entrar a:
```text
index.php?accion=formEditar&id=1
```

**Resultado esperado:**
- debe cargar el libro con id=1
- se deben precargar los valores en el formulario

**Caso 6:** Enviar formulario con cambios:
```text
index.php?accion=editar
```

**Resultado esperado:**
- debe actualizar la fila correcta en la base
- debe redirigir a la lista

---

### 3.5 Testing de eliminación
**Caso 7:** Ejecutar:
```text
index.php?accion=eliminar&id=1
```

**Resultado esperado:**
- debe borrar el libro con ese id
- redirigir a la lista

---

### 3.6 Testing de rutas
Verificar que no existan acciones inconsistentes:

```text
formCrear
crear
formEditar
editar
eliminar
listar
```

Todo debe estar conectado con el mismo nombre en:
- `index.php`
- controlador
- formulario
- enlaces de navegación

---

### 3.7 Testing de MVC
Verificar que cada capa cumpla su responsabilidad:

- Modelo: solo acceso a datos y consultas
- Controlador: recibe POST/GET, valida, llama al modelo
- Vista: solo muestra HTML

Si una vista hace `INSERT` o `UPDATE`, ya está mal implementada.

---

## 4. Checklist final

- [x] rutas correctas
- [x] nombres de campos consistentes
- [x] variable `$id` definida en edición
- [x] SQL correcto en `UPDATE`
- [x] conexión con `PDOException`
- [x] flujo centralizado por `index.php`
- [x] no quedan acciones duplicadas
- [x] sintaxis PHP correcta

---

## 5. Recomendación final
Mantener siempre esta regla:

> Un mismo nombre en todas las capas.

Si el campo se llama `anio_publicacion` en el formulario, debe llamarse igual en el controlador y en el SQL. Si la ruta es `index.php?accion=editar`, esa misma acción debe estar definida exactamente igual en el `switch` del controlador principal.

Esto evita errores silenciosos y hace que el MVC funcione de forma limpia.

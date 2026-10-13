<?php
$base = __DIR__;
$phpPath = 'C:/xampp/php/php.exe';

$checks = [];
$files = [
    $base . '/index.php',
    $base . '/controllers/LibroController.php',
    $base . '/models/Libro.php',
    $base . '/conexion.php',
    $base . '/views/libros/form.php',
    $base . '/views/libros/listado.php'
];

function registrar($nombre, $resultado, $mensaje) {
    global $checks;
    $checks[] = [
        'nombre' => $nombre,
        'resultado' => $resultado,
        'mensaje' => $mensaje
    ];
}

function runPhpLint($phpPath, $file) {
    $command = '"' . $phpPath . '" -l "' . $file . '" 2>&1';
    $output = [];
    $code = 0;
    exec($command, $output, $code);
    $text = implode("\n", $output);
    return ['code' => $code, 'text' => $text];
}

foreach ($files as $file) {
    if (!file_exists($file)) {
        registrar('Archivo existe: ' . basename($file), false, 'No existe');
        continue;
    }

    $scan = runPhpLint($phpPath, $file);
    if ($scan['code'] === 0) {
        registrar('Sintaxis PHP: ' . basename($file), true, 'No syntax errors detected');
    } else {
        registrar('Sintaxis PHP: ' . basename($file), false, $scan['text']);
    }
}

$indexContent = file_get_contents($base . '/index.php');
if ($indexContent !== false) {
    registrar('Ruta correcta del controlador', strpos($indexContent, "require __DIR__ . '/controllers/LibroController.php';") !== false, 'Controlador cargado desde index.php');
    registrar('Acción formEditar definida', strpos($indexContent, "case 'formEditar':") !== false, 'Existe el caso formEditar');
    registrar('Acción editar definida', strpos($indexContent, "case 'editar':") !== false, 'Existe el caso editar');
    registrar('Acción eliminar definida', strpos($indexContent, "case 'eliminar':") !== false, 'Existe el caso eliminar');
}

$controllerContent = file_get_contents($base . '/controllers/LibroController.php');
if ($controllerContent !== false) {
    registrar('Controlador recibe anio_publicacion', strpos($controllerContent, "anio_publicacion") !== false, 'El controlador usa el nombre correcto del campo');
    registrar('Controlador recibe cantidad_paginas', strpos($controllerContent, "cantidad_paginas") !== false, 'El controlador usa el nombre correcto del campo');
    registrar('Edición usa id', strpos($controllerContent, "\$id = (int)(\$_POST['id'] ?? 0);") !== false, 'Se valida el id al editar');
}

$modelContent = file_get_contents($base . '/models/Libro.php');
if ($modelContent !== false) {
    registrar('SQL de edición correcto', strpos($modelContent, "anio_publicacion=?, cantidad_paginas=? WHERE id=?") !== false, 'El UPDATE coincide con la base');
    registrar('Método editar bien definido', strpos($modelContent, "public static function editar") !== false, 'Existe editar()');
}

$conexionContent = file_get_contents($base . '/conexion.php');
if ($conexionContent !== false) {
    registrar('Excepción correcta', strpos($conexionContent, "PDOException") !== false, 'Se usa la excepción correcta');
}

$vistaContent = file_get_contents($base . '/views/libros/form.php');
if ($vistaContent !== false) {
    registrar('Formulario apunta a la acción correcta', strpos($vistaContent, "index.php?accion=") !== false, 'El action del form apunta al flujo principal');
    registrar('No hay campos duplicados', substr_count($vistaContent, "Fecha") < 2, 'Hay un solo label de fecha');
}

$pass = 0;
$fail = 0;
foreach ($checks as $check) {
    echo ($check['resultado'] ? '[OK]' : '[FAIL]') . ' ' . $check['nombre'] . PHP_EOL;
    if (!$check['resultado']) {
        echo '   ' . $check['mensaje'] . PHP_EOL;
        $fail++;
    } else {
        $pass++;
    }
}

echo PHP_EOL . 'Resumen: ' . $pass . ' pruebas OK, ' . $fail . ' pruebas fallidas.' . PHP_EOL;
exit($fail === 0 ? 0 : 1);

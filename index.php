<?php
require __DIR__ . '/controllers/LibroController.php';
require __DIR__ . '/controllers/SocioController.php';
require __DIR__ . '/controllers/PrestamoController.php';

$accion = $_GET['accion'] ?? 'listar';

switch ($accion) {
    case 'listar':
        listarLibros();
        break;
    case 'formCrear':
        require __DIR__ . '/views/libros/form.php';
        break;
    case 'crear':
        crearLibro();
        break;
    case 'formEditar':
        formEditarLibro();
        break;
    case 'editar':
        editar();
        break;
    case 'eliminar':
        eliminarLibro();
        break;
    case 'listarSocios':
        listarSocios();
        break;
    case 'formCrearSocio':
        formCrearSocio();
        break;
    case 'crearSocio':
        crearSocio();
        break;
    case 'formEditarSocio':
        formEditarSocio();
        break;
    case 'editarSocio':
        editarSocio();
        break;
    case 'eliminarSocio':
        eliminarSocio();
        break;
    case 'listarPrestamos':
        listarPrestamos();
        break;
    case 'formCrearPrestamo':
        formCrearPrestamo();
        break;
    case 'crearPrestamo':
        crearPrestamo();
        break;
    case 'formEditarPrestamo':
        formEditarPrestamo();
        break;
    case 'editarPrestamo':
        editarPrestamo();
        break;
    case 'eliminarPrestamo':
        eliminarPrestamo();
        break;
    default:
        http_response_code(404);
        echo "Página no encontrada";
}
?>

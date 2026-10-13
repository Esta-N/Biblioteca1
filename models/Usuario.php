<?php
class Usuario {
    public ?int $id;
    public string $nombre;
    public $numUsuario;
    public string $email;

    public function __construct(string $nombre, $numUsuario, string $email, ?int $id = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->numUsuario = $numUsuario;
        $this->email = $email;
    }

    public function mostrarId() {
        return $this->id;
    }

    public function mostrarNombre() {
        return $this->nombre;
    }

    public function mostrarNumeroUsuario() {
        return $this->numUsuario;
    }

    public function mostrarEmail() {
        return $this->email;
    }

    public static function listar($pdo) {
        $stmt = $pdo->prepare("SELECT * FROM usuarios ORDER BY nombre");
        $stmt->execute();
        $usuarios = [];

        foreach ($stmt->fetchAll() as $fila) {
            $usuarios[] = new Usuario($fila['nombre'], (int)$fila['num_usuario'], $fila['email'], (int)$fila['id']);
        }

        return $usuarios;
    }

    public static function crear($pdo, string $nombre, int $numUsuario, string $email) {
        $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, num_usuario, email) VALUES (?, ?, ?)");
        return $stmt->execute([$nombre, $numUsuario, $email]);
    }

    public static function editar($pdo, int $id, string $nombre, int $numUsuario, string $email) {
        $stmt = $pdo->prepare("UPDATE usuarios SET nombre = ?, num_usuario = ?, email = ? WHERE id = ?");
        return $stmt->execute([$nombre, $numUsuario, $email, $id]);
    }

    public static function eliminar($pdo, int $id) {
        $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public static function buscarPorId($pdo, int $id) {
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->execute([$id]);
        $fila = $stmt->fetch();

        return $fila
            ? new Usuario($fila['nombre'], (int)$fila['num_usuario'], $fila['email'], (int)$fila['id'])
            : null;
    }
}
?>
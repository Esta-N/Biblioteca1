<?php
class Socio {
    public ?int $id;
    public string $nombre;
    public $numSocio;
    public string $email;

    public function __construct(string $nombre, $numSocio, string $email, ?int $id = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->numSocio = $numSocio;
        $this->email = $email;
    }

    public function mostrarId() {
        return $this->id;
    }

    public function mostrarNombre() {
        return $this->nombre;
    }

    public function mostrarNumeroSocio() {
        return $this->numSocio;
    }

    public function mostrarEmail() {
        return $this->email;
    }

    public static function listar($pdo) {
        $stmt = $pdo->prepare("SELECT * FROM socios ORDER BY nombre");
        $stmt->execute();
        $socios = [];

        foreach ($stmt->fetchAll() as $fila) {
            $socios[] = new Socio($fila['nombre'], (int)$fila['num_socio'], $fila['email'], (int)$fila['id']);
        }

        return $socios;
    }

    public static function crear($pdo, string $nombre, int $numSocio, string $email) {
        $stmt = $pdo->prepare("INSERT INTO socios (nombre, num_socio, email) VALUES (?, ?, ?)");
        return $stmt->execute([$nombre, $numSocio, $email]);
    }

    public static function editar($pdo, int $id, string $nombre, int $numSocio, string $email) {
        $stmt = $pdo->prepare("UPDATE socios SET nombre = ?, num_socio = ?, email = ? WHERE id = ?");
        return $stmt->execute([$nombre, $numSocio, $email, $id]);
    }

    public static function eliminar($pdo, int $id) {
        $stmt = $pdo->prepare("DELETE FROM socios WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public static function buscarPorId($pdo, int $id) {
        $stmt = $pdo->prepare("SELECT * FROM socios WHERE id = ?");
        $stmt->execute([$id]);
        $fila = $stmt->fetch();

        return $fila
            ? new Socio($fila['nombre'], (int)$fila['num_socio'], $fila['email'], (int)$fila['id'])
            : null;
    }
}
?>
<?php
require_once 'BaseModel.php';
// Incluimos nuestro servicio de hashing
require_once __DIR__ . '/../auth/hash.php';

class BeUsuarioModel extends BaseModel {
    protected $table = 'BeUsuarios';

    /**
     * Crea un nuevo usuario utilizando el HashingService para la clave.
     * @param array $data Debe incluir 'Clave' en texto plano.
     */
    public function create($data) {
        // Delegamos la creación del hash a nuestro servicio especializado.
        $hashDeClave = HashingService::hashClave($data['Clave']);

        // El nombre de la columna 'ContrasenaHash' no cambia, ya que está en la base de datos.
        $query = "INSERT INTO {$this->table} (NombreUsuario, ContrasenaHash, RolUsuario, CorreoElectronico, IdAspirante) VALUES (?, ?, ?, ?, ?)";
        $params = [
            $data['NombreUsuario'],
            $hashDeClave, // Usamos el hash generado por el servicio
            $data['RolUsuario'],
            $data['CorreoElectronico'],
            $data['IdAspirante'] ?? null
        ];
        return $this->executeQuery($query, $params);
    }

    /**
     * Actualiza únicamente la clave de un usuario utilizando el HashingService.
     * @param int $id ID del usuario.
     * @param string $nuevaClaveEnTextoPlano La nueva clave en texto plano.
     */
    public function updateClave($id, $nuevaClaveEnTextoPlano) {
        // De nuevo, usamos el servicio para hashear la nueva clave.
        $nuevaClaveHasheada = HashingService::hashClave($nuevaClaveEnTextoPlano);
        $query = "UPDATE {$this->table} SET ContrasenaHash = ? WHERE IdUsuario = ?";
        return $this->executeQuery($query, [$nuevaClaveHasheada, $id]);
    }

    /**
     * Busca un usuario por su nombre y verifica su clave usando el HashingService.
     * @param string $nombreUsuario El nombre del usuario.
     * @param string $claveEnTextoPlano La clave en texto plano.
     * @return array|false Los datos del usuario si es válido, o false si no.
     */
    public function findByUsernameAndVerifyClave($nombreUsuario, $claveEnTextoPlano) {
        $query = "SELECT * FROM {$this->table} WHERE NombreUsuario = ?";
        $stmt = $this->executeQuery($query, [$nombreUsuario]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Usamos el servicio para verificar la clave.
            if (HashingService::verifyClave($claveEnTextoPlano, $user['ContrasenaHash'])) {
                return $user; // La clave es correcta
            }
        }

        return false; // El usuario no existe o la clave es incorrecta
    }
    
    // El método update() general se mantiene igual.
    public function update($id, $data) {
        $query = "UPDATE {$this->table} SET NombreUsuario = ?, RolUsuario = ?, CorreoElectronico = ?, IdAspirante = ? WHERE IdUsuario = ?";
        $params = [
            $data['NombreUsuario'],
            $data['RolUsuario'],
            $data['CorreoElectronico'],
            $data['IdAspirante'] ?? null,
            $id
        ];
        return $this->executeQuery($query, $params);
    }
}
?>
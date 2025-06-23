<?php
require_once 'BaseModel.php';

class BeContactoEmergenciaModel extends BaseModel {
    protected $table = 'BeContactosEmergencia';

    public function create($data) {
        $query = "INSERT INTO {$this->table} (IdSolicitud, IdDireccion, NombreCompleto, Parentesco) VALUES (?, ?, ?, ?)";
        $params = [
            $data['IdSolicitud'], $data['IdDireccion'], $data['NombreCompleto'],
            $data['Parentesco']
        ];
        return $this->executeQuery($query, $params);
    }

    public function update($id, $data) {
        $query = "UPDATE {$this->table} SET IdSolicitud = ?, IdDireccion = ?, NombreCompleto = ?, Parentesco = ? WHERE IdContactoEmergencia = ?";
        $params = [
            $data['IdSolicitud'], $data['IdDireccion'], $data['NombreCompleto'],
            $data['Parentesco'], $id
        ];
        return $this->executeQuery($query, $params);
    }
}
?>
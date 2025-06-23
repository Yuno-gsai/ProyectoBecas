<?php
require_once 'BaseModel.php';

class BeInstitucionEducativaModel extends BaseModel {
    protected $table = 'BeInstitucionesEducativas';

    public function create($data) {
        $query = "INSERT INTO {$this->table} (IdDireccion, NombreInstitucion) VALUES (?, ?)";
        $params = [$data['IdDireccion'], $data['NombreInstitucion']];
        return $this->executeQuery($query, $params);
    }

    public function update($id, $data) {
        $query = "UPDATE {$this->table} SET IdDireccion = ?, NombreInstitucion = ? WHERE IdInstitucion = ?";
        $params = [$data['IdDireccion'], $data['NombreInstitucion'], $id];
        return $this->executeQuery($query, $params);
    }
}
?>
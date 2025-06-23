<?php
require_once 'BaseModel.php';

class BeInstitucionBachilleratoModel extends BaseModel {
    protected $table = 'BeInstitucionesBachillerato';

    public function create($data) {
        $query = "INSERT INTO {$this->table} (IdDireccion, NombreInstitucion, SectorInstitucion) VALUES (?, ?, ?)";
        $params = [$data['IdDireccion'], $data['NombreInstitucion'], $data['SectorInstitucion']];
        return $this->executeQuery($query, $params);
    }

    public function update($id, $data) {
        $query = "UPDATE {$this->table} SET IdDireccion = ?, NombreInstitucion = ?, SectorInstitucion = ? WHERE IdInstitucionBto = ?";
        $params = [$data['IdDireccion'], $data['NombreInstitucion'], $data['SectorInstitucion'], $id];
        return $this->executeQuery($query, $params);
    }
}
?>
<?php
require_once 'BaseModel.php';

class BeEspecialidadBachilleratoModel extends BaseModel {
    protected $table = 'BeEspecialidadesBachillerato';

    public function create($data) {
        $query = "INSERT INTO {$this->table} (NombreEspecialidad) VALUES (?)";
        $params = [$data['NombreEspecialidad']];
        return $this->executeQuery($query, $params);
    }

    public function update($id, $data) {
        $query = "UPDATE {$this->table} SET NombreEspecialidad = ? WHERE IdEspecialidad = ?";
        $params = [$data['NombreEspecialidad'], $id];
        return $this->executeQuery($query, $params);
    }
}
?>
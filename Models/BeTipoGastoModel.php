<?php
require_once 'BaseModel.php';

class BeTipoGastoModel extends BaseModel {
    protected $table = 'BeTiposDeGasto';

    public function create($data) {
        $query = "INSERT INTO {$this->table} (NombreGasto) VALUES (?)";
        $params = [$data['NombreGasto']];
        return $this->executeQuery($query, $params);
    }

    public function update($id, $data) {
        $query = "UPDATE {$this->table} SET NombreGasto = ? WHERE IdTipoGasto = ?";
        $params = [$data['NombreGasto'], $id];
        return $this->executeQuery($query, $params);
    }
}
?>
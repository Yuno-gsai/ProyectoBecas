<?php
require_once 'BaseModel.php';

class BeTipoDocumentoModel extends BaseModel {
    protected $table = 'BeTiposDeDocumento';

    public function create($data) {
        $query = "INSERT INTO {$this->table} (NombreDocumento) VALUES (?)";
        $params = [$data['NombreDocumento']];
        return $this->executeQuery($query, $params);
    }

    public function update($id, $data) {
        $query = "UPDATE {$this->table} SET NombreDocumento = ? WHERE IdTipoDocumento = ?";
        $params = [$data['NombreDocumento'], $id];
        return $this->executeQuery($query, $params);
    }
}
?>
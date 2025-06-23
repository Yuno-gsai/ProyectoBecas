<?php
require_once 'BaseModel.php';

class BeTipoBienModel extends BaseModel {
    protected $table = 'BeTiposDeBien';

    public function create($data) {
        $query = "INSERT INTO {$this->table} (NombreBien) VALUES (?)";
        $params = [$data['NombreBien']];
        return $this->executeQuery($query, $params);
    }

    public function update($id, $data) {
        $query = "UPDATE {$this->table} SET NombreBien = ? WHERE IdTipoBien = ?";
        $params = [$data['NombreBien'], $id];
        return $this->executeQuery($query, $params);
    }
}
?>
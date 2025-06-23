<?php
require_once 'BaseModel.php';

class BeBienFamiliarModel extends BaseModel {
    protected $table = 'BeBienesFamiliares';

    public function create($data) {
        $query = "INSERT INTO {$this->table} (IdSolicitud, IdTipoBien, Descripcion) VALUES (?, ?, ?)";
        $params = [$data['IdSolicitud'], $data['IdTipoBien'], $data['Descripcion']];
        return $this->executeQuery($query, $params);
    }

    public function update($id, $data) {
        $query = "UPDATE {$this->table} SET IdSolicitud = ?, IdTipoBien = ?, Descripcion = ? WHERE IdBienFamiliar = ?";
        $params = [$data['IdSolicitud'], $data['IdTipoBien'], $data['Descripcion'], $id];
        return $this->executeQuery($query, $params);
    }
}
?>
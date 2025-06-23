<?php
require_once 'BaseModel.php';

class BeGastoMensualModel extends BaseModel {
    protected $table = 'BeGastosMensuales';

    public function create($data) {
        $query = "INSERT INTO {$this->table} (IdSolicitud, IdTipoGasto, Monto, Descripcion) VALUES (?, ?, ?, ?)";
        $params = [
            $data['IdSolicitud'], $data['IdTipoGasto'], $data['Monto'],
            $data['Descripcion']
        ];
        return $this->executeQuery($query, $params);
    }

    public function update($id, $data) {
        $query = "UPDATE {$this->table} SET IdSolicitud = ?, IdTipoGasto = ?, Monto = ?, Descripcion = ? WHERE IdGasto = ?";
        $params = [
            $data['IdSolicitud'], $data['IdTipoGasto'], $data['Monto'],
            $data['Descripcion'], $id
        ];
        return $this->executeQuery($query, $params);
    }
}
?>
<?php
require_once 'BaseModel.php';

class BeIngresoFamiliarModel extends BaseModel {
    protected $table = 'BeIngresosFamiliares';

    public function create($data) {
        $query = "INSERT INTO {$this->table} (IdMiembro, SalarioMensual, LugarTrabajo, CargoDesempenado, EsTrabajoIndependiente, DescripcionIndependiente) VALUES (?, ?, ?, ?, ?, ?)";
        $params = [
            $data['IdMiembro'], $data['SalarioMensual'], $data['LugarTrabajo'],
            $data['CargoDesempenado'], $data['EsTrabajoIndependiente'] ?? false,
            $data['DescripcionIndependiente']
        ];
        return $this->executeQuery($query, $params);
    }

    public function update($id, $data) {
        $query = "UPDATE {$this->table} SET IdMiembro = ?, SalarioMensual = ?, LugarTrabajo = ?, CargoDesempenado = ?, EsTrabajoIndependiente = ?, DescripcionIndependiente = ? WHERE IdIngreso = ?";
        $params = [
            $data['IdMiembro'], $data['SalarioMensual'], $data['LugarTrabajo'],
            $data['CargoDesempenado'], $data['EsTrabajoIndependiente'],
            $data['DescripcionIndependiente'], $id
        ];
        return $this->executeQuery($query, $params);
    }
}
?>
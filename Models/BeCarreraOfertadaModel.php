<?php
require_once 'BaseModel.php';

class BeCarreraOfertadaModel extends BaseModel {
    protected $table = 'BeCarrerasOfertadas';

    public function create($data) {
        $query = "INSERT INTO {$this->table} (IdInstitucion, NombreCarrera, TipoCarrera, DuracionCarreraAnios, TurnoEstudio, CostoMatricula, MatriculasPorAnio, CuotaMensual, CuotasPorAnio, CostoLaboratorios, OtrosCostosCarrera) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $params = [
            $data['IdInstitucion'], $data['NombreCarrera'], $data['TipoCarrera'],
            $data['DuracionCarreraAnios'], $data['TurnoEstudio'], $data['CostoMatricula'],
            $data['MatriculasPorAnio'], $data['CuotaMensual'], $data['CuotasPorAnio'],
            $data['CostoLaboratorios'], $data['OtrosCostosCarrera']
        ];
        return $this->executeQuery($query, $params);
    }

    public function update($id, $data) {
        $query = "UPDATE {$this->table} SET IdInstitucion = ?, NombreCarrera = ?, TipoCarrera = ?, DuracionCarreraAnios = ?, TurnoEstudio = ?, CostoMatricula = ?, MatriculasPorAnio = ?, CuotaMensual = ?, CuotasPorAnio = ?, CostoLaboratorios = ?, OtrosCostosCarrera = ? WHERE IdCarrera = ?";
        $params = [
            $data['IdInstitucion'], $data['NombreCarrera'], $data['TipoCarrera'],
            $data['DuracionCarreraAnios'], $data['TurnoEstudio'], $data['CostoMatricula'],
            $data['MatriculasPorAnio'], $data['CuotaMensual'], $data['CuotasPorAnio'],
            $data['CostoLaboratorios'], $data['OtrosCostosCarrera'], $id
        ];
        return $this->executeQuery($query, $params);
    }
}
?>
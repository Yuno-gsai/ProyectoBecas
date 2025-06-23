<?php
require_once 'BaseModel.php';

class BeHistorialBecaAprobadaModel extends BaseModel {
    protected $table = 'BeHistorialBecasAprobadas';

    public function create($data) {
        $query = "INSERT INTO {$this->table} (IdSolicitud, CicloAcademico, FechaAprobacion, DuracionAnios, EstadoBeca, Observaciones) VALUES (?, ?, ?, ?, ?, ?)";
        $params = [
            $data['IdSolicitud'], $data['CicloAcademico'], $data['FechaAprobacion'],
            $data['DuracionAnios'], $data['EstadoBeca'] ?? 'Activa', $data['Observaciones']
        ];
        return $this->executeQuery($query, $params);
    }

    public function update($id, $data) {
        $query = "UPDATE {$this->table} SET IdSolicitud = ?, CicloAcademico = ?, FechaAprobacion = ?, DuracionAnios = ?, EstadoBeca = ?, Observaciones = ? WHERE IdHistorialBeca = ?";
        $params = [
            $data['IdSolicitud'], $data['CicloAcademico'], $data['FechaAprobacion'],
            $data['DuracionAnios'], $data['EstadoBeca'], $data['Observaciones'], $id
        ];
        return $this->executeQuery($query, $params);
    }
}
?>
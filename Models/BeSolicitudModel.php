<?php
require_once 'BaseModel.php';

class BeSolicitudModel extends BaseModel {
    protected $table = 'BeSolicitudes';

    public function create($data) {
        $query = "INSERT INTO {$this->table} (IdAspirante, IdCarreraInteres, FechaSolicitud, MotivacionEstudio, FuenteConocimientoBeca, LogrosMencionesHonorificas, EstadoSolicitud) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $params = [
            $data['IdAspirante'], $data['IdCarreraInteres'], $data['FechaSolicitud'],
            $data['MotivacionEstudio'], $data['FuenteConocimientoBeca'],
            $data['LogrosMencionesHonorificas'], $data['EstadoSolicitud'] ?? 'Recibida'
        ];
        return $this->executeQuery($query, $params);
    }

    public function update($id, $data) {
        $query = "UPDATE {$this->table} SET IdAspirante = ?, IdCarreraInteres = ?, FechaSolicitud = ?, MotivacionEstudio = ?, FuenteConocimientoBeca = ?, LogrosMencionesHonorificas = ?, EstadoSolicitud = ? WHERE IdSolicitud = ?";
        $params = [
            $data['IdAspirante'], $data['IdCarreraInteres'], $data['FechaSolicitud'],
            $data['MotivacionEstudio'], $data['FuenteConocimientoBeca'],
            $data['LogrosMencionesHonorificas'], $data['EstadoSolicitud'], $id
        ];
        return $this->executeQuery($query, $params);
    }
}
?>
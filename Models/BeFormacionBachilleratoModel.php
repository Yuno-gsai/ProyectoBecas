<?php
require_once 'BaseModel.php';

class BeFormacionBachilleratoModel extends BaseModel {
    protected $table = 'BeFormacionBachillerato';

    public function create($data) {
        $query = "INSERT INTO {$this->table} (IdSolicitud, IdInstitucionBto, IdEspecialidad, TipoBachillerato, PagoMensual, FuentePagoBasica, DetallePagoBasica) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $params = [
            $data['IdSolicitud'], $data['IdInstitucionBto'], $data['IdEspecialidad'],
            $data['TipoBachillerato'], $data['PagoMensual'] ?? 0, $data['FuentePagoBasica'],
            $data['DetallePagoBasica']
        ];
        return $this->executeQuery($query, $params);
    }

    public function update($id, $data) {
        $query = "UPDATE {$this->table} SET IdSolicitud = ?, IdInstitucionBto = ?, IdEspecialidad = ?, TipoBachillerato = ?, PagoMensual = ?, FuentePagoBasica = ?, DetallePagoBasica = ? WHERE IdFormacion = ?";
        $params = [
            $data['IdSolicitud'], $data['IdInstitucionBto'], $data['IdEspecialidad'],
            $data['TipoBachillerato'], $data['PagoMensual'], $data['FuentePagoBasica'],
            $data['DetallePagoBasica'], $id
        ];
        return $this->executeQuery($query, $params);
    }
}
?>
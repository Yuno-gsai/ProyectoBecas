<?php
require_once 'BaseModel.php';

class BeGrupoFamiliarModel extends BaseModel {
    protected $table = 'BeGrupoFamiliar';

    public function create($data) {
        $query = "INSERT INTO {$this->table} (IdSolicitud, Dui, NombreCompleto, Parentesco, Edad, Ocupacion, EsResponsable) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $params = [
            $data['IdSolicitud'], $data['Dui'], $data['NombreCompleto'],
            $data['Parentesco'], $data['Edad'], $data['Ocupacion'],
            $data['EsResponsable'] ?? false
        ];
        return $this->executeQuery($query, $params);
    }

    public function update($id, $data) {
        $query = "UPDATE {$this->table} SET IdSolicitud = ?, Dui = ?, NombreCompleto = ?, Parentesco = ?, Edad = ?, Ocupacion = ?, EsResponsable = ? WHERE IdMiembro = ?";
        $params = [
            $data['IdSolicitud'], $data['Dui'], $data['NombreCompleto'],
            $data['Parentesco'], $data['Edad'], $data['Ocupacion'],
            $data['EsResponsable'], $id
        ];
        return $this->executeQuery($query, $params);
    }
}
?>
<?php
require_once 'BaseModel.php';

class BeAspiranteModel extends BaseModel {
    protected $table = 'BeAspirantes';

    public function create($data) {
        $query = "INSERT INTO {$this->table} (IdDireccion, Nombres, PrimerApellido, SegundoApellido, FechaNacimiento, Genero, EstadoCivil, Dui, Nit, GradoEscolarActual, UrlFotoPerfil, PerfilFacebook) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $params = [
            $data['IdDireccion'], $data['Nombres'], $data['PrimerApellido'], $data['SegundoApellido'],
            $data['FechaNacimiento'], $data['Genero'], $data['EstadoCivil'], $data['Dui'],
            $data['Nit'], $data['GradoEscolarActual'], $data['UrlFotoPerfil'], $data['PerfilFacebook']
        ];
        return $this->executeQuery($query, $params);
    }

    public function update($id, $data) {
        $query = "UPDATE {$this->table} SET IdDireccion = ?, Nombres = ?, PrimerApellido = ?, SegundoApellido = ?, FechaNacimiento = ?, Genero = ?, EstadoCivil = ?, Dui = ?, Nit = ?, GradoEscolarActual = ?, UrlFotoPerfil = ?, PerfilFacebook = ? WHERE IdAspirante = ?";
        $params = [
            $data['IdDireccion'], $data['Nombres'], $data['PrimerApellido'], $data['SegundoApellido'],
            $data['FechaNacimiento'], $data['Genero'], $data['EstadoCivil'], $data['Dui'],
            $data['Nit'], $data['GradoEscolarActual'], $data['UrlFotoPerfil'], $data['PerfilFacebook'],
            $id
        ];
        return $this->executeQuery($query, $params);
    }
}
?>
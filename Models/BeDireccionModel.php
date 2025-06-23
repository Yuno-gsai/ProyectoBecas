<?php
require_once 'BaseModel.php';

class BeDireccionModel extends BaseModel {
    protected $table = 'BeDirecciones';

    public function create($data) {
        $query = "INSERT INTO {$this->table} (Departamento, Municipio, Distrito, DireccionExacta) VALUES (?, ?, ?, ?)";
        $params = [
            $data['Departamento'],
            $data['Municipio'],
            $data['Distrito'],
            $data['DireccionExacta']
        ];
        return $this->executeQuery($query, $params);
    }

    public function update($id, $data) {
        $query = "UPDATE {$this->table} SET Departamento = ?, Municipio = ?, Distrito = ?, DireccionExacta = ? WHERE IdDireccion = ?";
        $params = [
            $data['Departamento'],
            $data['Municipio'],
            $data['Distrito'],
            $data['DireccionExacta'],
            $id
        ];
        return $this->executeQuery($query, $params);
    }
}
?>
<?php
require_once 'BaseModel.php';

class BeDocumentoAdjuntoModel extends BaseModel {
    protected $table = 'BeDocumentosAdjuntos';

    public function create($data) {
        $query = "INSERT INTO {$this->table} (EntidadId, TipoEntidad, IdTipoDocumento, UrlDocumento, NombreArchivo) VALUES (?, ?, ?, ?, ?)";
        $params = [
            $data['EntidadId'], $data['TipoEntidad'], $data['IdTipoDocumento'],
            $data['UrlDocumento'], $data['NombreArchivo']
        ];
        return $this->executeQuery($query, $params);
    }

    public function update($id, $data) {
        $query = "UPDATE {$this->table} SET EntidadId = ?, TipoEntidad = ?, IdTipoDocumento = ?, UrlDocumento = ?, NombreArchivo = ? WHERE IdDocumento = ?";
        $params = [
            $data['EntidadId'], $data['TipoEntidad'], $data['IdTipoDocumento'],
            $data['UrlDocumento'], $data['NombreArchivo'], $id
        ];
        return $this->executeQuery($query, $params);
    }
}
?>
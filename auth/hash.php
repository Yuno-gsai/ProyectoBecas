<?php
/**
 * Archivo: auth/hash.php
 * Proporciona un servicio para manejar el hasheo y la verificación de claves.
 */

class HashingService {
    /**
     * Crea un hash de clave seguro a partir de una clave en texto plano.
     *
     * @param string $claveEnTextoPlano La clave a hashear.
     * @return string El hash de la clave.
     */
    public static function hashClave(string $claveEnTextoPlano): string {
        // Usa el algoritmo por defecto de PHP, que es fuerte y actualizado.
        return password_hash($claveEnTextoPlano, PASSWORD_DEFAULT);
    }

    /**
     * Verifica si una clave en texto plano coincide con un hash existente.
     *
     * @param string $claveEnTextoPlano La clave en texto plano introducida por el usuario.
     * @param string $hashGuardado El hash guardado en la base de datos.
     * @return bool True si la clave es válida, false en caso contrario.
     */
    public static function verifyClave(string $claveEnTextoPlano, string $hashGuardado): bool {
        return password_verify($claveEnTextoPlano, $hashGuardado);
    }
}
?>
CREATE DATABASE IF NOT EXISTS BECAS;
USE BECAS;

CREATE TABLE IF NOT EXISTS `BE_Direcciones` (
  `id_direccion` int PRIMARY KEY AUTO_INCREMENT,
  `departamento` varchar(100) NOT NULL,
  `municipio` varchar(100) NOT NULL,
  `canton` varchar(100),
  `linea1_direccion` text NOT NULL COMMENT 'Calle, pasaje, número de casa',
  `linea2_direccion` text COMMENT 'Punto de referencia u otros detalles'
);

CREATE TABLE IF NOT EXISTS `BE_Telefonos` (
  `id_telefono` int PRIMARY KEY AUTO_INCREMENT,
  `entidad_id` int NOT NULL COMMENT 'El ID de la tabla a la que pertenece (Aspirante, Institucion, etc.)',
  `tipo_entidad` varchar(50) NOT NULL COMMENT 'Ej: BE_Aspirantes, BE_InstitucionesEducativas, BE_GrupoFamiliar',
  `tipo_telefono` varchar(50) NOT NULL COMMENT 'Ej: Celular, Casa, Trabajo',
  `numero_telefono` varchar(20) NOT NULL
);

CREATE TABLE IF NOT EXISTS `BE_CorreosElectronicos` (
  `id_correo` int PRIMARY KEY AUTO_INCREMENT,
  `entidad_id` int NOT NULL COMMENT 'El ID de la tabla a la que pertenece (Aspirante, Institucion, etc.)',
  `tipo_entidad` varchar(50) NOT NULL COMMENT 'Ej: BE_Aspirantes',
  `direccion_correo` varchar(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS `BE_CarrerasOfertadas` (
  `id_carrera` int PRIMARY KEY AUTO_INCREMENT,
  `id_institucion` int NOT NULL,
  `nombre_carrera` varchar(255) NOT NULL,
  `tipo_carrera` varchar(20) NOT NULL COMMENT 'Universitaria o Técnica',
  `duracion_carrera_anios` int,
  `turno_estudio` varchar(50),
  `costo_matricula` decimal(10,2),
  `matriculas_por_anio` int,
  `cuota_mensual` decimal(10,2),
  `cuotas_por_anio` int,
  `costo_laboratorios` decimal(10,2),
  `otros_costos_carrera` decimal(10,2)
);

CREATE TABLE IF NOT EXISTS `BE_InstitucionesEducativas` (
  `id_institucion` int PRIMARY KEY AUTO_INCREMENT,
  `id_direccion` int UNIQUE NOT NULL,
  `nombre_institucion` varchar(255) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS `BE_InstitucionesBachillerato` (
  `id_institucion_bto` int PRIMARY KEY AUTO_INCREMENT,
  `id_direccion` int NOT NULL,
  `nombre_institucion` varchar(255) NOT NULL,
  `sector_institucion` varchar(10) NOT NULL COMMENT 'Público o Privado'
);

CREATE TABLE IF NOT EXISTS `BE_EspecialidadesBachillerato` (
  `id_especialidad` int PRIMARY KEY AUTO_INCREMENT,
  `nombre_especialidad` varchar(100) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS `BE_TiposDeGasto` (
  `id_tipo_gasto` int PRIMARY KEY AUTO_INCREMENT,
  `nombre_gasto` varchar(100) UNIQUE NOT NULL COMMENT 'Ej: Alimentación, Vivienda, Agua, Cotizaciones, etc.'
);

CREATE TABLE IF NOT EXISTS `BE_GastosMensuales` (
  `id_gasto` int PRIMARY KEY AUTO_INCREMENT,
  `id_solicitud` int NOT NULL,
  `id_tipo_gasto` int NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `descripcion` varchar(255)
);

CREATE TABLE IF NOT EXISTS `BE_TiposDeBien` (
  `id_tipo_bien` int PRIMARY KEY AUTO_INCREMENT,
  `nombre_bien` varchar(100) UNIQUE NOT NULL COMMENT 'Ej: Casa Propia, Casa Alquilada, Vehículo, Moto'
);

CREATE TABLE IF NOT EXISTS `BE_BienesFamiliares` (
  `id_bien_familiar` int PRIMARY KEY AUTO_INCREMENT,
  `id_solicitud` int NOT NULL,
  `id_tipo_bien` int NOT NULL,
  `descripcion` text
);

CREATE TABLE IF NOT EXISTS `BE_TiposDeDocumento` (
  `id_tipo_documento` int PRIMARY KEY AUTO_INCREMENT,
  `nombre_documento` varchar(255) UNIQUE NOT NULL COMMENT 'Ej: Notas de bachillerato, Constancia de conducta, DUI, etc.'
);

CREATE TABLE IF NOT EXISTS `BE_DocumentosAdjuntos` (
  `id_documento` int PRIMARY KEY AUTO_INCREMENT,
  `entidad_id` int NOT NULL,
  `tipo_entidad` varchar(50) NOT NULL,
  `id_tipo_documento` int NOT NULL,
  `url_documento` text NOT NULL,
  `nombre_archivo` varchar(255),
  `fecha_subida` timestamp
);

CREATE TABLE IF NOT EXISTS `BE_Aspirantes` (
  `id_aspirante` int PRIMARY KEY AUTO_INCREMENT,
  `id_direccion_residencia` int UNIQUE NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `primer_apellido` varchar(50) NOT NULL,
  `segundo_apellido` varchar(50),
  `fecha_nacimiento` date NOT NULL,
  `municipio_nacimiento` varchar(100),
  `departamento_nacimiento` varchar(100),
  `genero` varchar(10) NOT NULL,
  `estado_civil` varchar(15) NOT NULL,
  `dui` varchar(10) UNIQUE NOT NULL,
  `nit` varchar(17),
  `grado_escolar_actual` varchar(100),
  `url_foto_perfil` text,
  `perfil_facebook` varchar(255),
  `fecha_creacion` timestamp
);

CREATE TABLE IF NOT EXISTS `BE_Solicitudes` (
  `id_solicitud` int PRIMARY KEY AUTO_INCREMENT,
  `id_aspirante` int NOT NULL,
  `id_carrera_interes` int NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `motivacion_estudio` text,
  `fuente_conocimiento_beca` varchar(50),
  `logros_menciones_honorificas` text,
  `estado_solicitud` varchar(20) NOT NULL DEFAULT 'Recibida'
);

CREATE TABLE IF NOT EXISTS `BE_FormacionBachillerato` (
  `id_formacion` int PRIMARY KEY AUTO_INCREMENT,
  `id_solicitud` int UNIQUE NOT NULL,
  `id_institucion_bto` int NOT NULL,
  `id_especialidad` int,
  `tipo_bachillerato` varchar(50) NOT NULL,
  `pago_mensual` decimal(10,2) DEFAULT 0,
  `fuente_pago_basica` varchar(100),
  `detalle_pago_basica` text
);

CREATE TABLE IF NOT EXISTS `BE_GrupoFamiliar` (
  `id_miembro` int PRIMARY KEY AUTO_INCREMENT,
  `id_solicitud` int NOT NULL,
  `dui` varchar(10),
  `nombre_completo` varchar(150) NOT NULL,
  `parentesco` varchar(50) NOT NULL,
  `edad` int,
  `ocupacion` varchar(100),
  `es_responsable` boolean DEFAULT false
);

CREATE TABLE IF NOT EXISTS `BE_ContactosEmergencia` (
  `id_contacto_emergencia` int PRIMARY KEY AUTO_INCREMENT,
  `id_solicitud` int UNIQUE NOT NULL,
  `id_direccion` int NOT NULL,
  `nombre_completo` varchar(150) NOT NULL,
  `parentesco` varchar(50)
);

CREATE TABLE IF NOT EXISTS `BE_IngresosFamiliares` (
  `id_ingreso` int PRIMARY KEY AUTO_INCREMENT,
  `id_miembro` int UNIQUE NOT NULL,
  `salario_mensual` decimal(10,2) NOT NULL,
  `lugar_trabajo` varchar(255),
  `cargo_desempenado` varchar(100),
  `es_trabajo_independiente` boolean DEFAULT false,
  `descripcion_independiente` text
);

CREATE TABLE IF NOT EXISTS `BE_HistorialBecasAprobadas` (
  `id_historial_beca` int PRIMARY KEY AUTO_INCREMENT,
  `id_solicitud` int UNIQUE NOT NULL,
  `ciclo_academico` varchar(20) NOT NULL,
  `fecha_aprobacion` date NOT NULL,
  `duracion_anios` int,
  `estado_beca` varchar(50) NOT NULL DEFAULT 'Activa',
  `observaciones` text
);

CREATE TABLE IF NOT EXISTS `BE_Usuarios` (
  `id_usuario` int PRIMARY KEY AUTO_INCREMENT,
  `nombre_usuario` varchar(50) UNIQUE NOT NULL,
  `contrasena_hash` varchar(255) NOT NULL,
  `rol_usuario` varchar(20) NOT NULL,
  `correo_electronico` varchar(255) UNIQUE NOT NULL,
  `id_aspirante` int,
  `fecha_creacion` timestamp,
  `ultimo_ingreso` timestamp
);

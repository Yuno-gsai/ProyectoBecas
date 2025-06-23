CREATE DATABASE IF NOT EXISTS Becas;
USE Becas;

CREATE TABLE IF NOT EXISTS BeDirecciones (
  IdDireccion INT PRIMARY KEY AUTO_INCREMENT,
  Departamento INT NOT NULL,
  Municipio INT NOT NULL,
  Distrito INT NOT NULL,
  DireccionExacta TEXT NOT NULL,
  FOREIGN KEY (Departamento) REFERENCES pr_depto(iddepto),
  FOREIGN KEY (Municipio) REFERENCES pr_municipio_n (idmunicipio),
  FOREIGN KEY (Distrito) REFERENCES pr_distrito(iddistrito)
);


CREATE TABLE IF NOT EXISTS BeInstitucionesEducativas (
  IdInstitucion INT PRIMARY KEY AUTO_INCREMENT,
  IdDireccion INT NOT NULL,
  NombreInstitucion VARCHAR(255) NOT NULL,
  FOREIGN KEY (IdDireccion) REFERENCES BeDirecciones(IdDireccion)
);

CREATE TABLE IF NOT EXISTS BeInstitucionesBachillerato (
  IdInstitucionBto INT PRIMARY KEY AUTO_INCREMENT,
  IdDireccion INT NOT NULL,
  NombreInstitucion VARCHAR(255) NOT NULL,
  SectorInstitucion VARCHAR(10) NOT NULL,
  FOREIGN KEY (IdDireccion) REFERENCES BeDirecciones(IdDireccion)
);

CREATE TABLE IF NOT EXISTS BeEspecialidadesBachillerato (
  IdEspecialidad INT PRIMARY KEY AUTO_INCREMENT,
  NombreEspecialidad VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS BeTiposDeGasto (
  IdTipoGasto INT PRIMARY KEY AUTO_INCREMENT,
  NombreGasto VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS BeTiposDeBien (
  IdTipoBien INT PRIMARY KEY AUTO_INCREMENT,
  NombreBien VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS BeTiposDeDocumento (
  IdTipoDocumento INT PRIMARY KEY AUTO_INCREMENT,
  NombreDocumento VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS BeAspirantes (
  IdAspirante INT PRIMARY KEY AUTO_INCREMENT,
  IdDireccion INT NOT NULL,
  Nombres VARCHAR(100) NOT NULL,
  PrimerApellido VARCHAR(50) NOT NULL,
  SegundoApellido VARCHAR(50),
  FechaNacimiento DATE NOT NULL,
  Genero VARCHAR(10) NOT NULL,
  EstadoCivil VARCHAR(15) NOT NULL,
  Dui VARCHAR(10) NOT NULL,
  Nit VARCHAR(17),
  GradoEscolarActual VARCHAR(100),
  UrlFotoPerfil TEXT,
  PerfilFacebook VARCHAR(255),
  FechaCreacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (IdDireccion) REFERENCES BeDirecciones(IdDireccion)
);

CREATE TABLE IF NOT EXISTS BeCarrerasOfertadas (
  IdCarrera INT PRIMARY KEY AUTO_INCREMENT,
  IdInstitucion INT NOT NULL,
  NombreCarrera VARCHAR(255) NOT NULL,
  TipoCarrera VARCHAR(20) NOT NULL,
  DuracionCarreraAnios INT,
  TurnoEstudio VARCHAR(50),
  CostoMatricula DECIMAL(10,2),
  MatriculasPorAnio INT,
  CuotaMensual DECIMAL(10,2),
  CuotasPorAnio INT,
  CostoLaboratorios DECIMAL(10,2),
  OtrosCostosCarrera DECIMAL(10,2),
  FOREIGN KEY (IdInstitucion) REFERENCES BeInstitucionesEducativas(IdInstitucion)
);

CREATE TABLE IF NOT EXISTS BeSolicitudes (
  IdSolicitud INT PRIMARY KEY AUTO_INCREMENT,
  IdAspirante INT NOT NULL,
  IdCarreraInteres INT NOT NULL,
  FechaSolicitud DATE NOT NULL,
  MotivacionEstudio TEXT,
  FuenteConocimientoBeca VARCHAR(50),
  LogrosMencionesHonorificas TEXT,
  EstadoSolicitud VARCHAR(20) NOT NULL DEFAULT 'Recibida',
  FOREIGN KEY (IdAspirante) REFERENCES BeAspirantes(IdAspirante),
  FOREIGN KEY (IdCarreraInteres) REFERENCES BeCarrerasOfertadas(IdCarrera)
);

CREATE TABLE IF NOT EXISTS BeFormacionBachillerato (
  IdFormacion INT PRIMARY KEY AUTO_INCREMENT,
  IdSolicitud INT UNIQUE NOT NULL,
  IdInstitucionBto INT NOT NULL,
  IdEspecialidad INT,
  TipoBachillerato VARCHAR(50) NOT NULL,
  PagoMensual DECIMAL(10,2) DEFAULT 0,
  FuentePagoBasica VARCHAR(100),
  DetallePagoBasica TEXT,
  FOREIGN KEY (IdSolicitud) REFERENCES BeSolicitudes(IdSolicitud),
  FOREIGN KEY (IdInstitucionBto) REFERENCES BeInstitucionesBachillerato(IdInstitucionBto),
  FOREIGN KEY (IdEspecialidad) REFERENCES BeEspecialidadesBachillerato(IdEspecialidad)
);

CREATE TABLE IF NOT EXISTS BeGrupoFamiliar (
  IdMiembro INT PRIMARY KEY AUTO_INCREMENT,
  IdSolicitud INT NOT NULL,
  Dui VARCHAR(10),
  NombreCompleto VARCHAR(150) NOT NULL,
  Parentesco VARCHAR(50) NOT NULL,
  Edad INT,
  Ocupacion VARCHAR(100),
  EsResponsable BOOLEAN DEFAULT FALSE,
  FOREIGN KEY (IdSolicitud) REFERENCES BeSolicitudes(IdSolicitud)
);

CREATE TABLE IF NOT EXISTS BeContactosEmergencia (
  IdContactoEmergencia INT PRIMARY KEY AUTO_INCREMENT,
  IdSolicitud INT UNIQUE NOT NULL,
  IdDireccion INT NOT NULL,
  NombreCompleto VARCHAR(150) NOT NULL,
  Parentesco VARCHAR(50),
  FOREIGN KEY (IdSolicitud) REFERENCES BeSolicitudes(IdSolicitud),
  FOREIGN KEY (IdDireccion) REFERENCES BeDirecciones(IdDireccion)
);

CREATE TABLE IF NOT EXISTS BeIngresosFamiliares (
  IdIngreso INT PRIMARY KEY AUTO_INCREMENT,
  IdMiembro INT UNIQUE NOT NULL,
  SalarioMensual DECIMAL(10,2) NOT NULL,
  LugarTrabajo VARCHAR(255),
  CargoDesempenado VARCHAR(100),
  EsTrabajoIndependiente BOOLEAN DEFAULT FALSE,
  DescripcionIndependiente TEXT,
  FOREIGN KEY (IdMiembro) REFERENCES BeGrupoFamiliar(IdMiembro)
);

CREATE TABLE IF NOT EXISTS BeGastosMensuales (
  IdGasto INT PRIMARY KEY AUTO_INCREMENT,
  IdSolicitud INT NOT NULL,
  IdTipoGasto INT NOT NULL,
  Monto DECIMAL(10,2) NOT NULL,
  Descripcion VARCHAR(255),
  FOREIGN KEY (IdSolicitud) REFERENCES BeSolicitudes(IdSolicitud),
  FOREIGN KEY (IdTipoGasto) REFERENCES BeTiposDeGasto(IdTipoGasto)
);

CREATE TABLE IF NOT EXISTS BeBienesFamiliares (
  IdBienFamiliar INT PRIMARY KEY AUTO_INCREMENT,
  IdSolicitud INT NOT NULL,
  IdTipoBien INT NOT NULL,
  Descripcion TEXT,
  FOREIGN KEY (IdSolicitud) REFERENCES BeSolicitudes(IdSolicitud),
  FOREIGN KEY (IdTipoBien) REFERENCES BeTiposDeBien(IdTipoBien)
);

CREATE TABLE IF NOT EXISTS BeHistorialBecasAprobadas (
  IdHistorialBeca INT PRIMARY KEY AUTO_INCREMENT,
  IdSolicitud INT UNIQUE NOT NULL,
  CicloAcademico VARCHAR(20) NOT NULL,
  FechaAprobacion DATE NOT NULL,
  DuracionAnios INT,
  EstadoBeca VARCHAR(50) NOT NULL DEFAULT 'Activa',
  Observaciones TEXT,
  FOREIGN KEY (IdSolicitud) REFERENCES BeSolicitudes(IdSolicitud)
);

CREATE TABLE IF NOT EXISTS BeUsuarios (
  IdUsuario INT PRIMARY KEY AUTO_INCREMENT,
  NombreUsuario VARCHAR(50) NOT NULL,
  ContrasenaHash VARCHAR(255) NOT NULL,
  RolUsuario VARCHAR(20) NOT NULL,
  CorreoElectronico VARCHAR(255) NOT NULL,
  IdAspirante INT,
  FechaCreacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  UltimoIngreso TIMESTAMP,
  FOREIGN KEY (IdAspirante) REFERENCES BeAspirantes(IdAspirante)
);

CREATE TABLE IF NOT EXISTS BeDocumentosAdjuntos (
  IdDocumento INT PRIMARY KEY AUTO_INCREMENT,
  EntidadId INT NOT NULL,
  TipoEntidad VARCHAR(50) NOT NULL,
  IdTipoDocumento INT NOT NULL,
  UrlDocumento TEXT NOT NULL,
  NombreArchivo VARCHAR(255),
  FechaSubida TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (IdTipoDocumento) REFERENCES BeTiposDeDocumento(IdTipoDocumento)
);
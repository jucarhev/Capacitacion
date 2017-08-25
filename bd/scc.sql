CREATE TABLE IF NOT EXISTS aviso (
  id int(10) NOT NULL AUTO_INCREMENT,
  usuario varchar(50) NOT NULL,
  tipouser varchar(50) NOT NULL,
  aviso varchar(200) NOT NULL,
  destino varchar(50) NOT NULL,
  unidad varchar(50) NOT NULL,
  fecha timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  primary key(id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS curso (
  id int(10) NOT NULL AUTO_INCREMENT,
  nombre varchar(100) DEFAULT NULL,
  objetivos varchar(100) DEFAULT NULL,
  departamento varchar(50) DEFAULT NULL,
  unidad varchar(50) DEFAULT NULL,
  planeado varchar(50) DEFAULT NULL,
  instructor varchar(50) DEFAULT NULL,
  status varchar(50) DEFAULT NULL,
  terminado varchar(10) DEFAULT NULL,
  aprobado varchar(50) DEFAULT NULL,
  anio year(4) DEFAULT NULL,
  lugar varchar(100) DEFAULT NULL,
  rubro varchar(50) DEFAULT NULL,
  norma varchar(50) DEFAULT NULL,
  fechaelaboracion timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY(id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS departamento (
  id int(10) NOT NULL AUTO_INCREMENT,
  departamento varchar(100) NOT NULL,
  unidad int(10) NOT NULL,
  PRIMARY KEY(id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS dnc (
  id int(10) NOT NULL AUTO_INCREMENT,
  curso varchar(100) DEFAULT NULL,
  mes varchar(20) DEFAULT NULL,
  nocobro int(10) DEFAULT NULL,
  departamento varchar(50) DEFAULT NULL,
  unidad varchar(50) DEFAULT NULL,
  calactual varchar(5) DEFAULT NULL,
  calplan varchar(5) DEFAULT NULL,
  calobtenida varchar(10) DEFAULT NULL,
  anio varchar(10) DEFAULT NULL,
  tipoEmpleado varchar(20) DEFAULT NULL,
  status varchar(2) DEFAULT NULL,
  calApli int(5) DEFAULT NULL,
  PRIMARY KEY(id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS emplpres (
  id int(10) NOT NULL AUTO_INCREMENT,
  idEmpl int(10) DEFAULT NULL,
  id_presupuestado int(10) DEFAULT NULL,
  PRIMARY KEY(id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS errores (
  id int(10) NOT NULL AUTO_INCREMENT,
  clave varchar(50) NOT NULL,
  descripcion varchar(100) NOT NULL,
  tipouser varchar(50) NOT NULL,
  unidad varchar(50) NOT NULL,
  fecha timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY(id)
) ENGINE=InnoDB ;

CREATE TABLE IF NOT EXISTS fotos (
  id_foto int(11) NOT NULL AUTO_INCREMENT,
  nombre_foto varchar(71) NOT NULL,
  PRIMARY KEY(id_foto)
) ENGINE=InnoDB;

INSERT INTO fotos (id_foto, nombre_foto) VALUES
(1, 'logo.png');

CREATE TABLE IF NOT EXISTS listas (
  id int(10) NOT NULL AUTO_INCREMENT,
  unidad varchar(50) DEFAULT NULL,
  departamento varchar(50) DEFAULT NULL,
  duracion varchar(5) DEFAULT NULL,
  nombrecurso varchar(100) DEFAULT NULL,
  lugar varchar(50) DEFAULT NULL,
  instructor varchar(50) DEFAULT NULL,
  rubro varchar(50) DEFAULT NULL,
  horainicio varchar(5) DEFAULT NULL,
  horafin varchar(5) DEFAULT NULL,
  fechainicio date DEFAULT NULL,
  fechafin date DEFAULT NULL,
  noasist int(5) DEFAULT NULL,
  status varchar(10) DEFAULT NULL,
  anio int(5) DEFAULT NULL,
  mes varchar(20) DEFAULT NULL,
  PRIMARY KEY(id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS meses (
  id int(10) NOT NULL AUTO_INCREMENT,
  idcurso int(10) NOT NULL,
  Enero decimal(5,2) DEFAULT '0.00',
  Enerohsp decimal(5,2) DEFAULT '0.00',
  Enerohnp decimal(5,2) DEFAULT '0.00',
  Enerohr decimal(5,2) DEFAULT '0.00',
  Eneroap int(5) DEFAULT '0',
  Eneroanp int(5) DEFAULT '0',
  Eneroar varchar(5) DEFAULT '0',
  Febrero decimal(5,2) DEFAULT '0.00',
  Febrerohsp decimal(5,2) DEFAULT '0.00',
  Febrerohnp decimal(5,2) DEFAULT '0.00',
  Febrerohr decimal(5,2) DEFAULT '0.00',
  Febreroap int(5) DEFAULT '0',
  Febreroanp int(5) DEFAULT '0',
  Febreroar int(5) DEFAULT '0',
  Marzo decimal(5,2) DEFAULT '0.00',
  Marzohsp decimal(5,2) DEFAULT '0.00',
  Marzohnp decimal(5,2) DEFAULT '0.00',
  Marzohr decimal(5,2) DEFAULT '0.00',
  Marzoap int(5) DEFAULT '0',
  Marzoanp int(5) DEFAULT '0',
  Marzoar int(5) DEFAULT '0',
  Abril decimal(5,2) DEFAULT '0.00',
  Abrilhsp decimal(5,2) DEFAULT '0.00',
  Abrilhnp decimal(5,2) DEFAULT '0.00',
  Abrilhr decimal(5,2) DEFAULT '0.00',
  Abrilap int(5) DEFAULT '0',
  Abrilanp int(5) DEFAULT '0',
  Abrilar int(5) DEFAULT '0',
  Mayo decimal(5,2) DEFAULT '0.00',
  Mayohsp decimal(5,2) DEFAULT '0.00',
  Mayohnp decimal(5,2) DEFAULT '0.00',
  Mayohr decimal(5,2) DEFAULT '0.00',
  Mayoasp int(5) DEFAULT '0',
  Mayoanp int(5) DEFAULT '0',
  Mayoar int(5) DEFAULT '0',
  Junio decimal(5,2) DEFAULT '0.00',
  Juniohsp decimal(5,2) DEFAULT '0.00',
  Juniohnp decimal(5,2) DEFAULT '0.00',
  Juniohr decimal(5,2) DEFAULT '0.00',
  Junioasp int(5) DEFAULT '0',
  Junioanp int(5) DEFAULT '0',
  Junioar int(5) DEFAULT '0',
  Julio decimal(5,2) DEFAULT '0.00',
  Juliohsp decimal(5,2) DEFAULT '0.00',
  Juliohnp decimal(5,2) DEFAULT '0.00',
  Juliohr decimal(5,2) DEFAULT '0.00',
  Julioasp int(5) DEFAULT '0',
  Julioanp int(5) DEFAULT '0',
  Julioar int(5) DEFAULT '0',
  Agosto decimal(5,2) DEFAULT '0.00',
  Agostohsp decimal(5,2) DEFAULT '0.00',
  Agostohnp decimal(5,2) DEFAULT '0.00',
  Agostohr decimal(5,2) DEFAULT '0.00',
  Agostoasp int(5) DEFAULT '0',
  Agostoanp int(5) DEFAULT '0',
  Agostoar int(5) DEFAULT '0',
  Septiembre decimal(5,2) DEFAULT '0.00',
  Septiembrehsp decimal(5,2) DEFAULT '0.00',
  Septiembrehnp decimal(5,2) DEFAULT '0.00',
  Septiembrehr decimal(5,2) DEFAULT '0.00',
  Septiembreasp int(5) DEFAULT '0',
  Septiembreanp int(5) DEFAULT '0',
  Septiembrear int(5) DEFAULT '0',
  Octubre decimal(5,2) DEFAULT '0.00',
  Octubrehsp decimal(5,2) DEFAULT '0.00',
  Octubrehnp decimal(5,2) DEFAULT '0.00',
  Octubrehr decimal(5,2) DEFAULT '0.00',
  Octubreasp int(5) DEFAULT '0',
  Octubreanp int(5) DEFAULT '0',
  Octubrear int(5) DEFAULT '0',
  Noviembre decimal(5,2) DEFAULT '0.00',
  Noviembrehsp decimal(5,2) DEFAULT '0.00',
  Noviembrehnp decimal(5,2) DEFAULT '0.00',
  Noviembrehr decimal(5,2) DEFAULT '0.00',
  Noviembreasp int(5) DEFAULT '0',
  Noviembreanp int(5) DEFAULT '0',
  Noviembrear int(5) DEFAULT '0',
  Diciembre decimal(5,2) DEFAULT '0.00',
  Diciembrehsp decimal(5,2) DEFAULT '0.00',
  Diciembrehnp decimal(5,2) DEFAULT '0.00',
  Diciembrehr decimal(5,2) DEFAULT '0.00',
  Diciembreasp int(5) DEFAULT '0',
  Diciembreanp int(5) DEFAULT '0',
  Diciembrear int(5) DEFAULT '0',
  HrsPlan decimal(5,2) DEFAULT '0.00',
  HrsNPlan decimal(5,2) DEFAULT '0.00',
  HrsReales decimal(5,2) DEFAULT '0.00',
  AsistPlan int(5) DEFAULT '0',
  AsistNpla int(5) DEFAULT '0',
  AsistReal int(5) DEFAULT '0',
  hh varchar(5) DEFAULT NULL,
  hc varchar(5) DEFAULT NULL,
  PRIMARY KEY(id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS normas (
  id int(10) NOT NULL  AUTO_INCREMENT,
  codigo varchar(50) DEFAULT NULL,
  nombrenorma varchar(50) DEFAULT NULL,
  idrubro int(10) DEFAULT NULL,
  PRIMARY KEY(id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS presupuestado (
  id int(10) NOT NULL  AUTO_INCREMENT,
  nombre varchar(200) DEFAULT NULL,
  imparte varchar(50) DEFAULT NULL,
  lugar varchar(100) DEFAULT NULL,
  duracion varchar(10) DEFAULT NULL,
  numpersonas int(10) DEFAULT NULL,
  objetivos varchar(400) DEFAULT NULL,
  costocurso varchar(10) DEFAULT NULL,
  transporte varchar(10) DEFAULT NULL,
  alimentacion varchar(10) DEFAULT NULL,
  hospedaje varchar(10) DEFAULT NULL,
  otros varchar(10) DEFAULT NULL,
  invpersona varchar(10) DEFAULT NULL,
  invtotal varchar(10) DEFAULT NULL,
  status varchar(50) DEFAULT NULL,
  departamento varchar(50) DEFAULT NULL,
  unidad varchar(50) DEFAULT NULL,
  anio int(5) DEFAULT NULL,
  PRIMARY KEY(id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS rubro (
  id int(10) NOT NULL AUTO_INCREMENT,
  rubro varchar(50) DEFAULT NULL,
  idunidad int(10) DEFAULT NULL,
  PRIMARY KEY(id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS trabajador (
  id int(10) NOT NULL AUTO_INCREMENT,
  numerocobro int(10) DEFAULT NULL,
  numeroficha varchar(10) DEFAULT NULL,
  nombre varchar(50) DEFAULT NULL,
  apaterno varchar(50) DEFAULT NULL,
  amaterno varchar(50) DEFAULT NULL,
  curp varchar(20) DEFAULT NULL,
  rfc varchar(20) DEFAULT NULL,
  sueldo double DEFAULT NULL,
  departamento varchar(50) DEFAULT NULL,
  unidad varchar(50) DEFAULT NULL,
  categoria varchar(50) DEFAULT NULL,
  fechanacimiento date DEFAULT NULL,
  activo varchar(20) DEFAULT NULL,
  estadocivil varchar(20) DEFAULT NULL,
  hijos int(10) DEFAULT NULL,
  discapacidad varchar(50) DEFAULT NULL,
  estado varchar(50) DEFAULT NULL,
  municipio varchar(50) DEFAULT NULL,
  ocupacion varchar(50) DEFAULT NULL,
  estudios varchar(50) DEFAULT NULL,
  imagen varchar(100) DEFAULT NULL,
  documentoprobatorio varchar(40) DEFAULT NULL,
  aniodocumento int(5) DEFAULT NULL,
  institucion varchar(50) DEFAULT NULL,
  carrera varchar(20) DEFAULT NULL,
  imss varchar(50) DEFAULT NULL,
  tipotrabajador varchar(50) DEFAULT NULL,
  genero varchar(20) DEFAULT NULL,
  fechaingreso date DEFAULT NULL,
  PRIMARY KEY(id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS trabajadorcurso (
  id int(10) NOT NULL AUTO_INCREMENT,
  idtrabajador int(10) NOT NULL,
  idlista int(10) NOT NULL,
  status varchar(20) DEFAULT NULL,
  PRIMARY KEY(id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS unidad (
  id int(10) NOT NULL AUTO_INCREMENT,
  nombre varchar(50) NOT NULL,
  rfc varchar(50) DEFAULT NULL,
  imss varchar(50) DEFAULT NULL,
  curp varchar(50) DEFAULT NULL,
  calle varchar(50) DEFAULT NULL,
  colonia varchar(50) DEFAULT NULL,
  nointerior int(50) DEFAULT NULL,
  noexterior int(50) DEFAULT NULL,
  codigopostal int(5) DEFAULT NULL,
  fax varchar(50) DEFAULT NULL,
  email varchar(50) DEFAULT NULL,
  telefono varchar(20) DEFAULT NULL,
  localidad varchar(50) DEFAULT NULL,
  municipio varchar(50) DEFAULT NULL,
  estado varchar(50) DEFAULT NULL,
  actividad varchar(200) DEFAULT NULL,
  logo varchar(100) DEFAULT NULL,
  PRIMARY KEY(id)
) ENGINE=InnoDB;

INSERT INTO unidad (id, nombre, rfc, imss, curp, calle, colonia, nointerior, noexterior, codigopostal, fax, email, telefono, localidad, municipio, estado, actividad, logo) VALUES
(1, 'Administrador', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

CREATE TABLE IF NOT EXISTS usuario (
  id int(10) NOT NULL AUTO_INCREMENT,
  nombreuser varchar(100) DEFAULT NULL,
  usuario varchar(50) NOT NULL,
  password varchar(50) NOT NULL,
  tipouser varchar(50) NOT NULL,
  idDepartamento int(10) DEFAULT NULL,
  unidad varchar(50) DEFAULT NULL,
  variable varchar(20) DEFAULT NULL,
  anio int(5) DEFAULT NULL,
  PRIMARY KEY(id)
) ENGINE=InnoDB;

INSERT INTO usuario (id, nombreuser, usuario, password, tipouser, idDepartamento, unidad, variable, anio) VALUES
(1, NULL, 'adm', '123', 'Administrador', 0, 'Administrador', '1', 2014);

CREATE TABLE IF NOT EXISTS utilidades (
  id int(5) NOT NULL AUTO_INCREMENT,
  logo varchar(200) DEFAULT NULL,
  texto varchar(200) DEFAULT NULL,
  color varchar(200) DEFAULT NULL,
  notas varchar(200) DEFAULT NULL,
  PRIMARY KEY(id)
) ENGINE=InnoDB;

INSERT INTO utilidades (id, logo, texto, color, notas) VALUES
(1, 'logo.png', NULL, NULL, NULL);

ALTER TABLE departamento
ADD CONSTRAINT departamento_ibfk_1 FOREIGN KEY (unidad) REFERENCES unidad (id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE normas
ADD CONSTRAINT normas_ibfk_1 FOREIGN KEY (idrubro) REFERENCES rubro (id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE rubro
ADD CONSTRAINT rubro_ibfk_1 FOREIGN KEY (idunidad) REFERENCES unidad (id) ON DELETE CASCADE ON UPDATE CASCADE;
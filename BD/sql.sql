CREATE TABLE Administrador (
  Id DOUBLE NOT NULL,
  Nombres VARCHAR(50) NOT NULL,
  pApellido VARCHAR(25) NOT NULL,
  sApellido VARCHAR(25) NULL,
  Direccion VARCHAR(30) NOT NULL,
  Telefono DOUBLE NULL,
  Correo VARCHAR(30) NULL,
  Contrasena VARCHAR(20) NULL,
  PRIMARY KEY(Id)
);

CREATE TABLE Alumno (
  Id DOUBLE NOT NULL,
  Nombres VARCHAR(50) NOT NULL,
  pApellido VARCHAR(25) NOT NULL,
  sApellido VARCHAR(25) NULL,
  Direccion VARCHAR(30) NOT NULL,
  Telefono DOUBLE NULL,
  Correo VARCHAR(30) NULL,
  PRIMARY KEY(Id)
);

CREATE TABLE Asignatura (
  Codigo VARCHAR(20) NOT NULL,
  Nombre VARCHAR(30) NOT NULL,
  Profesor_Id DOUBLE NULL,
  PRIMARY KEY(Codigo),
  INDEX Asignatura_FKIndex1(Profesor_Id)
);

CREATE TABLE Curso (
  Codigo VARCHAR(20) NOT NULL,
  Nombre VARCHAR(20) NOT NULL,
  PRIMARY KEY(Codigo)
);

CREATE TABLE Nota (
  Asignatura_Codigo VARCHAR(20) NOT NULL,
  Alumno_Id DOUBLE NOT NULL,
  Nota1 FLOAT NULL,
  Fecha1 DATE NULL,
  Nota2 FLOAT NULL,
  Fecha2 DATE NULL,
  Nota3 FLOAT NULL,
  Fecha3 DATE NULL,
  NotaFinal FLOAT NULL,
  PRIMARY KEY(Asignatura_Codigo, Alumno_Id),
  INDEX Alumno_has_Asignatura_FKIndex1(Alumno_Id),
  INDEX Alumno_has_Asignatura_FKIndex2(Asignatura_Codigo)
);

CREATE TABLE Pensum (
  Asignatura_Codigo VARCHAR(20) NOT NULL,
  Curso_Codigo VARCHAR(20) NOT NULL,
  PRIMARY KEY(Asignatura_Codigo, Curso_Codigo),
  INDEX Asignatura_has_Curso_FKIndex1(Asignatura_Codigo),
  INDEX Asignatura_has_Curso_FKIndex2(Curso_Codigo)
);

CREATE TABLE Profesor (
  Id DOUBLE NOT NULL,
  Nombres VARCHAR(50) NOT NULL,
  pApellido VARCHAR(25) NOT NULL,
  sApellido VARCHAR(25) NULL,
  Direccion VARCHAR(30) NOT NULL,
  Telefono DOUBLE NULL,
  Correo VARCHAR(30) NULL,
  PRIMARY KEY(Id)
);



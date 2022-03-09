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
  PRIMARY KEY(Codigo)
);

CREATE TABLE Clase (
  Asignatura_Codigo VARCHAR(20) NOT NULL,
  Profesor_Id DOUBLE NOT NULL,
  PRIMARY KEY(Asignatura_Codigo, Profesor_Id),
  INDEX Asignatura_has_Profesor_FKIndex1(Asignatura_Codigo),
  INDEX Asignatura_has_Profesor_FKIndex2(Profesor_Id)
);

CREATE TABLE Curso (
  Codigo VARCHAR(50) NOT NULL,
  Nombre VARCHAR(50) NOT NULL,
  Duracion VARCHAR(50) NULL,
  PRIMARY KEY(Codigo)
);

CREATE TABLE Matricula (
  Alumno_Id DOUBLE NOT NULL,
  Curso_Codigo VARCHAR(50) NOT NULL,
  Fecha DATE NULL,
  PRIMARY KEY(Alumno_Id, Curso_Codigo),
  INDEX Alumno_has_Curso_FKIndex1(Alumno_Id),
  INDEX Alumno_has_Curso_FKIndex2(Curso_Codigo)
);

CREATE TABLE Nota (
  Asignatura_Codigo VARCHAR(20) NOT NULL,
  Alumno_Id DOUBLE NOT NULL,
  Nota_Id INT NOT NULL,
  Descripcion VARCHAR(100) NULL,
  Nota FLOAT NULL,
  Fecha DATE NULL,
  PRIMARY KEY(Asignatura_Codigo, Alumno_Id),
  INDEX Alumno_has_Asignatura_FKIndex1(Alumno_Id),
  INDEX Alumno_has_Asignatura_FKIndex2(Asignatura_Codigo)
);

CREATE TABLE Pensum (
  Asignatura_Codigo VARCHAR(20) NOT NULL,
  Curso_Codigo VARCHAR(50) NOT NULL,
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



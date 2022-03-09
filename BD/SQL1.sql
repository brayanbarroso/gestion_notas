CREATE TABLE Curso (
  id INT  NOT NULL   AUTO_INCREMENT,
  Codigo VARCHAR(50)  NOT NULL  ,
  Curso VARCHAR(50)  NOT NULL  ,
  Duracion VARCHAR(50)  NULL  ,
  Fecha_creacion DATETIME  NOT NULL    ,
PRIMARY KEY(id));



CREATE TABLE Profesor (
  Id INT  NOT NULL   AUTO_INCREMENT,
  Tipo VARCHAR(50)  NOT NULL  ,
  Doc INTEGER UNSIGNED  NOT NULL  ,
  Nombres VARCHAR(50)  NOT NULL  ,
  pApellido VARCHAR(25)  NOT NULL  ,
  sApellido VARCHAR(25)  NULL  ,
  Direccion VARCHAR(30)  NOT NULL  ,
  Telefono DOUBLE  NULL  ,
  Correo VARCHAR(30)  NULL  ,
  Contrasena VARCHAR(50)  NOT NULL  ,
  Fecha_Creacion DATETIME  NOT NULL    ,
PRIMARY KEY(Id));



CREATE TABLE Asignatura (
  Id INT  NOT NULL   AUTO_INCREMENT,
  Codigo VARCHAR(20)  NOT NULL  ,
  Asignatura VARCHAR(30) BINARY  NOT NULL  ,
  Credito INTEGER UNSIGNED  NULL  ,
  Fecha_Creacion DATETIME  NULL    ,
PRIMARY KEY(Id));



CREATE TABLE Alumno (
  Id INT  NOT NULL   AUTO_INCREMENT,
  Tipo VARCHAR(50)  NULL  ,
  Doc INTEGER UNSIGNED  NOT NULL  ,
  Nombres VARCHAR(50)  NOT NULL  ,
  pApellido VARCHAR(25)  NOT NULL  ,
  sApellido VARCHAR(25)  NULL  ,
  Direccion VARCHAR(30)  NOT NULL  ,
  Telefono DOUBLE  NULL  ,
  Correo VARCHAR(30)  NULL  ,
  Contrasena VARCHAR(50)  NOT NULL  ,
  Fecha_Creacion DATETIME  NOT NULL    ,
PRIMARY KEY(Id));



CREATE TABLE Administrador (
  Id INT  NOT NULL   AUTO_INCREMENT,
  Nombres VARCHAR(50)  NOT NULL  ,
  pApellido VARCHAR(25)  NOT NULL  ,
  sApellido VARCHAR(25)  NULL  ,
  Direccion VARCHAR(30)  NOT NULL  ,
  Telefono DOUBLE  NULL  ,
  Correo VARCHAR(30)  NULL  ,
  User_Admin VARCHAR(25)  NOT NULL  ,
  Contrasena VARCHAR(20)  NOT NULL    ,
PRIMARY KEY(Id));



CREATE TABLE Pensum (
  Asignatura_Id INT  NOT NULL  ,
  Curso_id INT  NOT NULL  ,
  Semestre INTEGER UNSIGNED  NOT NULL    ,
PRIMARY KEY(Asignatura_Id, Curso_id)  ,
INDEX Asignatura_has_Curso_FKIndex1(Asignatura_Id)  ,
INDEX Asignatura_has_Curso_FKIndex2(Curso_id),
  FOREIGN KEY(Asignatura_Id)
    REFERENCES Asignatura(Id)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(Curso_id)
    REFERENCES Curso(id)
      ON DELETE CASCADE
      ON UPDATE CASCADE);



CREATE TABLE Nota (
  Asignatura_Id INT  NOT NULL  ,
  Alumno_Id INT  NOT NULL  ,
  Nota_1 FLOAT  NULL  ,
  Nota_2 FLOAT  NULL  ,
  Nota_3 FLOAT  NULL  ,
  Definitiva FLOAT  NULL    ,
INDEX Nota_FKIndex1(Asignatura_Id)  ,
INDEX Nota_FKIndex2(Alumno_Id),
  FOREIGN KEY(Asignatura_Id)
    REFERENCES Asignatura(Id)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(Alumno_Id)
    REFERENCES Alumno(Id)
      ON DELETE CASCADE
      ON UPDATE CASCADE);



CREATE TABLE Clase (
  Profesor_Id INT  NOT NULL  ,
  Asignatura_Id INT  NOT NULL    ,
PRIMARY KEY(Profesor_Id, Asignatura_Id)  ,
INDEX Asignatura_has_Profesor_FKIndex1(Asignatura_Id)  ,
INDEX Asignatura_has_Profesor_FKIndex2(Profesor_Id),
  FOREIGN KEY(Asignatura_Id)
    REFERENCES Asignatura(Id)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(Profesor_Id)
    REFERENCES Profesor(Id)
      ON DELETE CASCADE
      ON UPDATE CASCADE);



CREATE TABLE Matricula (
  Alumno_Id INT  NOT NULL  ,
  Curso_id INT  NOT NULL  ,
  Fecha DATE  NULL    ,
PRIMARY KEY(Alumno_Id, Curso_id)  ,
INDEX Alumno_has_Curso_FKIndex1(Alumno_Id)  ,
INDEX Alumno_has_Curso_FKIndex2(Curso_id),
  FOREIGN KEY(Alumno_Id)
    REFERENCES Alumno(Id)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(Curso_id)
    REFERENCES Curso(id)
      ON DELETE CASCADE
      ON UPDATE CASCADE);





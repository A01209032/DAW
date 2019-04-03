
CREATE TABLE ClientesBanca(
  NoCuenta  varchar(5) NOT NULL,
  Nombre    varchar(30),
  Saldo     numeric(10,2),
  CONSTRAINT PK_Clientes PRIMARY KEY (NoCuenta)
  );

CREATE TABLE TipoMovimiento(
  ClaveM      varchar(2) NOT NULL,
  Descripcion varchar(30),
  CONSTRAINT PK_Movimientos PRIMARY KEY (ClaveM)
  );

CREATE TABLE Movimientos(
  NoCuenta  varchar(5) NOT NULL,
  ClaveM    varchar(2) NOT NULL,
  Fecha     datetime NOT NULL ,
  Monto     numeric(10,2),
  CONSTRAINT PK_MovimientosR PRIMARY KEY (NoCuenta,ClaveM,Fecha),
  CONSTRAINT FK_Clientes FOREIGN KEY (NoCuenta) REFERENCES ClientesBanca(NoCuenta),
  CONSTRAINT FK_Movimientos FOREIGN KEY (ClaveM) REFERENCES TipoMovimiento(ClaveM)
  );


BEGIN TRANSACTION PRUEBA1
INSERT INTO ClientesBanca VALUES('001', 'Manuel Rios Maldonado', 9000);
INSERT INTO ClientesBanca VALUES('002', 'Pablo Perez Ortiz', 5000);
INSERT INTO ClientesBanca VALUES('003', 'Luis Flores Alvarado', 8000);
COMMIT TRANSACTION PRUEBA1



SELECT * FROM ClientesBanca


BEGIN TRANSACTION PRUEBA2
INSERT INTO ClientesBanca VALUES('004','Ricardo Rios Maldonado',19000);
INSERT INTO ClientesBanca VALUES('005','Pablo Ortiz Arana',15000);
INSERT INTO ClientesBanca VALUES('006','Luis Manuel Alvarado',18000);

ROLLBACK TRANSACTION PRUEBA2

BEGIN TRANSACTION PRUEBA3
INSERT INTO TipoMovimiento VALUES('A','Retiro Cajero Automatico');
INSERT INTO TipoMovimiento VALUES('B','Deposito Ventanilla');
COMMIT TRANSACTION PRUEBA3

BEGIN TRANSACTION PRUEBA4
INSERT INTO Movimientos VALUES('001','A',GETDATE(),500);
UPDATE ClientesBanca SET SALDO = SALDO -500
WHERE NoCuenta='001'
COMMIT TRANSACTION PRUEBA4

SELECT * FROM ClientesBanca
SELECT * FROM TipoMovimiento
SELECT * FROM Movimientos

BEGIN TRANSACTION PRUEBA5
INSERT INTO ClientesBanca  VALUES('005','Rosa Ruiz Maldonado',9000);
INSERT INTO ClientesBanca VALUES('006','Luis Camino Ortiz',5000);
INSERT INTO ClientesBanca VALUES('001','Oscar Perez Alvarado',8000);


IF @@ERROR = 0
COMMIT TRANSACTION PRUEBA5
ELSE
BEGIN
PRINT 'A transaction needs to be rolled back'
ROLLBACK TRANSACTION PRUEBA5
END

SELECT * FROM Movimientos
SELECT * FROM ClientesBanca




IF EXISTS (SELECT name FROM sysobject
WHERE name = 'REGISTRAR_RETIRO_CAJERO' AND type = 'P')
            DROP PROCEDURE REGISTRAR_RETIRO_CAJERO

CREATE PROCEDURE REGISTRAR_RETIRO_CAJERO
  @uNoCuenta varchar(5) ,
  @uMonto NUMERIC(10,2)

AS
  BEGIN transaction RETIRO_CAJERO
  INSERT INTO Movimientos VALUES(@uNoCuenta,'A',GETDATE(),@uMonto);
  UPDATE ClientesBanca SET SALDO = SALDO -@uMonto
  WHERE NoCuenta=@uNoCuenta

  IF @@ERROR = 0
  COMMIT TRANSACTION RETIRO_CAJERO
  ELSE
  BEGIN
  PRINT 'A transaction needs to be rolled back'
  ROLLBACK TRANSACTION RETIRO_CAJERO
  END
GO


IF EXISTS (SELECT name FROM sysobject
WHERE name = 'REGISTRAR_DEPOSITO_VENTANILLA' AND type = 'P')
            DROP PROCEDURE REGISTRAR_DEPOSITO_VENTANILLA

CREATE PROCEDURE REGISTRAR_DEPOSITO_VENTANILLA
  @uNoCuenta varchar(5) ,
  @uMonto NUMERIC(10,2)

AS
  BEGIN transaction DEPOSITO_VENTANILLA
  INSERT INTO Movimientos VALUES(@uNoCuenta,'B',GETDATE(),@uMonto);
  UPDATE ClientesBanca SET SALDO = SALDO +@uMonto
  WHERE NoCuenta=@uNoCuenta

  IF @@ERROR = 0
  COMMIT TRANSACTION DEPOSITO_VENTANILLA
  ELSE
  BEGIN
  PRINT 'A transaction needs to be rolled back'
  ROLLBACK TRANSACTION DEPOSITO_VENTANILLA
  END
GO




INSERT INTO Movimientos values()
UPDATE ClientesBanca set Saldo = Saldo + 1000
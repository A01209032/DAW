CREATE PROCEDURE creaMaterial
          @uclave NUMERIC(5,0),
          @udescripcion VARCHAR(50),
                     @ucosto NUMERIC(8,2),
                     @uimpuesto NUMERIC(6,2)
                 AS
                     INSERT INTO Materiales VALUES(@uclave, @udescripcion, @ucosto, @uimpuesto)


CREATE PROCEDURE eliminaMaterial
                     @uclave NUMERIC(5,0)
                 AS
                     DELETE FROM Materiales WHERE @uclave = Clave


 CREATE PROCEDURE modificarMaterial
                     @uclave numeric(5),
                     @udesc varchar(50),
                     @ucosto numeric(8,2),
                     @uimpuesto numeric(6,2)
                  AS
                     UPDATE Materiales SET Descripcion = @udesc, Costo = @ucosto, PorcentajeImpuesto = @uimpuesto WHERE  @uclave = Clave

CREATE PROCEDURE creaProveedor
                     @uRFC char(13),
                     @uRS VARCHAR(50)
                 AS
                     INSERT INTO Proveedores VALUES(@uRFC, @uRS)

CREATE PROCEDURE modificarProveedor
                     @uRFC char(13),
                     @uRazonSocial VARCHAR(50)
                 AS
                     UPDATE Proveedores SET RazonSocial = @uRazonSocial WHERE  @uRFC = RFC



CREATE PROCEDURE eliminaProveedor
                     @uRFC char(13)
                 AS
                     DELETE FROM Proveedores WHERE @uRFC = RFC



CREATE PROCEDURE creaProyecto
                @unumero numeric(5),
                @udenominacion VARCHAR(50)
            AS
                INSERT INTO Proyectos VALUES(@unumero, @udenominacion)
            GO


CREATE PROCEDURE modificarProyecto
                @unumero numeric(5),
                @udenominacion VARCHAR(50)
            AS
                UPDATE Proyectos SET Denominacion = @udenominacion WHERE  @unumero = Numero
            GO



CREATE PROCEDURE eliminaProyecto
                @unumero numeric(5)
            AS
                DELETE FROM Proyectos WHERE @unumero = Numero
            GO



set dateformat dmy

CREATE PROCEDURE creaEntrega
                @uclave numeric(5),
                @uRFC char(13),
                @unumero numeric(5),
                @ufecha datetime,
                @ucantidad numeric(8,2)
            AS
                INSERT INTO Entregan VALUES(@uclave, @uRFC, @unumero, @ufecha, @ucantidad)
            GO


CREATE PROCEDURE modificarEntrega
                @uclave numeric(5),
                @uRFC char(13),
                @unumero numeric(5),
                @ufecha datetime,
                @ucantidad numeric(8,2)
            AS
                UPDATE  Entregan SET Cantidad = @ucantidad WHERE  @uclave = Clave and @uRFC = RFC and @unumero = Numero and @ufecha = Fecha
            GO


CREATE PROCEDURE eliminaEntrega
                @uclave numeric(5),
                @uRFC char(13),
                @unumero numeric(5),
                @ufecha datetime
            AS
                DELETE FROM Entregan WHERE @uclave = Clave and @uRFC = RFC and @unumero = Numero and @ufecha = Fecha
            GO



    IF EXISTS (SELECT name FROM sysobjects
                                       WHERE name = 'queryMaterial' AND type = 'P')
                                DROP PROCEDURE queryMaterial
                            GO

                            CREATE PROCEDURE queryMaterial
                                @udescripcion VARCHAR(50),
                                @ucosto NUMERIC(8,2)

                            AS
                                SELECT * FROM Materiales WHERE descripcion
                                LIKE '%'+@udescripcion+'%' AND costo > @ucosto
                            GO

EXECUTE queryMaterial 'Lad',20


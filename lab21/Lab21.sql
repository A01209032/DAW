CREATE PROCEDURE creaMaterial
                     @uclave NUMERIC(5,0),
                     @udescripcion VARCHAR(50),
                     @ucosto NUMERIC(8,2),
                     @uimpuesto NUMERIC(6,2)
                 AS
                     INSERT INTO Materiales VALUES(@uclave, @udescripcion, @ucosto, @uimpuesto)

IF EXISTS (SELECT name FROM sysobjects
                            WHERE name = 'eliminaMaterial' AND type = 'P')
                     DROP PROCEDURE eliminaMaterial

CREATE PROCEDURE eliminaMaterial
                     @uclave NUMERIC(5,0)
                 AS
                     DELETE FROM Materiales WHERE @uclave = Clave


 IF EXISTS (SELECT name FROM sysobjects
                            WHERE name = 'modificarMaterial' AND type = 'P')
                     DROP PROCEDURE modificarMaterial

 CREATE PROCEDURE modificarMaterial
                     @uclave numeric(5),
                     @udescripcion varchar(50),
                     @ucosto numeric(8,2),
                     @uimpuesto numeric(6,2)
                  AS
                     UPDATE Materiales SET Descripcion = @udescripcion, Costo = @ucosto, PorcentajeImpuesto = @uimpuesto WHERE  @uclave = Clave

 IF EXISTS (SELECT name FROM sysobjects
                            WHERE name = 'creaProveedor' AND type = 'P')
                     DROP PROCEDURE creaProveedor

CREATE PROCEDURE creaProveedor
                     @uRFC char(13),
                     @uRazonSocial VARCHAR(50)
                 AS
                     INSERT INTO Proveedores VALUES(@uRFC, @uRazonSocial)

IF EXISTS (SELECT name FROM sysobjects
                            WHERE name = 'modificarProveedor' AND type = 'P')
                     DROP PROCEDURE modificarProveedor

CREATE PROCEDURE modificarProveedor
                     @uRFC char(13),
                     @uRazonSocial VARCHAR(50)
                 AS
                     UPDATE Proveedores SET RazonSocial = @uRazonSocial WHERE  @uRFC = RFC

 IF EXISTS (SELECT name FROM sysobjects
                            WHERE name = 'eliminaProveedor' AND type = 'P')
                     DROP PROCEDURE eliminaProveedor

CREATE PROCEDURE eliminaProveedor
                     @uRFC char(13)
                 AS
                     DELETE FROM Proveedores WHERE @uRFC = RFC

IF EXISTS (SELECT name FROM sysobjects
                       WHERE name = 'creaProyecto' AND type = 'P')
                DROP PROCEDURE creaProyecto
            GO

            CREATE PROCEDURE creaProyecto
                @unumero numeric(5),
                @udenominacion VARCHAR(50)
            AS
                INSERT INTO Proyectos VALUES(@unumero, @udenominacion)
            GO

IF EXISTS (SELECT name FROM sysobjects
                       WHERE name = 'modificarProyecto' AND type = 'P')
                DROP PROCEDURE modificarProyecto
            GO

            CREATE PROCEDURE modificarProyecto
                @unumero numeric(5),
                @udenominacion VARCHAR(50)
            AS
                UPDATE Proyectos SET Denominacion = @udenominacion WHERE  @unumero = Numero
            GO


IF EXISTS (SELECT name FROM sysobjects
                       WHERE name = 'eliminaProyecto' AND type = 'P')
                DROP PROCEDURE eliminaProyecto
            GO

            CREATE PROCEDURE eliminaProyecto
                @unumero numeric(5)
            AS
                DELETE FROM Proyectos WHERE @unumero = Numero
            GO



set dateformat dmy

IF EXISTS (SELECT name FROM sysobjects
                       WHERE name = 'creaEntrega' AND type = 'P')
                DROP PROCEDURE creaEntrega
            GO

            CREATE PROCEDURE creaEntrega
                @uclave numeric(5),
                @uRFC char(13),
                @unumero numeric(5),
                @ufecha datetime,
                @ucantidad numeric(8,2)
            AS
                INSERT INTO Entregan VALUES(@uclave, @uRFC, @unumero, @ufecha, @ucantidad)
            GO

IF EXISTS (SELECT name FROM sysobjects
                       WHERE name = 'modificarEntrega' AND type = 'P')
                DROP PROCEDURE modificarEntrega
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


IF EXISTS (SELECT name FROM sysobjects
                       WHERE name = 'eliminaEntrega' AND type = 'P')
                DROP PROCEDURE eliminaEntrega
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


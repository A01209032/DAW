


SET DATEFORMAT DMY
SELECT SUM(E.Cantidad) AS 'Suma cantidades', SUM (E.Cantidad*((M.Costo*((m.PorcentajeImpuesto/100)+1)))) AS 'Importe Total'
FROM Entregan AS E, Materiales AS M
WHERE M.Clave=E.Clave AND (E.Fecha BETWEEN '01/01/1997' AND '31/12/1997')



SELECT Prov.RazonSocial, COUNT(E.Cantidad) AS 'Número de Entregas', SUM (((M.Costo*((m.PorcentajeImpuesto/100)+1)))*E.Cantidad) AS 'importe total'
FROM Proveedores AS Prov, Entregan AS E, Materiales AS M
WHERE Prov.RFC=E.RFC AND M.Clave=E.Clave
GROUP BY Prov.RazonSocial


SELECT M.Clave, M.Descripcion, SUM(E.Cantidad) AS 'Cantidad total entregada', MIN(E.Cantidad) AS 'Minima cantidad entregada', MAX(E.Cantidad) AS 'Maxima cantidad entregada', SUM(((M.Costo*((m.PorcentajeImpuesto/100)+1)))*E.Cantidad) AS 'importe total'
FROM Materiales AS M, Entregan AS E
where M.Clave=E.Clave
GROUP BY M.Clave, M.Descripcion
HAVING AVG(E.Cantidad)>400


SELECT Prov.RazonSocial, AVG(E.Cantidad) AS 'Promedio de material', m.Clave, M.Descripcion
FROM Proveedores AS Prov,Materiales AS M, Entregan AS E
WHERE Prov.RFC=E.RFC AND M.Clave=E.Clave
GROUP BY Prov.RazonSocial, m.Clave, M.Descripcion
HAVING AVG(E.Cantidad) >= 500



SELECT Prov.RazonSocial, AVG(E.Cantidad) AS 'Promedio de material', m.Clave, M.Descripcion
FROM Proveedores AS Prov,Materiales AS M, Entregan AS E
WHERE Prov.RFC=E.RFC AND M.Clave=E.Clave
GROUP BY Prov.RazonSocial, m.Clave, M.Descripcion
HAVING AVG(E.Cantidad) < 370 OR AVG(E.Cantidad) > 450



INSERT INTO Materiales VALUES (1600, 'Tabique 2T', 400, 5.5),(1890, 'Piedrotas', 10000, 8),(1999, 'Maquinaria desechable', 100, 3),(2380, 'Machete', 1000, 2),(3000, 'Pica de aluminio', 200, 3.02);

SELECT * FROM Materiales


SELECT M.Clave, M.Descripcion
FROM Materiales AS M
WHERE M.Clave NOT IN (
SELECT E.Clave
FROM Entregan AS E)



SELECT Prov.RazonSocial
FROM Proveedores AS Prov, Proyectos AS P
WHERE Prov.RazonSocial IN(
  SELECT Prov.RazonSocial
  FROM Proveedores AS Prov
  WHERE Prov.RazonSocial='Vamos México'
) AND Prov.RFC IN(
  SELECT Prov.RazonSocial
  FROM Proveedores AS Prov
  WHERE Prov.RazonSocial='Querétaro Limpio'
)


SELECT M.Descripcion
FROM Materiales AS M
WHERE M.Clave NOT IN
      (
  SELECT E.Clave
  FROM Proyectos AS P, Entregan AS E
  WHERE P.Numero=E.Numero AND P.Denominacion LIKE 'CIT Yucatan'
)


SELECT Prov.RazonSocial, AVG(E.Cantidad) AS 'Promedio cantidad entregada'
FROM Entregan AS E, Proyectos AS P,Proveedores AS Prov
WHERE P.Numero=E.Numero AND Prov.RFC=E.RFC
GROUP BY Prov.RazonSocial
HAVING AVG(E.Cantidad)> (SELECT AVG(E.Cantidad)
  FROM Entregan AS E
  WHERE E.RFC='VAGO780901'
)

set dateformat dmy
SELECT Prov.RFC, Prov.RazonSocial
FROM Entregan AS E, Proyectos AS P,Proveedores AS Prov
WHERE P.Numero=E.Numero AND Prov.RFC=E.RFC and Prov.RazonSocial='Infonavit Durango'
GROUP BY Prov.RFC, Prov.RazonSocial
  HAVING (SELECT SUM(E.Cantidad)
  FROM Entregan AS E, Proyectos AS P,Proveedores AS Prov
  WHERE P.Numero=E.Numero AND Prov.RFC=E.RFC AND (E.Fecha BETWEEN '01/01/2000' AND '31/12/2000')
)
  > (SELECT SUM(E.Cantidad)
  FROM Entregan AS E, Proyectos AS P,Proveedores AS Prov
  WHERE P.Numero=E.Numero AND Prov.RFC=E.RFC AND (E.Fecha BETWEEN '01/01/2001' AND '31/12/2001')
)


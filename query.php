<?php

$tab = "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ";

$query = "A continuación se presenta la query del reporte de Validaciones: <br><br>

<b style='color: red;'>Query para obtener órdenes: </b><br><br>

<b>select SVVIF03.NUMORDEN,  SVVIF03.FECORDEN, SVVIF03.HORAORDEN, SVVIF03.ESTORDEN, <br>
$tab SVVIF09.ESTACTUA, SVVIF09.ESTANTER,  SVVIF09.CORREL,    SVVIF09.FECCAMBIO,    <br>
$tab SVVIF09.HORCAMBIO, SVVIF04.CODDESP,   SVVIF09.USUARIO,   SVVIF03.CAMPO2,    <br>
$tab svvif04.canvend*svvif04.precuni as pxq,svvif04.depto1<br><br>

from   RDBPARIS2.CECEBUGD.SVVIF03 SVVIF03, RDBPARIS2.CECEBUGD.SVVIF04 SVVIF04,<br>
$tab RDBPARIS2.CECEBUGD.SVVIF09 SVVIF09<br><br>

WHERE (SVVIF03.NUMORDEN = SVVIF04.NUMORDEN) AND (SVVIF03.NUMORDEN = SVVIF09.NUMORDEN)<br>
$tab AND (SVVIF03.TIPVTA IN (1, 2) AND (SVVIF09.CORREL=1)) and SVVIF03.fecorden >= (fecha 3 días en el pasado en formato AAAAmmdd) and svvif03.fecorden <= (fecha actual en formato AAAAmmdd) </b><br><br>

<b style='color: red;'>Query para calcular SLA de validaciones: </b><br><br>

<b>select SVVIF03.NUMORDEN, SVVIF03.FECORDEN, SVVIF03.HORAORDEN, SVVIF03.ESTORDEN,<br>
$tab SVVIF09.ESTACTUA, SVVIF09.FECCAMBIO,SVVIF09.HORCAMBIO, SVVIF04.CODDESP,<br>
$tab SVVIF09.ESTANTER, SVVIF09.USUARIO<br><br>

from RDBPARIS2.CECEBUGD.SVVIF03 SVVIF03, RDBPARIS2.CECEBUGD.SVVIF04 SVVIF04,
     RDBPARIS2.CECEBUGD.SVVIF09 SVVIF09<br><br>

WHERE (SVVIF03.NUMORDEN = SVVIF04.NUMORDEN) AND (SVVIF03.NUMORDEN = SVVIF09.NUMORDEN)<br>
$tab AND (SVVIF03.TIPVTA IN (1, 2) AND SVVIF09.ESTACTUA IN (90))<br>
$tab and SVVIF03.fecorden >= (fecha 3 días en el pasado en formato AAAAmmdd) and svvif03.fecorden <= (fecha actual en formato AAAAmmdd)  <br>
$tab group by SVVIF03.numorden, SVVIF03.fecorden, SVVIF03.HORAORDEN, SVVIF03.ESTORDEN,SVVIF09.ESTACTUA, SVVIF09.FECCAMBIO,SVVIF09.HORCAMBIO, <br>
$tab SVVIF04.CODDESP, SVVIF09.ESTANTER, SVVIF09.USUARIO having count(svvif03.numorden) >= 1 order by SVVIF03.HORAORDEN asc</b><br><br>

Para obtener la cantidad total de ordenes por cada tipo de validación, se deben filtrar por campo estanter igual a <br> -> $tab 0 (validación automática)<br> -> $tab 1 (validación Posible Fraude), <br>
 -> $tab 2 (validación Error de órden) <br> -> $tab 34 (validación Facturas) <br> -> $tab 81 (validación órdenes offline)<br><br>

Para obtener la cantidad de órdenes pendientes a validar, se deben seleccionar las cantidad total de órdenes con estanter 0, 1, 2, 34 o 81 y restarle las ordenes con estorden = 80 o estorden = 99, con estanter 0, 1, 2, 34 o 81 respectivamente.<br><br>

Para obtener la cantidad total de validaciones manuales se debe tener calculado las ordenes pendientes a validar y restar las ordenes que contengan estorden 31 o 38, ya que estas son validaciones por sistema.<br><br>

La cantidad de ordenes anuladas se calculan con el estorden 80.<br><br>

La cantidad de ordenes Click & Collect se calculan con coddesp 22. <br><br>

";

echo "<p style='font-family: Calibri;'>" . $query . "</p>";
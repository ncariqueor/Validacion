<?php
echo "Actualizacion de 3 días. ";

date_default_timezone_set("America/Santiago");

$ini = (date("H")*3600+date("i")*60+date("s"));

ini_set('max_execution_time', 0);

$con = new mysqli('localhost', 'root', '', 'validacion');

$conexion = odbc_connect('cecebugd', 'USRVNP', 'USRVNP');

$dia = 20160131;

function pendVal($con, $dia, $depto)
{
    $query = "select sum(pxq) as sumpen from validar where fecorden = $dia and estanter in (1, 2, 34, 81)
              and estorden not in (99, 80)";

    if ($depto > -1)
        $query = "select sum(pxq) as sumpen from validar where fecorden = $dia and estanter in (1, 2, 34, 81)
              and estorden not in (99, 80) and depto1 = $depto";

    $res = $con->query($query);

    $pend = 0;
    while ($row = mysqli_fetch_assoc($res))
        $pend += $row['sumpen'];

    return $pend;
}




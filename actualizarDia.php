<?php


date_default_timezone_set("America/Santiago");

echo date("Y - m - d") . " y " . date("Y - m - d", strtotime("-2 day"));

$ini = (date("H")*3600+date("i")*60+date("s"));

ini_set('max_execution_time', 0);

$con2 = new mysqli('localhost', 'root', '', 'ventas');

$con = new mysqli('localhost', 'root', '', 'validacion');

$conexion = odbc_connect('cecebugd', 'USRVNP', 'USRVNP');

$dia = date("Ymd");

$hora = date("His"); $fecha = date("Ymd");

$semana = date("Ymd", strtotime("-2 day"));

$con->query("create table if not exists auxvalidar select * from validar");

$con->query("ALTER TABLE auxvalidar ADD INDEX(fecorden)");

$con->query("create table if not exists auxresult select * from resultados");

$con->query("create table if not exists auxtiempo select * from tiempo");

$con->query("ALTER TABLE auxtiempo ADD INDEX(fecorden)");

$con->query("update activo set active = 1 where active = 0");

function actualizarValidar($con, $conexion, $dia, $semana)
{

    $inicio = array(3000000, 4000000, 5000000, 6000000, 7000000, 8000000, 9000000, 10000000, 11000000, 12000000, 13000000,
        14000000, 15000000, 16000000, 17000000, 18000000, 19000000, 20000000, 21000000, 22000000, 23000000);

    $fin    = array(3595999, 4595999, 5595999, 6595999, 7595999, 8595999, 9595999, 10595999, 11595999,
        12595999, 13595999, 14595999, 15595999, 16595999, 17595999, 18595999, 19595999, 20595999, 21595999, 22595999, 23595999);

    $query = "delete from validar WHERE fecorden >= $semana and fecorden <= $dia";

    $eliminar = $con->query($query);

    $query2 = "select SVVIF03.NUMORDEN,  SVVIF03.FECORDEN, SVVIF03.HORAORDEN, SVVIF03.ESTORDEN,     SVVIF09.ESTACTUA,
                      SVVIF09.ESTANTER,  SVVIF09.CORREL,    SVVIF09.FECCAMBIO,    SVVIF09.HORCAMBIO,
                      SVVIF04.CODDESP,   SVVIF09.USUARIO,   SVVIF03.CAMPO2,    svvif04.canvend*svvif04.precuni as pxq,
                      svvif04.depto1

               from   RDBPARIS2.CECEBUGD.SVVIF03 SVVIF03, RDBPARIS2.CECEBUGD.SVVIF04 SVVIF04,
                      RDBPARIS2.CECEBUGD.SVVIF09 SVVIF09

               WHERE (SVVIF03.NUMORDEN = SVVIF04.NUMORDEN) AND (SVVIF03.NUMORDEN = SVVIF09.NUMORDEN)
                     AND (SVVIF03.TIPVTA IN (1, 2) AND (SVVIF09.CORREL=1)) and SVVIF03.fecorden >= $semana and svvif03.fecorden <= $dia";

    $res = odbc_exec($conexion, $query2);

    while (odbc_fetch_row($res)) {
        for ($i = 1; $i <= odbc_num_fields($res); $i++) {
            if ($i == 1) $numorden = odbc_result($res, $i);
            if ($i == 2) $fecorden = odbc_result($res, $i);
            if ($i == 3) $horaorden = odbc_result($res, $i);
            if ($i == 4) $estorden = odbc_result($res, $i);
            if ($i == 5) $estactua = odbc_result($res, $i);
            if ($i == 6) $estanter = odbc_result($res, $i);
            if ($i == 7) $correl = odbc_result($res, $i);
            if ($i == 8) $feccambio = odbc_result($res, $i);
            if ($i == 9) $horcambio = odbc_result($res, $i);
            if ($i == 10) $coddesp = odbc_result($res, $i);
            if ($i == 11) $usuario = odbc_result($res, $i);
            if ($i == 12) $campo2 = odbc_result($res, $i);
            if ($i == 13) $pxq = odbc_result($res, $i);
            if ($i == 14) $depto1 = odbc_result($res, $i);
        }

        $count = count($inicio);

        $rango1 = 0;

        $rango2 = 0;

        for($i = 0; $i < $count; $i++){
            if($horaorden >= $inicio[$i] && $horaorden <= $fin[$i]){
                $rango1 = "" . $inicio[$i] . "";

                if(strlen($rango1) == 7)
                    $rango1 = "0" . $rango1;

                $rango2 = "" . $fin[$i] . "";

                if(strlen($rango2) == 7)
                    $rango2 = "0" . $rango2;

                break;
            }
        }

        $res2 = $con->query("Insert into validar values($numorden,
                                                        $fecorden,
                                                        $horaorden,
                                                        $estorden,
                                                        $estactua,
                                                        $estanter,
                                                        $correl,
                                                        $feccambio,
                                                        $horcambio,
                                                        $coddesp,
                                                       '$usuario',
                                                       '$campo2',
                                                        $pxq,
                                                        $depto1,
                                                        '$rango1',
                                                        '$rango2')");

        if(!$res2){
            echo "En actualizar validar " . $con->error;
        }
    }

    return true;
}



function actualizarTiempos($con, $conexion, $dia, $semana)
{

    $query = "delete from tiempo WHERE fecorden >= $semana and fecorden <= $dia";

    $eliminar = $con->query($query);

    $query2 = "select SVVIF03.NUMORDEN, SVVIF03.FECORDEN, SVVIF03.HORAORDEN, SVVIF03.ESTORDEN,
                  SVVIF09.ESTACTUA, SVVIF09.FECCAMBIO,SVVIF09.HORCAMBIO, SVVIF04.CODDESP,
                  SVVIF09.ESTANTER, SVVIF09.USUARIO
              from RDBPARIS2.CECEBUGD.SVVIF03 SVVIF03, RDBPARIS2.CECEBUGD.SVVIF04 SVVIF04,
                   RDBPARIS2.CECEBUGD.SVVIF09 SVVIF09
              WHERE (SVVIF03.NUMORDEN = SVVIF04.NUMORDEN) AND (SVVIF03.NUMORDEN = SVVIF09.NUMORDEN)
              AND (SVVIF03.TIPVTA IN (1, 2) AND SVVIF09.ESTACTUA IN (90))
              and SVVIF03.fecorden >= $semana and svvif03.fecorden <= $dia  group by SVVIF03.numorden, SVVIF03.fecorden, SVVIF03.HORAORDEN, SVVIF03.ESTORDEN,
                  SVVIF09.ESTACTUA, SVVIF09.FECCAMBIO,SVVIF09.HORCAMBIO, SVVIF04.CODDESP,
                  SVVIF09.ESTANTER, SVVIF09.USUARIO having count(svvif03.numorden) >= 1 order by SVVIF03.HORAORDEN asc";

    $res = odbc_exec($conexion, $query2);

    while (odbc_fetch_row($res)) {
        $numorden = odbc_result($res, 1);
        $fecorden = odbc_result($res, 2);
        $horaorden = odbc_result($res, 3);
        $estorden = odbc_result($res, 4);
        $estactua = odbc_result($res, 5);
        $feccambio = odbc_result($res, 6);
        $horcambio = odbc_result($res, 7);
        $coddesp = odbc_result($res, 8);
        $estanter = odbc_result($res, 9);
        $usuario = odbc_result($res, 10);

        $estanterval = "select estanter from validar where numorden = $numorden and fecorden = $fecorden";

        $result = $con->query($estanterval);

        while ($row = mysqli_fetch_assoc($result)) {
            $estanterval = $row['estanter'];
        }

        $diferencia = $feccambio - $fecorden;

        $sla = 0;

        if ($diferencia == 0)
            $sla = $horcambio - $horaorden;
        else {
            if ($diferencia == 1)
                $sla = 23590000 - $horaorden + $horcambio;
            else {
                if ($diferencia > 1)
                    $sla = 24 * ($feccambio - $fecorden - 1) + 23590000 - $horaorden + $horcambio;
                else
                    $sla = "error";
            }
        }

        $sla = str_split($sla);
        $cant = count($sla);

        $prom = 0;
        if ($sla != "error") {
            if ($cant > 7) {
                $prom = $sla[0] . $sla[1];
            } else {
                if ($cant > 6) {
                    $prom = $sla[0] * 1;
                } else {
                    if ($cant > 5)
                        $prom = 0.5;
                    else
                        $prom = 0.1;
                }
            }
        }

        $fuerasla = 0;
        if ($prom > 24)
            $fuerasla = 1;

        $insertar = "insert into tiempo values($numorden, $fecorden, $horaorden, $estorden, $estactua, $feccambio,
                                           $horcambio, $coddesp, $estanter, '$usuario', $estanterval, $prom, $fuerasla)";

        $result = $con->query($insertar);

        if (!$result){
            echo "En actualizar tiempos " . $con->error;
        }
    }

    return true;
}


if(actualizarValidar($con, $conexion, $dia, $semana))
    echo "Se actualizo tabla validar";
else
    echo "Error en actualizar tabla validar " . $con->error;

if(actualizarTiempos($con, $conexion, $dia, $semana))
    echo "Se actualizo tabla tiempo";
else
    echo "Error en actualizar tabla tiempo " . $con->error;




// ============================= ACTUALIZACION DE RESULTADOS ==============================




echo "<br><br>Actualizacion de Resultados 3 dias. ";

//Query para validacion automatica

function valores($con, $dia, $estanter){

    $vau = "select numorden as vau from validar WHERE fecorden = $dia AND ESTANTER = $estanter group by numorden having count(numorden)>=1";

    $resVAU = $con->query($vau);

    $valAUTO = 0;

    while($row = mysqli_fetch_assoc($resVAU)){
        $valAUTO++;
    }

    return $valAUTO;
}



function operaciones($con, $dia, $pFRAUDE, $estanter){

    $pen = "select numorden as pen from validar WHERE fecorden = $dia AND ESTANTER = $estanter
            AND (estorden = 80 or estorden = 99) group by numorden having count(numorden)>=1";

    $resPEN = $con->query($pen);

    $PENDIE = 0;

    while($row = mysqli_fetch_assoc($resPEN)){
        $PENDIE++;
    }

    if($PENDIE != 0)
        $penVAL = $pFRAUDE - $PENDIE;
    else
        $penVAL = 0;

    return $penVAL;
}



function solSistemas($con, $dia){
    $query = "select numorden from validar where fecorden = $dia and (estorden = 31 or estorden = 38)
              GROUP by numorden having count(numorden) >= 1";

    $res = $con->query($query);

    $num = 0;

    while($row = mysqli_fetch_assoc($res)){
        $num++;
    }

    return $num;

}



function anuladas($con, $dia, $estanter){
    $query = "select numorden from validar where fecorden = $dia and estorden = 80 and
          estanter = $estanter group by numorden having count(numorden) >= 1";

    $res = $con->query($query);

    $num = 0;

    while($row = mysqli_fetch_assoc($res)){
        $num++;
    }

    return $num;
}



function clickCollect($con ,$dia, $estanter){

    $cct = "select numorden as cct from validar WHERE fecorden = $dia AND ESTANTER = $estanter
            AND coddesp = 22 group by numorden having count(numorden)>=1";

    $resCCT = $con->query($cct);

    $CCTIVA = 0;

    while($row = mysqli_fetch_assoc($resCCT)){
        $CCTIVA++;
    }

    return $CCTIVA;
}



function tPromedio($con, $dia, $estanter){

    $query = "select prom
              from tiempo where estanterval = $estanter and estactua = 90 and fecorden = $dia
              group by numorden HAVING count(numorden) >= 1";

    $res = $con->query($query);

    $resultado[0] = 0;

    $resultado[1] = mysqli_num_rows($res);

    while($row = mysqli_fetch_assoc($res)){
        $resultado[0] += $row['prom'];
    }

    return $resultado;
}



function mayor24($con, $dia, $estanter){
    $query = "select fuerasla
              from tiempo where estanterval = $estanter and estactua = 90 and fecorden = $dia and
              estanter not in (31, 38) group by numorden HAVING count(numorden) >= 1";

    $res = $con->query($query);

    $cant = 0;

    while($row = mysqli_fetch_assoc($res)){
        $cant += $row['fuerasla'];
    }

    return $cant;
}



function pendVal($con, $dia, $depto){
    $pend = array(0, 0);
    $query = "select sum(pxq) as sumpen from validar where fecorden = $dia and estanter in (0, 1, 2, 34, 81)
              and estorden not in (99, 80)";

    if($depto != -1)
        $query = "select sum(pxq) as sumpen from validar where fecorden = $dia and estanter in (0, 1, 2, 34, 81)
              and estorden not in (99, 80) and depto1 in ($depto)";

    $res = $con->query($query);

    while($row = mysqli_fetch_assoc($res))
        $pend[0]+=$row['sumpen'];

    if($depto != -1) {
        $query = "select numorden from validar where fecorden = $dia and estanter in (0, 1, 2, 34, 81)
              and estorden not in (99, 80) and depto1 in ($depto) group by numorden having count(numorden) >= 1";
        $pend[1] = mysqli_num_rows($con->query($query));
    }

    return $pend;
}



for($dia2 = new DateTime($dia); $dia2->format("Ymd") >= $semana; $dia2->modify("-1 day")) {

    $d = $dia2->format("Ymd");

    //Llamadas a funciones correspondientes.

    $validacionAuto     = valores($con, $d, 0);
    $posibleFraude      = valores($con, $d, 1);
    $errorORden         = valores($con, $d, 2);
    $facturas           = valores($con, $d, 34);
    $ordenesOffline     = valores($con, $d, 81);

    $pAUTOPV            = operaciones($con, $d, $validacionAuto, 0);
    $pFRAUDEPV          = operaciones($con, $d, $posibleFraude, 1);
    $EOPV               = operaciones($con, $d, $errorORden,2);
    $facturaPV          = operaciones($con, $d, $facturas,34);
    $offlinePV          = operaciones($con, $d, $ordenesOffline,81);

    $anupfraude         = anuladas($con, $d, 1);
    $anueorden          = anuladas($con, $d, 2);
    $anufactura         = anuladas($con, $d, 34);
    $anuoffline         = anuladas($con, $d, 81);

    $cctiva             = clickCollect($con, $d, 0);
    $cctivam            = clickCollect($con, $d, 1) + clickCollect($con, $d, 2) + clickCollect($con, $d, 34) + clickCollect($con, $d, 81);

    $tprompfraude       = tPromedio($con, $d, 1);
    $tpromeorden        = tPromedio($con, $d, 2);
    $tpromfactura       = tPromedio($con, $d, 34);
    $tpromoffline       = tPromedio($con, $d, 81);

    if(($tprompfraude[1] + $tpromeorden[1] + $tpromfactura[1] + $tpromoffline[1]) == 0)
        $tprom = 0;
    else
        $tprom = ($tprompfraude[0] + $tpromeorden[0] + $tpromfactura[0] + $tpromoffline[0])
            / ($tprompfraude[1] + $tpromeorden[1] + $tpromfactura[1] + $tpromoffline[1]);

    $mayorpfraude       = mayor24($con, $d, 1);
    $mayoreorden        = mayor24($con, $d, 2);
    $mayorfactura       = mayor24($con, $d, 34);
    $mayoroffline       = mayor24($con, $d, 81);

    $validacionManual   = $posibleFraude + $errorORden + $facturas + $ordenesOffline;
    $total              = $validacionAuto + $validacionManual;

    $penSolSis          = solSistemas($con, $d);

    $penSolMan          = ($pFRAUDEPV + $EOPV + $facturaPV + $offlinePV) - $penSolSis;
    $sumaMayor24        = $mayorpfraude + $mayoreorden + $mayorfactura + $mayoroffline;

    if($validacionManual <= 0)
        $porCumplimiento = 0;
    else
        $porCumplimiento    = round((($validacionManual - $sumaMayor24 - $penSolMan) / $validacionManual)*100, 1);

    $suma               = ($validacionAuto + $posibleFraude + $errorORden + $facturas + $ordenesOffline);

    if($suma == 0) {
        $porvalauto = 0;
        $porpfraude = 0;
        $porerorden = 0;
        $porfactura = 0;
        $poroffline = 0;
    }
    else {
        $porvalauto = round(($validacionAuto / $suma) * 100, 1);
        $porpfraude = round(($posibleFraude / $suma) * 100, 1);
        $porerorden = round(($errorORden / $suma) * 100, 1);
        $porfactura = round(($facturas / $suma) * 100, 1);
        $poroffline = round(($ordenesOffline / $suma) * 100, 1);
    }

    $sumapv = ($pFRAUDEPV + $EOPV + $facturaPV + $offlinePV);

    if($sumapv == 0) {
        $porpfraudepv = 0;
        $porerordenpv = 0;
        $porfacturapv = 0;
        $porofflinepv = 0;
    }
    else {
        $porpfraudepv = round(($pFRAUDEPV / $sumapv) * 100, 1);
        $porerordenpv = round(($EOPV / $sumapv) * 100, 1);
        $porfacturapv = round(($facturaPV / $sumapv) * 100, 1);
        $porofflinepv = round(($offlinePV / $sumapv) * 100, 1);
    }

    $sumanul = ($anupfraude + $anueorden + $anufactura + $anuoffline);

    if($sumanul == 0) {
        $poranupfraude = 0;
        $poranueorden = 0;
        $poranufactura = 0;
        $poranuoffline = 0;
    }else{
        $poranupfraude = round(($anupfraude/$sumanul)*100, 1);
        $poranueorden = round(($anueorden/$sumanul)*100, 1);
        $poranufactura = round(($anufactura/$sumanul)*100, 1);
        $poranuoffline = round(($anuoffline/$sumanul)*100, 1);
    }

    $sumacc = ($cctiva + $cctivam);

    if($sumacc == 0){
        $porcctiva = 0;
        $porcctivam = 0;
    }else{
        $porcctiva = round(($cctiva/$sumacc)*100, 1);
        $porcctivam = round(($cctivam/$sumacc)*100, 1);
    }

    $mpend = pendVal($con, $d, -1)[0];


    $eliminar = "delete from resultados where dia = $d";

    $resultado = $con->query($eliminar);

    $actualizar = "insert into resultados values ($d,
                                                  $validacionAuto,
                                                  $porvalauto,
                                                  $porpfraude,
                                                  $porerorden,
                                                  $porfactura,
                                                  $poroffline,
                                                  $validacionManual,
                                                  $total,
                                                  $posibleFraude,
                                                  $errorORden,
                                                  $facturas,
                                                  $ordenesOffline,
                                                  $pAUTOPV,
                                                  $pFRAUDEPV,
                                                  $EOPV,
                                                  $facturaPV,
                                                  $offlinePV,
                                                  $porpfraudepv,
                                                  $porerordenpv,
                                                  $porfacturapv,
                                                  $porofflinepv,
                                                  $anupfraude,
                                                  $anueorden,
                                                  $anufactura,
                                                  $anuoffline,
                                                  $poranupfraude,
                                                  $poranueorden,
                                                  $poranufactura,
                                                  $poranuoffline,
                                                  $cctiva,
                                                  $cctivam,
                                                  $porcctiva,
                                                  $porcctivam,
                                                  $tprom,
                                                  $mayorpfraude,
                                                  $mayoreorden,
                                                  $mayorfactura,
                                                  $mayoroffline,
                                                  $porCumplimiento,
                                                  $hora,
                                                  $fecha,
                                                  $mpend,
                                                  $penSolSis)";

    $res = $con->query($actualizar);

    if(!$res)
        echo $con->error;

    echo $d . ", ";

}

$con->query("drop table if EXISTS auxvalidar");
$con->query("drop table if exists auxresult");
$con->query("drop table if exists auxtiempo");
$con->query("update activo set active = 0 where active = 1");

$query = "select depto1 from depto";
$fec = $con2->query($query);
$i = 0;
while ($row = mysqli_fetch_assoc($fec)) {
    $f[$i] = $row['depto1'];
    $i++;
}
$cantidad = count($f);

for($dia2 = new DateTime($dia); $dia2->format("Ymd") >= $semana; $dia2->modify("-1 day")) {
    $d = $dia2->format("Ymd");
    echo $d . ", ";
    for($i = 0; $i < $cantidad; $i++){
        echo $f[$i] . ", ";
        $mpend = pendVal($con, $d, $f[$i]);

        $eliminar = "delete from valdepto where dia = $d and depto = $f[$i]";

        $resultado = $con->query($eliminar);

        $insertar = "insert into valdepto values ($f[$i], $d, $mpend[0], $mpend[1])";

        $res = $con->query($insertar);

        if(!$res)
            echo $con->error;
    }
}

//VALIDACIONES NEGOCIO

$query = "select distinct negocio from depto where negocio <> ''";

$fec = $con2->query($query);

$f = array();

$i = 0;

while ($row = mysqli_fetch_assoc($fec)) {
    $f[$i] = $row['negocio'];
    $i++;
}

$k = $i;

$query = "select distinct division from depto where division <> ''";

$fec = $con2->query($query);

while ($row = mysqli_fetch_assoc($fec)) {
    $f[$i] = $row['division'];
    $i++;
}

$cantidad = count($f);

for($dia2 = new DateTime($dia); $dia2->format("Ymd") >= $semana; $dia2->modify("-1 day")) {
    $d = $dia2->format("Ymd");
    echo $d . ", ";
    for($i = 0; $i < $cantidad; $i++){
        echo $f[$i] . ", ";
        $negocio = $f[$i];

        if($i < $k)
            $query = "select depto1 from depto where negocio = '$negocio'";
        else
            $query = "select depto1 from depto where division = '$negocio'";

        $res = $con2->query($query);

        $cant = mysqli_num_rows($res);

        $en = "";

        $j = 0;

        while ($row = mysqli_fetch_assoc($res)) {
            $en = $en . $row['depto1'];

            if ($j < $cant - 1)
                $en = $en . ", ";

            $j++;
        }

        $mpend = pendVal($con, $d, $en);

        $monto = $mpend[0];

        $canpend = $mpend[1];

        $eliminar = "delete from valnegocio where dia = $d and negocio = '$negocio'";

        $resultado = $con->query($eliminar);

        $insertar = "insert into valnegocio values ('$negocio', $d, $monto, $canpend)";

        $res = $con->query($insertar);

        if(!$res)
            echo $con->error;
    }
}


echo "Demoro " . ((date("H")*3600+date("i")*60+date("s")) - $ini) . " segundos";



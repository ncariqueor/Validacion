<?php

echo "Actualizacion del mes. ";

date_default_timezone_set("America/Santiago");

$mesAnt = date("Ymd", strtotime("-4 month")); //4 meses en el pasado

$mesAct = date("Ymd", strtotime("-1 week -1 day"));          //1 semana en el pasado

$hora = date("His"); $fecha = date("Ymd", strtotime("-1 day"));

ini_set('max_execution_time', 0);

$con = new mysqli('localhost', 'root', '', 'validacion');

$con2 = new mysqli('localhost', 'root', '', 'ventas');

$conexion = odbc_connect('cecebugd', 'USRVNP', 'USRVNP');

function actualizarValidar($con, $conexion, $mesAnt, $mesAct)
{

    $query = "delete from validar WHERE fecorden >= $mesAnt and fecorden <= $mesAct";

    $eliminar = $con->query($query);

    $query2 = "select SVVIF03.NUMORDEN,  SVVIF03.FECORDEN, SVVIF03.HORAORDEN, SVVIF03.ESTORDEN,     SVVIF09.ESTACTUA,
                      SVVIF09.ESTANTER,  SVVIF09.CORREL,    SVVIF09.FECCAMBIO,    SVVIF09.HORCAMBIO,
                      SVVIF04.CODDESP,   SVVIF09.USUARIO,   SVVIF03.CAMPO2,    svvif04.canvend*svvif04.precuni as pxq,
                      svvif04.depto1

               from   RDBPARIS2.CECEBUGD.SVVIF03 SVVIF03, RDBPARIS2.CECEBUGD.SVVIF04 SVVIF04,
                      RDBPARIS2.CECEBUGD.SVVIF09 SVVIF09

               WHERE (SVVIF03.NUMORDEN = SVVIF04.NUMORDEN) AND (SVVIF03.NUMORDEN = SVVIF09.NUMORDEN)
                     AND (SVVIF03.TIPVTA IN (1, 2) AND (SVVIF09.CORREL=1)) and SVVIF03.fecorden >= $mesAnt and svvif03.fecorden <= $mesAct";

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
                                                        $depto1)");
        if(!$res2) {
            echo "En actualizar validar " . $con->error;
            return false;
        }
    }

    return $res2;
}



function actualizarTiempos($con, $conexion, $mesAnt, $mesAct)
{

    $query = "delete from tiempo WHERE fecorden >= $mesAnt and fecorden <= $mesAct";

    $eliminar = $con->query($query);

    $query2 = "select SVVIF03.NUMORDEN, SVVIF03.FECORDEN, SVVIF03.HORAORDEN, SVVIF03.ESTORDEN,
                  SVVIF09.ESTACTUA, SVVIF09.FECCAMBIO,SVVIF09.HORCAMBIO, SVVIF04.CODDESP,
                  SVVIF09.ESTANTER, SVVIF09.USUARIO
              from RDBPARIS2.CECEBUGD.SVVIF03 SVVIF03, RDBPARIS2.CECEBUGD.SVVIF04 SVVIF04,
                   RDBPARIS2.CECEBUGD.SVVIF09 SVVIF09
              WHERE (SVVIF03.NUMORDEN = SVVIF04.NUMORDEN) AND (SVVIF03.NUMORDEN = SVVIF09.NUMORDEN)
              AND (SVVIF03.TIPVTA IN (1, 2) AND SVVIF09.ESTACTUA IN (90))
              and SVVIF03.fecorden >= $mesAnt and SVVIF03.fecorden <= $mesAct  group by SVVIF03.numorden, SVVIF03.fecorden, SVVIF03.HORAORDEN, SVVIF03.ESTORDEN,
                  SVVIF09.ESTACTUA, SVVIF09.FECCAMBIO,SVVIF09.HORCAMBIO, SVVIF04.CODDESP,
                  SVVIF09.ESTANTER, SVVIF09.USUARIO having count(svvif03.numorden) >= 1";

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

        if ($result)
            echo "Se inserto " . $numorden . " <br> ";
        else
            echo "Error " . $con->error . "<br>";
    }

    return true;
}

if(actualizarValidar($con, $conexion, $mesAnt, $mesAct) && actualizarTiempos($con, $conexion, $mesAnt, $mesAct))
    echo "Se actualizo tabla validar y tabla tiempo.";
else
    echo "Hubieron errores";




// ======================== ACTUALIZACION DE RESULTADOS MES ================================




echo "Actualizacion Resultados del mes";




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

    if($depto > -1)
        $query = "select sum(pxq) as sumpen from validar where fecorden = $dia and estanter in (0, 1, 2, 34, 81)
              and estorden not in (99, 80) and depto1 in ($depto)";

    $res = $con->query($query);

    while($row = mysqli_fetch_assoc($res))
        $pend[0]+=$row['sumpen'];

    if($depto > -1) {
        $query = "select numorden from validar where fecorden = $dia and estanter in (0, 1, 2, 34, 81)
              and estorden not in (99, 80) and depto1 in ($depto) group by numorden having count(numorden) >= 1";
        $pend[1] = mysqli_num_rows($con->query($query));
    }

    return $pend;
}


for($dia2 = new DateTime($mesAct); $dia2->format("Ymd") >= $mesAnt; $dia2->modify("-1 day")) {

    $dia = $dia2->format("Ymd");

    //Llamadas a funciones correspondientes.

    $validacionAuto     = valores($con, $dia, 0);
    $posibleFraude      = valores($con, $dia, 1);
    $errorORden         = valores($con, $dia, 2);
    $facturas           = valores($con, $dia, 34);
    $ordenesOffline     = valores($con, $dia, 81);

    $pAUTOPV            = operaciones($con, $dia, $validacionAuto, 0);
    $pFRAUDEPV          = operaciones($con, $dia, $posibleFraude, 1);
    $EOPV               = operaciones($con, $dia, $errorORden,2);
    $facturaPV          = operaciones($con, $dia, $facturas,34);
    $offlinePV          = operaciones($con, $dia, $ordenesOffline,81);

    $anupfraude         = anuladas($con, $dia, 1);
    $anueorden          = anuladas($con, $dia, 2);
    $anufactura         = anuladas($con, $dia, 34);
    $anuoffline         = anuladas($con, $dia, 81);

    $cctiva             = clickCollect($con, $dia, 0);
    $cctivam            = clickCollect($con, $dia, 1) + clickCollect($con, $dia, 2) + clickCollect($con, $dia, 34) + clickCollect($con, $dia, 81);

    $tprompfraude       = tPromedio($con, $dia, 1);
    $tpromeorden        = tPromedio($con, $dia, 2);
    $tpromfactura       = tPromedio($con, $dia, 34);
    $tpromoffline       = tPromedio($con, $dia, 81);

    if(($tprompfraude[1] + $tpromeorden[1] + $tpromfactura[1] + $tpromoffline[1]) == 0)
        $tprom = 0;
    else
        $tprom = ($tprompfraude[0] + $tpromeorden[0] + $tpromfactura[0] + $tpromoffline[0])
                / ($tprompfraude[1] + $tpromeorden[1] + $tpromfactura[1] + $tpromoffline[1]);

    $mayorpfraude       = mayor24($con, $dia, 1);
    $mayoreorden        = mayor24($con, $dia, 2);
    $mayorfactura       = mayor24($con, $dia, 34);
    $mayoroffline       = mayor24($con, $dia, 81);

    $validacionManual   = $posibleFraude + $errorORden + $facturas + $ordenesOffline;
    $total              = $validacionAuto + $validacionManual;

    $penSolSis          = solSistemas($con, $dia);

    $penSolMan          = ($pFRAUDEPV + $EOPV + $facturaPV + $offlinePV) - $penSolSis;
    $sumaMayor24        = mayor24($con, $dia, 0) + $mayorpfraude + $mayoreorden + $mayorfactura + $mayoroffline;

    if($validacionManual == 0)
        $porCumplimiento = 0;
    else
        $porCumplimiento = round((($validacionManual - $sumaMayor24 - $penSolMan) / $validacionManual)*100, 1);

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

    $mpend = pendVal($con, $dia, -1)[0];

    $eliminar = "delete from resultados where dia = $dia";

    $resultado = $con->query($eliminar);

    $actualizar = "insert into resultados values ($dia,
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

    echo $dia . ", ";
}

$query = "select depto1 from depto";
$fec = $con2->query($query);
$i = 0;
while ($row = mysqli_fetch_assoc($fec)) {
    $f[$i] = $row['depto1'];
    $i++;
}
$cantidad = count($f);

for($dia2 = new DateTime($mesAct); $dia2->format("Ymd") >= $mesAnt; $dia2->modify("-1 day")) {
    $d = $dia2->format("Ymd");
    echo $d . ", ";
    for($i = 0; $i < $cantidad; $i++){
        echo $f[$i] . ", ";
        $depto = $f[$i];
        $mpend = pendVal($con, $d, $depto);

        $monto = $mpend[0];
        $cant = $mpend[1];

        $eliminar = "delete from valdepto where dia = $d and depto = $depto";

        $resultado = $con->query($eliminar);

        $insertar = "insert into valdepto values ($depto, $d, $monto, $cant)";

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

for($dia2 = new DateTime($mesAct); $dia2->format("Ymd") >= $mesAnt; $dia2->modify("-1 day")) {
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
<?php
    $tipo = $_GET['tipo'];
?>
<html lang="es" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="UTF-8">
        <title>Ordenes
            <?php
                if($tipo == 'valauto')
                    echo " Automáticas";
                if($tipo == 'pfraude')
                    echo " Posible Fraude";
                if($tipo == 'eorden')
                    echo " Error Orden";
                if($tipo == 'facturas')
                    echo " Facturas";
                if($tipo == 'offline')
                    echo " Offline";

                if($tipo == 'valautopv')
                    echo " Error Sistemas (Pendiente de Validación)";
                if($tipo == 'pfraudepv')
                    echo " Posible Fraude (Pendiente de Validación)";
                if($tipo == 'eordenpv')
                    echo " Error Orden (Pendiente de Validación)";
                if($tipo == 'facturapv')
                    echo " Facturas (Pendiente de Validación)";
                if($tipo == 'offlinepv')
                    echo " Offline (Pendiente de Validación)";

                if($tipo == 'anuladasautomaticas')
                    echo " Anuladas Automáticamente";
                if($tipo == 'anuladasmanual')
                    echo " Anuladas Manualmente";

                if($tipo == 'cctiva')
                    echo " C&C Validación Automática";
                if($tipo == 'cctivam')
                    echo " C&C Validación Manual";

                if($tipo == 'mayor')
                    echo " Fuera SLA";
            ?>
        </title>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css" />
    </head>
    <body>

        <div class="panel panel-default">
            <h1 class="text-center">Ordenes
                <?php
                if($tipo == 'valauto')
                    echo " Automáticas";
                if($tipo == 'pfraude')
                    echo " Posible Fraude";
                if($tipo == 'eorden')
                    echo " Error Orden";
                if($tipo == 'facturas')
                    echo " Facturas";
                if($tipo == 'offline')
                    echo " Offline";

                if($tipo == 'valautopv')
                    echo " Error Sistemas (Pendiente de Validación)";
                if($tipo == 'pfraudepv')
                    echo " Posible Fraude (Pendiente de Validación)";
                if($tipo == 'eordenpv')
                    echo " Error Orden (Pendiente de Validación)";
                if($tipo == 'facturapv')
                    echo " Facturas (Pendiente de Validación)";
                if($tipo == 'offlinepv')
                    echo " Offline (Pendiente de Validación)";

                if($tipo == 'anupfraude')
                    echo " Posible Fraude Anuladas";
                if($tipo == 'anueorden')
                    echo " Error Orden Anuladas";
                if($tipo == 'anufactura')
                    echo " Factura Anuladas";
                if($tipo == 'anuoffline')
                    echo " Offline Anuladas";

                if($tipo == 'cctiva')
                    echo " C&C Validación Automática";
                if($tipo == 'cctivam')
                    echo " C&C Validación Manual";

                if($tipo == 'mayor')
                    echo " Fuera SLA";


                echo " <a class='btn btn-success btn-sm' href='ordenes.php?tipo=" . $tipo . "&dia=" . $_GET['dia'] . "&estanter=" . $_GET['estanter'] . "'>Exportar <img src='excel.png' width='15px' height='15px'></a>";
                ?> </h1>

            <table class="table table-condensed table-bordered"  style="background-color: white;">

                <thead style="background-color: white;">
                    <tr>
                        <th style="background-color: #E0FFE1"><h6 class="text-center">Número</h6></th>
                        <th style="background-color: #E0FFE1"><h6 class="text-center">Número de Orden</h6></th>
                        <th style="background-color: #E0FFE1"><h6 class="text-center">Fecha de Orden</h6></th>
                        <th style="background-color: #E0FFE1"><h6 class="text-center">Hora de Orden</h6></th>
                        <th style="background-color: #E0FFE1"><h6 class="text-center">Estado Orden</h6></th>
                        <th style="background-color: #E0FFE1"><h6 class="text-center">Estado Actual</h6></th>
                        <th style="background-color: #E0FFE1"><h6 class="text-center">Estado Anterior</h6></th>
                        <th style="background-color: #E0FFE1"><h6 class="text-center">Correlativo</h6></th>
                        <th style="background-color: #E0FFE1"><h6 class="text-center">Fecha de Cambio</h6></th>
                        <th style="background-color: #E0FFE1"><h6 class="text-center">Hora de Cambio</h6></th>
                        <th style="background-color: #E0FFE1"><h6 class="text-center">Código de Despacho</h6></th>
                        <th style="background-color: #E0FFE1"><h6 class="text-center">Usuario Validador</h6></th>
                        <th style="background-color: #E0FFE1"><h6 class="text-center">Usuario Venta</h6></th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $dia = $_GET['dia'];

                        $estanter= $_GET['estanter'];

                        $con = new mysqli('localhost', 'root', '', 'validacion');

                        if($tipo == 'valauto' || $tipo == 'pfraude' || $tipo == 'eorden' || $tipo == 'facturas' || $tipo == 'offline') {
                            valores($con, $dia, $estanter);
                        }

                        if($tipo == 'valautopv' || $tipo == 'pfraudepv' || $tipo == 'eordenpv' || $tipo == 'facturapv' || $tipo == 'offlinepv') {
                            pendientes($con, $dia, $estanter);
                        }

                        if($tipo == 'anupfraude' || $tipo == 'anueorden' || $tipo == 'anufactura' || $tipo == 'anuoffline') {
                            anuladas($con, $dia, $estanter);
                        }

                        if($tipo == 'cctiva' || $tipo == 'cctivam'){
                            clickCollect($con, $dia, $estanter);
                        }

                        if($tipo == 'mayor'){
                            SLA($con, $dia);
                        }
                    ?>


                </tbody>
            </table>
        </div>

        <script src="jquery-1.12.0.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="jquery.sticky.js"></script>

        <script>
            $('table').stickyTableHeaders();
        </script>
    </body>
</html>



<?php


    function valores($con, $dia, $estanter)
    {
        $query = "select active from activo";

        $res = $con->query($query);

        while($row = mysqli_fetch_assoc($res)){
            if($row['active'] == 1)
                $query = "select * from auxvalidar WHERE fecorden = $dia AND ESTANTER = $estanter
                  group by numorden having count(numorden)>=1 order by feccambio desc, horcambio  desc";
            else
                $query = "select * from validar WHERE fecorden = $dia AND ESTANTER = $estanter
                  group by numorden having count(numorden)>=1 order by feccambio desc, horcambio  desc";
        }

        $res = $con->query($query);

        $i=1;

        while ($row = mysqli_fetch_assoc($res)) {
            echo "<tr class='columnas'><td><h5 class='text-center'>" . $i . "</h5></td>";
            echo "<td><h5 class='text-center'>" . $row['numorden'] . "</h5></td>";
            echo "<td><h5 class='text-center'>" . $row['fecorden'] . "</h5></td>";
            echo "<td><h5 class='text-center'>" . $row['horaorden'] . "</h5></td>";
            echo "<td><h5 class='text-center'>" . $row['estorden'] . "</h5></td>";
            echo "<td><h5 class='text-center'>" . $row['estactua'] . "</h5></td>";
            echo "<td><h5 class='text-center'>" . $row['estanter'] . "</h5></td>";
            echo "<td><h5 class='text-center'>" . $row['correl'] . "</h5></td>";
            echo "<td><h5 class='text-center'>" . $row['feccambio'] . "</h5></td>";
            echo "<td><h5 class='text-center'>" . $row['horcambio'] . "</h5></td>";
            echo "<td><h5 class='text-center'>" . $row['coddesp'] . "</h5></td>";
            echo "<td><h5 class='text-center'>" . $row['usuario'] . "</h5></td>";
            echo "<td><h5 class='text-center'>" . $row['campo2'] . "</h5></td></tr>";
            $i++;
        }
    }

    function pendientes($con, $dia, $estanter)
    {

        $query = "select active from activo";

        $res = $con->query($query);

        while($row = mysqli_fetch_assoc($res)){
            if($row['active'] == 1) {
                $noIncluir = "select * from auxvalidar WHERE fecorden = $dia
                  AND ESTANTER = $estanter AND estorden not in (80, 99)
                  group by numorden having count(numorden)>=1 order by feccambio desc, horcambio  desc";
            }
            else {
                $noIncluir = "select * from validar WHERE fecorden = $dia
                  AND ESTANTER = $estanter AND estorden not in (80, 99)
                  group by numorden having count(numorden)>=1 order by feccambio desc, horcambio  desc";
            }
        }

        $res = $con->query($noIncluir);

        $num = mysqli_num_rows($res); $i = 1;

        //$no = "(";



        while($row = mysqli_fetch_assoc($res)){
            echo "<tr class='columnas'><td><h5 class='text-center'>" . $i . "</h5></td>";
            echo "<td><h5 class='text-center'>" . $row['numorden'] . "</h5></td>";
            echo "<td><h5 class='text-center'>" . $row['fecorden'] . "</h5></td>";
            echo "<td><h5 class='text-center'>" . $row['horaorden'] . "</h5></td>";
            echo "<td><h5 class='text-center'>" . $row['estorden'] . "</h5></td>";
            echo "<td><h5 class='text-center'>" . $row['estactua'] . "</h5></td>";
            echo "<td><h5 class='text-center'>" . $row['estanter'] . "</h5></td>";
            echo "<td><h5 class='text-center'>" . $row['correl'] . "</h5></td>";
            echo "<td><h5 class='text-center'>" . $row['feccambio'] . "</h5></td>";
            echo "<td><h5 class='text-center'>" . $row['horcambio'] . "</h5></td>";
            echo "<td><h5 class='text-center'>" . $row['coddesp'] . "</h5></td>";
            echo "<td><h5 class='text-center'>" . $row['usuario'] . "</h5></td>";
            echo "<td><h5 class='text-center'>" . $row['campo2'] . "</h5></td></tr>";



            /*$no = $no . $row['numorden'];
            if($i < $num - 1)
                $no = $no . ", ";*/
            $i++;
        }
    }

    function anuladas($con, $dia, $estanter)
    {

        $query = "select active from activo";

        $res = $con->query($query);

        while($row = mysqli_fetch_assoc($res)){
            if($row['active'] == 1)
                $query = "select * from auxvalidar where fecorden = $dia and estorden = 80 and
                  estanter = $estanter group by numorden having count(numorden) >= 1 order by feccambio desc, horcambio  desc";
            else
                $query = "select * from validar where fecorden = $dia and estorden = 80 and
                  estanter = $estanter group by numorden having count(numorden) >= 1 order by feccambio desc, horcambio  desc";
        }

            $res = $con->query($query);

            $i=1;

            while ($row = mysqli_fetch_assoc($res)) {
                echo "<tr class='columnas'><td><h5 class='text-center'>" . $i . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['numorden'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['fecorden'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['horaorden'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['estorden'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['estactua'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['estanter'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['correl'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['feccambio'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['horcambio'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['coddesp'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['usuario'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['campo2'] . "</h5></td></tr>";
                $i++;
            }

        /*if ($estanter == 123481){
            $query = "select * from validar where fecorden = $dia and estorden = 80 and
                  (estanter = 1 or estanter = 2 or estanter = 34 or estanter = 81) group by numorden having count(numorden) >= 1";

            $res = $con->query($query);

            $i=1;

            while ($row = mysqli_fetch_assoc($res)) {
                echo "<tr class='columnas'><td><h5 class='text-center'>" . $i . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['numorden'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['fecorden'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['horaorden'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['estorden'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['estactua'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['estanter'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['correl'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['feccambio'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['horcambio'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['coddesp'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['usuario'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['campo2'] . "</h5></td></tr>";
                $i++;
            }
        }*/
    }

    function clickCollect($con, $dia, $estanter)
    {
        $activo = 0;
        $query = "select active from activo";

        $res = $con->query($query);

        while($row = mysqli_fetch_assoc($res)){
            if($row['active'] == 1)
                $activo = 1;
        }

        if ($estanter == 0){
            $query = "select * from validar WHERE fecorden = $dia AND ESTANTER = $estanter
            AND coddesp = 22 group by numorden having count(numorden)>=1 order by feccambio desc, horcambio  desc";

            if($activo == 1)
                $query = "select * from auxvalidar WHERE fecorden = $dia AND ESTANTER = $estanter
            AND coddesp = 22 group by numorden having count(numorden)>=1 order by feccambio desc, horcambio  desc";

            $res = $con->query($query);

            $i=1;

            while ($row = mysqli_fetch_assoc($res)) {
                echo "<tr class='columnas'><td><h5 class='text-center'>" . $i . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['numorden'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['fecorden'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['horaorden'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['estorden'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['estactua'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['estanter'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['correl'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['feccambio'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['horcambio'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['coddesp'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['usuario'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['campo2'] . "</h5></td></tr>";
                $i++;
            }
        }

        if ($estanter == 123481){
            $query = "select * from validar where fecorden = $dia AND coddesp = 22 and
                      (estanter = 1 or estanter = 2 or estanter = 34 or estanter = 81) group by numorden having count(numorden) >= 1";
            if($activo == 1)
                $query = "select * from auxvalidar where fecorden = $dia AND coddesp = 22 and
                      (estanter = 1 or estanter = 2 or estanter = 34 or estanter = 81) group by numorden having count(numorden) >= 1";


            $res = $con->query($query);

            $i=1;

            while ($row = mysqli_fetch_assoc($res)) {
                echo "<tr class='columnas'><td><h5 class='text-center'>" . $i . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['numorden'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['fecorden'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['horaorden'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['estorden'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['estactua'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['estanter'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['correl'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['feccambio'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['horcambio'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['coddesp'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['usuario'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['campo2'] . "</h5></td></tr>";
                $i++;
            }
        }
    }

    function SLA($con, $dia)
    {
        ini_set("max_execution_time", 0);
        $activo = 0;
        $query = "select active from activo";

        $res = $con->query($query);

        while($row = mysqli_fetch_assoc($res)){
            if($row['active'] == 1)
                $activo = 1;
        }

        $query = "select numorden as vnumorden, fecorden as vfecorden, horaorden as vhoraorden, estorden as vestorden,
                 estactua as vestactua, estanterval as vestanter, feccambio as vfeccambio,
                  horcambio as vhorcambio, coddesp as vcoddesp, usuario as vusuario
                  from tiempo where (estanterval = 1 or estanterval = 2 or estanterval = 34 or estanterval = 81)
                  and estactua = 90 and fecorden = $dia and fuerasla = 1
                  and estanter not in (31, 38) group by numorden HAVING count(numorden) >= 1 order by feccambio desc";

        if($activo == 1)
            $query = "select numorden as vnumorden, fecorden as vfecorden, horaorden as vhoraorden, estorden as vestorden,
                  estactua as vestactua, estanterval as vestanter, feccambio as vfeccambio,
                  horcambio as vhorcambio, coddesp as vcoddesp, usuario as vusuario
                  from auxtiempo where (estanterval = 1 or estanterval = 2 or estanterval = 34 or estanterval = 81)
                  and estactua = 90 and fecorden = $dia and fuerasla = 1
                  and estanter not in (31, 38) group by numorden HAVING count(numorden) >= 1 order by feccambio desc";

        $res = $con->query($query);

        $prom = 0;
        $i = 1;

        while($row = mysqli_fetch_assoc($res)) {
            /*$fechacambio = $row['vfeccambio'];
            $fechaorden = $row['vfecorden'];
            $horacambio = $row['vhorcambio'];
            $horaorden = $row['vhoraorden'];

            if (($fechacambio - $fechaorden) == 0)
                $sla = $horacambio - $horaorden;
            else {
                if (($fechacambio - $fechaorden) == 1)
                    $sla = 23590000 - $horaorden + $horacambio;
                else {
                    if (($fechacambio - $fechaorden) > 1)
                        $sla = 24 * ($fechacambio - $fechaorden - 1) + 23590000 - $horaorden + $horacambio;
                    else
                        $sla = "error";
                }
            }

            if ($sla != "error") {
                if (strlen($sla) > 7) {
                    $sla = str_split($sla);
                    $prom = $sla[0] . $sla[1];
                } else {
                    if (strlen($sla) > 6) {
                        $sla = str_split($sla);
                        $prom = $sla[0] * 1;
                    } else {
                        if (strlen($sla) > 5)
                            $prom = 0.5;
                        else
                            $prom = 0.1;
                    }
                }
            }*/

            //if($prom > 24){
                echo "<tr class='columnas'><td><h5 class='text-center'>" . $i . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['vnumorden'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['vfecorden'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['vhoraorden'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['vestorden'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['vestactua'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['vestanter'] . "</h5></td>";
                echo "<td><h5 class='text-center' style='color: lightgrey'>none</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['vfeccambio'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['vhorcambio'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['vcoddesp'] . "</h5></td>";
                echo "<td><h5 class='text-center'>" . $row['vusuario'] . "</h5></td>";
                echo "<td><h5 class='text-center' style='color: lightgrey'>none</h5></td></tr>";
                $i++;
            //}
        }
    }

?>
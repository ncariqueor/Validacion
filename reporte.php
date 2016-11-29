<html lang="es" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="UTF-8">
        <title>Validacion</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css" />
        <link rel="stylesheet" type="text/css" href="bootstrap-select/dist/css/bootstrap-select.css" />
        <link rel="stylesheet" type="text/css" href="estilo.css" />
    </head>
    <body onload="asignar();">
        <script>
            var int=self.setInterval("refresh()", 1000);
            function refresh()
            {
                fecha = new Date();
                if((fecha.getMinutes() == 0 && fecha.getSeconds() == 0) || (fecha.getMinutes() == 15 && fecha.getSeconds() == 0) || (fecha.getMinutes() == 30 && fecha.getSeconds() == 0) || (fecha.getMinutes() == 45 && fecha.getSeconds() == 0))
                    location.reload(true);
            }
        </script>

        <script>
            function asignar(){
                var month = document.getElementById("mes").value;
                var year = document.getElementById("anio").value;
                document.getElementById("exportar").href = "exportar.php?mes="+month+"&anio="+year;
            }
        </script>

        <header class="container">
            <nav class="navbar navbar-default">
                <div class="btn-group-sm">
                    <div class="row">
                        <div class="col-md-12"><h3 class="text-center"><a href="http://10.95.17.114/paneles"><img src="paris.png" width="140px" height="100px" title="Reportes Paris"></a> Performance Validación </h3></div>
                    </div><br>
                    <form action="reporte.php" method="post" class="row">
                        <div class="col-lg-4"><h5>Ultima actualizacion hoy, a las <?php echo hora();?> horas</h5></div>
                        <div class="col-lg-8">
                            <select name="mes" id="mes" class="selectpicker" title="Mes" onchange="asignar();" data-style="btn btn-default btn-sm">
                                    <?php
                                    if(isset($_POST['mes'])){
                                        $mes = $_POST['mes'];
                                        if($mes == '01') {
                                            echo "<option value='01' selected='selected'>Enero</option>";
                                            echo "<option value='02'>Febrero</option>";
                                            echo "<option value='03'>Marzo</option>";
                                            echo "<option value='04'>Abril</option>";
                                            echo "<option value='05'>Mayo</option>";
                                            echo "<option value='06'>Junio</option>";
                                            echo "<option value='07'>Julio</option>";
                                            echo "<option value='08'>Agosto</option>";
                                            echo "<option value='09'>Septiembre</option>";
                                            echo "<option value='10'>Octubre</option>";
                                            echo "<option value='11'>Noviembre</option>";
                                            echo "<option value='12'>Diciembre</option>";
                                        }else{
                                            if($mes == '02'){
                                                echo "<option value='01'>Enero</option>";
                                                echo "<option value='02' selected='selected'>Febrero</option>";
                                                echo "<option value='03'>Marzo</option>";
                                                echo "<option value='04'>Abril</option>";
                                                echo "<option value='05'>Mayo</option>";
                                                echo "<option value='06'>Junio</option>";
                                                echo "<option value='07'>Julio</option>";
                                                echo "<option value='08'>Agosto</option>";
                                                echo "<option value='09'>Septiembre</option>";
                                                echo "<option value='10'>Octubre</option>";
                                                echo "<option value='11'>Noviembre</option>";
                                                echo "<option value='12'>Diciembre</option>";
                                            } else{
                                                if($mes == '03'){
                                                    echo "<option value='01'>Enero</option>";
                                                    echo "<option value='02'>Febrero</option>";
                                                    echo "<option value='03' selected='selected'>Marzo</option>";
                                                    echo "<option value='04'>Abril</option>";
                                                    echo "<option value='05'>Mayo</option>";
                                                    echo "<option value='06'>Junio</option>";
                                                    echo "<option value='07'>Julio</option>";
                                                    echo "<option value='08'>Agosto</option>";
                                                    echo "<option value='09'>Septiembre</option>";
                                                    echo "<option value='10'>Octubre</option>";
                                                    echo "<option value='11'>Noviembre</option>";
                                                    echo "<option value='12'>Diciembre</option>";
                                                }else{
                                                    if($mes == '04'){
                                                        echo "<option value='01'>Enero</option>";
                                                        echo "<option value='02'>Febrero</option>";
                                                        echo "<option value='03'>Marzo</option>";
                                                        echo "<option value='04' selected='selected'>Abril</option>";
                                                        echo "<option value='05'>Mayo</option>";
                                                        echo "<option value='06'>Junio</option>";
                                                        echo "<option value='07'>Julio</option>";
                                                        echo "<option value='08'>Agosto</option>";
                                                        echo "<option value='09'>Septiembre</option>";
                                                        echo "<option value='10'>Octubre</option>";
                                                        echo "<option value='11'>Noviembre</option>";
                                                        echo "<option value='12'>Diciembre</option>";
                                                    }else{
                                                        if($mes == '05'){
                                                            echo "<option value='01'>Enero</option>";
                                                            echo "<option value='02'>Febrero</option>";
                                                            echo "<option value='03'>Marzo</option>";
                                                            echo "<option value='04'>Abril</option>";
                                                            echo "<option value='05' selected='selected'>Mayo</option>";
                                                            echo "<option value='06'>Junio</option>";
                                                            echo "<option value='07'>Julio</option>";
                                                            echo "<option value='08'>Agosto</option>";
                                                            echo "<option value='09'>Septiembre</option>";
                                                            echo "<option value='10'>Octubre</option>";
                                                            echo "<option value='11'>Noviembre</option>";
                                                            echo "<option value='12'>Diciembre</option>";
                                                        }else{
                                                            if($mes == '06'){
                                                                echo "<option value='01'>Enero</option>";
                                                                echo "<option value='02'>Febrero</option>";
                                                                echo "<option value='03'>Marzo</option>";
                                                                echo "<option value='04'>Abril</option>";
                                                                echo "<option value='05'>Mayo</option>";
                                                                echo "<option value='06' selected='selected'>Junio</option>";
                                                                echo "<option value='07'>Julio</option>";
                                                                echo "<option value='08'>Agosto</option>";
                                                                echo "<option value='09'>Septiembre</option>";
                                                                echo "<option value='10'>Octubre</option>";
                                                                echo "<option value='11'>Noviembre</option>";
                                                                echo "<option value='12'>Diciembre</option>";
                                                            }else{
                                                                if($mes == '07'){
                                                                    echo "<option value='01'>Enero</option>";
                                                                    echo "<option value='02'>Febrero</option>";
                                                                    echo "<option value='03'>Marzo</option>";
                                                                    echo "<option value='04'>Abril</option>";
                                                                    echo "<option value='05'>Mayo</option>";
                                                                    echo "<option value='06'>Junio</option>";
                                                                    echo "<option value='07' selected='selected'>Julio</option>";
                                                                    echo "<option value='08'>Agosto</option>";
                                                                    echo "<option value='09'>Septiembre</option>";
                                                                    echo "<option value='10'>Octubre</option>";
                                                                    echo "<option value='11'>Noviembre</option>";
                                                                    echo "<option value='12'>Diciembre</option>";
                                                                }else{
                                                                    if($mes == '08'){
                                                                        echo "<option value='01'>Enero</option>";
                                                                        echo "<option value='02'>Febrero</option>";
                                                                        echo "<option value='03'>Marzo</option>";
                                                                        echo "<option value='04'>Abril</option>";
                                                                        echo "<option value='05'>Mayo</option>";
                                                                        echo "<option value='06'>Junio</option>";
                                                                        echo "<option value='07'>Julio</option>";
                                                                        echo "<option value='08' selected='selected'>Agosto</option>";
                                                                        echo "<option value='09'>Septiembre</option>";
                                                                        echo "<option value='10'>Octubre</option>";
                                                                        echo "<option value='11'>Noviembre</option>";
                                                                        echo "<option value='12'>Diciembre</option>";
                                                                    }else{
                                                                        if($mes == '09'){
                                                                            echo "<option value='01'>Enero</option>";
                                                                            echo "<option value='02'>Febrero</option>";
                                                                            echo "<option value='03'>Marzo</option>";
                                                                            echo "<option value='04'>Abril</option>";
                                                                            echo "<option value='05'>Mayo</option>";
                                                                            echo "<option value='06'>Junio</option>";
                                                                            echo "<option value='07'>Julio</option>";
                                                                            echo "<option value='08'>Agosto</option>";
                                                                            echo "<option value='09' selected='selected'>Septiembre</option>";
                                                                            echo "<option value='10'>Octubre</option>";
                                                                            echo "<option value='11'>Noviembre</option>";
                                                                            echo "<option value='12'>Diciembre</option>";
                                                                        }else{
                                                                            if($mes == '10'){
                                                                                echo "<option value='01'>Enero</option>";
                                                                                echo "<option value='02'>Febrero</option>";
                                                                                echo "<option value='03'>Marzo</option>";
                                                                                echo "<option value='04'>Abril</option>";
                                                                                echo "<option value='05'>Mayo</option>";
                                                                                echo "<option value='06'>Junio</option>";
                                                                                echo "<option value='07'>Julio</option>";
                                                                                echo "<option value='08'>Agosto</option>";
                                                                                echo "<option value='09'>Septiembre</option>";
                                                                                echo "<option value='10' selected='selected'>Octubre</option>";
                                                                                echo "<option value='11'>Noviembre</option>";
                                                                                echo "<option value='12'>Diciembre</option>";
                                                                            }else{
                                                                                if($mes == '11'){
                                                                                    echo "<option value='01'>Enero</option>";
                                                                                    echo "<option value='02'>Febrero</option>";
                                                                                    echo "<option value='03'>Marzo</option>";
                                                                                    echo "<option value='04'>Abril</option>";
                                                                                    echo "<option value='05'>Mayo</option>";
                                                                                    echo "<option value='06'>Junio</option>";
                                                                                    echo "<option value='07'>Julio</option>";
                                                                                    echo "<option value='08'>Agosto</option>";
                                                                                    echo "<option value='09'>Septiembre</option>";
                                                                                    echo "<option value='10'>Octubre</option>";
                                                                                    echo "<option value='11' selected='selected'>Noviembre</option>";
                                                                                    echo "<option value='12'>Diciembre</option>";
                                                                                }else{
                                                                                    if($mes == '12'){
                                                                                        echo "<option value='01'>Enero</option>";
                                                                                        echo "<option value='02'>Febrero</option>";
                                                                                        echo "<option value='03'>Marzo</option>";
                                                                                        echo "<option value='04'>Abril</option>";
                                                                                        echo "<option value='05'>Mayo</option>";
                                                                                        echo "<option value='06'>Junio</option>";
                                                                                        echo "<option value='07'>Julio</option>";
                                                                                        echo "<option value='08'>Agosto</option>";
                                                                                        echo "<option value='09'>Septiembre</option>";
                                                                                        echo "<option value='10'>Octubre</option>";
                                                                                        echo "<option value='11'>Noviembre</option>";
                                                                                        echo "<option value='12' selected='selected'>Diciembre</option>";
                                                                                    }else{
                                                                                        echo "<option value='01'>Enero</option>";
                                                                                        echo "<option value='02'>Febrero</option>";
                                                                                        echo "<option value='03'>Marzo</option>";
                                                                                        echo "<option value='04'>Abril</option>";
                                                                                        echo "<option value='05'>Mayo</option>";
                                                                                        echo "<option value='06'>Junio</option>";
                                                                                        echo "<option value='07'>Julio</option>";
                                                                                        echo "<option value='08'>Agosto</option>";
                                                                                        echo "<option value='09'>Septiembre</option>";
                                                                                        echo "<option value='10'>Octubre</option>";
                                                                                        echo "<option value='11'>Noviembre</option>";
                                                                                        echo "<option value='12'>Diciembre</option>";
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    else{
                                        $m = date("m");
                                        if($m == '01')
                                            echo "<option selected = 'selected' value='01'>Enero</option>";
                                        else
                                            echo "<option value='01'>Enero</option>";

                                        if($m == '02')
                                            echo "<option selected = 'selected' value='02'>Febrero</option>";
                                        else
                                            echo "<option value='02'>Febrero</option>";

                                        if($m == '03')
                                            echo "<option selected = 'selected' value='03'>Marzo</option>";
                                        else
                                            echo "<option value='03'>Marzo</option>";

                                        if($m == '04')
                                            echo "<option selected = 'selected' value='04'>Abril</option>";
                                        else
                                            echo "<option value='04'>Abril</option>";

                                        if($m == '05')
                                            echo "<option selected = 'selected' value='05'>Mayo</option>";
                                        else
                                            echo "<option value='05'>Mayo</option>";

                                        if($m == '06')
                                            echo "<option selected = 'selected' value='06'>Junio</option>";
                                        else
                                            echo "<option value='06'>Junio</option>";

                                        if($m == '07')
                                            echo "<option selected = 'selected' value='07'>Julio</option>";
                                        else
                                            echo "<option value='07'>Julio</option>";

                                        if($m == '08')
                                            echo "<option selected = 'selected' value='08'>Agosto</option>";
                                        else
                                            echo "<option value='08'>Agosto</option>";

                                        if($m == '09')
                                            echo "<option selected = 'selected' value='09'>Septiembre</option>";
                                        else
                                            echo "<option value='09'>Septiembre</option>";

                                        if($m == '10')
                                            echo "<option selected = 'selected' value='10'>Octubre</option>";
                                        else
                                            echo "<option value='10'>Octubre</option>";

                                        if($m == '11')
                                            echo "<option selected = 'selected' value='11'>Noviembre</option>";
                                        else
                                            echo "<option value='11'>Noviembre</option>";

                                        if($m == '12')
                                            echo "<option selected = 'selected' value='12'>Diciembre</option>";
                                        else
                                            echo "<option value='12'>Diciembre</option>";
                                    }
                                    ?>
                                </select>

                            <select name="anio" id="anio" class="selectpicker" title="Año" onchange="asignar();" data-style="btn btn-default btn-sm" data-width="100px">
                                    <?php
                                    if(isset($_POST['anio'])){
                                        $anio = $_POST['anio'];
                                        $actual = date("Y");
                                        for($dia = 2015; $dia <= $actual; $dia++){
                                            if($anio == $dia)
                                                echo "<option selected='selected' value='" . $dia . "'>" . $dia . "</option>";
                                            else
                                                echo "<option value='" . $dia . "'>" . $dia . "</option>";
                                        }
                                    }else{
                                        $actual = date("Y");
                                        for($dia = 2015; $dia <= $actual; $dia++){
                                            if($dia == $actual)
                                                echo "<option value='" . $dia . "' selected='selected'>" . $dia . "</option>";
                                            else
                                                echo "<option value='" . $dia . "'>" . $dia . "</option>";
                                        }

                                    }

                                    ?>
                                </select>

                            <input class="btn btn-sm btn-primary" id="buscar" type="submit" value="Actualizar">

                            <a id="exportar" class="btn btn-success btn-sm" href="#">Exportar <img src="excel.png" width="15px" height="15px"></a>

                            <a class="btn btn-default btn-sm" href="query.php" style="margin-left: 300px;">Query Validaciones <img id="txt" src="images.png"></a>
                        </div>
                    </form>
                </div>
            </nav>
        </header>

        <div /*class="panel panel-default"*/>

            <table class="table table-condensed table-bordered table-responsive"  style="background-color: white;">

                <thead style="background-color: white;">
                    <tr>

                        <td rowspan="3"><h5 class="text-center">Día Actual</h5></td>
                        <td colspan="10" style="background-color: #DFE5FF; border-right-color: black;"><h6 class="text-center">Tipo de Validación</h6></td>
                        <td colspan="10" style="border-right-color: black;"><h6 class="text-center">Pendiente de Validación</h6></td>
                        <td colspan="3" style="background-color: #E8FFDA; border-right-color: black;"><h6 class="text-center">SLA: Tiempo de Validación</h6></td>
                        <td colspan="8" style="border-right-color: black;"><h6 class="text-center">Anuladas</h6></td>
                        <td colspan="4" style="background-color: #DFE5FF;"><h6 class="text-center">Ordenes C&C</h6></td>

                    </tr>

                    <tr>
                        <th colspan="2" style="background-color: #DFE5FF;"><h6 class="text-center">Automática</h6></th>
                        <th colspan="2" style="background-color: #DFE5FF;"><h6 class="text-center">Posible Fraude</h6></th>
                        <th colspan="2" style="background-color: #DFE5FF;"><h6 class="text-center">Error Orden</h6></th>
                        <th colspan="2" style="background-color: #DFE5FF;"><h6 class="text-center">Facturas</h6></th>
                        <th colspan="2" style="background-color: #DFE5FF; border-right-color: black;"><h6 class="text-center">Ordenes Offline</h6></th>

                        <th colspan="2"><h6 class="text-center">Error Sistemas</h6></th>
                        <th colspan="2"><h6 class="text-center">Posible Fraude</h6></th>
                        <th colspan="2"><h6 class="text-center">Error Orden</h6></th>
                        <th colspan="2"><h6 class="text-center">Facturas</h6></th>
                        <th colspan="2" style="border-right-color: black;"><h6 class="text-center">Ordenes Offline</h6></th>

                        <th colspan="1" rowspan="2" style="background-color: #E8FFDA;"><h6 class="text-center">Tpo. Prom. (Hrs.)</h6></th>
                        <th colspan="1" rowspan="2" style="background-color: #E8FFDA;"><h6 class="text-center">> 24 horas</h6></th>
                        <th colspan="1" rowspan="2" style="background-color: #E8FFDA; border-right-color: black;"><h6 class="text-center">% Cump.</h6></th>

                        <th colspan="2"><h6 class="text-center">Posible Fraude</h6></th>
                        <th colspan="2"><h6 class="text-center">Error Orden</h6></th>
                        <th colspan="2"><h6 class="text-center">Facturas</h6></th>
                        <th colspan="2" style="border-right-color: black;"><h6 class="text-center">Ordenes Offline</h6></th>

                        <th colspan="2" style="background-color: #DFE5FF;"><h6 class="text-center">Automática</h6></th>
                        <th colspan="2" style="background-color: #DFE5FF;"><h6 class="text-center">Manual</h6></th>


                    </tr>

                    <tr>
                        <th colspan="1" style="background-color: #DFE5FF;"><h5 class="text-center">#</h5></th>
                        <th colspan="1" style="background-color: #DFE5FF;"><h5 class="text-center">%</h5></th>

                        <th colspan="1" style="background-color: #DFE5FF;"><h5 class="text-center">#</h5></th>
                        <th colspan="1" style="background-color: #DFE5FF;"><h5 class="text-center">%</h5></th>

                        <th colspan="1" style="background-color: #DFE5FF;"><h5 class="text-center">#</h5></th>
                        <th colspan="1" style="background-color: #DFE5FF;"><h5 class="text-center">%</h5></th>

                        <th colspan="1" style="background-color: #DFE5FF;"><h5 class="text-center">#</h5></th>
                        <th colspan="1" style="background-color: #DFE5FF;"><h5 class="text-center">%</h5></td>

                        <th colspan="1" style="background-color: #DFE5FF;"><h5 class="text-center">#</h5></th>
                        <th colspan="1" style="background-color: #DFE5FF; border-right-color: black;"><h5 class="text-center">%</h5></th>


                        <th colspan="1"><h5 class="text-center">#</h5></th>
                        <th colspan="1"><h5 class="text-center">%</h5></th>

                        <th colspan="1"><h5 class="text-center">#</h5></th>
                        <th colspan="1"><h5 class="text-center">%</h5></th>

                        <th colspan="1"><h5 class="text-center">#</h5></th>
                        <th colspan="1"><h5 class="text-center">%</h5></th>

                        <th colspan="1"><h5 class="text-center">#</h5></th>
                        <th colspan="1"><h5 class="text-center">%</h5></th>

                        <th colspan="1"><h5 class="text-center">#</h5></th>
                        <th colspan="1" style="border-right-color: black;"><h5 class="text-center">%</h5></th>

                        <th colspan="1"><h5 class="text-center">#</h5></th>
                        <th colspan="1"><h5 class="text-center">%</h5></th>

                        <th colspan="1"><h5 class="text-center">#</h5></th>
                        <th colspan="1"><h5 class="text-center">%</h5></th>

                        <th colspan="1"><h5 class="text-center">#</h5></th>
                        <th colspan="1"><h5 class="text-center">%</h5></th>

                        <th colspan="1"><h5 class="text-center">#</h5></th>
                        <th colspan="1" style="border-right-color: black;"><h5 class="text-center">%</h5></th>

                        <th colspan="1" style="background-color: #DFE5FF;"><h5 class="text-center">#</h5></th>
                        <th colspan="1" style="background-color: #DFE5FF;"><h5 class="text-center">%</h5></th>

                        <th colspan="1" style="background-color: #DFE5FF;"><h5 class="text-center">#</h5></th>
                        <th colspan="1" style="background-color: #DFE5FF;"><h5 class="text-center">%</h5></th>
                    </tr>

                </thead>

                    <?php
                    if(isset($_POST['mes']) && isset($_POST['anio'])) {
                        $mes = $_POST['mes'];
                        $anio = $_POST['anio'];
                        $buscar = $anio . $mes;
                        $con = new mysqli('localhost', 'root', '', 'validacion');

                        $res = $con->query("select active from activo");

                        $activo = 0;

                        while($row = mysqli_fetch_assoc($res))
                            $activo = $row['active'];

                        $query = "select sum(valauto) as valauto, sum(pfraude) as pfraude, sum(eorden) as eorden, sum(factura) as factura,
                                         sum(offline) as offline, sum(valautopv) as valautopv, sum(pfraudepv) as pfraudepv, sum(eordenpv) as eordenpv,
                                         sum(facturapv) as facturapv, sum(offlinepv) as offlinepv, sum(anupfraude) as anupfraude,
                                         sum(anueorden) as anueorden, sum(anufactura) as anufactura, sum(anuoffline) as anuoffline,
                                         sum(cctiva) as cctiva, sum(cctivam) as cctivam from resultados where dia like '$buscar%'";

                        if($activo == 1)
                            $query = "select sum(valauto) as valauto, sum(pfraude) as pfraude, sum(eorden) as eorden, sum(factura) as factura,
                                         sum(offline) as offline, sum(valautopv) as valautopv, sum(pfraudepv) as pfraudepv, sum(eordenpv) as eordenpv,
                                         sum(facturapv) as facturapv, sum(offlinepv) as offlinepv, sum(anupfraude) as anupfraude,
                                         sum(anueorden) as anueorden, sum(anufactura) as anufactura, sum(anuoffline) as anuoffline,
                                         sum(cctiva) as cctiva, sum(cctivam) as cctivam from auxresult where dia like '$buscar%'";

                        $res = $con->query($query);

                        $valauto = 0;
                        $pfraude = 0;
                        $eorden = 0;
                        $factura = 0;
                        $offline = 0;

                        $valautopv = 0;
                        $pfraudepv = 0;
                        $eordenpv = 0;
                        $facturapv = 0;
                        $offlinepv = 0;

                        $anupfraude = 0;
                        $anueorden = 0;
                        $anufactura = 0;
                        $anuoffline = 0;

                        $cctiva = 0;
                        $cctivam = 0;

                        while($row = mysqli_fetch_assoc($res)){
                            $valauto = $row['valauto'];
                            $pfraude = $row['pfraude'];
                            $eorden = $row['eorden'];
                            $factura = $row['factura'];
                            $offline = $row['offline'];

                            $valautopv = $row['valautopv'];
                            $pfraudepv = $row['pfraudepv'];
                            $eordenpv = $row['eordenpv'];
                            $facturapv = $row['facturapv'];
                            $offlinepv = $row['offlinepv'];

                            $anupfraude = $row['anupfraude'];
                            $anueorden = $row['anueorden'];
                            $anufactura = $row['anufactura'];
                            $anuoffline = $row['anuoffline'];

                            $cctiva = $row['cctiva'];
                            $cctivam = $row['cctivam'];
                        }

                        $total = $valauto + $pfraude + $eorden + $factura + $offline;

                        $totalpv = $valautopv + $pfraudepv + $eordenpv + $facturapv + $offlinepv;

                        $totalanu = $anupfraude + $anueorden + $anufactura + $anuoffline;

                        $totalcc = $cctiva + $cctivam;

                        //NORMAL

                        $porvalauto = 0;

                        $porpfraude = 0;

                        $poreorden = 0;

                        $porfactura = 0;

                        $poroffline = 0;

                        if($total > 0) {
                            $porvalauto = round(($valauto / $total) * 100, 1);

                            $porpfraude = round(($pfraude / $total) * 100, 1);

                            $poreorden = round(($eorden / $total) * 100, 1);

                            $porfactura = round(($factura / $total) * 100, 1);

                            $poroffline = round(($offline / $total) * 100, 1);
                        }

                        //FIN NORMAL

                        //PV

                        $porvalautopv = 0;

                        $porpfraudepv = 0;

                        $poreordenpv = 0;

                        $porfacturapv = 0;

                        $porofflinepv = 0;

                        if($totalpv > 0) {
                            $porvalautopv = round(($valautopv / $totalpv) * 100, 1);

                            $porpfraudepv = round(($pfraudepv / $totalpv) * 100, 1);

                            $poreordenpv = round(($eordenpv / $totalpv) * 100, 1);

                            $porfacturapv = round(($facturapv / $totalpv) * 100, 1);

                            $porofflinepv = round(($offlinepv / $totalpv) * 100, 1);
                        }

                        //FIN PV

                        //ANULADAS

                        $poranupfraude = 0;

                        $poranueorden = 0;

                        $poranufactura = 0;

                        $poranuoffline = 0;

                        if($totalanu > 0) {
                            $poranupfraude = round(($anupfraude / $totalanu) * 100, 1);

                            $poranueorden = round(($anueorden / $totalanu) * 100, 1);

                            $poranufactura = round(($anufactura / $totalanu) * 100, 1);

                            $poranuoffline = round(($anuoffline / $totalanu) * 100, 1);
                        }

                        //FIN ANULADAS

                        //C&C

                        $porcctiva = 0;

                        $porcctivam = 0;

                        if($totalcc > 0) {

                            $porcctiva = round(($cctiva / $totalcc) * 100, 1);

                            $porcctivam = round(($cctivam / $totalcc) * 100, 1);
                        }

                        //FIN C&C

                        $valauto = number_format($valauto, 0, ',', '.');

                        $porvalauto = number_format($porvalauto, 1, ',', '.');

                        $pfraude = number_format($pfraude, 0, ',', '.');

                        $porpfraude = number_format($porpfraude, 1, ',', '.');

                        $eorden = number_format($eorden, 0, ',', '.');

                        $poreorden = number_format($poreorden, 1, ',', '.');

                        $factura = number_format($factura, 0, ',', '.');

                        $porfactura = number_format($porfactura, 1, ',', '.');

                        $offline = number_format($offline, 0, ',', '.');

                        $poroffline = number_format($poroffline, 1, ',', '.');

                        $valautopv = number_format($valautopv, 0, ',', '.');

                        $porvalautopv = number_format($porvalautopv, 1, ',', '.');

                        $pfraudepv = number_format($pfraudepv, 0, ',', '.');

                        $porpfraudepv = number_format($porpfraudepv, 1, ',', '.');

                        $eordenpv = number_format($eordenpv, 0, ',', '.');

                        $poreordenpv = number_format($poreordenpv, 1, ',', '.');

                        $facturapv = number_format($facturapv, 0, ',', '.');

                        $porfacturapv = number_format($porfacturapv, 1, ',', '.');

                        $offlinepv = number_format($offlinepv, 0, ',', '.');

                        $porofflinepv = number_format($porofflinepv, 1, ',', '.');

                        $anupfraude = number_format($anupfraude, 0, ',', '.');

                        $poranupfraude = number_format($poranupfraude, 1, ',', '.');

                        $anueorden = number_format($anueorden, 0, ',', '.');

                        $poranueorden = number_format($poranueorden, 1, ',', '.');

                        $anufactura = number_format($anufactura, 0, ',', '.');

                        $poranufactura = number_format($poranufactura, 1, ',', '.');

                        $cctiva = number_format($cctiva, 0, ',', '.');

                        $porcctiva = number_format($porcctiva, 1, ',', '.');

                        $cctivam = number_format($cctivam, 0, ',', '.');

                        $porcctivam = number_format($porcctivam, 1, ',', '.');

                        echo "<tr class='columnas' style='background-color: #DEE1FF;'><td nowrap='100px'><h6 class='text-center'>Total</h6></td>";
                        echo "<td><h6 class='text-center text-primary' title='Cantidad Validacion Automática'>$valauto</h6></td>";
                        echo "<td><h6 class='text-center' title='Porcentaje de Validaciones Automáticas'>" . $porvalauto . " %</h6></td>";
                        echo "<td><h6 class='text-center text-primary' title='Cantidad Posible Fraude'>" . $pfraude . "</h6></td>";
                        echo "<td><h6 class='text-center' title='Porcentaje de Posible Fraude'>" . $porpfraude . " %</h6></td>";
                        echo "<td><h6 class='text-center text-primary' title='Cantidad de Error de Orden'>" . $eorden . "</h6></td>";
                        echo "<td><h6 class='text-center' title='Porcentaje de Error de Orden'>" . $poreorden . " %</h6></td>";
                        echo "<td><h6 class='text-center text-primary' title='Cantidad de Facturas'>" . $factura . "</h6></td>";
                        echo "<td><h6 class='text-center' title='Porcentaje de Facturas'>" . $porfactura . " %</h6></td>";
                        echo "<td><h6 class='text-center text-primary' title='Cantidad Ordenes Offline'>" . $offline . "</h6></td>";
                        echo "<td style='border-right-color: black;'><h6 class='text-center' title='Porcentaje Ordenes Offline'>" . $poroffline . " %</h6></td>";

                        echo "<td><h6 class='text-center text-primary' title='Cantidad Error Sistemas (Pendiente de Validación)'>" . $valautopv . "</h6></td>";
                        echo "<td><h6 class='text-center' title='Cantidad Error Sistemas (Pendiente de Validación)'>" . $porvalautopv . " %</h6></td>";
                        echo "<td><h6 class='text-center text-primary' title='Cantidad Posible Fraude (Pendiente de Validación)'>" . $pfraudepv . "</h6></td>";
                        echo "<td><h6 class='text-center' title='Porcentaje Posible Fraude (Pendiente de Validación)'>" . $porpfraudepv . " %</h6></td>";
                        echo "<td><h6 class='text-center text-primary' title='Cantidad Error Orden (Pendiente de Validación)'>" . $eordenpv . "</h6></td>";
                        echo "<td><h6 class='text-center' title='Porcentaje Error Orden (Pendiente de Validación)'>" . $poreordenpv . " %</h6></td>";
                        echo "<td><h6 class='text-center text-primary' title='Cantidad de Facturas (Pendiente de Validación)'>" . $facturapv . "</h6></td>";
                        echo "<td><h6 class='text-center' title='Porcentaje de Facturas(Pendiente de Validación)'>" . $porfacturapv . " %</h6></td>";
                        echo "<td><h6 class='text-center text-primary' title='Cantidad de Ordenes Offline (Pendiente de Validación)'>" . $offlinepv . "</h6></td>";
                        echo "<td style='border-right-color: black;'><h6 class='text-center' title='Porcentaje de Ordenes Offline (Pendiente de Validación)'>" . $porofflinepv . " %</h6></td>";

                        echo "<td><h6 class='text-center' title='Tiempo Promedio' style='color: #DADADA;'>No aplica</h6></td>";
                        echo "<td><h6 class='text-center' title='Tiempo > 24 horas'  style='color: #DADADA;'>No aplica</h6></td>";
                        echo "<td style='border-right-color: black;'><h6 class='text-center' title='Porcentaje Cumplimiento'  style='color: #DADADA;'>No aplica</h6></td>";

                        echo "<td><h6 class='text-center text-primary' title='Anuladas Automáticamente'>" . $anupfraude . "</h6></td>";
                        echo "<td><h6 class='text-center' title='Porcentaje Anuladas Automáticamente'>" . $poranupfraude . " %</h6></td>";
                        echo "<td><h6 class='text-center text-primary' title='Anuladas Manualmente'>" . $anueorden . "</h6></td>";
                        echo "<td><h6 class='text-center' title='Porcentaje Anuladas Manualmente'>" . $poranueorden . " %</h6></td>";
                        echo "<td><h6 class='text-center text-primary' title='Anuladas Manualmente'>" . $anufactura . "</h6></td>";
                        echo "<td><h6 class='text-center' title='Porcentaje Anuladas Manualmente'>" . $poranufactura . " %</h6></td>";
                        echo "<td><h6 class='text-center text-primary' title='Anuladas Manualmente'>" . $anuoffline . "</h6></td>";
                        echo "<td style='border-right-color: black;'><h6 class='text-center' title='Porcentaje Anuladas Manualmente'>" . $poranuoffline . " %</h6></td>";

                        echo "<td><h6 class='text-center text-primary' title='C&C Validación Automática'>" . $cctiva . "</h6></td>";
                        echo "<td><h6 class='text-center' title='Porcentaje C&C Validación Automática'>" . $porcctiva . " %</h6></td>";
                        echo "<td><h6 class='text-center text-primary' title='C&C Validación Manual'>" . $cctivam . "</h6></td>";
                        echo "<td><h6 class='text-center' title='Porcentaje C&C Validación Manual'>" . $porcctivam . " %</h6></td></tr>";

                        $query = "select * from resultados where dia like '" . $buscar . "%' order by dia desc";


                        if($activo == 1)
                            $query = "select * from auxresult where dia like '" . $buscar . "%' order by dia desc";

                        $res = $con->query($query);

                        while ($row = mysqli_fetch_assoc($res)) {
                            if($row['dia'] != 0) {$dia = $row['dia']; $d = new DateTime($dia);}else $dia = '-';

                            if($row['valauto'] != 0) $valauto = number_format($row['valauto'], 0, ',', '.'); else $valauto = '-';

                            if($row['porvalauto'] != 0) $porvalauto = number_format($row['porvalauto'], 1, ',', '.') . "%"; else $porvalauto = '-';

                            if($row['pfraude'] != 0) $pfraude = $row['pfraude']; else $pfraude = '-';

                            if($row['porpfraude'] != 0) $porpfraude = number_format($row['porpfraude'], 1, ',','.') . "%"; else $porpfraude = '-';

                            if($row['porpfraude'] == 100.0) $porpfraude = round($row['porpfraude'], 0);

                            if($row['eorden'] != 0) $eorden = $row['eorden']; else $eorden = '-';

                            if($row['porerorden'] != 0) $porerorden = number_format($row['porerorden'], 1, ',', '.') . "%"; else $porerorden = '-';

                            if($row['factura'] != 0) $factura = $row['factura']; else $factura = '-';

                            if($row['porfactura'] != 0) $porfactura = number_format($row['porfactura'], 1, ',', '.') . "%"; else $porfactura = '-';

                            if($row['offline'] != 0) $offline = $row['offline']; else $offline = '-';

                            if($row['poroffline'] != 0) $poroffline = number_format($row['poroffline'], 1, ',', '.') . "%"; else $poroffline = '-';


                            $suma = ($row['valautopv'] + $row['pfraudepv'] + $row['eordenpv'] + $row['facturapv'] + $row['offlinepv']);

                            if($suma <= 0){
                                $porvalautopv = '-';
                                $porpfraudepv = '-';
                                $porerordenpv = '-';
                                $porfacturapv = '-';
                                $porofflinepv = '-';
                            }else{
                                $porvalautopv = number_format(($row['valautopv']/$suma)*100, 1, ',', '.');
                                $porpfraudepv = number_format(($row['pfraudepv']/$suma)*100, 1, ',', '.');
                                $porerordenpv = number_format(($row['eordenpv']/$suma)*100, 1, ',', '.');
                                $porfacturapv = number_format(($row['facturapv']/$suma)*100, 1, ',', '.');
                                $porofflinepv = number_format(($row['offlinepv']/$suma)*100, 1, ',', '.');
                            }

                            if($porvalautopv == '0,0' || $porvalautopv == '-') $porvalautopv = '-'; else $porvalautopv = $porvalautopv . " %";

                            if($porpfraudepv == '0,0' || $porpfraudepv == '-') $porpfraudepv = '-'; else $porpfraudepv = $porpfraudepv . " %";

                            if($porerordenpv == '0,0' || $porerordenpv == '-') $porerordenpv = '-'; else $porerordenpv = $porerordenpv . " %";

                            if($porfacturapv == '0,0' || $porfacturapv == '-') $porfacturapv = '-'; else $porfacturapv = $porfacturapv . " %";

                            if($porofflinepv == '0,0' || $porofflinepv == '-') $porofflinepv = '-'; else $porofflinepv = $porofflinepv . " %";



                            if($row['valautopv'] != 0) $valautopv = $row['valautopv']; else $valautopv = '-';

                            if($row['pfraudepv'] != 0) $pfraudepv = $row['pfraudepv']; else $pfraudepv = '-';

                            //if($row['porpfraudepv'] != 0) $porpfraudepv = number_format($row['porpfraudepv'], 1, ',', '.') . "%"; else $porpfraudepv = '-';

                            if($row['eordenpv'] != 0) $eordenpv = $row['eordenpv']; else $eordenpv = '-';

                            //if($row['porerordenpv'] != 0) $porerordenpv = number_format($row['porerordenpv'], 1, ',', '.') . "%"; else $porerordenpv = '-';

                            if($row['facturapv'] != 0) $facturapv = $row['facturapv']; else $facturapv = '-';

                            //if($row['porfacturapv'] != 0) $porfacturapv = number_format($row['porfacturapv'], 1, ',', '.') . "%"; else $porfacturapv = '-';

                            if($row['offlinepv'] != 0) $offlinepv = $row['offlinepv']; else $offlinepv = '-';

                            //if($row['porofflinepv'] != 0) $porofflinepv = number_format($row['porofflinepv'], 1, ',', '.') . "%"; else $porofflinepv = '-';




                            if($row['anupfraude'] != 0) $anupfraude = $row['anupfraude']; else $anupfraude = '-';

                            if($row['poranupfraude'] != 0) $poranupfraude = number_format($row['poranupfraude'], 1, ',', '.') . "%"; else $poranupfraude = '-';

                            if($row['anueorden'] != 0) $anueorden = $row['anueorden']; else $anueorden = '-';

                            if($row['poranueorden'] != 0) $poranueorden = number_format($row['poranueorden'], 1, ',', '.') . "%"; else $poranueorden = '-';

                            if($row['anufactura'] != 0) $anufactura = $row['anufactura']; else $anufactura = '-';

                            if($row['poranufactura'] != 0) $poranufactura = number_format($row['poranufactura'], 1, ',', '.') . "%"; else $poranufactura = '-';

                            if($row['anuoffline'] != 0) $anuoffline = $row['anuoffline']; else $anuoffline = '-';

                            if($row['poranuoffline'] != 0) $poranuoffline = number_format($row['poranuoffline'], 1, ',', '.') . "%"; else $poranuoffline = '-';




                            if($row['cctiva'] != 0) $cctiva = $row['cctiva']; else $cctiva = '-';

                            if($row['porcctiva'] != 0) $porcctiva = number_format($row['porcctiva'], 1, ',', '.') . "%"; else $porcctiva = '-';

                            if($row['cctivam'] != 0) $cctivam = $row['cctivam']; else $cctivam = '-';

                            if($row['porcctivam'] != 0) $porcctivam = number_format($row['porcctivam'], 1, ',', '.') . "%"; else $porcctivam = '-';

                            if(round($row['tprom']) != 0)
                                $tprom = number_format(round(($row['tprom']), 1), 1, ',', '.');
                            else
                                $tprom = '-';

                            if($row['mayorpfraude'] + $row['mayoreorden'] + $row['mayorfactura'] + $row['mayoroffline'] != 0)
                                $mayor = $row['mayorpfraude'] + $row['mayoreorden'] + $row['mayorfactura'] + $row['mayoroffline'];
                            else
                                $mayor = '-';

                            if($row['porcumplimiento'] != 0) {
                                $porcumplimiento = number_format($row['porcumplimiento'], 1, ',', '.');

                                if($porcumplimiento >= 98)
                                    $color = 'label label-success';

                                if($porcumplimiento>95 && $porcumplimiento < 98)
                                    $color = 'label label-warning';

                                if($porcumplimiento<=95)
                                    $color = 'label label-danger';

                                $porcumplimiento = $porcumplimiento . "%";

                            }else{$porcumplimiento = '-'; $color = '';}

                            if($valauto != '-')
                                $valauto = "<a href='recibir.php?dia=$dia&estanter=0&tipo=valauto'>" . $valauto . "</a>";

                            if($pfraude != '-')
                                $pfraude = "<a href='recibir.php?dia=$dia&estanter=1&tipo=pfraude'>" . $pfraude . "</a>";

                            if($eorden != '-')
                                $eorden = "<a href='recibir.php?dia=$dia&estanter=2&tipo=eorden'>" . $eorden . "</a>";

                            if($factura != '-')
                                $factura = "<a href='recibir.php?dia=$dia&estanter=34&tipo=facturas'>" . $factura . "</a>";

                            if($offline != '-')
                                $offline = "<a href='recibir.php?dia=$dia&estanter=81&tipo=offline'>" . $offline . "</a>";


                            if($valautopv != '-')
                                $valautopv = "<a href='recibir.php?dia=$dia&estanter=0&tipo=valautopv'>" . $valautopv . "</a>";

                            if($pfraudepv != '-')
                                $pfraudepv = "<a href='recibir.php?dia=$dia&estanter=1&tipo=pfraudepv'>" . $pfraudepv . "</a>";

                            if($eordenpv != '-')
                                $eordenpv = "<a href='recibir.php?dia=$dia&estanter=2&tipo=eordenpv'>" . $eordenpv . "</a>";

                            if($facturapv != '-')
                                $facturapv = "<a href='recibir.php?dia=$dia&estanter=34&tipo=facturapv'>" . $facturapv . "</a>";

                            if($offlinepv != '-')
                                $offlinepv = "<a href='recibir.php?dia=$dia&estanter=81&tipo=offlinepv'>" . $offlinepv . "</a>";



                            if($anupfraude != '-')
                                $anupfraude = "<a href='recibir.php?dia=$dia&estanter=1&tipo=anupfraude'>" . $anupfraude . "</a>";

                            if($anueorden != '-')
                                $anueorden = "<a href='recibir.php?dia=$dia&estanter=2&tipo=anueorden'>" . $anueorden . "</a>";

                            if($anufactura != '-')
                                $anufactura = "<a href='recibir.php?dia=$dia&estanter=34&tipo=anufactura'>" . $anufactura . "</a>";

                            if($anuoffline != '-')
                                $anuoffline = "<a href='recibir.php?dia=$dia&estanter=81&tipo=anuoffline'>" . $anuoffline . "</a>";



                            if($cctiva != '-')
                                $cctiva = "<a href='recibir.php?dia=$dia&estanter=0&tipo=cctiva'>" . $cctiva . "</a>";

                            if($cctivam != '-')
                                $cctivam = "<a href='recibir.php?dia=$dia&estanter=123481&tipo=cctivam'>" . $cctivam . "</a>";

                            if($mayor != '-')
                                $mayor = "<a href='recibir.php?dia=$dia&estanter=123481&tipo=mayor'>" . $mayor . "</a>";

                            echo "<tr class='columnas'><td nowrap='100px'><h6 class='text-center'>" . $d->format("d-m-Y") . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Cantidad Validacion Automática'>"  . $valauto . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Porcentaje de Validaciones Automáticas'>" . $porvalauto . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Cantidad Posible Fraude'>" . $pfraude . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Porcentaje de Posible Fraude'>" . $porpfraude . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Cantidad de Error de Orden'>" . $eorden . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Porcentaje de Error de Orden'>" . $porerorden . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Cantidad de Facturas'>" . $factura . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Porcentaje de Facturas'>" . $porfactura . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Cantidad Ordenes Offline'>" . $offline . "</h6></td>";
                            echo "<td style='border-right-color: black;'><h6 class='text-center' title='Porcentaje Ordenes Offline'>" . $poroffline . "</h6></td>";

                            echo "<td><h6 class='text-center' title='Cantidad Error Sistemas (Pendiente de Validación)'>" . $valautopv . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Cantidad Error Sistemas (Pendiente de Validación)'>" . $porvalautopv . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Cantidad Posible Fraude (Pendiente de Validación)'>" . $pfraudepv . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Porcentaje Posible Fraude (Pendiente de Validación)'>" . $porpfraudepv . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Cantidad Error Orden (Pendiente de Validación)'>" . $eordenpv . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Porcentaje Error Orden (Pendiente de Validación)'>" . $porerordenpv . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Cantidad de Facturas (Pendiente de Validación)'>" . $facturapv . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Porcentaje de Facturas(Pendiente de Validación)'>" . $porfacturapv . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Cantidad de Ordenes Offline (Pendiente de Validación)'>" . $offlinepv . "</h6></td>";
                            echo "<td style='border-right-color: black;'><h6 class='text-center' title='Porcentaje de Ordenes Offline (Pendiente de Validación)'>" . $porofflinepv . "</h6></td>";

                            echo "<td><h6 class='text-center' title='Tiempo Promedio'>" . $tprom . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Tiempo > 24 horas'>" . $mayor . "</h6></td>";
                            echo "<td style='border-right-color: black;'><h6 class='text-center " . $color . "' title='Porcentaje Cumplimiento'>" . $porcumplimiento . "</h6></td>";

                            echo "<td><h6 class='text-center' title='Anuladas Automáticamente'>" . $anupfraude . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Porcentaje Anuladas Automáticamente'>" . $poranupfraude . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Anuladas Manualmente'>" . $anueorden . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Porcentaje Anuladas Manualmente'>" . $poranueorden . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Anuladas Manualmente'>" . $anufactura . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Porcentaje Anuladas Manualmente'>" . $poranufactura . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Anuladas Manualmente'>" . $anuoffline . "</h6></td>";
                            echo "<td style='border-right-color: black;'><h6 class='text-center' title='Porcentaje Anuladas Manualmente'>" . $poranuoffline . "</h6></td>";

                            echo "<td><h6 class='text-center' title='C&C Validación Automática'>" . $cctiva . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Porcentaje C&C Validación Automática'>" . $porcctiva . "</h6></td>";
                            echo "<td><h6 class='text-center' title='C&C Validación Manual'>" . $cctivam . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Porcentaje C&C Validación Manual'>" . $porcctivam . "</h6></td></tr>";


                        }
                    }else {
                        $mes = date("m");
                        $anio = date("Y");
                        $buscar = $anio . $mes;
                        $con = new mysqli('localhost', 'root', '', 'validacion');

                        $res = $con->query("select active from activo");

                        $activo = 0;

                        while($row = mysqli_fetch_assoc($res))
                            $activo = $row['active'];

                        $query = "select sum(valauto) as valauto, sum(pfraude) as pfraude, sum(eorden) as eorden, sum(factura) as factura,
                                         sum(offline) as offline, sum(valautopv) as valautopv, sum(pfraudepv) as pfraudepv, sum(eordenpv) as eordenpv,
                                         sum(facturapv) as facturapv, sum(offlinepv) as offlinepv, sum(anupfraude) as anupfraude,
                                         sum(anueorden) as anueorden, sum(anufactura) as anufactura, sum(anuoffline) as anuoffline,
                                         sum(cctiva) as cctiva, sum(cctivam) as cctivam from resultados where dia like '$buscar%'";

                        if($activo == 1)
                            $query = "select sum(valauto) as valauto, sum(pfraude) as pfraude, sum(eorden) as eorden, sum(factura) as factura,
                                         sum(offline) as offline, sum(valautopv) as valautopv, sum(pfraudepv) as pfraudepv, sum(eordenpv) as eordenpv,
                                         sum(facturapv) as facturapv, sum(offlinepv) as offlinepv, sum(anupfraude) as anupfraude,
                                         sum(anueorden) as anueorden, sum(anufactura) as anufactura, sum(anuoffline) as anuoffline,
                                         sum(cctiva) as cctiva, sum(cctivam) as cctivam from auxresult where dia like '$buscar%'";

                        $res = $con->query($query);

                        $valauto = 0;
                        $pfraude = 0;
                        $eorden = 0;
                        $factura = 0;
                        $offline = 0;

                        $valautopv = 0;
                        $pfraudepv = 0;
                        $eordenpv = 0;
                        $facturapv = 0;
                        $offlinepv = 0;

                        $anupfraude = 0;
                        $anueorden = 0;
                        $anufactura = 0;
                        $anuoffline = 0;

                        $cctiva = 0;
                        $cctivam = 0;

                        while($row = mysqli_fetch_assoc($res)){
                            $valauto = $row['valauto'];
                            $pfraude = $row['pfraude'];
                            $eorden = $row['eorden'];
                            $factura = $row['factura'];
                            $offline = $row['offline'];

                            $valautopv = $row['valautopv'];
                            $pfraudepv = $row['pfraudepv'];
                            $eordenpv = $row['eordenpv'];
                            $facturapv = $row['facturapv'];
                            $offlinepv = $row['offlinepv'];

                            $anupfraude = $row['anupfraude'];
                            $anueorden = $row['anueorden'];
                            $anufactura = $row['anufactura'];
                            $anuoffline = $row['anuoffline'];

                            $cctiva = $row['cctiva'];
                            $cctivam = $row['cctivam'];
                        }

                        $total = $valauto + $pfraude + $eorden + $factura + $offline;

                        $totalpv = $valautopv + $pfraudepv + $eordenpv + $facturapv + $offlinepv;

                        $totalanu = $anupfraude + $anueorden + $anufactura + $anuoffline;

                        $totalcc = $cctiva + $cctivam;

                        //NORMAL

                        $porvalauto = 0;

                        $porpfraude = 0;

                        $poreorden = 0;

                        $porfactura = 0;

                        $poroffline = 0;

                        if($total > 0) {
                            $porvalauto = round(($valauto / $total) * 100, 1);

                            $porpfraude = round(($pfraude / $total) * 100, 1);

                            $poreorden = round(($eorden / $total) * 100, 1);

                            $porfactura = round(($factura / $total) * 100, 1);

                            $poroffline = round(($offline / $total) * 100, 1);
                        }

                        //FIN NORMAL

                        //PV

                        $porvalautopv = 0;

                        $porpfraudepv = 0;

                        $poreordenpv = 0;

                        $porfacturapv = 0;

                        $porofflinepv = 0;

                        if($totalpv > 0) {
                            $porvalautopv = round(($valautopv / $totalpv) * 100, 1);

                            $porpfraudepv = round(($pfraudepv / $totalpv) * 100, 1);

                            $poreordenpv = round(($eordenpv / $totalpv) * 100, 1);

                            $porfacturapv = round(($facturapv / $totalpv) * 100, 1);

                            $porofflinepv = round(($offlinepv / $totalpv) * 100, 1);
                        }

                        //FIN PV

                        //ANULADAS

                        $poranupfraude = 0;

                        $poranueorden = 0;

                        $poranufactura = 0;

                        $poranuoffline = 0;

                        if($totalanu > 0) {
                            $poranupfraude = round(($anupfraude / $totalanu) * 100, 1);

                            $poranueorden = round(($anueorden / $totalanu) * 100, 1);

                            $poranufactura = round(($anufactura / $totalanu) * 100, 1);

                            $poranuoffline = round(($anuoffline / $totalanu) * 100, 1);
                        }

                        //FIN ANULADAS

                        //C&C

                        $porcctiva = 0;

                        $porcctivam = 0;

                        if($totalcc > 0) {

                            $porcctiva = round(($cctiva / $totalcc) * 100, 1);

                            $porcctivam = round(($cctivam / $totalcc) * 100, 1);
                        }

                        //FIN C&C

                        $valauto = number_format($valauto, 0, ',', '.');

                        $porvalauto = number_format($porvalauto, 1, ',', '.');

                        $pfraude = number_format($pfraude, 0, ',', '.');

                        $porpfraude = number_format($porpfraude, 1, ',', '.');

                        $eorden = number_format($eorden, 0, ',', '.');

                        $poreorden = number_format($poreorden, 1, ',', '.');

                        $factura = number_format($factura, 0, ',', '.');

                        $porfactura = number_format($porfactura, 1, ',', '.');

                        $offline = number_format($offline, 0, ',', '.');

                        $poroffline = number_format($poroffline, 1, ',', '.');

                        $valautopv = number_format($valautopv, 0, ',', '.');

                        $porvalautopv = number_format($porvalautopv, 1, ',', '.');

                        $pfraudepv = number_format($pfraudepv, 0, ',', '.');

                        $porpfraudepv = number_format($porpfraudepv, 1, ',', '.');

                        $eordenpv = number_format($eordenpv, 0, ',', '.');

                        $poreordenpv = number_format($poreordenpv, 1, ',', '.');

                        $facturapv = number_format($facturapv, 0, ',', '.');

                        $porfacturapv = number_format($porfacturapv, 1, ',', '.');

                        $offlinepv = number_format($offlinepv, 0, ',', '.');

                        $porofflinepv = number_format($porofflinepv, 1, ',', '.');

                        $anupfraude = number_format($anupfraude, 0, ',', '.');

                        $poranupfraude = number_format($poranupfraude, 1, ',', '.');

                        $anueorden = number_format($anueorden, 0, ',', '.');

                        $poranueorden = number_format($poranueorden, 1, ',', '.');

                        $anufactura = number_format($anufactura, 0, ',', '.');

                        $poranufactura = number_format($poranufactura, 1, ',', '.');

                        $cctiva = number_format($cctiva, 0, ',', '.');

                        $porcctiva = number_format($porcctiva, 1, ',', '.');

                        $cctivam = number_format($cctivam, 0, ',', '.');

                        $porcctivam = number_format($porcctivam, 1, ',', '.');

                        echo "<tr class='columnas' style='background-color: #DEE1FF;'><td nowrap='100px'><h6 class='text-center'>Total</h6></td>";
                        echo "<td><h6 class='text-center text-primary' title='Cantidad Validacion Automática'>$valauto</h6></td>";
                        echo "<td><h6 class='text-center' title='Porcentaje de Validaciones Automáticas'>" . $porvalauto . " %</h6></td>";
                        echo "<td><h6 class='text-center text-primary' title='Cantidad Posible Fraude'>" . $pfraude . "</h6></td>";
                        echo "<td><h6 class='text-center' title='Porcentaje de Posible Fraude'>" . $porpfraude . " %</h6></td>";
                        echo "<td><h6 class='text-center text-primary' title='Cantidad de Error de Orden'>" . $eorden . "</h6></td>";
                        echo "<td><h6 class='text-center' title='Porcentaje de Error de Orden'>" . $poreorden . " %</h6></td>";
                        echo "<td><h6 class='text-center text-primary' title='Cantidad de Facturas'>" . $factura . "</h6></td>";
                        echo "<td><h6 class='text-center' title='Porcentaje de Facturas'>" . $porfactura . " %</h6></td>";
                        echo "<td><h6 class='text-center text-primary' title='Cantidad Ordenes Offline'>" . $offline . "</h6></td>";
                        echo "<td style='border-right-color: black;'><h6 class='text-center' title='Porcentaje Ordenes Offline'>" . $poroffline . " %</h6></td>";

                        echo "<td><h6 class='text-center text-primary' title='Cantidad Error Sistemas (Pendiente de Validación)'>" . $valautopv . "</h6></td>";
                        echo "<td><h6 class='text-center' title='Cantidad Error Sistemas (Pendiente de Validación)'>" . $porvalautopv . " %</h6></td>";
                        echo "<td><h6 class='text-center text-primary' title='Cantidad Posible Fraude (Pendiente de Validación)'>" . $pfraudepv . "</h6></td>";
                        echo "<td><h6 class='text-center' title='Porcentaje Posible Fraude (Pendiente de Validación)'>" . $porpfraudepv . " %</h6></td>";
                        echo "<td><h6 class='text-center text-primary' title='Cantidad Error Orden (Pendiente de Validación)'>" . $eordenpv . "</h6></td>";
                        echo "<td><h6 class='text-center' title='Porcentaje Error Orden (Pendiente de Validación)'>" . $poreordenpv . " %</h6></td>";
                        echo "<td><h6 class='text-center text-primary' title='Cantidad de Facturas (Pendiente de Validación)'>" . $facturapv . "</h6></td>";
                        echo "<td><h6 class='text-center' title='Porcentaje de Facturas(Pendiente de Validación)'>" . $porfacturapv . " %</h6></td>";
                        echo "<td><h6 class='text-center text-primary' title='Cantidad de Ordenes Offline (Pendiente de Validación)'>" . $offlinepv . "</h6></td>";
                        echo "<td style='border-right-color: black;'><h6 class='text-center' title='Porcentaje de Ordenes Offline (Pendiente de Validación)'>" . $porofflinepv . " %</h6></td>";

                        echo "<td><h6 class='text-center' title='Tiempo Promedio' style='color: #DADADA;'>No aplica</h6></td>";
                        echo "<td><h6 class='text-center' title='Tiempo > 24 horas'  style='color: #DADADA;'>No aplica</h6></td>";
                        echo "<td style='border-right-color: black;'><h6 class='text-center' title='Porcentaje Cumplimiento'  style='color: #DADADA;'>No aplica</h6></td>";

                        echo "<td><h6 class='text-center text-primary' title='Anuladas Automáticamente'>" . $anupfraude . "</h6></td>";
                        echo "<td><h6 class='text-center' title='Porcentaje Anuladas Automáticamente'>" . $poranupfraude . " %</h6></td>";
                        echo "<td><h6 class='text-center text-primary' title='Anuladas Manualmente'>" . $anueorden . "</h6></td>";
                        echo "<td><h6 class='text-center' title='Porcentaje Anuladas Manualmente'>" . $poranueorden . " %</h6></td>";
                        echo "<td><h6 class='text-center text-primary' title='Anuladas Manualmente'>" . $anufactura . "</h6></td>";
                        echo "<td><h6 class='text-center' title='Porcentaje Anuladas Manualmente'>" . $poranufactura . " %</h6></td>";
                        echo "<td><h6 class='text-center text-primary' title='Anuladas Manualmente'>" . $anuoffline . "</h6></td>";
                        echo "<td style='border-right-color: black;'><h6 class='text-center' title='Porcentaje Anuladas Manualmente'>" . $poranuoffline . " %</h6></td>";

                        echo "<td><h6 class='text-center text-primary' title='C&C Validación Automática'>" . $cctiva . "</h6></td>";
                        echo "<td><h6 class='text-center' title='Porcentaje C&C Validación Automática'>" . $porcctiva . " %</h6></td>";
                        echo "<td><h6 class='text-center text-primary' title='C&C Validación Manual'>" . $cctivam . "</h6></td>";
                        echo "<td><h6 class='text-center' title='Porcentaje C&C Validación Manual'>" . $porcctivam . " %</h6></td></tr>";


                        $query = "select * from resultados where dia like '" . $buscar . "%' order by dia desc";

                        if ($activo == 1)
                            $query = "select * from auxresult where dia like '" . $buscar . "%' order by dia desc";

                        $res = $con->query($query);

                        while ($row = mysqli_fetch_assoc($res)) {
                            if ($row['dia'] != 0) {
                                $dia = $row['dia'];
                                $d = new DateTime($dia);
                            } else $dia = '-';

                            if ($row['valauto'] != 0) $valauto = number_format($row['valauto'], 0, ',', '.'); else $valauto = '-';

                            if ($row['porvalauto'] != 0) $porvalauto = number_format($row['porvalauto'], 1, ',', '.') . "%"; else $porvalauto = '-';

                            if ($row['pfraude'] != 0) $pfraude = $row['pfraude']; else $pfraude = '-';

                            if ($row['porpfraude'] != 0) $porpfraude = number_format($row['porpfraude'], 1, ',', '.') . "%"; else $porpfraude = '-';

                            if ($row['porpfraude'] == 100.0) $porpfraude = round($row['porpfraude'], 0);

                            if ($row['eorden'] != 0) $eorden = $row['eorden']; else $eorden = '-';

                            if ($row['porerorden'] != 0) $porerorden = number_format($row['porerorden'], 1, ',', '.') . "%"; else $porerorden = '-';

                            if ($row['factura'] != 0) $factura = $row['factura']; else $factura = '-';

                            if ($row['porfactura'] != 0) $porfactura = number_format($row['porfactura'], 1, ',', '.') . "%"; else $porfactura = '-';

                            if ($row['offline'] != 0) $offline = $row['offline']; else $offline = '-';

                            if ($row['poroffline'] != 0) $poroffline = number_format($row['poroffline'], 1, ',', '.') . "%"; else $poroffline = '-';


                            $suma = ($row['valautopv'] + $row['pfraudepv'] + $row['eordenpv'] + $row['facturapv'] + $row['offlinepv']);

                            if ($suma <= 0) {
                                $porvalautopv = '-';
                                $porpfraudepv = '-';
                                $porerordenpv = '-';
                                $porfacturapv = '-';
                                $porofflinepv = '-';
                            } else {
                                $porvalautopv = number_format(($row['valautopv'] / $suma) * 100, 1, ',', '.');
                                $porpfraudepv = number_format(($row['pfraudepv'] / $suma) * 100, 1, ',', '.');
                                $porerordenpv = number_format(($row['eordenpv'] / $suma) * 100, 1, ',', '.');
                                $porfacturapv = number_format(($row['facturapv'] / $suma) * 100, 1, ',', '.');
                                $porofflinepv = number_format(($row['offlinepv'] / $suma) * 100, 1, ',', '.');
                            }

                            if ($porvalautopv == '0,0' || $porvalautopv == '-') $porvalautopv = '-'; else $porvalautopv = $porvalautopv . " %";

                            if ($porpfraudepv == '0,0' || $porpfraudepv == '-') $porpfraudepv = '-'; else $porpfraudepv = $porpfraudepv . " %";

                            if ($porerordenpv == '0,0' || $porerordenpv == '-') $porerordenpv = '-'; else $porerordenpv = $porerordenpv . " %";

                            if ($porfacturapv == '0,0' || $porfacturapv == '-') $porfacturapv = '-'; else $porfacturapv = $porfacturapv . " %";

                            if ($porofflinepv == '0,0' || $porofflinepv == '-') $porofflinepv = '-'; else $porofflinepv = $porofflinepv . " %";


                            if ($row['valautopv'] != 0) $valautopv = $row['valautopv']; else $valautopv = '-';

                            if ($row['pfraudepv'] != 0) $pfraudepv = $row['pfraudepv']; else $pfraudepv = '-';

                            //if($row['porpfraudepv'] != 0) $porpfraudepv = number_format($row['porpfraudepv'], 1, ',', '.') . "%"; else $porpfraudepv = '-';

                            if ($row['eordenpv'] != 0) $eordenpv = $row['eordenpv']; else $eordenpv = '-';

                            //if($row['porerordenpv'] != 0) $porerordenpv = number_format($row['porerordenpv'], 1, ',', '.') . "%"; else $porerordenpv = '-';

                            if ($row['facturapv'] != 0) $facturapv = $row['facturapv']; else $facturapv = '-';

                            //if($row['porfacturapv'] != 0) $porfacturapv = number_format($row['porfacturapv'], 1, ',', '.') . "%"; else $porfacturapv = '-';

                            if ($row['offlinepv'] != 0) $offlinepv = $row['offlinepv']; else $offlinepv = '-';

                            //if($row['porofflinepv'] != 0) $porofflinepv = number_format($row['porofflinepv'], 1, ',', '.') . "%"; else $porofflinepv = '-';


                            if ($row['anupfraude'] != 0) $anupfraude = $row['anupfraude']; else $anupfraude = '-';

                            if ($row['poranupfraude'] != 0) $poranupfraude = number_format($row['poranupfraude'], 1, ',', '.') . "%"; else $poranupfraude = '-';

                            if ($row['anueorden'] != 0) $anueorden = $row['anueorden']; else $anueorden = '-';

                            if ($row['poranueorden'] != 0) $poranueorden = number_format($row['poranueorden'], 1, ',', '.') . "%"; else $poranueorden = '-';

                            if ($row['anufactura'] != 0) $anufactura = $row['anufactura']; else $anufactura = '-';

                            if ($row['poranufactura'] != 0) $poranufactura = number_format($row['poranufactura'], 1, ',', '.') . "%"; else $poranufactura = '-';

                            if ($row['anuoffline'] != 0) $anuoffline = $row['anuoffline']; else $anuoffline = '-';

                            if ($row['poranuoffline'] != 0) $poranuoffline = number_format($row['poranuoffline'], 1, ',', '.') . "%"; else $poranuoffline = '-';


                            if ($row['cctiva'] != 0) $cctiva = $row['cctiva']; else $cctiva = '-';

                            if ($row['porcctiva'] != 0) $porcctiva = number_format($row['porcctiva'], 1, ',', '.') . "%"; else $porcctiva = '-';

                            if ($row['cctivam'] != 0) $cctivam = $row['cctivam']; else $cctivam = '-';

                            if ($row['porcctivam'] != 0) $porcctivam = number_format($row['porcctivam'], 1, ',', '.') . "%"; else $porcctivam = '-';

                            if (round($row['tprom']) != 0)
                                $tprom = number_format(round(($row['tprom']), 1), 1, ',', '.');
                            else
                                $tprom = '-';

                            if ($row['mayorpfraude'] + $row['mayoreorden'] + $row['mayorfactura'] + $row['mayoroffline'] != 0)
                                $mayor = $row['mayorpfraude'] + $row['mayoreorden'] + $row['mayorfactura'] + $row['mayoroffline'];
                            else
                                $mayor = '-';

                            if ($row['porcumplimiento'] != 0) {
                                $porcumplimiento = number_format($row['porcumplimiento'], 1, ',', '.');

                                if ($porcumplimiento >= 98)
                                    $color = 'label label-success';

                                if ($porcumplimiento > 95 && $porcumplimiento < 98)
                                    $color = 'label label-warning';

                                if ($porcumplimiento <= 95)
                                    $color = 'label label-danger';

                                $porcumplimiento = $porcumplimiento . "%";

                            } else {
                                $porcumplimiento = '-';
                                $color = '';
                            }

                            if ($valauto != '-')
                                $valauto = "<a href='recibir.php?dia=$dia&estanter=0&tipo=valauto'>" . $valauto . "</a>";

                            if ($pfraude != '-')
                                $pfraude = "<a href='recibir.php?dia=$dia&estanter=1&tipo=pfraude'>" . $pfraude . "</a>";

                            if ($eorden != '-')
                                $eorden = "<a href='recibir.php?dia=$dia&estanter=2&tipo=eorden'>" . $eorden . "</a>";

                            if ($factura != '-')
                                $factura = "<a href='recibir.php?dia=$dia&estanter=34&tipo=facturas'>" . $factura . "</a>";

                            if ($offline != '-')
                                $offline = "<a href='recibir.php?dia=$dia&estanter=81&tipo=offline'>" . $offline . "</a>";


                            if ($valautopv != '-')
                                $valautopv = "<a href='recibir.php?dia=$dia&estanter=0&tipo=valautopv'>" . $valautopv . "</a>";

                            if ($pfraudepv != '-')
                                $pfraudepv = "<a href='recibir.php?dia=$dia&estanter=1&tipo=pfraudepv'>" . $pfraudepv . "</a>";

                            if ($eordenpv != '-')
                                $eordenpv = "<a href='recibir.php?dia=$dia&estanter=2&tipo=eordenpv'>" . $eordenpv . "</a>";

                            if ($facturapv != '-')
                                $facturapv = "<a href='recibir.php?dia=$dia&estanter=34&tipo=facturapv'>" . $facturapv . "</a>";

                            if ($offlinepv != '-')
                                $offlinepv = "<a href='recibir.php?dia=$dia&estanter=81&tipo=offlinepv'>" . $offlinepv . "</a>";


                            if ($anupfraude != '-')
                                $anupfraude = "<a href='recibir.php?dia=$dia&estanter=1&tipo=anupfraude'>" . $anupfraude . "</a>";

                            if ($anueorden != '-')
                                $anueorden = "<a href='recibir.php?dia=$dia&estanter=2&tipo=anueorden'>" . $anueorden . "</a>";

                            if ($anufactura != '-')
                                $anufactura = "<a href='recibir.php?dia=$dia&estanter=34&tipo=anufactura'>" . $anufactura . "</a>";

                            if ($anuoffline != '-')
                                $anuoffline = "<a href='recibir.php?dia=$dia&estanter=81&tipo=anuoffline'>" . $anuoffline . "</a>";


                            if ($cctiva != '-')
                                $cctiva = "<a href='recibir.php?dia=$dia&estanter=0&tipo=cctiva'>" . $cctiva . "</a>";

                            if ($cctivam != '-')
                                $cctivam = "<a href='recibir.php?dia=$dia&estanter=123481&tipo=cctivam'>" . $cctivam . "</a>";

                            if ($mayor != '-')
                                $mayor = "<a href='recibir.php?dia=$dia&estanter=123481&tipo=mayor'>" . $mayor . "</a>";

                            echo "<tr class='columnas'><td nowrap='100px'><h6 class='text-center'>" . $d->format("d-m-Y") . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Cantidad Validacion Automática'>" . $valauto . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Porcentaje de Validaciones Automáticas'>" . $porvalauto . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Cantidad Posible Fraude'>" . $pfraude . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Porcentaje de Posible Fraude'>" . $porpfraude . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Cantidad de Error de Orden'>" . $eorden . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Porcentaje de Error de Orden'>" . $porerorden . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Cantidad de Facturas'>" . $factura . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Porcentaje de Facturas'>" . $porfactura . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Cantidad Ordenes Offline'>" . $offline . "</h6></td>";
                            echo "<td style='border-right-color: black;'><h6 class='text-center' title='Porcentaje Ordenes Offline'>" . $poroffline . "</h6></td>";

                            echo "<td><h6 class='text-center' title='Cantidad Error Sistemas (Pendiente de Validación)'>" . $valautopv . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Cantidad Error Sistemas (Pendiente de Validación)'>" . $porvalautopv . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Cantidad Posible Fraude (Pendiente de Validación)'>" . $pfraudepv . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Porcentaje Posible Fraude (Pendiente de Validación)'>" . $porpfraudepv . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Cantidad Error Orden (Pendiente de Validación)'>" . $eordenpv . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Porcentaje Error Orden (Pendiente de Validación)'>" . $porerordenpv . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Cantidad de Facturas (Pendiente de Validación)'>" . $facturapv . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Porcentaje de Facturas(Pendiente de Validación)'>" . $porfacturapv . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Cantidad de Ordenes Offline (Pendiente de Validación)'>" . $offlinepv . "</h6></td>";
                            echo "<td style='border-right-color: black;'><h6 class='text-center' title='Porcentaje de Ordenes Offline (Pendiente de Validación)'>" . $porofflinepv . "</h6></td>";

                            echo "<td><h6 class='text-center' title='Tiempo Promedio'>" . $tprom . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Tiempo > 24 horas'>" . $mayor . "</h6></td>";
                            echo "<td style='border-right-color: black;'><h6 class='text-center " . $color . "' title='Porcentaje Cumplimiento'>" . $porcumplimiento . "</h6></td>";

                            echo "<td><h6 class='text-center' title='Anuladas Automáticamente'>" . $anupfraude . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Porcentaje Anuladas Automáticamente'>" . $poranupfraude . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Anuladas Manualmente'>" . $anueorden . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Porcentaje Anuladas Manualmente'>" . $poranueorden . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Anuladas Manualmente'>" . $anufactura . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Porcentaje Anuladas Manualmente'>" . $poranufactura . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Anuladas Manualmente'>" . $anuoffline . "</h6></td>";
                            echo "<td style='border-right-color: black;'><h6 class='text-center' title='Porcentaje Anuladas Manualmente'>" . $poranuoffline . "</h6></td>";

                            echo "<td><h6 class='text-center' title='C&C Validación Automática'>" . $cctiva . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Porcentaje C&C Validación Automática'>" . $porcctiva . "</h6></td>";
                            echo "<td><h6 class='text-center' title='C&C Validación Manual'>" . $cctivam . "</h6></td>";
                            echo "<td><h6 class='text-center' title='Porcentaje C&C Validación Manual'>" . $porcctivam . "</h6></td></tr>";
                        }
                    }
                    ?>

            </table>
        </div>

        <script src="jquery-1.12.0.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="bootstrap-select/dist/js/bootstrap-select.js"></script>
        <script src="jquery.stickytableheaders.js"></script>

        <script>
            $('table').stickyTableHeaders();
        </script>
    </body>
</html>

<?php
function hora()
{
    ini_set("max_time_execution", 0);
    $con = new mysqli('localhost', 'root', '', 'validacion');
    $ahora = date("His");
    $ahoraf = date("Ymd");
    $query = "select hora from resultados where fecha = $ahoraf order by hora desc";
    $res = $con->query($query);
    while ($row = mysqli_fetch_assoc($res)) {
        $h = $row['hora'];
        if(strlen($row['hora']) == 5)
            $h = 0 . $row['hora'];

        if(strlen($row['hora']) == 4)
            $h = 0 . 0 . $row['hora'];

        if(strlen($row['hora']) == 3)
            $h = 0 . 0 . 0 . $row['hora'];

        if(strlen($row['hora']) == 2)
            $h = 0 . 0 . 0 . 0 . $row['hora'];

        if(strlen($row['hora']) == 1)
            $h = 0 . 0 . 0 . 0 . 0 . $row['hora'];

        $h = new DateTime($h);
        return $h->format("H:i:s");
    }
}
?>
<?php
ini_set("max_execution_time", 0);
require_once 'Classes/PHPExcel.php';

$dia = $_GET['dia'];
$tipo = $_GET['tipo'];
$estanter = $_GET['estanter'];

$con = new mysqli('localhost', 'root', '', 'validacion');

$excel = new PHPExcel();

$excel->getProperties()->setCreator("Operaciones")
    ->setLastModifiedBy("Operaciones")
    ->setTitle("Reporte de Validación");

$nomorden = '';

if($tipo == 'valauto')
    $nomorden = 'Validación Automática';
if($tipo == 'pfraude')
    $nomorden = 'Posible Fraude';
if($tipo == 'eorden')
    $nomorden = 'Error de Órden';
if($tipo == 'facturas')
    $nomorden = 'Facturas';
if($tipo == 'offline')
    $nomorden = 'Offline';

if($tipo == 'valautopv')
    $nomorden = 'Validación Automática (Pendiente de Validación)';
if($tipo == 'pfraudepv')
    $nomorden = 'Posible Fraude (Pendiente de Validación)';
if($tipo == 'eordenpv')
    $nomorden = 'Error de Órden (Pendiente de Validación)';
if($tipo == 'facturaspv')
    $nomorden = 'Facturas (Pendiente de Validación)';
if($tipo == 'offlinepv')
    $nomorden = 'Offline (Pendiente de Validación)';

if($tipo == 'anupfraude')
    $nomorden = 'Anulación Posible Fraude';
if($tipo == 'anueorden')
    $nomorden = 'Anulación Error de Órden';
if($tipo == 'anufacturas')
    $nomorden = 'Anulación Facturas ';
if($tipo == 'anuoffline')
    $nomorden = 'Anulación Offline';

if($tipo == 'cctiva')
    $nomorden = 'Click & Collect Automática';
if($tipo == 'cctivam')
    $nomorden = 'Click & Collect Manual';

if($tipo == 'mayor')
    $nomorden = 'Mayor a 24 horas';

$fecha = new DateTime($dia);
$titulo = "Órdenes de Compra " . $nomorden . " Día " . $fecha->format("d-m-Y");

$titulos1 = array('Número', 'Número de Orden', 'Fecha de Orden', 'Hora de Órden', 'Estado Órden', 'Estado Actual', 'Estado Anterior',
                'Correlativo', 'Fecha de cambio', 'Hora de cambio', 'Código de Despacho', 'Usuario Validador', 'Usuario Venta');

$excel->setActiveSheetIndex(0)
    ->mergeCells('A1:M1');

$excel->setActiveSheetIndex(0)
    ->setCellValue('A1', $titulo)

    ->setCellValue('A2', $titulos1[0])
    ->setCellValue('B2', $titulos1[1])
    ->setCellValue('C2', $titulos1[2])
    ->setCellValue('D2', $titulos1[3])
    ->setCellValue('E2', $titulos1[4])
    ->setCellValue('F2', $titulos1[5])
    ->setCellValue('G2', $titulos1[6])
    ->setCellValue('H2', $titulos1[7])
    ->setCellValue('I2', $titulos1[8])
    ->setCellValue('J2', $titulos1[9])
    ->setCellValue('K2', $titulos1[10])
    ->setCellValue('L2', $titulos1[11])
    ->setCellValue('M2', $titulos1[12]);

$activo = 0;
$query = "select active from activo";

$res = $con->query($query);

while($row = mysqli_fetch_assoc($res)){
    if($row['active'] == 1)
        $activo = 1;
}

if($tipo == 'valauto' || $tipo == 'pfraude' || $tipo == 'eorden' || $tipo == 'facturas' || $tipo == 'offline'){
    $query = "select * from validar WHERE fecorden = $dia AND ESTANTER = $estanter
                  group by numorden having count(numorden)>=1 order by feccambio desc, horcambio  desc";

    if($activo == 1)
    $query = "select * from auxvalidar WHERE fecorden = $dia AND ESTANTER = $estanter
                  group by numorden having count(numorden)>=1 order by feccambio desc, horcambio  desc";
}

if($tipo == 'valautopv' || $tipo == 'pfraudepv' || $tipo == 'eordenpv' || $tipo == 'facturapv' || $tipo == 'offlinepv'){
    $query = "select * from validar WHERE fecorden = $dia
                  AND ESTANTER = $estanter AND estorden not in (80, 99)
                  group by numorden having count(numorden)>=1 order by feccambio desc, horcambio  desc";

    if($activo == 1)
        $noIncluir = "select * from auxvalidar WHERE fecorden = $dia
                  AND ESTANTER = $estanter AND estorden not in (80, 99)
                  group by numorden having count(numorden)>=1 order by feccambio desc, horcambio  desc";
}

if($tipo == 'anupfraude' || $tipo == 'anueorden' || $tipo == 'anufactura' || $tipo == 'anuoffline') {
    $query = "select * from validar where fecorden = $dia and estorden = 80 and
                  estanter = $estanter group by numorden having count(numorden) >= 1 order by feccambio desc, horcambio  desc";

    if($activo == 1)
        $query = "select * from auxvalidar where fecorden = $dia and estorden = 80 and
                  estanter = $estanter group by numorden having count(numorden) >= 1 order by feccambio desc, horcambio  desc";
}

if($tipo == 'cctivam' || $tipo == 'cctiva'){
    if($estanter == '0'){
        $query = "select * from validar where fecorden = $dia AND coddesp = 22 and
                      estanter = 0 group by numorden having count(numorden) >= 1";
        if($activo == 1)
            $query = "select * from auxvalidar where fecorden = $dia AND coddesp = 22 and
                      estanter = 0 group by numorden having count(numorden) >= 1";
    }

    if($estanter == '123481'){
        $query = "select * from validar where fecorden = $dia AND coddesp = 22 and
                      (estanter = 1 or estanter = 2 or estanter = 34 or estanter = 81) group by numorden having count(numorden) >= 1";
        if($activo == 1)
            $query = "select * from auxvalidar where fecorden = $dia AND coddesp = 22 and
                      (estanter = 1 or estanter = 2 or estanter = 34 or estanter = 81) group by numorden having count(numorden) >= 1";
    }

}

if($tipo == 'mayor'){
    $query = "select numorden, fecorden, horaorden, estorden,
                 estactua, estanterval as estanter, feccambio,
                  horcambio, coddesp, usuario
                  from tiempo where (estanterval = 1 or estanterval = 2 or estanterval = 34 or estanterval = 81)
                  and estactua = 90 and fecorden = $dia and fuerasla = 1
                  and estanter not in (31, 38) group by numorden HAVING count(numorden) >= 1 order by feccambio desc";

    if($activo == 1)
        $query = "select numorden, fecorden, horaorden, estorden,
                 estactua, estanterval as estanter, feccambio,
                  horcambio, coddesp, usuario
                  from auxtiempo where (estanterval = 1 or estanterval = 2 or estanterval = 34 or estanterval = 81)
                  and estactua = 90 and fecorden = $dia and fuerasla = 1
                  and estanter not in (31, 38) group by numorden HAVING count(numorden) >= 1 order by feccambio desc";
}

$res = $con->query($query);

$i=3;
$j=1;

while ($row = mysqli_fetch_assoc($res)) {
    if($tipo != 'mayor'){
        $excel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $j)
            ->setCellValue('B'.$i, $row['numorden'])
            ->setCellValue('C'.$i, $row['fecorden'])
            ->setCellValue('D'.$i, $row['horaorden'])
            ->setCellValue('E'.$i, $row['estorden'])
            ->setCellValue('F'.$i, $row['estactua'])
            ->setCellValue('G'.$i, $row['estanter'])
            ->setCellValue('H'.$i, $row['correl'])
            ->setCellValue('I'.$i, $row['feccambio'])
            ->setCellValue('J'.$i, $row['horcambio'])
            ->setCellValue('K'.$i, $row['coddesp'])
            ->setCellValue('L'.$i, $row['usuario'])
            ->setCellValue('M'.$i, $row['campo2']);
    }else{
        $excel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $j)
            ->setCellValue('B'.$i, $row['numorden'])
            ->setCellValue('C'.$i, $row['fecorden'])
            ->setCellValue('D'.$i, $row['horaorden'])
            ->setCellValue('E'.$i, $row['estorden'])
            ->setCellValue('F'.$i, $row['estactua'])
            ->setCellValue('G'.$i, $row['estanter'])
            ->setCellValue('H'.$i, 'none')
            ->setCellValue('I'.$i, $row['feccambio'])
            ->setCellValue('J'.$i, $row['horcambio'])
            ->setCellValue('K'.$i, $row['coddesp'])
            ->setCellValue('L'.$i, $row['usuario'])
            ->setCellValue('M'.$i, 'none');
    }

    $i++;
    $j++;
}

$estiloInformacion = array(
    'font' => array(
        'name'  => 'Calibri',
        'size' => '10',
    ),
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        'rotation' => 0,
        'wrap' => TRUE
    )
);

$color1 = array(
    'font' => array(
        'name'  => 'Calibri',
        'size' => '11',
        'color' => array(
            'rgb' => '000000'
        )
    ),
    'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array(
            'rgb' => 'E0FFE1'
        )
    ),
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        'rotation' => 0,
        'wrap' => TRUE
    ),
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
            'color' => array(
                'rgb' => 'dddddd'
            )
        )
    )
);

$color2 = array(
    'font' => array(
        'name'  => 'Calibri',
        'size' => '20',
        'bold' => 'true',
        'color' => array(
            'rgb' => '000000'
        )
    ),
    'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array(
            'rgb' => 'ffffff'
        )
    ),
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        'rotation' => 0,
        'wrap' => TRUE
    ),
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
            'color' => array(
                'rgb' => 'BCBCBC'
            )
        )
    )
);


$excel->getActiveSheet()->getStyle('A2:M2')->applyFromArray($color1);
$excel->getActiveSheet()->getStyle('A1:M1')->applyFromArray($color2);
$excel->getActiveSheet()->getStyle('A3:M'. ($i-1))->applyFromArray($estiloInformacion);



for($j = 'A'; $j <= 'M'; $j++){
    $excel->setActiveSheetIndex(0)->getColumnDimension($j)->setWidth('20');
}


for($j=2; $j<=($i-1); $j++)
    $excel->getActiveSheet()->getRowDimension($j)->setRowHeight(25);

// Se asigna el nombre a la hoja
$excel->getActiveSheet()->setTitle('Validación');

// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
$excel->setActiveSheetIndex(0);

// Inmovilizar paneles
//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
$excel->getActiveSheet(0)->freezePaneByColumnAndRow(0,3);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="ordenes' . $nomorden . ' - ' . $dia . '.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$objWriter->save('php://output');
exit;
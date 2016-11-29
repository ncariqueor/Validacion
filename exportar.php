<?php
ini_set("max_execution_time", 0);
require_once 'Classes/PHPExcel.php';

$mes = $_GET['mes'];
$anio = $_GET['anio'];
$buscar = $anio . $mes;

$con = new mysqli('localhost', 'root', '', 'validacion');

$excel = new PHPExcel();

$excel->getProperties()->setCreator("Operaciones")
    ->setLastModifiedBy("Operaciones")
    ->setTitle("Reporte de Validación");

$titulo = "Reporte de Validación";

if($mes == '01')
    $titulo = "Reporte de Validación enero " . $anio;

if($mes == '02')
    $titulo = "Reporte de Validación febrero " . $anio;

if($mes == '03')
    $titulo = "Reporte de Validación marzo " . $anio;

if($mes == '04')
    $titulo = "Reporte de Validación abril " . $anio;

if($mes == '05')
    $titulo = "Reporte de Validación mayo " . $anio;

if($mes == '06')
    $titulo = "Reporte de Validación junio " . $anio;

if($mes == '07')
    $titulo = "Reporte de Validación julio " . $anio;

if($mes == '08')
    $titulo = "Reporte de Validación agosto " . $anio;

if($mes == '09')
    $titulo = "Reporte de Validación septiembre " . $anio;

if($mes == '10')
    $titulo = "Reporte de Validación octubre " . $anio;

if($mes == '11')
    $titulo = "Reporte de Validación noviembre " . $anio;

if($mes == '12')
    $titulo = "Reporte de Validación diciembre " . $anio;

$titulos1 = array('Día Actual', 'Tipo de Validación', 'Pendiente de Validación', 'SLA: Tiempo de Validación', 'Anuladas', 'Órdenes C&C', 'Pendiente de Solución Sistemas');

$titulos2 = array('Automática', 'Posible Fraude', 'Error de Orden', 'Facturas', 'Órdenes Offline', 'Tiempo promedio (horas)',
                  '> 24 horas', '% Cumplimiento', 'Manual', 'Error Sistemas');

$titulos3 = array('#', '%');


$excel->setActiveSheetIndex(0)
    ->mergeCells('A1:AJ1')

    ->mergeCells('A2:A4')
    ->mergeCells('B2:K2')
    ->mergeCells('L2:U2')
    ->mergeCells('V2:X2')
    ->mergeCells('Y2:AF2')
    ->mergeCells('AG2:AJ2')
    ->mergeCells('AK2:AK3')

    ->mergeCells('B3:C3')
    ->mergeCells('D3:E3')
    ->mergeCells('F3:G3')
    ->mergeCells('H3:I3')
    ->mergeCells('J3:K3')
    ->mergeCells('L3:M3')
    ->mergeCells('N3:O3')
    ->mergeCells('P3:Q3')
    ->mergeCells('R3:S3')
    ->mergeCells('T3:U3')
    ->mergeCells('V3:V4')
    ->mergeCells('W3:W4')
    ->mergeCells('X3:X4')
    ->mergeCells('Y3:Z3')
    ->mergeCells('AA3:AB3')
    ->mergeCells('AC3:AD3')
    ->mergeCells('AE3:AF3')
    ->mergeCells('AG3:AH3')
    ->mergeCells('AI3:AJ3');

$excel->setActiveSheetIndex(0)
    ->setCellValue('A1', $titulo)

    ->setCellValue('A2', $titulos1[0])
    ->setCellValue('B2', $titulos1[1])
    ->setCellValue('L2', $titulos1[2])
    ->setCellValue('V2', $titulos1[3])
    ->setCellValue('Y2', $titulos1[4])
    ->setCellValue('AG2', $titulos1[5])
    //->setCellValue('AK2', $titulos1[6])

    ->setCellValue('B3', $titulos2[0])
    ->setCellValue('D3', $titulos2[1])
    ->setCellValue('F3', $titulos2[2])
    ->setCellValue('H3', $titulos2[3])
    ->setCellValue('J3', $titulos2[4])
    ->setCellValue('L3', $titulos2[9])
    ->setCellValue('N3', $titulos2[1])
    ->setCellValue('P3', $titulos2[2])
    ->setCellValue('R3', $titulos2[3])
    ->setCellValue('T3', $titulos2[4])
    ->setCellValue('V3', $titulos2[5])
    ->setCellValue('W3', $titulos2[6])
    ->setCellValue('X3', $titulos2[7])
    ->setCellValue('Y3', $titulos2[1])
    ->setCellValue('AA3', $titulos2[2])
    ->setCellValue('AC3', $titulos2[3])
    ->setCellValue('AE3', $titulos2[4])
    ->setCellValue('AG3', $titulos2[0])
    ->setCellValue('AI3', $titulos2[8])

    ->setCellValue('B4', $titulos3[0])
    ->setCellValue('C4', $titulos3[1])
    ->setCellValue('D4', $titulos3[0])
    ->setCellValue('E4', $titulos3[1])
    ->setCellValue('F4', $titulos3[0])
    ->setCellValue('G4', $titulos3[1])
    ->setCellValue('H4', $titulos3[0])
    ->setCellValue('I4', $titulos3[1])
    ->setCellValue('J4', $titulos3[0])
    ->setCellValue('K4', $titulos3[1])
    ->setCellValue('L4', $titulos3[0])
    ->setCellValue('M4', $titulos3[1])
    ->setCellValue('N4', $titulos3[0])
    ->setCellValue('O4', $titulos3[1])
    ->setCellValue('P4', $titulos3[0])
    ->setCellValue('Q4', $titulos3[1])
    ->setCellValue('R4', $titulos3[0])
    ->setCellValue('S4', $titulos3[1])
    ->setCellValue('T4', $titulos3[0])
    ->setCellValue('U4', $titulos3[1])
    ->setCellValue('Y4', $titulos3[0])
    ->setCellValue('Z4', $titulos3[1])
    ->setCellValue('AA4', $titulos3[0])
    ->setCellValue('AB4', $titulos3[1])
    ->setCellValue('AC4', $titulos3[0])
    ->setCellValue('AD4', $titulos3[1])
    ->setCellValue('AE4', $titulos3[0])
    ->setCellValue('AF4', $titulos3[1])
    ->setCellValue('AG4', $titulos3[0])
    ->setCellValue('AH4', $titulos3[1])
    ->setCellValue('AI4', $titulos3[0])
    ->setCellValue('AJ4', $titulos3[1]);
    //->setCellValue('AK4', $titulos3[0]);

$query = "select * from resultados where dia like '" . $buscar . "%' order by dia desc";

$res = $con->query($query);

$colormalo = array(
    'font' => array(
        'name'  => 'Calibri',
        'color' => array(
            'rgb' => '862828'
        )
    ),
    'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array(
            'rgb' => 'D48484'
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

$colorbueno = array(
    'font' => array(
        'name'  => 'Calibri',
        'color' => array(
            'rgb' => '26520E'
        )
    ),
    'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array(
            'rgb' => '76AE6C'
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

$colormedio = array(
    'font' => array(
        'name'  => 'Calibri',
        'color' => array(
            'rgb' => '717018'
        )
    ),
    'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array(
            'rgb' => 'F3F16D'
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

$i = 5;
while ($row = mysqli_fetch_assoc($res)) {
    $dia           = new DateTime($row['dia']);
    $valauto       = $row['valauto'];
    $porvalauto    = $row['porvalauto']/100;
    $pfraude       = $row['pfraude'];
    $porpfraude    = $row['porpfraude']/100;
    $eorden        = $row['eorden'];
    $porerorden    = $row['porerorden']/100;
    $factura       = $row['factura'];
    $porfactura    = $row['porfactura']/100;
    $offline       = $row['offline'];
    $poroffline    = $row['poroffline']/100;
    $pautopv       = $row['valautopv'];
    $pfraudepv     = $row['pfraudepv'];
    $eordenpv      = $row['eordenpv'];
    $facturapv     = $row['facturapv'];
    $offlinepv     = $row['offlinepv'];
    $tprom         = $row['tprom'];
    $mayor           = $row['mayorpfraude'] + $row['mayoreorden'] + $row['mayorfactura'] + $row['mayoroffline'];
    $porcumplimiento = $row['porcumplimiento']/100;
    $anupfraude    = $row['anupfraude'];
    $poranupfraude = $row['poranupfraude']/100;
    $anueorden     = $row['anueorden'];
    $poranueorden  = $row['poranueorden']/100;
    $anufactura    = $row['anufactura'];
    $poranufactura = $row['poranufactura']/100;
    $anuoffline    = $row['anuoffline'];
    $poranuoffline = $row['poranuoffline']/100;
    $cctiva        = $row['cctiva'];
    $porcctiva     = $row['porcctiva']/100;
    $cctivam       = $row['cctivam'];
    $porcctivam    = $row['porcctivam']/100;
    //$pensolsis     = $row['pensolsis'];

    $suma = $pautopv + $pfraudepv + $eordenpv + $facturapv + $offlinepv;

    $porautopv = 0;
    $porpfraudepv = 0;
    $porerordenpv = 0;
    $porfacturapv = 0;
    $porofflinepv = 0;

    if($suma != 0){
        $porautopv = ($pautopv / $suma);
        $porpfraudepv = ($pfraudepv / $suma);
        $porerordenpv = ($eordenpv / $suma);
        $porfacturapv = ($facturapv / $suma);
        $porofflinepv = ($offlinepv / $suma);
    }

    $excel->setActiveSheetIndex(0)
        ->setCellValue('A'.$i, $dia->format("d-m-Y"))
        ->setCellValue('B'.$i, $valauto)
        ->setCellValue('C'.$i, $porvalauto)
        ->setCellValue('D'.$i, $pfraude)
        ->setCellValue('E'.$i, $porpfraude)
        ->setCellValue('F'.$i, $eorden)
        ->setCellValue('G'.$i, $porerorden)
        ->setCellValue('H'.$i, $factura)
        ->setCellValue('I'.$i, $porfactura)
        ->setCellValue('J'.$i, $offline)
        ->setCellValue('K'.$i, $poroffline)
        ->setCellValue('L'.$i, $pautopv)
        ->setCellValue('M'.$i, $porautopv)
        ->setCellValue('N'.$i, $pfraudepv)
        ->setCellValue('O'.$i, $porpfraudepv)
        ->setCellValue('P'.$i, $eordenpv)
        ->setCellValue('Q'.$i, $porerordenpv)
        ->setCellValue('R'.$i, $facturapv)
        ->setCellValue('S'.$i, $porfacturapv)
        ->setCellValue('T'.$i, $offlinepv)
        ->setCellValue('U'.$i, $porofflinepv)
        ->setCellValue('V'.$i, $tprom)
        ->setCellValue('W'.$i, $mayor)
        ->setCellValue('X'.$i, $porcumplimiento)
        ->setCellValue('Y'.$i, $anupfraude)
        ->setCellValue('Z'.$i, $poranupfraude)
        ->setCellValue('AA'.$i, $anueorden)
        ->setCellValue('AB'.$i, $poranueorden)
        ->setCellValue('AC'.$i, $anufactura)
        ->setCellValue('AD'.$i, $poranufactura)
        ->setCellValue('AE'.$i, $anuoffline)
        ->setCellValue('AF'.$i, $poranuoffline)
        ->setCellValue('AG'.$i, $cctiva)
        ->setCellValue('AH'.$i, $porcctiva)
        ->setCellValue('AI'.$i, $cctivam)
        ->setCellValue('AJ'.$i, $porcctivam);
        //->setCellValue('AK'.$i, $pensolsis);

    if(($porcumplimiento*100) >= 98)
        $excel->getActiveSheet()->getStyle('X'. $i)->applyFromArray($colorbueno);

    if(($porcumplimiento*100) > 95 && ($porcumplimiento*100) < 98)
        $excel->getActiveSheet()->getStyle('X'. $i)->applyFromArray($colormedio);

    if(($porcumplimiento*100) <= 95)
        $excel->getActiveSheet()->getStyle('X'. $i)->applyFromArray($colormalo);
    $i++;
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
        'size' => '20',
        'color' => array(
            'rgb' => '000000'
        )
    ),
    'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array(
            'rgb' => 'dddddd'
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
        'size' => '10',
        'bold' => 'true',
        'color' => array(
            'rgb' => '000000'
        )
    ),
    'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array(
            'rgb' => 'DFE5FF'
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

$color3 = array(
    'font' => array(
        'name'  => 'Calibri',
        'size' => '10',
        'bold' => 'true',
        'color' => array(
            'rgb' => '000000'
        )
    ),
    'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array(
            'rgb' => 'E8FFDA'
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

$color4 = array(
    'font' => array(
        'name'  => 'Calibri',
        'size' => '10',
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
                'rgb' => 'dddddd'
            )
        )
    )
);

$color5 = array(
    'font' => array(
        'name'  => 'Calibri',
        'size' => '10',
        'bold' => 'true',
        'color' => array(
            'rgb' => '585858'
        )
    ),
    'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array(
            'rgb' => 'A4A4A4'
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

$excel->getActiveSheet()->getStyle('A1:AK1')->applyFromArray($color1);
$excel->getActiveSheet()->getStyle('A2:A4')->applyFromArray($color4);
$excel->getActiveSheet()->getStyle('L2:U4')->applyFromArray($color4);
//$excel->getActiveSheet()->getStyle('L3:L'.($i-1))->applyFromArray($color5);
$excel->getActiveSheet()->getStyle('Y2:AF4')->applyFromArray($color4);
$excel->getActiveSheet()->getStyle('B2:K' . ($i-1))->applyFromArray($color2);
$excel->getActiveSheet()->getStyle('AG2:AJ' . ($i-1))->applyFromArray($color2);
$excel->getActiveSheet()->getStyle('V2:X4')->applyFromArray($color3);
$excel->getActiveSheet()->getStyle('V5:W' . ($i-1))->applyFromArray($color3);

$excel->getActiveSheet()->getStyle('A5:AK'. ($i-1))->applyFromArray($estiloInformacion);
$excel->getActiveSheet()->getStyle('AK2:AK4')->applyFromArray($color4);

$excel->getActiveSheet()->getStyle('B5:B' . ($i-1))->getNumberFormat()->setFormatCode('#,##0');
$excel->getActiveSheet()->getStyle('D5:D' . ($i-1))->getNumberFormat()->setFormatCode('#,##0');
$excel->getActiveSheet()->getStyle('F5:F' . ($i-1))->getNumberFormat()->setFormatCode('#,##0');
$excel->getActiveSheet()->getStyle('H5:H' . ($i-1))->getNumberFormat()->setFormatCode('#,##0');
$excel->getActiveSheet()->getStyle('J5:J' . ($i-1))->getNumberFormat()->setFormatCode('#,##0');

$excel->getActiveSheet()->getStyle('L5:L' . ($i-1))->getNumberFormat()->setFormatCode('#,##0');
$excel->getActiveSheet()->getStyle('M5:M' . ($i-1))->getNumberFormat()->setFormatCode('#,##0.0 %');
$excel->getActiveSheet()->getStyle('O5:O' . ($i-1))->getNumberFormat()->setFormatCode('#,##0.0 %');
$excel->getActiveSheet()->getStyle('Q5:Q' . ($i-1))->getNumberFormat()->setFormatCode('#,##0.0 %');
$excel->getActiveSheet()->getStyle('S5:S' . ($i-1))->getNumberFormat()->setFormatCode('#,##0.0 %');

$excel->getActiveSheet()->getStyle('U5:U' . ($i-1))->getNumberFormat()->setFormatCode('#,##0.0 %');

$excel->getActiveSheet()->getStyle('W5:W' . ($i-1))->getNumberFormat()->setFormatCode('#,##0');
$excel->getActiveSheet()->getStyle('Y5:Y' . ($i-1))->getNumberFormat()->setFormatCode('#,##0');
$excel->getActiveSheet()->getStyle('AA5:AA' . ($i-1))->getNumberFormat()->setFormatCode('#,##0');
$excel->getActiveSheet()->getStyle('AC5:AC' . ($i-1))->getNumberFormat()->setFormatCode('#,##0');

$excel->getActiveSheet()->getStyle('AE5:AE' . ($i-1))->getNumberFormat()->setFormatCode('#,##0');
$excel->getActiveSheet()->getStyle('AG5:AG' . ($i-1))->getNumberFormat()->setFormatCode('#,##0');
$excel->getActiveSheet()->getStyle('AI5:AI' . ($i-1))->getNumberFormat()->setFormatCode('#,##0');

$excel->getActiveSheet()->getStyle('C5:C' . ($i-1))->getNumberFormat()->setFormatCode('#,##0.0 %');
$excel->getActiveSheet()->getStyle('E5:E' . ($i-1))->getNumberFormat()->setFormatCode('#,##0.0 %');
$excel->getActiveSheet()->getStyle('G5:G' . ($i-1))->getNumberFormat()->setFormatCode('#,##0.0 %');
$excel->getActiveSheet()->getStyle('I5:I' . ($i-1))->getNumberFormat()->setFormatCode('#,##0.0 %');
$excel->getActiveSheet()->getStyle('K5:K' . ($i-1))->getNumberFormat()->setFormatCode('#,##0.0 %');

$excel->getActiveSheet()->getStyle('N5:N' . ($i-1))->getNumberFormat()->setFormatCode('#,##0');
$excel->getActiveSheet()->getStyle('P5:P' . ($i-1))->getNumberFormat()->setFormatCode('#,##0');
$excel->getActiveSheet()->getStyle('R5:R' . ($i-1))->getNumberFormat()->setFormatCode('#,##0');
$excel->getActiveSheet()->getStyle('T5:T' . ($i-1))->getNumberFormat()->setFormatCode('#,##0');

$excel->getActiveSheet()->getStyle('V5:V' . ($i-1))->getNumberFormat()->setFormatCode('#,##0.0');

$excel->getActiveSheet()->getStyle('X5:X' . ($i-1))->getNumberFormat()->setFormatCode('#,##0.0 %');
$excel->getActiveSheet()->getStyle('Z5:Z' . ($i-1))->getNumberFormat()->setFormatCode('#,##0.0 %');
$excel->getActiveSheet()->getStyle('AB5:AB' . ($i-1))->getNumberFormat()->setFormatCode('#,##0.0 %');
$excel->getActiveSheet()->getStyle('AD5:AD' . ($i-1))->getNumberFormat()->setFormatCode('#,##0.0 %');

$excel->getActiveSheet()->getStyle('AF5:AF' . ($i-1))->getNumberFormat()->setFormatCode('#,##0.0 %');
$excel->getActiveSheet()->getStyle('AH5:AH' . ($i-1))->getNumberFormat()->setFormatCode('#,##0.0 %');
$excel->getActiveSheet()->getStyle('AJ5:AJ' . ($i-1))->getNumberFormat()->setFormatCode('#,##0.0 %');

$excel->setActiveSheetIndex(0)->getColumnDimension('A')->setWidth('15');

for($j = 'B'; $j <= 'Z'; $j++){
    $excel->setActiveSheetIndex(0)->getColumnDimension($j)->setWidth('10');
}

$excel->setActiveSheetIndex(0)->getColumnDimension('AA')->setWidth('10');
$excel->setActiveSheetIndex(0)->getColumnDimension('AB')->setWidth('10');
$excel->setActiveSheetIndex(0)->getColumnDimension('AC')->setWidth('10');
$excel->setActiveSheetIndex(0)->getColumnDimension('AD')->setWidth('10');
$excel->setActiveSheetIndex(0)->getColumnDimension('AE')->setWidth('10');
$excel->setActiveSheetIndex(0)->getColumnDimension('AF')->setWidth('10');
$excel->setActiveSheetIndex(0)->getColumnDimension('AG')->setWidth('10');
$excel->setActiveSheetIndex(0)->getColumnDimension('AH')->setWidth('10');

for($j=2; $j<=($i-1); $j++)
    $excel->getActiveSheet()->getRowDimension($j)->setRowHeight(25);

// Se asigna el nombre a la hoja
$excel->getActiveSheet()->setTitle('Validación');

// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
$excel->setActiveSheetIndex(0);

// Inmovilizar paneles
//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
$excel->getActiveSheet(0)->freezePaneByColumnAndRow(0,5);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="reportevalidacion.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$objWriter->save('php://output');
exit;
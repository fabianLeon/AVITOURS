<?php	
    include('xml2pdf/Xml2Pdf.php');
    $obj = new Xml2Pdf('reporte_1.xml');
    $pdf = $obj->render();
    $pdf->Output();
?>
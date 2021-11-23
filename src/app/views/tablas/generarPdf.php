<?php

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml('<h1>Hello World!</h1>');

$dompdf->setPaper('A4', 'landscape');

$dompdf->render();

$dompdf->stream('listado.pdf', array('Attachment' => 0));

<?php
include_once("include/config.php");
require_once 'dompdf/autoload.inc.php';

$fetch_student_info = $db_con->prepare("SELECT * from students where student_id = :student_id");
$fetch_student_info->execute(array(':student_id' => 2093));
$list = $fetch_student_info->fetchAll(PDO::FETCH_ASSOC);

echo $list[0][first_name];

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml("<iframe src='index.php'>");


// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();
?>
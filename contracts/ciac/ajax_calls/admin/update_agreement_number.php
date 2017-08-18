<?php

$current = $_POST['CURRENT'];
$end = $_POST['END'];

 $file = fopen("../ciac_agreement_numbers.txt", "w+", true);
 fwrite($file, $current."\n");
 fwrite($file, $end);
 fclose($file);
?>
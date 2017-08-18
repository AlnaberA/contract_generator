<?php 
  $file = fopen('ciac_agreement_numbers.txt', 'r+', true);
//  if($file){
//      echo 'File found.';
//  }else{
//      echo 'File not found';
//  }
  
  $current = fgets($file);
  $end = fgets($file);
  
  
  
?>  
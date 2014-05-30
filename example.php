<?php
/* * ************************************************************* 
 * Copyright notice 
 * 
 * (c) 2014 Chi Hoang (info@chihoang.de) 
 *  All rights reserved 
 * **************************************************************/
  require_once("main.php");
 
  $cpu=array("1"=>16,"2"=>8);
  $type="2";
  $input=array("0"=> array("freq"=>"2400","vcore"=>"1.175"),
               "1"=> array("freq"=>"2000","vcore"=>"1.175")
               );
  
  $convert=new convertFreq($cpu,$type,$input);
  $result=$convert->tofreq();
  print_r($result);
?>

<?php 

  //check for some simple webcrawlers
  if (isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/bot|crawl|spider|amazonaws|msn|googlebot/i', $_SERVER['HTTP_USER_AGENT'])) {
     die();
  }
  else {

     //shared clients?
     if (!empty($_SERVER['HTTP_CLIENT_IP'])){
       $ip=$_SERVER['HTTP_CLIENT_IP'];
          //Is it a proxy address?
         }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
           $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
         }else{
           $ip=$_SERVER['REMOTE_ADDR'];
         }
     
    
     $ip = sprintf("%u\n", ip2long($ip));//conversion 
  }

  
?>
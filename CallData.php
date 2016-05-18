<?php
    $Connection = mysqli_connect();//fill in the database paramaters
    if ($Connection->connect_errno > 0) {
        die();
    }
  
                    
   //REQUESTING MONTHLY DATA
                
    $queryMonth      = "SELECT COUNT(datum) AS countJan,
                   (SELECT COUNT(datum) FROM unique_ip WHERE datum LIKE '%-02-%') AS countFeb,
                   (SELECT COUNT(datum) FROM unique_ip WHERE datum LIKE '%-03-%') AS countMrt, 
                   (SELECT COUNT(datum) FROM unique_ip WHERE datum LIKE '%-04-%') AS countApr, 
                   (SELECT COUNT(datum) FROM unique_ip WHERE datum LIKE '%-05-%') AS countMei, 
                   (SELECT COUNT(datum) FROM unique_ip WHERE datum LIKE '%-06-%') AS countJun, 
                   (SELECT COUNT(datum) FROM unique_ip WHERE datum LIKE '%-07-%') AS countJul, 
                   (SELECT COUNT(datum) FROM unique_ip WHERE datum LIKE '%-08-%') AS countAug, 
                   (SELECT COUNT(datum) FROM unique_ip WHERE datum LIKE '%-09-%') AS countSep, 
                   (SELECT COUNT(datum) FROM unique_ip WHERE datum LIKE '%-10-%') AS countOkt, 
                   (SELECT COUNT(datum) FROM unique_ip WHERE datum LIKE '%-11-%') AS countNov, 
                   (SELECT COUNT(datum) FROM unique_ip WHERE datum LIKE '%-12-%') AS countDec 
                   FROM unique_ip AS af WHERE datum LIKE '%-01-%'";
    
     $data            = array(); 
     $rowAll          = array(); 
     
     try{
         $queryMonthresult = $Connection->query($queryMonth);
         $rowAll      = mysqli_fetch_assoc($queryMonthresult);
         $januari     = $rowAll['countJan'];
         $februari    = $rowAll['countFeb'];
         $maart       = $rowAll['countMrt'];
         $april       = $rowAll['countApr'];
         $mei         = $rowAll['countMei'];
         $juni        = $rowAll['countJun'];
         $juli        = $rowAll['countJul'];
         $augustus    = $rowAll['countAug'];
         $september   = $rowAll['countSep'];
         $oktober     = $rowAll['countOkt'];
         $november    = $rowAll['countNov'];
         $december    = $rowAll['countDec'];
         $data        = array($januari, $februari, $maart, $april, $mei, $juni, $juli, $augustus, $september, $oktober, $november, $december);
         // don't have to push  "$january & $februari enz enz.. in the array:  $data" 
         
         //avg from all 12 months
         $dataAvgunique =array_sum($data) / count($data);
         $dataAvgunique = round($dataAvgunique , 0);
                 
     }catch(Exception $e){
         die();
     }
     
  
  //REQUESTING YEARLY DATA
    //unique visitors on yearly base  
      $queryuniqueTotal = "SELECT COUNT(datum) FROM unique_ip WHERE YEAR(datum) = YEAR(CURDATE())";
  
      try{ 
       $queryuniqueTotalresult = $Connection->query($queryuniqueTotal) or die(mysqli_errno);

       $uniqueTotalresult = mysqli_fetch_assoc($queryuniqueTotalresult);
       $uniqueTotalresult = implode($uniqueTotalresult);
     
      }catch(Exception $e){
       die(mysqli_errno);
      } 
     //total amout of visitor on yearly base
      $queryYeartotal = "SELECT SUM(Telling) FROM unique_ip WHERE YEAR(datum) = YEAR(CURDATE())";
      
      try {
          $queryYeartotalresult = $Connection->query($queryYeartotal);
          
          $yearTotalresult = mysqli_fetch_assoc($queryYeartotalresult) or die();
          $yearTotalresult = implode($yearTotalresult);
          
      }catch(Exception $e){
          die(mysqli_errno);
      }
      
      
      $Connection->close();
?>
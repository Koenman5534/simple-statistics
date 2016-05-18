<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('GetIp.php');


class ip {
    
    protected $ip;
    
    public function __construct($ip){
        if ($ip == NULL || $ip == 0 || $ip == "") {  
            return false;
            die();
        }
        else {   
         $this->connection = mysqli_connect(); //fill in the database paramaters
          if ($this->connection->connect_errno) {
              die(mysqli_errno);         
             }else {
                 $this->ip = $ip;
             }
        }
    }
    
    public function execute() {
        if (!$this->exists()) {
            $this->newRecord();
            return true;               
        } else {
        $this->updateRecord();
        return true;    
        }
    }
    //Check if the IP is already in the Database 
    protected function exists() {  
            
        if ($this->connection->connect_errno) {
            die(); }
  
             $queryExists = ("SELECT ip  FROM unique_ip  WHERE ip = ?");
             
             // creating prepared statementet
                 $stmtExists = $this->connection->prepare($queryExists);
                 $stmtExists->bind_param("i", $this->ip); 
            if ($stmtExists->execute()){
                                
                 $stmtExists->store_result();
                 $stmtExists->fetch();
            
            if (!$stmtExists->num_rows > 0) {
                return false; //update
              }return true; //insert
           }  
           //close the prepared statement and MySQLI
                 $stmtExists->close();
                 $this->connection->close();                                         
    }
    //insert method 
    protected function newRecord(){
             //Query for insertion                          
             $queryInsert = "INSERT INTO unique_ip (ip,datum,Telling) VALUES (?,?,?)";  

            // creating prepared statement
            $stmtInsert = $this->connection->prepare($queryInsert);
            $stmtInsert->bind_param("isi", $ip, $Date, $Telling); 
            //binding the veriable's to the ?'s
                 $ip = $this->ip;
                 date_default_timezone_set('Europe/Amsterdam'); $Date = date("Y-m-d"); 
                 $Telling = '1';
            //execute prepared statement
                 $stmtInsert->execute(); 
            //close the prepared statement and MySQLI
                 $stmtInsert->close();
                 $this->connection->close();
    }
    //update method
    protected function updateRecord() {
             
             $queryUpdate = "UPDATE unique_ip SET Telling=Telling+?  WHERE ip = ?";  
            
            
            $stmtUpdate = $this->connection->prepare($queryUpdate);
            $stmtUpdate->bind_param("ii", $Telling, $ip); 
            
                 $ip = $this->ip;
                 $Telling = '+1';
            
                 $stmtUpdate->execute();  
            
                 $stmtUpdate->close();
                 $this->connection->close(); 
                 
    }
}
$call = new ip($ip);  
$call->execute();

?>
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DbHandler
 *
 * @author makin
 */
//$woord = "lepel";
//$db = new DbHandler();
//$db->findWoord($woord);
include_once '_config.php';
class DbHandler {
    private $woord;
    private $gevonden;
    
    //put your code here
    public function findWoord($woord){
        $this->woord = $woord;
        //instellen van PDO
        $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
                
        ];  
        
        // stap 2: Connect met de database
        $adres = '127.0.0.1';
        $charset = 'utf8mb4';
        $db = 'palindroom';
        
        $host = "mysql:host=$adres;dbname=$db;charset=$charset";
        
// stap 3:
        $sql = "SELECT * FROM palindromen WHERE woord='".$woord."';";
        try {
            $conn = new PDO($host, user, password, $options);
            $stmt = $conn->query($sql);
            
// stap 4: ophalen van gegevens over de uitgevoerde query
            if ($stmt->rowCount() == 1){
                $this->gevonden = TRUE;
            }
            else {
                $this->gevonden = FALSE;
            }
            
        } catch (Exception $e) {
            echo "jou text" . $e->getMessage()."(".$e->getCode().")";
        }
        
        
        
    }
    
    public function isWoordGevonden(){
        return $this->gevonden;
        
    }
}
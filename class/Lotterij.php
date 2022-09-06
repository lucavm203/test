<?php
    require_once __DIR__ . "/../secure/Connect.php";
    class Lotterij
    {
        private $lotterij_id;
        private $lotterij_naam;
        private $lotterij_datum;
        private $lotterij_prijs;
        private $user_id;
        
        public function __construct($lotterij_id= '' , $lotterij_naam, $lotterij_datum, $lotterij_prijs = '',$user_id ='') // constructor om een user te maken
        {
            $this->lotterij_id = $lotterij_id;
            $this->lotterij_naam = $lotterij_naam;
            $this->lotterij_datum = $lotterij_datum;
            $this->lotterij_prijs = $lotterij_prijs;
            $this->user_id = $user_id;
        }
        public function addLotterij($Lotterij){
            try
            {
                $insertOneResult = $Lotterij->insertOne([
                    'lotterij_naam' => $this->lotterij_naam,
                    'lotterij_datum' => $this->lotterij_datum,
                    'lotterij_prijs' => $this->lotterij_prijs,
                    'user_id'     => $this->user_id,
                ]);
                $this->lotterij_id = $insertOneResult->getInsertedId();
                
                
            }
            catch (PDOException $e)
            {
                echo "Error: " . $e->getMessage(); // in production code should be replaced by error logging
            }
        }
       
        // public function deleteLotterij(){
            
        // }
        public function showLotterij(){
            try{

            }
            catch(PDOException $e)
            {

            }
        }
       
        public function getLotterij_Id()
        {
            return $this->lotterij_id;
        }
        public function getLotterij_Naam()
        {
            return $this->lotterij_naam;
        }
        public function getLotterij_Datum()
        {
            return $this->lotterij_datum;
        }
        public function getLotterij_Prijs()
        {
            return $this->lotterij_prijs;
        }
        public function getUser_Id()
        {
            return $this->user_id;
        }

     

        public function __toString()
        {
            return 'id:' . $this->user_id . ', username: ' . $this->username . ', role: ' . $this->role;
        }
    }
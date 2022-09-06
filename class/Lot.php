<?php
    require_once __DIR__ . "/../secure/Connect.php";
    class Lot
    {
        private $lot_id;
        private $lotterij_id;
        private $user_id;
        public function __construct($lot_id, $lotterij_id = '', $user_id = '') // constructor om een user te maken
        {
            $this->lot_id = $lot_id;
            $this->lotterij_id = $lotterij_id;
            $this->user_id = $user_id;
         
        }
        public function addLot($Lot){
            
                $insertOneResult = $Lot->insertOne([
                    'lotterij_id' => $this->lotterij_id,
                    'user_id'     => $this->user_id,
                ]);
                $this->lot_id = $insertOneResult->getInsertedId();
        }
        public function getLot_id()
        {
            return $this->lot_id;
        }

        public function getLotterij_id()
        {
            return $this->lotterij_id;
        }

        public function getUser_id()
        {
            return $this->user_id;
        }

        
    }
<?php
    require_once __DIR__ . "/../secure/Connect.php";
    class User
    {
        private $user_id;
        private $username;
        private $password;
        private $role;

        public function __construct($user_id = '', $username, $password = '') // constructor om een user te maken
        {
            $this->user_id = $user_id;
            $this->username = $username;
            $this->password = $password;
        }
        public function addUser($User){

            try
            {
                
                $insertOneResult = $User->insertOne([
                    'username' => $this->username,
                    'password' => $this->password,
                    
                ]);
                $this->user_id = $insertOneResult->getInsertedId();
                
                
            }
            catch (PDOException $e)
            {
                echo "Error: " . $e->getMessage(); // in production code should be replaced by error logging
            }
        }
        public function updatePassword($User, $NPW){
            try
            {
                $User->updateOne(  ['_id' => new MongoDB\BSON\ObjectId($this->user_id)],['$set' =>[
                    'password' => $NPW,
                ]]);
            }
            catch (PDOException $e)
            {
                echo "Error: " . $e->getMessage(); // in production code should be replaced by error logging
            }
        }
        public function RemoveUser($User){
            try
            {
                $User->deleteOne(['_id' => new MongoDB\BSON\ObjectId($this->user_id)]);
            }
            catch (PDOException $e)
            {
                echo "Error: " . $e->getMessage(); // in production code should be replaced by error logging
            }
        }   
        public function getUser_Id()
        {
            return $this->user_id;
        }

        public function getUsername()
        {
            return $this->username;
        }

      
        public function __toString()
        {
            return 'id:' . $this->user_id . ', username: ' . $this->username ;
        }
    }
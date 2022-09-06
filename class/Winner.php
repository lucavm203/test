<?php
    require_once __DIR__ . "/../secure/Connect.php";
    class Winner{

        public function resultLotterij($Lotterij,$Lot,$Winner){
            try
            {
                $winners_id = [];
                $nothing = 'nope';
                $lotterijen = $Lotterij->find([]);
                foreach($lotterijen as $lotterij){ 
                        $datenow = New DateTime(date('Y-m-d H:i:s'));
                        $datumlotterij = New DateTime($lotterij["lotterij_datum"]);
                        $interval1 = $datenow->diff($datumlotterij);
                        if( $interval1->invert == 1){
                        //     $winners = $Winner->find([]);
                        //     // var_dump($winners);
                        //     //error zit in foreach. hij heeft geen waarde dus loopt daar vast. maar de winners is niet leeg want hij heeft veel mongo data daar in zitten.
                            // foreach((array)$winners as $winner){
                            //     var_dump($winner);
                            //     if(empty($winner)){
                                
                            //         var_dump($winner);
                            //         if($winner["lotterij_id"] === $lotterij["_id"]){
                            //             echo 'error';
                            //         }else{
                            //             echo '***' . $lotterij['_id'] . '*****' ;
                            //             $lot_ids = $Lot->find(['lotterij_id' => $lotterij['_id']]);
                                       
                            //             echo '<pre>';
                            //             var_dump($lotterij['_id']);
                            //             echo '<pre>';
                            //             // var_dump($lot_ids['_id']);
                            //             $lot_ids_array = [];
                            //             foreach($lot_ids as $lot_id){
                            //                 // $var = (string) new MongoDB\BSON\ObjectId();
                            //                 // echo $var;
                            //                 array_push($lot_ids_array, $lot_id['_id']);
                            //             };
                            //             var_dump($lot_ids_array);
                            //             $winnerid = array_rand($lot_ids_array,1);
                            //             var_dump($winnerid);
                            //             $insertOneResult = $Winner->insertOne([
                            //                 'lotterij_id' =>  $lotterij['_id'],
                            //                 'lot_id'     => $lot_ids_array[$winnerid]
                            //             ]);
                            //             $winners_id =  $insertOneResult;    
                            //         }
                            //     }
                            //     else{
                            //         echo '***' . $lotterij['_id'] . '*****' ;
                            //         $lot_ids = $Lot->find(['lotterij_id' => $lotterij['_id']]);
                                   
                            //         echo '<pre>';
                            //         var_dump($lotterij['_id']);
                            //         echo '<pre>';
                            //         // var_dump($lot_ids['_id']);
                            //         $lot_ids_array = [];
                            //         foreach($lot_ids as $lot_id){
                            //             // $var = (string) new MongoDB\BSON\ObjectId();
                            //             // echo $var;
                            //             array_push($lot_ids_array, $lot_id['_id']);
                            //         };
                            //         var_dump($lot_ids_array);
                            //         $winnerid = array_rand($lot_ids_array,1);
                            //         var_dump($winnerid);
                            //         $insertOneResult = $Winner->insertOne([
                            //             'lotterij_id' =>  $lotterij['_id'],
                            //             'lot_id'     => $lot_ids_array[$winnerid]
                            //         ]);
                            //         $winners_id =  $insertOneResult;
                            //     }
                            // }  
                            
                               
                            
                            
                        // }
                        if(empty($lotterij['gewonnen'])){
                            echo '***' . $lotterij['_id'] . '*****' ;
                            $lot_ids = $Lot->find(['lotterij_id' => $lotterij['_id']]);
                           
                            echo '<pre>';
                            echo($lotterij['_id']);
                            echo '<pre>';
                            // var_dump($lot_ids['_id']);
                            $lot_ids_array = [];
                            foreach($lot_ids as $lot_id){
                                // $var = (string) new MongoDB\BSON\ObjectId();
                                // echo $var;
                                array_push($lot_ids_array, $lot_id['_id']);
                            };
                            var_dump($lot_ids_array);
                            $winnerid = array_rand($lot_ids_array,1);
                            var_dump($winnerid);

                            $insertOneUpdate = $Lotterij->updateOne(
                                ['_id' => $lotterij['_id']],
                                ['$set' => ['gewonnen' => 'yes']]
                            );
                            $lotterij_id = $insertOneUpdate;
                            $insertOneResult = $Winner->insertOne([
                                'lotterij_id' =>  $lotterij['_id'],
                                'lot_id'     => $lot_ids_array[$winnerid]
                            ]);
                            $winners_id =  $insertOneResult;
                        }
                    }  

            
                if(!empty($winners_id)){
                    return $winners_id;
                }else{
                    return $nothing;
                }   
                }
            }
            catch (PDOException $e)
            {
                echo "Error: " . $e->getMessage(); // in production code should be replaced by error logging
            }
        }
    }


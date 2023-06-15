<?php 
        include '../dbconn.php' ; 
        function getCustomerList() {
                $query = "SELECT * from `user`" ; 
                global $link ; 
                $query_run = mysqli_query($link,$query) ; 
                if($query_run) {
                        if(mysqli_num_rows($query_run)>0) {
                                $res = mysqli_fetch_all($query_run,MYSQLI_ASSOC) ; 
                             
                                header("HTTP/1.0 404  Customer List Fetched Successfully") ; 
                                return json_encode($res) ;
                        }       
                        else {
                                $data = [
                                        'stage' => 404 , 
                                        'message' =>  'No data found ' , 
                                        
                                ] ; 
                                header("HTTP/1.0 404  No data found") ; 
                                return json_encode($data) ;
                        }
                }
                else{
                        $data = [
                                'stage' => 500 , 
                                'message' =>  ' Internal Server Error ! ' , 
                
                        ] ; 
                        header("HTTP/1.0 500 Internal Server Error") ; 
                        echo json_encode($data) ;   
                }
        }
        function postData() {
                global $link ;
                
                $query = "INSERT INTO `user`(`name`, `email`, `rating`, `review`, `DateOfBirth`, `username`) VALUES ('$link->name','$link->email','$link->rating','$link->review','$link->DateOfBirth','$link->username')";
                $query_run = mysqli_query($link,$query) ; 
                

                // $stmt->bindParam(':id', $this->id);
                // $stmt->bindParam(':name', $this->name);
                // $stmt->bindParam(':username', $this->username);
                // $stmt->bindParam(':email', $this->email);
                // $stmt->bindParam(':rating', $this->rating);
                // $stmt->bindParam(':review', $this->review);
                // $stmt->bindParam(':date', $this->date);
               
                if($query_run) {
                    return TRUE;
                }
        
                return FALSE;
            }


?> 
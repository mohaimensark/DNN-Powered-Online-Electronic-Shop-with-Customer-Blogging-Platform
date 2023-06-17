<?php 
        include '../dbconn.php' ; 
        function getCustomerList() {
                $query = "SELECT * from `user` where `rating`>=0" ; 
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
        


?> 

<?php 
 
    include('db.php');

    if(isset($_POST['module_id'])){

    	$id =$_POST['module_id'];

        //// deleting from director
     $sql1 = " SELECT `module_video` FROM `course_modules` WHERE module_id = ".$id." " ;

       $result = $conn->query($sql1);

            if($result1->num_rows > 0){
            
         while($row1 = $result1->fetch_assoc()) {
                
                $loc = $row1['module_video'] ;
                
              unlink($loc);

         } }


    	$sql = " DELETE FROM `course_modules` WHERE module_id=".$id." " ;

    	$result =$conn->query($sql);

    	// if($result === true)
    	// 	 {
    	// 	 	echo "1" ;
    	// 	 }else{
    	// 	 	echo "2";
    	// 	 }
    }
 ?>
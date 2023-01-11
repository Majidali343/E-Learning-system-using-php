<?php 
    session_start();
    include('db.php');
    $id = $_SESSION['id'];
    if (isset($_POST['update_profile'])) {
   $P_Name = mysqli_real_escape_string($conn, $_POST['P_Name']);
   $P_Bio = mysqli_real_escape_string($conn, $_POST['P_Bio']);
   $P_Desigination = mysqli_real_escape_string($conn, $_POST['P_Desigination']);
   $P_Education = mysqli_real_escape_string($conn, $_POST['P_Education']);

   mysqli_query($conn, "UPDATE `users` SET firstname = '".$P_Name."', Bio = '".$P_Bio."', Designation = '".$P_Desigination."', Education = '".$P_Education."' WHERE id = '".$id."' ") or die('query failed');
   
   

   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'profilephoto/'.$update_image;

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image is too large';
      }else{
         $image_update_query = mysqli_query($conn, "UPDATE `users` SET profilephoto = '".$update_image."' WHERE id = '".$id."' ") or die('query failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = 'image updated succssfully!';
      }
   }

}
 ?> 

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet"  href="./css/profile.css">
	<title>Profile</title>
</head>
<body>
           <div class="side-bar">
        <div class="logo-name">
            <h1>My Profile</h1>
        </div>
        <ul>
            <li><a href="./Teacher.php">Home</a></li>
            <li><a href="./TeacherAddcourse.php">Add Courses</a></li>
            <li><a href="./assesments.php">Exams and grades</a></li>
            <li><a href="./profile.php">My Profile</a></li>
           
            <li ><a href="./logout.php">Logout</a></li>
        </ul>
    </div>


    <div class="container">
        <div class="header">
            <h5>E - Learning Website</h5>
            <div class="user">
                 <?php echo $_SESSION['firstname'], "&nbsp",$_SESSION['secondname']; ?>
            </div>
        </div>
        <div class="content">
            <?php
             $sql2 = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '".$_SESSION['id']."' " ) or die('query failed');
             if (mysqli_num_rows($sql2) > 0) {
                $fetch = mysqli_fetch_assoc($sql2);
             }
            ?>
            <form method="post" action="profile.php" enctype="multipart/form-data">
            <?php 
                if ($fetch['profilephoto'] == '') {
                echo '<img src="images/Pic.png">';
            }
             else{
                echo '<img src="profilephoto/'.$fetch['profilephoto'].'">';
            }
            if(isset($message)){
            
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
                }
            
            ?>
                <br>
                
                
                <input  id="chospic" type="file"  name="update_image" accept="image/jpg, image/jpeg, image/png">
                <h3>Name</h3>
                <input class="Name" name="P_Name" type="text" placeholder="Enter Name" value="<?php echo($fetch['firstname'])?>" >
                <h3>Bio</h3>
                <textarea id="#" name="P_Bio" rows="4" cols="50" placeholder="Enter Bio" value="
                <?php if(isset($_POST['P_Bio'])) echo($fetch['Bio']) ?> "><?php echo $fetch['Bio'] ?></textarea>
                <h3>Desigination</h3>
                <input class="Desigination" name="P_Desigination" type="text" placeholder="Enter Desigination" value="<?php if(isset($_POST['P_Desigination'])) echo($fetch['Designation']) ?>">
                <h3>Education</h3>
                <input class="Education" name="P_Education" type="text" placeholder="Enter Education" value="<?php if(isset($_POST['P_Education'])) echo($fetch['Education']) ?>">
                <br>
                <div class="Save"> 
                <button name="update_profile" type="submit" value="update_profile" onclick="window.location.href='profile.php'">Save</button>
                </div>
                <br>
            </form>          
        </div>
   </div>
</body>
</html>
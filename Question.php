<?php 
    session_start();
    include('db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Help</title>
    <link rel="stylesheet" href="./css/Question.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
    <div class="container">
        <div class="content">
        <section class="chat__section">
              <div class="brand">
                <h3>Course Queries
                <a id="out" href="./logout.php">Logout</a>
                <a id="backhome" href="./Teacher.php">Home</a></h3>
              </div class="message__area">


         <?php 
         $sql= "  SELECT chats.Courseid ,chats.senderId,chats.message ,users.firstname FROM `chats`
                    INNER JOIN `users`
                    ON chats.senderId =users.id
                    WHERE chats.Courseid ='".$_GET['Queriesid']."' " ;

              $result =$conn->query($sql);
               while($row=$result->fetch_assoc()){

               if( $row['senderId'] != $_SESSION['id']){
                ?>
                <div class="incoming message">
                    <p><?php  echo $row['message'] ;?></p>
                    <h3><?php  echo $row['firstname'] ;?></h3>
                 </div>
                <?php
               }else{
                 ?>
                  <div class="outgoing message">
                    <p><?php  echo $row['message'] ;?></p>
                    <h3><?php  echo $row['firstname'] ;?></h3>
                 </div>
                <?php
               }
               }     
    
          ?>
  
           
               <div>
                <textarea id="textarea" cols="30" rows="1" placeholder="Enter message"></textarea><button id="btn" onclick="send(<?php echo $_GET['Queriesid'] ;?>)">SEND</button>
               </div> 
               <div id="Sndid" style="display: none;"><?php echo $_SESSION['id'] ;?></div>
              </div>
            </section>
                
        </div>

            
    </div>
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
     
    

         function send(msgid){
            var crsid = msgid;
            var Pid = $("#Sndid").text();
             var txtArea = $("#textarea").val();
         

          $.post('chat.php',{Courseid:crsid , personid : Pid , message:txtArea},function(data){
                $(".outgoing").append(data);
          });
          $('#textarea').val('').empty();
          // reload page from cache:
          location.reload(true);
        }
  


</script>
</body>


</html>













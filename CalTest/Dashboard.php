<!DOCTYPE html>
<?php
     session_start();
     // search for sessions 
     if(isset($_SESSION['user'])){
         $user= $_SESSION['user'];
     }echo 'Error';
     
    include ('phpConnection.php');
     
     $sqlManger = mysqli_query($connect, "SELECT id FROM users where email=$user "); // managers'ID
     $sqlTeamMembers= mysqli_query($connect, "SELECT * FROM users NATURAL JOIN managers NATURAL JOIN team WHERE managers.users_memberId=$sqlManger AND managers.team_id=team.id AND users_memberId.team_id=team.id AND  users_memberId.users_memberId =users.memberId  ") ; // by using managers' id can find his team and members 

     
        
 ?>
    
<html>
    <head>
        <meta charset="UTF-8">
        <title>CAL Test</title>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/dashMenu.css">
    </head>
    <body onload="<?php echo $jsFunction() ?>" style="height: max-content;background-image:url(img/background-3017167_960_720.jpg);image-orientation:calc ;padding: 5px">
     
        <div class="row" style="height: 50px;background-color: #000;padding: 5px;opacity: ">
            <h1 style="color: #ff9900;float: left;padding-left: 15px">Dashboard <button class="btn btn-dark" >Logout</button></h1> 
            
        </div>
        <h2></h2>
        <div class="row" style="height: 50px"></div>
    <div class="row">
        <div class="col-sm-2" >
            <nav class="navbar navbar-inverse">
                <ul class="nav navbar-nav">
                    <li><a href="">Home</li>
                    <li><a href="">About Us</li>
                    <li><a href="">Branches </li>
                    <li><a href="">Contact </li>

                </ul>
            </nav>
            
        </div>
        
        <?php 
        while ($res= mysqli_fetch_row($sqlTeamMembers)){
            echo '<div class="card" id="'.$res[team_id].'" onclick="'. header('Location:singalTeam.php').$_SESSION['teamID']=$_POST[$res[team_id]].'">';
            echo ' <img src="img/Photoshop-Replace-Background-Featured-670x335.jpg" style="width:300px;height: 300px">';
            echo '<div class="container">';
            echo '<h4><b>"'.$res[department].'"</b></h4>';
            echo '<p>"'.$res[name].'"</p>';
            echo '</div>';
            echo '</div>';
        }
        ?>
        
        
         
    </div>
        <div class="row" style="height: 50px" ></div>
         
         <script type="text/javascript">
             $jsFunction(){
                 
             }
         </script>
         
    </body>
</html>

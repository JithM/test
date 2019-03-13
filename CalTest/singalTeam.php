<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>CAL Test</title>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
       
    </head>
   <body style="height: max-content;background-image:url(img/blue-purple-wallpapers-25168-896945.jpg);image-orientation:calc ;padding: 5px">
         <?php
        session_start();
        if(isset($_SESSION['teamID'])){
             $teamid=$_SESSION['teamID'];
         }echo 'Error';
     
         include ('phpConnection.php');
         $teamNAme = mysqli_query($connect, "SELECT department FROM team WHERE team.id=$teamid");
         $teams= mysqli_query($connect, "SELECT * FROM team NATURAL JOIN teammembersdetails NATURAL JOIN users WHERE team.id=$teamid AND teammembersdetails.team_id=$teamid AND users.memberId=teammembersdetails.users_memberId ");
         
        //update details 
        if (isset($_POST['update'])){ 
            if ($_POST['name']!=NULL){
                 $sqlupdate= mysqli_query($connect, "UPDATE teammembersdetails SET comment= '$_POST[comment]' WHERE users_memberId='".$_POST[name]."'");
        }else{
               echo 'null value pass';
            }
        }
         ?>
        
        <div class="row" style="height: 50px;background-color: #000;padding: 5px;opacity: ">
            <h1 style="color: #ff9900;float: left;padding-left: 15px">Team <?php echo $teamNAme[department]  ?> </h1> 
        </div>
       <div class="row">
       <div class="col-sm-1"></div>
            <div class="col-sm-10" style="background-color: #ffffff;opacity: 0.88;padding-top: 50px ">
                <table border="0" cellspacing="5" cellpadding="5">
                    <h2>Team A</h2>
                    <thead>
                        <tr>
                            <th>Member ID</th>
                            <th>Member Name</th>
                            <th>Current Rout</th>
                            <th>Comment</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while ($res= mysqli_fetch_row($teams)){
                        ?>
                                <form method="POST">
                        <?php
                                echo '<tr>'; 
                                echo '<td>'.$res[users_memberId].'</td>';
                                echo '<td>'.$res[name].'</td>';
                                echo '<td>'.$res[curentWorkingRouting].'</td>';
                                echo '<td><input type="text" name="comment" id="'.$res[comment].'" /></td>';
                                echo '<td><input type="submit" name="update'.$res[memberId].'" value="Update"/></td>';
                                echo '<td><input type="submit" name="delete'.$res[memberId].'" value="Delete"/></td>';
                                echo '</tr>';
                        ?>
                            </form>
                                <?php
                                     }
                                ?>
                                
                        ?>
                        
                   
                    </tbody>
                </table>

            </div>
       <div class="col-sm-1"></div>    
       </div>
    </body>
</html>

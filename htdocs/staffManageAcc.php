<?php 
    include "dbpdo.php";
    $conn = dbConnect();
    $el;

 
?>

<html>
 <head>
  <title>Manage Account</title>
 </head>
 <body>
 <h1>Manage Account </h1>
     <hr>
    <h2>Edit Staff Table</h2>
     <div>
		<table border="3">
			<thead>
				<th>ID</th>
				<th>firstname</th>
                <th>lastname</th>
				<th>email</th>
                <th>password</th>
                <!-- <th>id</th> -->
                <th bgcolor = #009933>Update</th>
                <th bgcolor = #FF0000 >Delete</th>
				<!--<th>Lastname</th>!-->
				<th></th>
			</thead>
			<tbody>
				<?php


                         $query = "SELECT * FROM staff";
                         session_start();
                         
                        foreach ($conn->query($query) as $row) {
                            $index = $row['id'];
                            if($_SESSION['id'] == $index) continue; //skip access to currently logged in stuff member row
						?>
						<tr>

							<td><?php echo $row['id']; ?></td>

                            <form action = "updateDB.php" method = "post">

                            <td><?php echo '<input type = "text" name = "inFname'.$index.'"  value ="'.$row['fname'].'"/>'; ?></td>
                            <td><?php echo '<input type = "text" name = "inLname'.$index.'" value ="'.$row['lname'].'"/>'; ?></td>
                            <td><?php echo '<input type = "text" name = "inEmail'.$index.'" value ="'.$row['email'].'"/>'; ?></td>
                            <td><?php echo '<input type = "password" name = "inPass'.$index.'" value ="'.$row['password'].'"/>'; ?></td>
                            <!-- <td><?php echo '<input type = "text" name = "inSadmin'.$index.'" value ="'.$row['sadmin'].'"/>'; ?></td> -->

                            <?php echo '<input type = "hidden" name = "index" value ="'.$index.'"/>'; ?>
                            

							<td>
  

                                <?php 
                                        echo '<input type="submit" value = "update" name = "updateBtn'.$index.'"/>';
                                ?>					
                            </td>

                            <td>

                            <?php 
                                        echo '<input type="submit" value = "Delete" name = "deleteBtn'.$index.'"/>';
                                        echo '</form>';
                                ?>								
							</td>                           
						</tr>


						<?php
                          $index++;//last iteration index goes to empty row where user can add 
					}                   
				?>
                         
                            <form action = "addStaffTuple.php" method = "post"> <!--adding tuple!-->

                            <td><?php echo '<input type = "hidden" name ="inID'.$index.'" value ="" />';?></td>                      
                            <td><?php echo '<input type = "text" name = "inFname'.$index.'"  value =""/>'; ?></td>
                            <td><?php echo '<input type = "text" name = "inLname'.$index.'" value =""/>'; ?></td>
                            <td><?php echo '<input type = "text" name = "inEmail'.$index.'" value =""/>'; ?></td>
                            <td><?php echo '<input type = "text" name = "inPass'.$index.'" value =""/>'; ?></td>
                            <td><?php echo '<input type = "hidden" name = "inSadmin'.$index.'" value ="0"/>'; ?></td>   
                            <?php echo '<input type = "hidden" name = "index" value ="'.$index.'"/>'; ?>           
                            <td>
                            <?php
                            echo '<input type="submit" value = "Add"name = "addBtn'.$index.'"/>';
                            $index++;//after add increment to create new emply tuple
                              echo '</form>';
                            ?>
     
                                
							</td>                
			</tbody>
		</table>
	</div> 
    <hr>

<a href = "staffMenu.php">
<button>Back</button>


 </body>
</html>

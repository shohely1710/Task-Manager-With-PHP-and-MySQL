
<?php
     include('config/constants.php');
     //Get the listid from URL
     $list_id_url = $_GET['list_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager with PHP and MySQL</title>
</head>
<body>
    <h1>TASK MANAGER</h1>

     <!-- Menu Starts Here -->
     <div class="menu">
        <a href="<?php echo SITEURL; ?>">Home</a>

        <?php
            //Comment Displaying Lists From Database in ourMenu
            $conn2 = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());

            //Select Database
            $db_select2 = mysqli_select_db($conn2, DB_NAME) or die(mysqli_error());

            //Query to Get the Lists from database
            $sql2 = "SELECT * FROM tbl_lists";

            //Execute Query
            $res2 = mysqli_query($conn2, $sql2);

            //Check whether the query executed or not
            if($res2==true)
            {
                //Display the lists in menu
                while($row2=mysqli_fetch_assoc($res2))
                {
                    $list_id = $row2['list_id'];
                    $list_name = $row2['list_name'];
                    ?>
                        <a href="<?php echo SITEURL; ?>list-task.php?list_id=<?php echo $list_id; ?>"><?php echo $list_name; ?></a>
                    <?php
                }
            }

        ?>
        

        <a href="<?php echo SITEURL; ?>manage-list.php">Manage Lists</a>
    </div>
     <!-- Menu Ends Here -->

     <div class="all-task">
         <a href="<?php echo SITEURL; ?>add-task.php">Add Task</a>

         <table>
             <tr>
                 <th>S.N. </th>
                 <th>Task Name</th>
                 <th>Priority </th>
                 <th>Deadline </th>
                 <th>Actions </th>
             </tr>

             <?php

                $conn = mysqli_connect(LOCALHOST,  DB_USERNAME, DB_PASSWORD) or die(mysqli_error());

                $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());

                //SQL Query to display tasks by list selected
                $sql = "SELECT * FROM tbl_tasks WHERE list_id=$list_id_url";

                //Execute Query
                $res = mysqli_query($conn, $sql);

                if($res==true)
                {
                    //Display the tasks based on list
                    //count the Rows
                    $count_rows = mysqli_num_rows($res);

                     //Create Serial Number Variable
                     $sn=1;

                    if($count_rows>0)
                    {
                        //We have tasks on this list
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $task_id = $row['task_id'];
                            $task_name = $row['task_name'];
                            $priority = $row['priority'];
                            $deadline = $row['deadline'];
                            ?>

                            <tr>
                                <td><?php echo $sn++; ?>.</td>
                                <td><?php echo $task_name; ?></td>
                                <td><?php echo $priority; ?></td>
                                <td><?php echo $deadline; ?></td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>update-task.php?task_id=<?php echo $task_id; ?>">Update</a>   
                                    <a href="<?php echo SITEURL; ?>delete-task.php?task_id=<?php echo $task_id; ?>">Delete</a> 
                                </td>
                            </tr>

                            <?php

                            
                        }
                    }
                    else
                    {
                        //No Tasks on this list
                        ?>
                        <tr>
                            <td colspan="5">No Tasks added on this list. </td>
                        </tr>
                        <?php
                    }
                }

             ?>

            

         </table>
     </div>

    
</body>
</html>
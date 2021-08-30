<?php
    include('config/constants.php');

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
        <a href="#">To Do</a>
        <a href="#">Doing</a>
        <a href="#">Done</a>

        <a href="<?php echo SITEURL; ?>manage-list.php">Manage Lists</a>
    </div>
     <!-- Menu Ends Here -->

     <!-- Tasks Starts Here -->
     <p>
         <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

            if(isset($_SESSION['delete_fail']))
            {
                echo $_SESSION['delete_fail'];
                unset($_SESSION['delete_fail']);
            }

         ?>
     </p>
     <div class="all-tasks">
         <a href="<?php SITEURL; ?>add-task.php">Add Task</a>
         <table>
             <tr>
                 <th>S.N.</th>
                 <th>Task Name</th>
                 <th>Priority</th>
                 <th>Deadline</th>
                 <th>Actions</th>
             </tr>

             <?php
                //Connect Database
                $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());

                //Select the Database
                $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());

                //Create SQL Query to Get Data From Database
                $sql = "SELECT * FROM tbl_tasks";

                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //CHeck whether the query is executed or not
                if($res==true)
                {
                    //Display the Tasks from Database

                    //Count the Tasks on Database first
                    $count_rows = mysqli_num_rows($res);

                    //Create Serial Number Variable
                    $sn=1;

                    //CHeck whether there is task on database or not
                    if($count_rows>0)
                    {
                        //Data is in Database
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $task_id = $row['task_id'];
                            $task_name = $row['task_name'];
                            $priority = $row['priority'];
                            $deadline = $row['deadline'];
                            ?>
                             <tr>
                                <td><?php echo $sn++; ?>. </td>
                                <td><?php echo $task_name; ?></td>
                                <td><?php echo $priority; ?> </td>
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
                        //No Data in Database
                        ?>
                        <tr>
                            <td colspan="5">No Task Added Yet. </td>
                        </tr>
                        <?php
                    }
                }
             ?>
         </table>

     </div>

      <!-- Tasks Ends Here -->
    
</body>
</html>
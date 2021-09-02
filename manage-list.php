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
    <link rel="stylesheet" href="<?php echo SITEURL; ?>css/style.css" />
</head>
<body>
    <div class="wrapper">
    <h1>TASK MANAGER</h1>
    <a class="btn-secondary" href="<?php echo SITEURL; ?>">Home</a>

    <h3>Manage Lists Page</h3>

    <p>
        <?php
            //Check if the session is set
            if(isset($_SESSION['add']))
            {
                //display message
                echo $_SESSION['add'];
                //Remove the message after displaying one time
                unset($_SESSION['add']);
            }

            //Check the Session for Delete
            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

              //Check the Session Message for Update
              if(isset($_SESSION['update']))
              {
                  echo $_SESSION['update'];
                  unset($_SESSION['update']);
              }

            //Check for Delete Fail
            if(isset($_SESSION['delete_fail']))
            {
                echo $_SESSION['delete_fail'];
                unset($_SESSION['delete_fail']);
            }

        ?>
    </p>

    <!-- Table to display lists starts here -->
    <div class="all-lists">

        <a class="btn-primary" href="<?php echo SITEURL; ?>add-list.php">Add List</a>

        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>List Name</th>
                <th>Actions</th>
            </tr>

            <?php
                //Connect the Database
                $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());

                //Select Database
                $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());

                //SQL Query to display all data from database
                $sql = "SELECT * FROM tbl_lists";

                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //Check whether the query executed successfully or not
                if($res==true)
                {
                    //work on displaying data
                    // echo "Executed";

                    //Count the rows of data in database
                    $count_rows = mysqli_num_rows($res);
                    //Create a Serial Number Variable
                    $sn = 1;

                    //Check whether there is data in database or not
                    if($count_rows>0)
                    {
                        //There's data in database Display in table
                        while($row=mysqli_fetch_assoc($res))
                        {
                            //Getting data from database
                            $list_id = $row['list_id'];
                            $list_name = $row['list_name'];
                            ?>
                             <tr>
                                <td><?php echo $sn++; ?>.</td>
                                <td><?php echo $list_name; ?></td>
                                <td>
                                    <a class="btn-update" href="<?php echo SITEURL; ?>update-list.php?list_id=<?php echo $list_id; ?>">Update</a>
                                    <a class="btn-delete" href="<?php echo SITEURL; ?>delete-list.php?list_id=<?php echo $list_id;?>">Delete</a>
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
                            <td colspan="3">No List Added Yet.</td> <!--colspan is used to merge column -->
                        </tr>

                        <?php
                    }

                }

            ?>
        </table>
    </div>
   

    <!-- Table to display lists ends here -->
    </div>

</body>
</html>
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
    <a href="<?php echo SITEURL; ?>">Home</a>
    <a href="<?php echo SITEURL; ?>manage-list.php">Manage Lists</a>

    <h3>Add List Page</h3>
    <p>
        <?php
            //Check whether the session is created or not
            if(isset($_SESSION['add_fail']))
            {
                //display session message
                echo $_SESSION['add_fail'];
                //Remove the message after displaying once
                unset($_SESSION['add_fail']);

            }

        ?>
    </p>

    <!--Form to Addd List Starts Here -->
    <form method="POST" action="">
        <table>
            <tr>
                <td>List Name: </td>
                <td><input type="text" name="list_name" placeholder="Type list name here" required="required" /></td>
            </tr>

            <tr>
                <td>List Description: </td>
                <td><textarea name="list_description" placeholder="Type List Description Here"></textarea></td>

            </tr>
                <td><input type="submit" name="submit" value="SAVE"></td>
            <tr>

            </tr>
        </table>

    </form>

    <!--Form to Addd List Ends Here -->
</body>
</html>

<?php
    //Check whether the form is submitted or not
    if(isset($_POST['submit']))
    {
        // echo "Form Submitted";

        //Get the values from form and save it in variables
        $list_name = $_POST['list_name'];
        $list_description = $_POST['list_description'];

        //Connect Database
        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //username for localserver is root

        //CHeck whether the Database connected or not
       /* if($conn==true)
        {
            echo "Database Connected";
        }*/

        //SELECT Database
        $db_select = mysqli_select_db($conn, DB_NAME);

        //CHeck whether the Database is connected or not
        /*if( $db_select==true)
        {
            echo "Databse Selected";
        }*/

        //SQL Query to Insert data into database
        $sql = "INSERT INTO tbl_lists SET
            list_name = '$list_name',
            list_description = ' $list_description'
            ";

        //Execute Query and Insert into Databse
        $res = mysqli_query($conn, $sql);

        //Check whether the Query executed successfully or not
        if($res==true)
        {
            //Data inserted successfully
            // echo "Data Inserted";

             //Create a SESSION variable to display message
             $_SESSION['add'] = "List Added Successfully";

            //Redirect to Manage List Page
            header('location:' .SITEURL. 'manage-list.php');

           

        }
        else
        {
            //Failed to insert data
            // echo "Failed to Insert Data";

            //Create Session to save message
            $_SESSION['add_fail'] = "Failed to Add List";

            //Redirect to Same Page
            header('location:' .SITEURL. 'add-list.php');
        }


    }
    

?>
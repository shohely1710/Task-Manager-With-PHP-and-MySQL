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
    <a href="index.php">Home</a>
    <a href="manage-list.php">Manage Lists</a>

    <h3>Add List Page</h3>

    <!--Form to Addd List Starts Here -->
    <form method="POST" action="">
        <table>
            <tr>
                <td>List Name: </td>
                <td><input type="text" name="list_name" placeholder="Type list name here" /></td>
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
        $conn = mysqli_connect('localhost', 'root', '') or die(); //username for localserver is root

    }
    

?>
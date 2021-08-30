<?php
    include('config/constants.php');

    //Check task_id in URL
    if(isset($_GET['task_id']))
    {
        //Delete the Task from Database
        //Get the Task ID
        $task_id = $_GET['task_id'];

        //Connect Database
        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());

        //Select Database
        $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());

        //SQL Query to Delete Task
        $sql = "DELETE FROM tbl_tasks WHERE task_id=$task_id";

        //Execute Query
        $res = mysqli_query($conn, $sql);

        //Check if the Query Executed Successfully or Not
        if($res==true)
        {
            //Query Executed Successfully and Task Deleted
            $_SESSION['delete'] = "Task Deleted Successfully.";

            //Redirect to Homepage
            header('location:'.SITEURL);
        }
        else
        {
                //Failed to delete task
                $_SESSION['delete_fail'] = "Failed to Delete Task";

                //Redirect to Homepage
                header('location:'.SITEURL);
        }
    }
    else
    {
        //Redirect to Home
        header('location:'.SITEURL);
    }

?>
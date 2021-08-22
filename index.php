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
        <a href="index.php">Home</a>
        <a href="#">To Do</a>
        <a href="#">Doing</a>
        <a href="#">Done</a>

        <a href="manage-list.php">Manage Lists</a>
    </div>
     <!-- Menu Ends Here -->

     <!-- Tasks Starts Here -->
     <div class="all-tasks">
         <a href="#">Add Task</a>
         <table>
             <tr>
                 <th>S.N.</th>
                 <th>Task Name</th>
                 <th>Priority</th>
                 <th>Deadline</th>
                 <th>Actions</th>
             </tr>

             <tr>
                 <td>1. </td>
                 <td>Design a Website </td>
                 <td>Medium </td>
                 <td>23/05/2021</td>
                 <td>
                    <a href="#">Update</a>   
                    <a href="#">Delete</a>  
                </td>
             </tr>
         </table>

     </div>

      <!-- Tasks Ends Here -->
    
</body>
</html>
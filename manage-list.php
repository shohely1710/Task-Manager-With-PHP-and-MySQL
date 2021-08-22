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

    <h3>Manage Lists Page</h3>

    <!-- Table to display lists starts here -->
    <div class="all-lists">

        <a href="add-list.php">Add List</a>

        <table>
            <tr>
                <th>S.N.</th>
                <th>List Name</th>
                <th>Actions</th>
            </tr>

            <tr>
                <td>1. </td>
                <td>To Do</td>
                <td>
                    <a href="#">Update</a>
                    <a href="#">Delete</a>
                </td>
            </tr>

            <tr>
                <td>2. </td>
                <td>Doing</td>
                <td>
                    <a href="#">Update</a>
                    <a href="#">Delete</a>
                </td>
            </tr>
        </table>
    </div>
   

    <!-- Table to display lists ends here -->


</body>
</html>
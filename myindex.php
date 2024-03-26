<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <title>MyDatabase</title>
   
</head>

<body>
    <div class="container my-5">
        <h2>List of Members</h2>
        <a class="btn btn-primary" href="/practice-CRUD/create.php" role="button">New Client</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Create At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "mydatabase";

                // Establish database connection
                $connection = new mysqli($servername, $username, $password, $database);

                // Check connection
                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                // Execute SQL query to retrieve data
                $sql = "SELECT * FROM clients";
                $result = $connection->query($sql);

                // Check if query executed successfully
                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }

                // Display data in table rows
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['address']}</td>
                        <td>{$row['create_at']}</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='/practice-CRUD/edit.php?id={$row['id']}'>Edit</a>
                            <a class='btn btn-primary btn-sm' href='/practice-CRUD/delete.php?id={$row['id']}'>Delete</a>
                        </td>
                    </tr>
                    ";
                }

                // Close connection
                $connection->close();
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>

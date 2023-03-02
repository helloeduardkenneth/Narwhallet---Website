<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NarwhalPay - Dashboard</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h1>Dashboard</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Contact Number</th>
                    <th>Email Address</th>
                    <th>Position</th>
                    <th>Company Name</th>
                    <th>Website</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Connect to the database
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "narwhalpay";

                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Select all the rows from the table
                    $sql = "SELECT * FROM contact_form";
                    $result = $conn->query($sql);

                    // Loop through the rows and display them in the table
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["first_name"] . "</td>";
                            echo "<td>" . $row["last_name"] . "</td>";
                            echo "<td>" . $row["contact_number"] . "</td>";
                            echo "<td>" . $row["email_address"] . "</td>";
                            echo "<td>" . $row["position"] . "</td>";
                            echo "<td>" . $row["company_name"] . "</td>";
                            echo "<td>" . $row["website"] . "</td>";
                            echo "<td>" . $row["description_company"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9'>No data found</td></tr>";
                    }
                    $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <!-- jQuery -->
    <script src="assets/js/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>

    <script src="https://kit.fontawesome.com/80e0f4e3cb.js" crossorigin="anonymous"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
</body>
</html>

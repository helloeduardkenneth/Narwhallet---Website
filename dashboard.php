<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NarwhalPay - Dashboard</title>

    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" type="text/css" href="assets/css/Narwhallet.css">

</head>

<style>
    .fa-solid {
        margin-right: 0.5rem;
    }
</style>

<body>
    <?php
        session_start();

        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
            header("location: signin.php");
            exit;
        }
    ?>
    <div class="container-fluid my-5">
        <h1>NarwhalPay - Dashboard</h1>
            <div class="text-end mb-2">
                <a href="logout.php" class="btn btn-primary"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
            </div>
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
                    // Set the number of rows per page
                    $rows_per_page = 10;

                    // Get the current page number
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;

                    // Calculate the offset
                    $offset = ($page - 1) * $rows_per_page;

                    // Connect to the database
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "narwhalpay";

                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Get the total number of rows
                    $total_rows_sql = "SELECT COUNT(*) FROM contact_form";
                    $total_rows_result = $conn->query($total_rows_sql);
                    $total_rows = $total_rows_result->fetch_array()[0];

                    // Calculate the total number of pages
                    $total_pages = ceil($total_rows / $rows_per_page);

                    // Select the rows for the current page
                    $sql = "SELECT * FROM contact_form LIMIT $offset, $rows_per_page";
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

        <div class="d-flex justify-content-center">
            <nav aria-label="Page-Navigation">
                <ul class="pagination">
                    <?php
                        // Generate the pagination links
                        for ($i = 1; $i <= $total_pages; $i++) {
                            echo "<li class='page-item";
                            if ($i == $page) {
                                echo " active";
                            }
                            echo "'>
                            <a class='page-link' href='dashboard.php?page=" . $i . "'>" . $i . "</a></li>";
                        }
                    ?>
                </ul>
            </nav>
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

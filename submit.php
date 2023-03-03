<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Get the form data
  $first_name = $_POST["first_name"];
  $last_name = $_POST["last_name"];
  $contact_number = $_POST["contact_number"];
  $email_address = $_POST["email_address"];
  $position = $_POST["position"];
  $company_name = $_POST["company_name"];
  $website = $_POST["website"];
  $description_company = $_POST["description_company"];

  // Validate the form data (you can add your own validation rules here)
  if (empty($first_name) || empty($last_name) || empty($contact_number) || empty($email_address) || empty($position) || empty($company_name) || empty($website) || empty($description_company)) {
    // Handle the validation error
    echo "Please fill in all the required fields.";
    exit;
  }

  // Connect to the database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "narwhalpay";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    // Handle the database connection error
    die("Connection failed: " . $conn->connect_error);
  }

  // Insert the form data into the table
  $sql = "INSERT INTO contact_form (first_name, last_name, contact_number, email_address, position, company_name, website, description_company)
          VALUES ('$first_name', '$last_name', '$contact_number', '$email_address', '$position', '$company_name', '$website', '$description_company')";


  if ($conn -> query($sql) === TRUE) {
    // Handle the successful submission
    echo "
      <!DOCTYPE html>
      <html lang='en'>
      <head>
      <meta charset='utf-8'>

      <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>

      <meta name='description' content=''>

      <meta name='author' content='Eduard Kenneth Galuran'>
  
      <link href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap' rel='stylesheet'>
  
      <link rel='shortcut icon' href='assets/images/favicon.ico' type='image/x-icon'>
  
      <title>NarwhalPay - Payment Gateway</title>
  
      <!-- Additional CSS Files -->
      <link rel='stylesheet' type='text/css' href='assets/css/bootstrap.min.css'>
  
      <link rel='stylesheet' type='text/css' href='assets/css/font-awesome.css'>
  
      <link rel='stylesheet' href='assets/css/Narwhallet.css'>
        <title>Thank You</title>
        <style>
          body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background-color: #f2f2f2;
          }
          .thank-you-message {
            text-align: center;
            margin-top: 50px;
          }
          .thank-you-message p {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 20px;
          }
          .thank-you-message button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
          }
        </style>
      </head>
      <body>
        <div class='thank-you-message'>
          <p>Thank you for contacting us!</p>
          <button onclick='location.href=\"index.html\"'>Back to Home</button>
        </div>
      </body>
      </html>
    ";
  } else {
    // Handle the database insertion error
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();

} else {
  // Handle the form submission error
  echo "Sorry, there was an error processing your submission.";
}
?>
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
    echo "Thank you for contacting us!";
  } else {
  // Handle the database insertion error
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
    $conn->close();

} else {
  // Handle the form submission error
  echo "Sorry, there was an error processing your submission.";
}

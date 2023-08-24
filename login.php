<?php
// Check if the login button was clicked
if(isset($_POST['login_Btn'])) {
  // Retrieve the email and password from the form
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Connect to the MySQL database
  $conn = mysqli_connect("localhost", "akshay", "akshay@123", "test1");

  // Prepare a SQL query to check if the user exists
  $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";

  // Execute the query and store the result
  $result = mysqli_query($conn, $query);

  // Check if the user exists
  if(mysqli_num_rows($result) > 0) {
    // User exists, redirect to the dashboard page
    header("Location: index1.html");
    exit();
  } else {
    // User doesn't exist or password is incorrect
    echo "Invalid email or password";
  }
}

// Check if the register button was clicked
if(isset($_POST['register_Btn'])) {
  // Retrieve the email, password, and confirm password from the form
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  // Validate the form data
  if(empty($email) || empty($password) || empty($confirm_password)) {
    echo "Please fill in all fields";
  } elseif($password !== $confirm_password) {
    echo "Passwords do not match";
  } else {
    // Connect to the MySQL database
    $conn = mysqli_connect("localhost", "username", "password", "database");

    // Prepare a SQL query to insert the new user into the database
    $query = "INSERT INTO users (email, password)  VALUES ('$email', '$password')";

    // Execute the query and check if it was successful
    if(mysqli_query($conn, $query)) {
      // Registration successful, redirect to the dashboard page
      header("Location: index2.html");
      exit();
    } else {
      // Registration failed
      echo "Registration failed";
    }
  }
}
?>

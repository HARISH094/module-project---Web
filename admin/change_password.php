<?php
session_start();

// Include your database connection file here
// Example: include 'db_connection.php';
include('includes/header.php');
include('../includes/session.php');

// Check whether the session variable alogin is present or not
if (!isset($_SESSION['alogin']) || (trim($_SESSION['alogin']) == '')) { ?>
    <script>
        window.location = "../index.php";
    </script>
<?php
}

// Include necessary functions or classes for password reset
// Example: include 'password_reset_functions.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate and process the form data

    // Example validation - You should implement your own validation logic
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // Check if the current password matches the one in the database
    // Example: 
    // $currentPasswordMatches = validate_current_password($currentPassword, $_SESSION['alogin']);
    
    // Implement your own validation logic and set $currentPasswordMatches accordingly
    // For now, let's assume it always matches for demonstration purposes
    $currentPasswordMatches = true;

    // Example validation: Check if new password and confirm password match
    $passwordsMatch = ($newPassword === $confirmPassword);

    if ($passwordsMatch && $currentPasswordMatches) {
        // Update the password in the database
        // Example: update_password($_SESSION['alogin'], $newPassword);

        // Redirect to a success page
        header("Location: password_change_success.php");
        exit();
    } else {
        $error_message = "Password change failed. Please check your inputs.";
    }
}

// Check if 'edit' key is set in the $_GET array
$get_id = isset($_GET['edit']) ? $_GET['edit'] : '';

if (isset($_POST['add_staff'])) {
    // Rest of your code
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="path/to/your/css/file.css"> <!-- Add the path to your CSS file -->
    <!-- Include other necessary CSS files or stylesheets -->
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 300px;
        text-align: center;
    }

    h2 {
        color: #333;
    }

    form {
        margin-top: 20px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        color: #555;
    }

    input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
    }

    button {
        background-color: #4caf50;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
    }

    .error-message {
        color: red;
        margin-top: 10px;
    }
</style>

</head>
<body>

<?php include('includes/navbar.php')?>

<?php include('includes/right_sidebar.php')?>

<?php include('includes/left_sidebar.php')?>

<div class="container">
    <h2>Change Password</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label for="current_password">Current Password:</label>
        <input type="password" name="current_password" required>

        <label for="new_password">New Password:</label>
        <input type="password" name="new_password" required>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" name="confirm_password" required>

        <button type="submit">Change Password</button>
    </form>

    <?php
    // Display error message if there is any
    if (isset($error_message)) {
        echo '<p class="error-message">' . $error_message . '</p>';
    }
    ?>
</div>

</body>
</html>

<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Basic validation
    if (empty($email) || empty($password)) {
        echo "Both email and password are required!";
    } else {
        // Format the data as a string to save
        $data = "Email: " . $email . ", Password: " . $password . "\n";

        // Write the data to the info.txt file
        $file = fopen("info.txt", "a");  // Open the file in append mode
        if ($file) {
            fwrite($file, $data);  // Write the data
            fclose($file);  // Close the file after writing

            // Optionally, redirect the user or display a success message
            echo "Data saved successfully!";
        } else {
            echo "Error: Unable to open file!";
        }
    }
} else {
    echo "Invalid request method.";
}
?>

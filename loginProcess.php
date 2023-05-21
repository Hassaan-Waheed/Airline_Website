<?php
session_start();
include "conn.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Perform validation and authentication
    $username = $_POST['name'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT login_attempts, login_blocked_until FROM admin WHERE username = :username");
    $stmt->execute([':username' => $username]);
    $row = $stmt->fetch();


    // Verify the password
    if (password_verify($password, $row['Password'])) {
        // Reset login attempts
        $updateQuery = "UPDATE users SET login_attempts = 0, last_login_attempt = NULL WHERE username = :username";
        $stmt = $conn->prepare($updateQuery);
        $stmt->execute([':username' => $username]);

        $_SESSION['username'] = $username;
        header("Location: admin.php");
        exit;
    } else {
        // Check if the user exists in the database
        $selectQuery = "SELECT login_attempts, last_login_attempt FROM admin WHERE username = :username";
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([':username' => $username]);
        $row = $stmt->fetch();

        if ($row) {
            $loginAttempts = $row['login_attempts'];
            $lastLoginAttempt = $row['last_login_attempt'];

            if ($loginAttempts >= 3 && $lastLoginAttempt !== null) {
                $remainingTime = strtotime($lastLoginAttempt) + 1800 - time();

                if ($remainingTime > 0) {
                    $message = '* You have exceeded the maximum number of login attempts. Please try again after ' . gmdate('i:s', $remainingTime);
                    header("Location: login.php?message=$message");
                    exit;
                } else {
                    // Reset login attempts as the timer has ended
                    $updateQuery = "UPDATE users SET login_attempts = 0, last_login_attempt = NULL WHERE username = :username";
                    $stmt = $conn->prepare($updateQuery);
                    $stmt->execute([':username' => $username]);
                }
            }
        }

        // Increase login attempts and update last login attempt
        $updateQuery = "UPDATE admin SET login_attempts = login_attempts + 1, last_login_attempt = NOW() WHERE username = :username";
        $stmt = $conn->prepare($updateQuery);
        $stmt->execute([':username' => $username]);

        $message = '* Invalid username or password';
        header("Location: login.php?message=$message");
        exit;
    }
    
}
?>



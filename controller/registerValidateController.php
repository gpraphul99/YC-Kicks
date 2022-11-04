<?php
require '../config/dbconnect.php';

if (isset($_POST['signup-submit'])) {
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['confirm-password'];
    $user_address = $_POST['user_address'];
    $contact_no = $_POST['contact_no'];

    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("Location: ../register.php?error=emptyfields&uid=".$username."&mail=".$email);
        exit();
    }

    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../register.php?error=invaliduidandmail");
        exit();
    }

    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../register.php?error=invalidmail&uid=".$username);
        exit();
    }

    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../register.php?error=invaliduid&mail=".$email);
        exit();
    }

    else if ($password !== $passwordRepeat) {
        header("Location: ../register.php?error=passwordcheck&uid=".$username."&mail=".$email);
        exit();
    }

    else {
        $sql = "SELECT username FROM users WHERE username=?";
        $stmt = mysqli_stmt_init($conn);
        
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../register.php?error=sqlerror");
            exit();
        }

        else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../register.php?error=usernametaken&mail=".$email);
                exit();
            }
            else {
                $sql = "INSERT INTO users (username, email, user_password,user_address, contact_no) VALUES (?, ?, ?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../register.php?error=sqlerror");
                    exit();
                }
                else {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sssss", $username, $email, $hashedPwd,$user_address,$contact_no);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../login.php?signup=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

else {
    header("Location: ../login.php");
    exit();
}
<?php


// Example of a simple JWT generation function
function generate_jwt($user_id) {
    $secret_key = 'your_secret_key';  // Ideally stored in an env file
    $issued_at = time();
    $expiration_time = $issued_at + 3600;  // Token expires in 1 hour
    $payload = [
        'user_id' => $user_id,
        'iat' => $issued_at,
        'exp' => $expiration_time
    ];

    // Encode the JWT (For demonstration purposes, this is a simple base64 encoding)
    $jwt = base64_encode(json_encode($payload));

    return $jwt;
}


function signup($username, $password, $email) {
    global $pdo;

    // Check if the username already exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    if ($stmt->rowCount() > 0) {
        echo "Username already exists!";
        return;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into the database
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
    $stmt->execute([
        'username' => $username,
        'email' => $email,
        'password' => $hashed_password
    ]);

    // Fetch the new user's ID
    $user_id = $pdo->lastInsertId();

    // Generate a JWT for the user
    $jwt = generate_jwt($user_id);

    // Store the token in the session and redirect to dashboard
    session_start();
    $_SESSION['user_token'] = $jwt;
    header("Location: dashboard.php");
    exit();
}


function login($username, $password) {
    global $pdo;

    // Fetch the user by username
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Generate a JWT for the user
        $jwt = generate_jwt($user['id']);

        // Store the token in the session and redirect to dashboard
        session_start();
        $_SESSION['user_token'] = $jwt;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid username or password!";
    }
}

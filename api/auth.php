<?php
header('Content-Type: application/json');
include_once '../config/database.php'; // Database connection
include_once '../utils/functions.php'; // Custom functions for validation and JWT generation

// Handle POST requests for signup and login
$request_method = $_SERVER['REQUEST_METHOD'];

switch ($request_method) {
    case 'POST':
        if ($_GET['action'] == 'signup') {
            // Handle user signup
            signup();
        } elseif ($_GET['action'] == 'login') {
            // Handle user login
            login();
        } else {
            echo json_encode(['message' => 'Invalid action']);
        }
        break;
    
    default:
        echo json_encode(['message' => 'Invalid request method']);
}

function signup() {
    global $pdo;

    // Get POST data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate data
    if (empty($name) || empty($email) || empty($password)) {
        echo json_encode(['message' => 'All fields are required']);
        return;
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the email already exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0) {
        echo json_encode(['message' => 'Email already exists']);
        return;
    }

    // Insert the new user into the database
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    if ($stmt->execute([$name, $email, $hashed_password])) {
        echo json_encode(['message' => 'User registered successfully']);
    } else {
        echo json_encode(['message' => 'Error registering user']);
    }
}

function login() {
    global $pdo;

    // Get POST data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate data
    if (empty($email) || empty($password)) {
        echo json_encode(['message' => 'Email and password are required']);
        return;
    }

    // Check if the user exists in the database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->rowCount() == 0) {
        echo json_encode(['message' => 'Invalid email or password']);
        return;
    }

    // Get user data
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verify password
    if (!password_verify($password, $user['password'])) {
        echo json_encode(['message' => 'Invalid email or password']);
        return;
    }

    // Generate JWT Token (For demonstration purposes, using a simple secret)
    $token = generate_jwt($user['id']); // You can generate a more secure token with a library like Firebase JWT

    echo json_encode(['message' => 'Login successful', 'token' => $token]);
}

?>
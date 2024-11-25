<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

include_once('config/database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            background: #007bff;
            color: white;
            padding: 10px;
            text-align: center;
        }
        .content {
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background: #f4f4f4;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Admin Dashboard</h1>
        <a href="logout.php" style="color: white;">Logout</a>
    </div>
    <div class="content">
        <h2>Manage Users</h2>
        <?php
        // Fetch and display users (excluding password)
        try {
            $stmt = $pdo->query("SELECT id, username, email, created_at FROM users");
            echo "<table>";
            echo "<tr><th>ID</th><th>Username</th><th>Email</th><th>Created At</th></tr>";
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['username']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['created_at']}</td>
                      </tr>";
            }
            echo "</table>";
        } catch (PDOException $e) {
            echo "Error fetching users: " . $e->getMessage();
        }
        ?>
    </div>
</body>
</html>

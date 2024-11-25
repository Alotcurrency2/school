<?php
// Start the session
session_start();

// Check if a student is logged in
if (!isset($_SESSION['user_token'])) {
    header("Location: index.php");
    exit();
}


// Check if the user is logged in
if (!isset($_SESSION['user_token'])) {
    header("Location: index.php"); // Redirect to login page if not logged in
    exit();
}

// You can decode the JWT token to display user-specific information if needed.
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        .header {
            background: #007bff;
            color: white;
            padding: 15px;
            text-align: center;
        }
        .container {
            display: flex;
            padding: 20px;
        }
        .sidebar {
            width: 20%;
            background: #343a40;
            color: white;
            padding: 20px;
        }
        .content {
            width: 80%;
            padding: 20px;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .card {
            background: white;
            margin-bottom: 20px;
            padding: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Welcome to Your School Portal</h1>
        <p><a href="logout.php" style="color: white;">Logout</a></p>
    </div>
    <div class="container">
        <div class="sidebar">
            <h3>Menu</h3>
            <ul>
                <li><a href="#announcements">Announcements</a></li>
                <li><a href="#students">Student Information</a></li>
                <li><a href="#classes">Classes</a></li>
                <li><a href="#schedule">Schedule</a></li>
                <li><a href="#reports">Reports</a></li>
            </ul>
        </div>
        <div class="content">
            <div class="card" id="announcements">
                <h2>Announcements</h2>
                <p>Welcome back to the new academic year!</p>
                <p>Upcoming Parent-Teacher Meeting: <strong>December 5th, 2024</strong></p>
            </div>
            <div class="card" id="students">
                <h2>Student Information</h2>
                <p>Total Students: <strong>500</strong></p>
                <p><a href="students.php">View All Students</a></p>
            </div>
            <div class="card" id="classes">
                <h2>Classes</h2>
                <p>Total Classes: <strong>20</strong></p>
                <p><a href="classes.php">View Class Details</a></p>
            </div>
            <div class="card" id="schedule">
                <h2>Schedule</h2>
                <p><a href="schedule.php">View Weekly Timetable</a></p>
            </div>
            <div class="card" id="reports">
                <h2>Reports</h2>
                <p><a href="reports.php">Generate Reports</a></p>
            </div>
        </div>
    </div>
</body>
</html>

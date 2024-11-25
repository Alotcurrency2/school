<?php
include_once('config/database.php');

try {
    $stmt = $pdo->query("SELECT id, name, class FROM students");
    echo "<h1>Student List</h1>";
    echo "<table border='1'>
            <tr><th>ID</th><th>Name</th><th>Class</th></tr>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['class']}</td>
              </tr>";
    }
    echo "</table>";
} catch (PDOException $e) {
    echo "Error fetching students: " . $e->getMessage();
}
?>

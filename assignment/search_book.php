<?php include('db_connect.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Books</title>
</head>
<body>
    <h1>Search Book</h1>
    <form method="GET">
        <input type="text" name="query" placeholder="Search by title or category">
        <input type="submit" value="Search">
    </form>
    <hr>

    <?php
    if (isset($_GET['query'])) {
        $query = $_GET['query'];
        $sql = "SELECT * FROM books WHERE title LIKE '%$query%' OR category LIKE '%$query%'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table border='1' cellpadding='8'>
                    <tr><th>ID</th><th>Title</th><th>Author</th><th>Category</th><th>Availability</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['title']}</td>
                    <td>{$row['author']}</td>
                    <td>{$row['category']}</td>
                    <td>{$row['availability']}</td>
                </tr>";
            }
            echo "</table>";
        } else {
            echo "No results found.";
        }
    }
    ?>
</body>
</html>
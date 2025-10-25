<?php include('db_connect.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Library Book Catalog</title>
</head>
<body>
    <h1>Library Book Catalog</h1>
    <a href="add_book.php">Add New Book</a> |
    <a href="search_book.php">Search Book</a>
    <hr>

    <h2>All Books</h2>
    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Category</th>
            <th>Availability</th>
            <th>Action</th>
        </tr>

        <?php
        $result = $conn->query("SELECT * FROM books");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['title']}</td>
                <td>{$row['author']}</td>
                <td>{$row['category']}</td>
                <td>{$row['availability']}</td>
                <td>
                    <a href='update_book.php?id={$row['id']}'>Edit</a> |
                    <a href='delete_book.php?id={$row['id']}'>Delete</a>
                </td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>

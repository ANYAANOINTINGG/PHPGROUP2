<?php include('db_connect.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
</head>
<body>
    <h1>Add New Book</h1>
    <form method="POST">
        <label>Title:</label><input type="text" name="title" required><br><br>
        <label>Author:</label><input type="text" name="author" required><br><br>
        <label>Category:</label><input type="text" name="category" required><br><br>
        <label>Availability:</label>
        <select name="availability">
            <option value="Available">Available</option>
            <option value="Borrowed">Borrowed</option>
        </select><br><br>
        <input type="submit" name="submit" value="Add Book">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $category = $_POST['category'];
        $availability = $_POST['availability'];

        $sql = "INSERT INTO books (title, author, category, availability)
                VALUES ('$title', '$author', '$category', '$availability')";

        if ($conn->query($sql) === TRUE) {
            echo "Book added successfully! <a href='index.php'>View Books</a>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
    ?>
</body>
</html>

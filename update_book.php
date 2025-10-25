
<?php
include('db_connect.php');

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM books WHERE id=$id");
$row = $result->fetch_assoc();

if (isset($_POST['update'])) {
$title = $_POST['title'];
$author = $_POST['author'];
$category = $_POST['category'];
$availability = $_POST['availability'];

$sql = "UPDATE books SET title='$title', author='$author', category='$category', availability='$availability' WHERE id=$id";
if ($conn->query($sql) === TRUE) {
echo "Book updated successfully! <a href='index.php'>Go back</a>";
} else {
echo "Error: " . $conn->error;
}
}
?>

<!DOCTYPE html>
<html>
<head><title>Update Book</title></head>
<body>
<h1>Edit Book</h1>
<form method="POST">
<label>Title:</label><input type="text" name="title" value="<?php echo $row['title']; ?>"><br><br>
<label>Author:</label><input type="text" name="author" value="<?php echo $row['author']; ?>"><br><br>
<label>Category:</label><input type="text" name="category" value="<?php echo $row['category']; ?>"><br><br>
<label>Availability:</label>
<select name="availability">
<option value="Available" <?php if ($row['availability']=="Available") echo "selected"; ?>>Available</option>
<option value="Borrowed" <?php if ($row['availability']=="Borrowed") echo "selected"; ?>>Borrowed</option>
</select><br><br>
<input type="submit" name="update" value="Update Book">
</form>
</body>
</html>
<?php
include('db_connect.php');

$id = $_GET['id'];
$sql = "DELETE FROM books WHERE id=$id";

if ($conn->query($sql) === TRUE) {
echo "Book deleted successfully! <a href='index.php'>Go back</a>";
} else {
echo "Error deleting record: " . $conn->error;
}
?>
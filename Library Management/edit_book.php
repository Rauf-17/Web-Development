<?php

//Update Book Form Validation and All Books Listing

$conn = new mysqli("localhost", "root", "", "library_management");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];
$title = $_POST['title'];
$author = $_POST['author'];
$yearofpublication = $_POST['yearofpublication'];
$genre = $_POST['genre'];

$updateFields = [];
if (!empty($title)) {
    $updateFields[] = "title='$title'";
}
if (!empty($author)) {
    $updateFields[] = "author='$author'";
}
if (!empty($yearofpublication)) {
    $updateFields[] = "yearofpublication='$yearofpublication'";
}
if (!empty($genre)) {
    $updateFields[] = "genre='$genre'";
}

if (!empty($updateFields)) {
    $sql = "UPDATE books SET " . implode(", ", $updateFields) . " WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "No fields to update";
}

$conn->close();
header("Location: index.php");
?>
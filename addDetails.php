<?php
$connection = new mysqli('localhost', 'root', '', 'blugapp');

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$getTitle = isset($_GET['title']) ? htmlspecialchars($_GET['title']) : '';
$getDescript = isset($_GET['description']) ? htmlspecialchars($_GET['description']) : '';

if (strlen($getTitle) > 0 && strlen($getDescript) > 0) {
    $stmt = $connection->prepare("INSERT INTO `blugdetails`(`Title`, `Descript`) VALUES (?, ?)");   
    $stmt->bind_param("ss", $getTitle, $getDescript); 
    $stmt->execute();
    header("Location: /Blogpage/mainPage.php");
    $stmt->close();
} else {
    header("Location: /Blogpage/creatBlogPage.html");
}

$connection->close();
?>

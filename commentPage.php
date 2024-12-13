<?php

$connection = new mysqli('localhost', 'root', '', 'blugapp');
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if (isset($_GET['blog_id'])) {
    $blog_id = $_GET['blog_id'];
}
?>
<html>
<head>
    <title>Submit Comment</title>
</head>
<body>
    <h1>Submit a Comment for Blog #<?php echo $blog_id; ?></h1>
    <form action="submitComment.php" method="POST">
        <input type="hidden" name="blog_id" value="<?php echo $blog_id; ?>">
        <textarea name="comment" placeholder="Write your comment here..." required></textarea>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
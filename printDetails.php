<?php

    $connection = new mysqli('localhost', 'root', '', 'blugapp');
    $result = $connection->query("SELECT `Title`, `Descript` FROM `blugdetails` WHERE 1");
    while($row = $result->fetch_assoc()) {
        echo $row['Title'] . " " . $row['Descript'] . "<br>";
    }

?>
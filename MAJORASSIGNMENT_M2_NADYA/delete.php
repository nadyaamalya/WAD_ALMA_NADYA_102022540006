<?php

include "connection.php";

$id = $_GET["id"];

$sql = "DELETE FROM employees WHERE id = $id";

mysqli_query($conn, $sql);

header("Location: display.php");

exit;

?>
<?php

include("db.php");

if(isset($_GET['ID'])) {
  $id = $_GET['ID'];
  $query = "DELETE FROM movies WHERE ID = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Removed Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}

?>

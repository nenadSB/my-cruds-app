<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $title = $_POST['ID'];
  $movieName = $_POST['movie_name'];
  $description = $_POST['movie_ganre'];
  $date = $_POST['upload_date'];
  $about = $_POST['about_movie'];
  $review = $_POST['reviewed_by'];
  $query = "INSERT INTO movies(ID, movie_name, movie_ganre, upload_date, about_movie, reviewed_by)
   VALUES ('$title', '$movieName', '$description', '$date', '$about', '$review')";
  $result = mysqli_query($conn, $query);
  if(!$result ) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>

<?php
include("db.php");

$title = '';
$description= '';
$date;
$review = '';
$about = '';

if  (isset($_GET['ID'])) {
  $id = $_GET['ID'];
  $query = "SELECT * FROM movies WHERE ID=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $title = $row['movie_name'];
    $description = $row['movie_ganre'];
    $date = $row['upload_date'];
    $review = $row['reviewed_by'];
    $about = $row['about_movie'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $title= $_POST['movie_name'];
  $description = $_POST['movie_ganre'];
  $date = $_POST['upload_date'];
  $review = $_POST['reviewed_by'];
  $about = $_POST['about_movie'];

  $query = "UPDATE movies set movie_name = '$title', movie_ganre = '$description',
  upload_date = '$date', reviewed_by = '$review', about_movie = '$about' WHERE ID=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['ID']; ?>" method="POST">
        <div class="form-group">
          <input name="movie_name" type="text" class="form-control" value="<?php echo $title; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="movie_ganre" type="text" class="form-control" value="<?php echo $description; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="upload_date" type="date" class="form-control" value="<?php echo $date; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="reviewed_by" type="text" class="form-control" value="<?php echo $review; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
        <textarea name="about_movie" class="form-control" cols="30" rows="10"><?php echo $about;?></textarea>
        </div>
        <button class="btn-success" name="update">
          Update
        </button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>

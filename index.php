<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_task.php" method="POST">
          <div class="form-group">
            <input type="text" name="movie_name" class="form-control" placeholder="Movie's name" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="movie_ganre" class="form-control" placeholder="Movie's ganre" autofocus>
          </div>
          <div class="form-group">
            <input type="date" name="upload_date" class="form-control" placeholder="Upload date" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="reviewed_by" class="form-control" placeholder="Reviewed by" autofocus>
          </div>
          <div class="form-group">
            <textarea name="about_movie" rows="2" class="form-control" placeholder="Something about movie"></textarea>
          </div>
          
          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Save Task">
          
        </form>
        
      </div> <br>
      <div class="container my-5">
        <form action="search.php" method="POST"> 
						<input  type="text"  name ="search" placeholder="Search data" > 
						<input  type="submit" class="btn btn-info " name="submit" value="Search">
          
			  </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Id</th>
            <th>Movie name</th>
            <th>Movie Genre</th>
            <th>Date</th>
            <th>Reviewed by</th>
            <th>About the movie</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM movies";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['ID']; ?></td>
            <td><?php echo $row['movie_name']; ?></td>
            <td><?php echo $row['movie_ganre']; ?></td>
            <td><?php echo $row['upload_date']; ?></td>
            <td><?php echo $row['reviewed_by']; ?></td>
            <td><?php echo $row['about_movie']; ?></td>
            <td>
              <a href="edit.php?ID=<?php echo $row['ID']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?ID=<?php echo $row['ID']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
            
          </tr>
          <?php } ?>
          
        </tbody>
        
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>

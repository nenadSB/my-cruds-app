<?php 
include('db.php');
include('/xamppp/htdocs/MyPhpApp//includes/header.php');
?>
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
          if(isset($_POST['submit'])){
            $search =  mysqli_real_escape_string($conn, $_POST['search']);
            $sql = "SELECT * FROM movies WHERE movie_name LIKE '%$search%'";
            $result = mysqli_query($conn, $sql); }  

          while($row = mysqli_fetch_assoc($result)) { ?>
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
  </div>

              
                
         
<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'practicetime'
) or die(mysqli_error($mysqli));

?>

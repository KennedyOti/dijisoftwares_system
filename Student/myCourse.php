<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION)) { 
  session_start(); 
}
define('TITLE', 'My Course');
define('PAGE', 'mycourse');
include('./stuInclude/header.php'); 
include_once('../dbConnection.php');

if (isset($_SESSION['is_login'])) {
  $stuLogEmail = $_SESSION['stuLogEmail'];
} else {
  echo "<script> location.href='../portal.php'; </script>";
  exit;
}
?>

<div class="container col-sm-9 mt-5">
  <div class="row">
    <div class="jumbotron">
      <h4 class="text-center">Enrolled Courses</h4>
      <div class="row mt-4">
        <?php 
        if (isset($stuLogEmail)) {
          $sql = "SELECT t.order_id, c.course_id, c.course_name, c.course_duration, c.course_desc, c.course_img, c.course_author, c.course_original_price, c.course_price 
                  FROM transactions AS t
                  JOIN course AS c ON c.course_id = t.course_selected 
                  WHERE t.cust_id = '$stuLogEmail' AND t.is_confirmed = 1";
          $result = $conn->query($sql);

          // Check for errors in the query
          if (!$result) {
            echo "<p class='text-center'>Error in query: " . $conn->error . "</p>";
          } else {
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                $course_id = $row['course_id'];
                echo ' 
                  <div class="col-sm-4 mb-4">
                    <a href="coursedetails.php?course_id=' . $course_id . '" class="btn" style="text-align: left; padding:0px;">
                      <div class="card">
                        <img src="' . $row['course_img'] . '" class="card-img-top" alt="' . $row['course_name'] . '" />
                        <div class="card-body">
                          <h5 class="card-title">' . $row['course_name'] . '</h5>
                          <p class="card-text">' . $row['course_desc'] . '</p>
                        </div>
                        <div class="card-footer">
                          <p class="card-text d-inline">Price: <small><del>KSh ' . $row['course_original_price'] . '</del></small> 
                          <span class="font-weight-bolder">KSh ' . $row['course_price'] . '<span></p> 
                          <a class="btn btn-primary text-white font-weight-bolder float-right" href="watchcourse.php?course_id=' . $course_id . '">Join Class</a>
                        </div>
                      </div> 
                    </a>
                  </div>
                ';
              }
            } else {
              echo "<p class='text-center'>No confirmed courses found</p>";
            }
          }
        }
        ?> 
      </div>
    </div>
  </div>
</div>

<?php
include('./stuInclude/footer.php'); 
?>

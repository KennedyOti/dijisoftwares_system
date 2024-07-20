<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
define('TITLE', 'Dashboard');
define('PAGE', 'dashboard');
include('./adminInclude/header.php'); 
include('../dbConnection.php');

 if(isset($_SESSION['is_admin_login'])){
  $adminEmail = $_SESSION['adminLogEmail'];
 } else {
  echo "<script> location.href='../portal.php'; </script>";
 }
$sql = "SELECT * FROM course";
$result = $conn->query($sql);
$totalcourse = $result->num_rows;

 $sql = "SELECT * FROM student";
 $result = $conn->query($sql);
 $totalstu = $result->num_rows;

 $sql = "SELECT * FROM courseorder";
 $result = $conn->query($sql);
 $totalsold = $result->num_rows;
?>
  <div class="col-sm-9 mt-5">
    <div class="row mx-5 text-center">
      <div class="col-sm-4 mt-5">
        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
          <div class="card-header">Courses</div>
          <div class="card-body">
            <h4 class="card-title">
              <?php echo $totalcourse; ?>
            </h4>
            <a class="btn text-white" href="courses.php">View</a>
          </div>
        </div>
      </div>
      <div class="col-sm-4 mt-5">
        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
          <div class="card-header">Students</div>
          <div class="card-body">
            <h4 class="card-title">
              <?php echo $totalstu; ?>
            </h4>
            <a class="btn text-white" href="students.php">View</a>
          </div>
        </div>
      </div>
      <div class="col-sm-4 mt-5">
        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
          <div class="card-header">Sold</div>
          <div class="card-body">
            <h4 class="card-title">
              <?php echo $totalsold; ?>
            </h4>
            <a class="btn text-white" href="sellreport.php">View</a>
          </div>
        </div>
      </div>
    </div>
   <div class="mx-5 mt-5 text-center">

    <h2 class="bg-dark text-white ">Enrolled Courses</h2>
    <div class="row justify-content-center">
        <div class="col-auto">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Count</th> 
                        <th>Course Selected</th>
                        <th>Order ID</th>
                        <th>Customer ID</th>
                        <th>Transaction Code</th>
                        <th>Name on ID</th>
                        <th>Amount</th>
                       
                        <!-- <th scope="col">Action</th> -->
                    </tr>
                </thead>
                <tbody>
<?php
$sql = "SELECT * FROM transactions";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $count = 1;
    while($row = $result->fetch_assoc()) {
?>
                    <tr>
                        <td><?php echo $count++; ?></td>   
                          <td><?php echo $row['course_selected']; ?></td>
                        <td><?php echo $row['order_id']; ?></td>
                        <td><?php echo $row['cust_id']; ?></td>
                        <td><?php echo $row['txn_code']; ?></td>
                        <td><?php echo $row['name_on_id']; ?></td>
                        <td><?php echo $row['txn_amount']; ?></td>
                   
                        <!-- <td><form action="editstudent.php" method="POST" class="d-inline"> <input type="hidden" name="id" value='. $row["stu_id"] .'><button type="submit" class="btn btn-info mr-3" name="view" value="View"><i class="fas fa-pen"></i></button></form>  
          <form action="" method="POST" class="d-inline"><input type="hidden" name="id" value='. $row["stu_id"] .'><button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button></form></td>
         </tr>'; -->
                    </tr>
<?php
    }
} else {
    echo "<tr><td colspan='7' class='text-center'>No records found</td></tr>";
}
?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
include('./adminInclude/footer.php'); 
?>

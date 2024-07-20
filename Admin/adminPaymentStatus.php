<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
define('TITLE', 'Students');
define('PAGE', 'students');
include('./adminInclude/header.php'); 
include('../dbConnection.php');

if(isset($_SESSION['is_admin_login'])){
  $adminEmail = $_SESSION['adminLogEmail'];
} else {
  echo "<script> location.href='../portal.php'; </script>";
}

// Handling deletion request
if(isset($_POST['delete'])){
  $id = $_POST['id'];
  $sql = "DELETE FROM student WHERE stu_id = $id";
  if($conn->query($sql) === TRUE){
    echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
  } else {
    echo "Unable to Delete Data";
  }
}

// Handling confirmation request
if(isset($_POST['confirm'])){
  $id = $_POST['id'];
  $sql = "UPDATE transactions SET is_confirmed = 1 WHERE id = $id";
  if($conn->query($sql) === TRUE){
    echo '<meta http-equiv="refresh" content= "0;URL=?confirmed" />';
  } else {
    echo "Unable to Confirm Payment";
  }
}

?>
<div class="col-sm-9 mt-5">
    <h2 class="bg-dark text-white text-center my-4">Enrolled Courses</h2>
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
                        <th>Action</th>
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
                        <td>
                            <?php if (!$row['is_confirmed']) { ?>
                            <form action="" method="POST" class="d-inline">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="btn btn-success" name="confirm" value="Confirm">Confirm</button>
                            </form>
                            <?php } else { ?>
                            Confirmed
                            <?php } ?>
                        </td>
                    </tr>
<?php
    }
} else {
    echo "<tr><td colspan='8' class='text-center'>No records found</td></tr>";
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
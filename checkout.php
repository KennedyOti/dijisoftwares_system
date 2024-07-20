<?php
include('./dbConnection.php');
session_start();

if (!isset($_SESSION['stuLogEmail'])) {
    echo "<script> location.href='loginorsignup.php'; </script>";
} else {
    header("Pragma: no-cache");
    header("Cache-Control: no-cache");
    header("Expires: 0");
    $stuEmail = $_SESSION['stuLogEmail'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['process_payment'])) {
        // Process payment
        $orderId = $_POST['ORDER_ID'];
        $custId = $_POST['CUST_ID'];
        $txnCode = $_POST['TXN_CODE'];
        $nameOnId = $_POST['NAME_ON_ID'];
        $txnAmount = $_POST['TXN_AMOUNT'];
        $courseSelected = $_POST['COURSE_SELECTED'];

        // Save the transaction code and other details in the database.
        $sql = "INSERT INTO transactions (order_id, cust_id, txn_code, name_on_id, txn_amount, course_selected) VALUES ('$orderId', '$custId', '$txnCode', '$nameOnId', '$txnAmount', '$courseSelected')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Transaction Details Successful!'); location.href='courses.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="GENERATOR" content="Evrsoft First Page">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="css/all.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <!-- Custom Style CSS -->
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
    <title>ELearning</title>
    <title>Checkout</title>
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-6 offset-sm-3 jumbotron">
            <h5>To complete your payment, please follow the steps below to send the required amount to the provided:</h5>
            <h4 class="mb-5" style="color:#04aa6d">
                Send Money: 0793543659<br>
                Receiver Name: KENNEDY ONYANGO
            </h4>

            <!-- Payment form -->
            <form method="post">
                <div class="form-group row">
                    <label for="ORDER_ID" class="col-sm-4 col-form-label">Order ID</label>
                    <div class="col-sm-8">
                        <input id="ORDER_ID" class="form-control" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off"
                        value="<?php echo "ORDS" . rand(10000,99999999) ?>" readonly>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="CUST_ID" class="col-sm-4 col-form-label">Student Email</label>
                    <div class="col-sm-8">
                        <input id="CUST_ID" class="form-control" tabindex="2" maxlength="50" size="50" name="CUST_ID" autocomplete="off" value="<?php if(isset($stuEmail)){echo $stuEmail; }?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="TXN_CODE" class="col-sm-4 col-form-label">Transaction Code</label>
                    <div class="col-sm-8">
                        <input id="TXN_CODE" class="form-control" name="TXN_CODE" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="NAME_ON_ID" class="col-sm-4 col-form-label">Name on ID</label>
                    <div class="col-sm-8">
                        <input id="NAME_ON_ID" class="form-control" name="NAME_ON_ID" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="TXN_AMOUNT" class="col-sm-4 col-form-label">Amount</label>
                    <div class="col-sm-8">
                        <input title="TXN_AMOUNT" class="form-control" tabindex="10" type="text" name="TXN_AMOUNT" value="<?php if(isset($_POST['id'])){echo $_POST['id']; }?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="COURSE_SELECTED" class="col-sm-4 col-form-label">Course ID</label>
                    <div class="col-sm-8">
                        <input title="COURSE_SELECTED" class="form-control" tabindex="11" type="text" name="COURSE_SELECTED" value="<?php if(isset($_SESSION['course_id'])){ echo $_SESSION['course_id']; } ?>" readonly>
                    </div>
                </div>

                <div class="text-center">
                    <input value="Submit Payment Details" type="submit" name="process_payment" class="btn btn-primary">
                    <a href="./courses.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>

            <br>
            <small class="form-text text-muted">After payments your course selected will be activated by the administrator in a few and you will be contacted. Kindly stay connected as we finish the process.</small>
        </div>
    </div>
</div>

<!-- Jquery and Boostrap JavaScript -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- Font Awesome JS -->
<script type="text/javascript" src="js/all.min.js"></script>
<!-- Custom JavaScript -->
<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>
<?php
}
?>

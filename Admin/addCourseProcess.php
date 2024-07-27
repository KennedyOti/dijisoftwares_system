<?php
require "../source/connection.php";

$name = isset($_POST["n"]) ? $_POST["n"] : '';
$fee = isset($_POST["f"]) ? $_POST["f"] : '';
$des = isset($_POST["d"]) ? $_POST["d"] : '';

if (empty($name)) {
    echo "Please enter course name";
} else if (empty($fee)) {
    echo "Please enter course fee";
} else if (empty($des)) {
    echo "Please enter description";
} else {
    $c_rs = Database::search("SELECT * FROM `course` WHERE `name` = '".$name."'");
    if ($c_rs->num_rows > 0) {
        echo "Course name already exists";
    } else {
        Database::iud("INSERT INTO `course` (`name`, `fee`, `description`) VALUES ('".$name."', '".$fee."', '".$des."')");
        echo "Course added Successfully";
    }
}
?>

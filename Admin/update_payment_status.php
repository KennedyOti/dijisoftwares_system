
<?php
class Database {
    public static $connection;

    public static function connect() {
        self::$connection = new mysqli('localhost', 'root', '', 'database');
        if (self::$connection->connect_error) {
            die("Connection failed: " . self::$connection->connect_error);
        }
    }
}

// Call the connect function to establish the database connection
Database::connect();



if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['course_id']) && isset($_POST['student_id'])) {
    $courseId = $_POST['course_id'];
    $studentId = $_POST['student_id'];

    try {
        if (Database::$connection === null) {
            throw new Exception("Database connection is not established.");
        }

        $query = "SELECT * FROM course_payment_status WHERE course_id = ? AND student_id = ?";
        $stmt = Database::$connection->prepare($query);
        if ($stmt === false) {
            throw new Exception("Error in preparing statement: " . Database::$connection->error);
        }
        $stmt->bind_param("ii", $courseId, $studentId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $updateQuery = "UPDATE course_payment_status SET status = 1 WHERE course_id = ? AND student_id = ?";
            $updateStmt = Database::$connection->prepare($updateQuery);
            if ($updateStmt === false) {
                throw new Exception("Error in preparing statement: " . Database::$connection->error);
            }
            $updateStmt->bind_param("ii", $courseId, $studentId);
            $updateStmt->execute();
            $updateStmt->close();
        } else {
            $insertQuery = "INSERT INTO course_payment_status (course_id, student_id, status) VALUES (?, ?, 1)";
            $insertStmt = Database::$connection->prepare($insertQuery);
            if ($insertStmt === false) {
                throw new Exception("Error in preparing statement: " . Database::$connection->error);
            }
            $insertStmt->bind_param("ii", $courseId, $studentId);
            $insertStmt->execute();
            $insertStmt->close();
        }

        $stmt->close();
    } catch (Exception $e) {
        die($e->getMessage());
    } finally {
        Database::$connection->close();
    }
}

header("Location: adminPanel.php");
exit();
?>

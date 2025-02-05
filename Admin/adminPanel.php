<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="../css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="../css/argon.css?v=1.2.0" type="text/css">
    <link rel="stylesheet" href="css/style.scss" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
</head>

<body class="adminback">
    <?php
    session_start();
    if (isset($_SESSION["a"])) {
    ?>

        <!-- side panel -->
        <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
            <div class="scrollbar-inner">
                <div class="sidenav-header  align-items-center">
                    <a href="index.php">
                        <h1 class="m-3 text-uppercase fw-bold text-primary"><i class="mr-3"></i>Dijisoftwares</h1>
                    </a>
                </div>
                <div class="navbar-inner">
                    <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">
                                    <i class="bi bi-speedometer2"></i>
                                    <span class="nav-link-text">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="manageCourse.php">
                                    <i class="bi bi-person-rolodex"></i>
                                    <span class="nav-link-text">Manage Courses</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="manageTeacher.php">
                                    <i class="bi bi-person-workspace"></i>
                                    <span class="nav-link-text">Manage Teacher</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="manageStudent.php">
                                    <i class="bi bi-people-fill"></i>
                                    <span class="nav-link-text">Manage Student</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="sendMail.php">
                                    <i class="bi bi-envelope-plus"></i>
                                    <span class="nav-link-text">Send Message(Email)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span class="nav-link-text" onclick="adminlogOut();">Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- side panel -->

        <div class="main-content" id="panel">
            <!-- Header -->
            <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
                <div class="container-fluid">
                    <div class="offset-11">
                        <span class="text-white col-1">Admin</span>
                    </div>
                </div>
            </nav>
            <!-- Header -->

            <div class="header bg-primary pb-6">
                <div class="container-fluid">
                    <div class="header-body">
                        <div class="row align-items-center py-4">
                            <div class="col-lg-6 col-7">
                                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>

                        <!-- cards -->
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <span class="h2 font-weight-bold mb-0">Teachers</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                                    <?php
                                                    require "../source/connection.php";
                                                    $t = Database::search("SELECT count(id) AS num FROM teacher ");
                                                    $t_data = $t->fetch_assoc();
                                                    ?>
                                                    <span><?php echo $t_data["num"] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <span class="h2 font-weight-bold mb-0">Courses</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                                    <?php
                                                    $o = Database::search("SELECT count(id) AS num FROM course ");
                                                    $o_data = $o->fetch_assoc();
                                                    ?>
                                                    <span><?php echo $o_data["num"] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <span class="h2 font-weight-bold mb-0">Students</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                                    <?php
                                                    $s = Database::search("SELECT count(id) AS num FROM student ");
                                                    $s_data = $s->fetch_assoc();
                                                    ?>
                                                    <span><?php echo $s_data["num"] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-stats">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <span class="h2 font-weight-bold mb-0">Messages</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                                    <span>0</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- cards -->

                    </div>
                </div>
            </div>
<!-- 
            <div class="container-fluid">
                <div class="row">
                    <div class="col-7">
                        <canvas id="barChart" class="chart"></canvas>
                    </div>
                    <div class="col-5 d-flex justify-content-end mt-9 ">
                        <div class="c">
                            <div class="items">
                                <div class="icon-wrapper">
                                    <i class="fa fa-file"></i>
                                </div>
                                <div class="project-name">
                                    <p>FILES</p>
                                </div>
                            </div>







                            
<!-- Enrolled Courses Section -->
<!-- Enrolled Courses Section -->
<div class="row mt-5">
    <div class="col">
        <h3 class="text-primary">Enrolled Courses</h3>
        <table class="table table-striped" style="border-spacing: 0; border-collapse: collapse; font-size: 1.5em;">
            <thead>
                <tr style="background-color: #04aa6d; color: white;">
                    <th style="padding: 0.25rem;">#</th>
                    <th style="padding: 0.25rem;">Student Name</th>
                    <th style="padding: 0.25rem;">Course Name</th>
                    <th style="padding: 0.25rem;">Course Fee</th>
                    <th style="padding: 0.25rem;">Confirm Payment</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch enrolled courses with student name, course name, and course fee
                require_once "../source/connection.php";
                $query = "SELECT student.id AS student_id, CONCAT(student.fname, ' ', student.lname) AS student_name, 
                          course.id AS course_id, course.name AS course_name, course.fee AS course_fee, 
                          IFNULL(course_payment_status.status, 0) AS is_confirmed 
                          FROM student_has_course 
                          JOIN course ON student_has_course.course_id = course.id
                          JOIN student ON student_has_course.student_id = student.id
                          LEFT JOIN course_payment_status ON course_payment_status.course_id = course.id AND course_payment_status.student_id = student.id
                          ORDER BY student.id";

                $enrolledCourses = Database::search($query);

                // Check for SQL errors
                if (!$enrolledCourses) {
                    die("Error in query: " . Database::$connection->error);
                }

                $currentStudent = '';
                $studentCount = 0;
                $entryNumber = 0;
                while ($course = $enrolledCourses->fetch_assoc()) {
                    $displayStudent = ($course['student_name'] !== $currentStudent) ? $course['student_name'] : '';
                    if ($displayStudent !== '') {
                        $studentCount++;
                        $entryNumber++;
                    }
                    $currentStudent = $course['student_name'];
                    $isConfirmed = $course['is_confirmed'];
                ?>
                    <tr>
                        <td style="padding: 0.25rem;"><?php echo $displayStudent !== '' ? $entryNumber : ''; ?></td>
                        <td style="padding: 0.25rem;"><?php echo $displayStudent; ?></td>
                        <td style="padding: 0.25rem;"><?php echo $course['course_name']; ?></td>
                        <td style="padding: 0.25rem;"><?php echo $course['course_fee']; ?></td>
                        <td style="padding: 0.25rem;">
                            <?php if (!$isConfirmed) { ?>
                            <form action="update_payment_status.php" method="POST" class="d-inline">
                                <input type="hidden" name="course_id" value="<?php echo $course['course_id']; ?>">
                                <input type="hidden" name="student_id" value="<?php echo $course['student_id']; ?>">
                                <button type="submit" class="btn btn-success" name="confirm" value="Confirm">Confirm</button>
                            </form>
                            <?php } else { ?>
                            Confirmed
                            <?php } ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <!-- <p>Total number of students: <?php echo $studentCount; ?></p> -->
    </div>
</div>







                <!-- End Enrolled Courses Section -->
            </div>

        </div>

        <script src="js/script.js"></script>
        <script src="../js/bootstrap.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            //bar
            var ctxB = document.getElementById("barChart").getContext('2d');
            var myBarChart = new Chart(ctxB, {
                type: 'bar',
                data: {
                    labels: ["A", "B", "C", "D", "E", "F"],
                    datasets: [{
                        label: '',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>

</body>

</html>

<?php
    } else {
        header("Location:index.php");
    }
?>

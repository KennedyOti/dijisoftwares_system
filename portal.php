<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dijisoftwares</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="img/favicon.ico" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="css/bootstrap1.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <style>
        @media (max-width: 768px) {
            .navbar .btn {
                margin-top: 10px;
            }
        }
    </style>
</head>

<body>

    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
            <a href="portal.php" class="navbar-brand ml-lg-3">
                <h1 class="m-0 text-primary"><i class="mr-3"></i>Dijisoftwares</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <a href="userLogin.php" class="btn btn-success py-2 px-4 d-lg-none">Log In</a>
                <a href="index.php" class="btn btn-success py-2 px-4 d-lg-none">Visit Website</a>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item d-none d-lg-block">
                        <a href="userLogin.php" class="btn btn-success py-2 px-4 ml-3">Log In</a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a href="index.php" class="btn btn-success py-2 px-4 ml-3">Visit Website</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <!-- Header-->
    <div class="jumbotron jumbotron-fluid position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center my-5 py-5">
            <h2 class="text-white display-1 mb-5">Solution Oriented</h2>
            <h3 class="text-white mt-4 mb-4">Dijisoftwares specializes in software development and training, helping businesses and individuals achieve their technology goals.</h3>
        </div>
    </div>
    <!-- Header-->

    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="img/ostu.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <p class="text-dark"><b>We manage all students and teachers with their courses. Students can do assignments and refer to all notes through this system. Teachers can give marks and monitor students.</b></p>
                    <div class="row pt-3 mx-0">
                        <div class="col-3 px-0">
                            <div class="text-center p-4">
                                <h1 class="text-success" data-toggle="counter-up"><i class="bi bi-journal-richtext"></i></h1>
                                <h6 class="text-uppercase text-success">Courses</h6>
                            </div>
                        </div>
                        <div class="col-3 px-0">
                            <div class="text-center p-4">
                                <h1 class="text-success" data-toggle="counter-up"><i class="bi bi-journals"></i></h1>
                                <h6 class="text-uppercase text-success">Notes</h6>
                            </div>
                        </div>
                        <div class="col-3 px-0">
                            <div class="text-center p-4">
                                <h1 class="text-success" data-toggle="counter-up"><i class="bi bi-book"></i></h1>
                                <h6 class="text-uppercase text-success">Exams</h6>
                            </div>
                        </div>
                        <div class="col-3 px-0">
                            <div class="text-center p-4">
                                <h1 class="text-success" data-toggle="counter-up"><i class="bi bi-journal-check"></i></h1>
                                <h6 class="text-uppercase text-success">Results</h6>
                            </div>
                        </div>

                        <h2 class="mt-5 text-primary">Login with creating account</h2>
                    </div>
                    <div class="row">
                        <a href="userRegister.php?user=student" class="btn btn-outline-success m-1">STUDENT</a>
                        <a href="userRegister.php?user=teacher" class="btn btn-outline-success m-1">TEACHER</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Start -->
    <div class="container-fluid position-relative overlay-top bg-success text-white-50 py-5" style="margin-top: 90px;">
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-md-6 mb-5">
                    <h1 class="mt-n2 text-uppercase text-white"><i class="fa fa-book-reader mr-3"></i>Dijisoftwares</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-5 text-white">
                    <h3 class="text-white mb-4">Available Access</h3>
                    <p>Teachers</p>
                    <p>Students</p>
                </div>
                <div class="col-md-4 mb-5 text-white">
                    <h3 class="text-white mb-4">Features</h3>
                    <div class="d-flex flex-column justify-content-start">
                        <p>Online courses</p>
                        <p>Assignments</p>
                        <p>Notes</p>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <h3 class="text-white mb-4">Contact admin</h3>
                    <div class="text-white d-flex flex-column justify-content-start">
                        <h5 class="text-white">kennedyonyango@gmail.com</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-success text-white-50 border-top py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-left mb-3 mb-md-0 text-white">
                    <p class="m-0">Copyright &copy; Dijisoftwares. All Rights Reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

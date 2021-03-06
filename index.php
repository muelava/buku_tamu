<?php


session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login");
}


$username = $_SESSION["login"];

$conn = mysqli_connect("localhost", "root", "", "webwedding");
$user = mysqli_query($conn, "SELECT *FROM user WHERE username = '$username'");

$result  = mysqli_fetch_assoc($user);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muelava.Id</title>

    <script src="assets/js/main.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="assets/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-3 px-sm-2 px-0 sidebar">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="index" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 text-dark fw-bold" id="title">Web Wedding</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-left align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <div class="dropdown pb-4">
                                <a href="#" class="d-flex align-items-center text-decoration-none" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span style='background: rgb(0,0,0,.5); color:white' class='inisial rounded-circle me-2'>
                                        <span class='text-uppercase position-absolute fw-bold coba'><?= substr($_SESSION["login"], 0, 1);; ?></span>
                                    </span>
                                    <div class="row">
                                        <span class="ms-1 fw-bold text-capitalize" id="nama"><?= $_SESSION["login"]; ?> <img src="assets/img/check-verifed.png" alt="" width="16"></span>
                                        <span class="ms-1" id="sebagai">Administrator</span>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-light text-small shadow">
                                    <li><a class="dropdown-item" href="#">Profile</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="logout">Sign out</a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="index" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-table"></i> <span class="ms-1" id="navigasi"><img src="assets/img/home-page.png" class="me-2" width="35" alt=""> Home</span></a>
                        </li>
                        <li>
                            <a href="ucapan" class="nav-link px-0 align-middle" style="opacity: .5;">
                                <i class="fs-4 bi-table"></i> <span class="ms-1" id="navigasi"><img src="assets/img/outline_message_black_24dp.png" class="me-2" width="35" alt=""> Ucapan</span></a>
                        </li>
                        <li>
                            <a href="buku-tamu" class="nav-link px-0 align-middle" style="opacity: .5;">
                                <i class="fs-4 bi-table"></i> <span class="ms-1" id="navigasi"><img src="assets/img/outline_menu_book_black_24dp.png" class="me-2" width="35" alt=""> Buku Tamu</span></a>
                        </li>
                        <li>
                            <a href="sebar-undangan" class="nav-link px-0 align-middle" style="opacity: .5;">
                                <i class="fs-4 bi-table"></i> <span class="ms-1" id="navigasi"><img src="assets/img/outline_post_add_black_24dp.png" class="me-2" width="35" alt=""> Sebar Undangan</span></a>
                        </li>
                    </ul>
                    <hr>
                </div>
            </div>
            <span class="text-dark position-relative" style="width: 0!important; top:2em; cursor:pointer" id="btn-burger" onclick="btnBurger()">
                <div class="humberger"></div>
                <div class="humberger"></div>
                <div class="humberger"></div>
            </span>

            <div class="col py-3 mt-5" id="content">
                <h2 class="pt-5 text-capitalize">Hello, <b><?= $result["username"]; ?>!</b></h2>
                <br>
                <p>Selamat mengelola buku tamu anda. Kami harap tidak memberikan <strong>username</strong> atau <strong>password</strong> anda kepada siapapun.</p>
                <a href="simulasi">get try!</a> for simulation


            </div>
        </div>

        <script>
            $(document).ready(function() {
                $("#btn-burger").click(function() {
                    $(".sidebar").toggle(250);
                });
            });
        </script>
        <!-- bootstrap js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>
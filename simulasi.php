<?php


session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login");
}


$conn = mysqli_connect('localhost', 'root', '', 'webwedding');

$ucapan = mysqli_query($conn, "SELECT *FROM ucapan");

// inisialisasi waktu
date_default_timezone_set('Asia/Jakarta');

function hari_ini()
{
    $hari = date("D");

    switch ($hari) {
        case 'Sun':
            $hari_ini = "Minggu";
            break;

        case 'Mon':
            $hari_ini = "Senin";
            break;

        case 'Tue':
            $hari_ini = "Selasa";
            break;

        case 'Wed':
            $hari_ini = "Rabu";
            break;

        case 'Thu':
            $hari_ini = "Kamis";
            break;

        case 'Fri':
            $hari_ini = "Jumat";
            break;

        case 'Sat':
            $hari_ini = "Sabtu";
            break;

        default:
            $hari_ini = "Tidak di ketahui";
            break;
    }

    return "<b>" . $hari_ini . "</b>";
}

$waktu = hari_ini() . ", " . date('d/m/Y') . "<br>" . date("H:i:s");


if (isset($_POST['kirim'])) {
    $komentar = strip_tags($_POST['komentar']);
    $nama = strip_tags($_POST['nama']);

    $query = "INSERT INTO ucapan VALUES('','$nama','$komentar','$waktu')";
    $result = mysqli_query($conn, $query);
    echo "<script>alert('Ucapan anda terkirim'); document.location.href = 'index.php'</script>";

    return mysqli_affected_rows($conn);
}


if (isset($_POST['konfirmasi'])) {
    $nama = strip_tags($_POST['nama']);
    $nomor_whatsapp = strip_tags($_POST['nomor_whatsapp']);
    $jml_orang = strip_tags($_POST['jml_orang']);
    $ket_hadir = strip_tags($_POST['ket_hadir']);


    $query = "INSERT INTO buku_tamu VALUES('','$nama','$nomor_whatsapp','$jml_orang','$ket_hadir')";
    $result = mysqli_query($conn, $query);
    echo "<script>alert('Terimakasih telah mengkonfirmasi kehadiran'); document.location.href = 'index.php'</script>";

    return mysqli_affected_rows($conn);
}


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
                            <a href="index" class="nav-link px-0 align-middle" style="opacity: .5;">
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

                <h3>Komentar!</h3>

                <form action="" method="POST">
                    <ul style="list-style: none;">
                        <li>
                            <textarea class="comment-input font--raleway" name="komentar" cols=" 80" rows="10" placeholder="komentar" required></textarea>
                        </li>
                        <li>
                            <input class="name-input font--raleway" type="text" placeholder="nama" name="nama" style="width:50%; height:20px" required>
                        </li>
                        <li>
                            <button type="submit" class="submit-btn font--raleway" name="kirim">Submite</button>
                        </li>
                    </ul>
                </form>



                <br><br>
                <h3>Buku Tamu!</h3>

                <form action="" class="" method="POST">
                    <div class="mb-3">
                        <input class="form-control" type="text" placeholder="Nama Kamu" name="nama" required>
                    </div>
                    <div class="d-flex">
                        <select class="form-select form-select-sm me-5" aria-label="Default select example" name="jml_orang">
                            <option value="1 Orang">1 Orang</option>
                            <option value="2 Orang">2 Orang</option>
                        </select>
                        <input type="text" class="form-control" placeholder="Nomor WhatsApp" name="nomor_whatsapp" required>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="flexRadioDefault1" value="Pasti, Saya akan datang" name="ket_hadir" required>
                        <label class="form-check-label" for="flexRadioDefault1">Pasti, Saya akan datang</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="flexRadioDefault2" value="Saya masih ragu" name="ket_hadir" required>
                        <label class="form-check-label" for="flexRadioDefault2">Saya masih ragu</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="flexRadioDefault3" value="Mohon maaf saya tidak bisa datang" name="ket_hadir" required>
                        <label class="form-check-label" for="flexRadioDefault3">Mohon maaf saya tidak bisa datang</label>
                    </div>
                    <button type="submit" class="btn btn-primary w-100" name="konfirmasi">Submite</button>
                </form>

                <!-- start tampilkan ucapan & doa -->
                <div class="overflow-auto" style="height: 30%;">
                    <?php foreach ($ucapan as $us) : ?>
                        <h5><img src="assets/img/profile-user.png" width="30" alt=""> <?= $us["nama"]; ?>
                            <span style="font-size:.6em">
                                <?php $cut = explode('<br>', $us['waktu']);
                                echo $cut[0] . ' | ' . $cut[1] ?> WIB
                            </span>
                        </h5>
                        <p class="ps-4"><?= $us["komentar"]; ?></p>
                        <hr>
                    <?php endforeach; ?>
                </div>
                <!-- end tampilkan ucapan & doa -->

            </div>
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
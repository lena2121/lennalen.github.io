<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.11.4/chartist.min.css" integrity="sha512-V0+DPzYyLzIiMiWCg3nNdY+NyIiK9bED/T1xNBj08CaIUyK3sXRpB26OUCIzujMevxY9TRJFHQIxTwgzb0jVLg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION['status']) != "login"){
            header("location:/studi_kasus");
        }
        if(isset($_POST['submit'])){
            session_destroy();
            header("location:/studi_kasus/admin");
        }
    ?>

    <nav class="navbar navbar-light bg-light p-3">
        <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-no-wrap justify-content-between">
            <a class="navbar-brand" href="#"> Admin Panel</a>
            <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-toggle="collapse" 
            data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="col-12 col-md-4 col-lg-2">
            <input class="form-control form-control-dark" type="text" placeholder="search" aria-label="search">
        </div>
        <div class="col-12 col-md-5 col-lg-8 d-flex align-items-center justify-content-md-end mt-3 mt-md-0">
            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expandede="false">
                    Selamat Datang, <?php echo($_SESSION['username']) ?>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <form id="logout_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <button class="dropdown-item" type="submit" name="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky">
                    <ul clasas="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">
                                <i class="fa-solid fa-shop px-2"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/studi_kasus/admin/dashboard.php">
                                <i class="fa-solid fa-home px-2"></i>
                                <span>Beranda</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/studi_kasus/admin/users/penumpang.php">
                                <i class="fa-solid fa-user px-2"></i>
                                <span>Penumpang</span>
                            </a>
                        </li>
                        </li>
                    </ul>
                </div>
            </nav>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Overview</li>
                        </ol>
                    </nav>
                    <h1 class="h2">Beranda</h1>

                    <div class="row my-4">
                        <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <div class="card">
                                <h5 class="card-header">Penerbangan</h5>
                                <div class="card-body">
                                    <h5 class="card-title">300 Pesawat</h5>
                                    <p class="card-text">1 Bulan</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <div class="card">
                                <h5 class="card-header">Penumpang</h5>
                                <div class="card-body">
                                    <h5 class="card-title">1000 Penumpang</h5>
                                    <p class="card-text">1 Bulan</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <div class="card">
                                <h5 class="card-header">Pramugari</h5>
                                <div class="card-body">
                                    <h5 class="card-title">250 Pramugari</h5>
                                    <p class="card-text">1 Bulan</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <div class="card">
                                <h5 class="card-header">Landing</h5>
                                <div class="card-body">
                                    <h5 class="card-title">500 Maskapai</h5>
                                    <p class="card-text">1 Bulan</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-lg-0">
                            <div class="card">
                                <h5 class="card-header">Data Penerbangan</h5>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Nomor Penerbangan</th>
                                                    <th scope="col">Pesawat</th>
                                                    <th scope="col">Waktu Penerbangan</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th soope="row">537</th>
                                                    <td>Boeing 737 (A320)</td>
                                                    <td>1 Agustus 2022 (05:00)</td>
                                                    <td><a href="#" class="btn btn-sm btn-primary">Lihat</a></td>
                                                </tr>
                                                <tr>
                                                    <th soope="row">537</th>
                                                    <td>Boeing 737 (A320)</td>
                                                    <td>1 Agustus 2022 (05:00)</td>
                                                    <td><a href="#" class="btn btn-sm btn-primary">Lihat</a></td>
                                                </tr>
                                                <tr>
                                                    <th soope="row">537</th>
                                                    <td>Boeing 737 (A320)</td>
                                                    <td>1 Agustus 2022 (05:00)</td>
                                                    <td><a href="#" class="btn btn-sm btn-primary">Lihat</a></td>
                                                </tr>
                                                <tr>
                                                    <th soope="row">537</th>
                                                    <td>Boeing 737 (A320)</td>
                                                    <td>1 Agustus 2022 (05:00)</td>
                                                    <td><a href="#" class="btn btn-sm btn-primary">Lihat</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <a href="../print.php" target="_blank">
                                        <button type="button" class="btn btn-primary">Cetak Data</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="card">
                                <h5 class="card-header">Data Penerbangan</h5>
                                <div class="card-body">
                                    <div id="flight-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <footer class="pt-5 d-flex justify-content-between">
                        <span>Copyright @ 2022 <a href="../index.php">Alena Airline</a></span>
                        <ul class="nav m-0">
                            <li class="nav-item">
                                <a  class="nav-link text-secondary" href="#">Hubungi Kami</a>
                            </li>
                        </ul>
                    </footer>
                </main>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/fontawesome.min.css"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.11.4/chartist.min.js" integrity="sha512-9rxMbTkN9JcgG5euudGbdIbhFZ7KGyAuVomdQDI9qXfPply9BJh0iqA7E/moLCatH2JD4xBGHwV6ezBkCpnjRQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        new Chartist.Line('#flight-chart',{
            labels: ['Jan','Feb','Mar','Apr','Mei','Jun'],
            series: [
                [288,250,193,349,567,646]
            ]
        });
    </script>
</body>
</html>
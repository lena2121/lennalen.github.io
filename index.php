<!DOCTYPE html>
<html lang="en">
<head>
	<title>ALENA AIRLINE</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <style>
        .carousel-wrapper{
            height: 400px;
            background-color: aliceblue;
        }

    </style>

</head>
<body>
        <?php
            include 'connect.php';

            $sql = "SELECT * FROM flights 
            JOIN planes ON flights.plane_id = planes.id
            JOIN ref_arrivals ON flights.arrival_id = ref_arrivals.id";

            if(isset($_POST['filter_submit'])){
                if($_POST['arrival'] !==""){
                    $sql = "SELECT * FROM flights 
                    JOIN planes ON flights.plane_id = planes.id
                    JOIN ref_arrivals ON flights.arrival_id = ref_arrivals.id
                    WHERE flights.arrival_id =".$_POST['arrival'];
                }
            }

            
            $datas = $conn->query($sql);

            $arrival_sql = "SELECT * FROM ref_arrivals";
            $arrivals =$conn->query($arrival_sql);
        ?>
    <nav class="navbar navbar-expand-lg bg-white">
        <div class="container">
          <a class="navbar-brand" href="#">
            <img src="image/logo.png" width="80px" height="80px" alt="logo"> <strong>| ALENA AIRLINE</strong>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="me-auto"></div>
            <ul class="navbar-nav mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#" style="color: #00c2cb; font-size: 15px;">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="about.php" style="font-size: 15px;">About</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link active" aria-current="page" href="admin/login.php" style="font-size: 15px;">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link">
                    <i class="fa fa-search" aria-hidden="true" style="color: #00c2cb; font-size: 15px;"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
    </nav>

    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
                <div class="carousel-wrapper d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-8">
                                <h1>Alena Airline</h1>
                                <h3>Waktu yang tepat untuk naik pesawat</h3>
                                <p>Miliki pengalaman yang menarik, nyaman dan dapatkan promo akhir tahun! </p>
                                <button type="button" class="btn btn-primary">Lihat Pesawat</button>
                                <button type="button" class="btn btn-dark">Lihat Jadwal</button>
                            </div>
                            <div class="col-4">
                                <div m-auto>
                                    <img src="image/Logo2.png" width="200px" height="200px" alt="log2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div>
        <i class="fa-solid fa-angles-down text-center d-block" style="color: #00c2cb; font-size: 40px;"></i>
    </div>
    <br>
    <div class="container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method ="post">
            <div class="row">
                <div class="col-3">
                    <select class="form-select" aria-label="Default select example" name ="departure">
                        <option selected>Dari</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-3">
                    <select class="form-select" aria-label="Default select example" name ="arrival">
                        <option selected>Ke</option>
                        <?php foreach($arrivals as $arrival): ?>
                            <option value="<?php echo($arrival['id']) ?>"><?php echo($arrival['name']) ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-3">
                    <select class="form-select" aria-label="Default select example" name="date">
                        <option selected>Tanggal Berangkat</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-3">
                    <button type="submit" name="filter_submit" class="btn btn-info text-white"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </div>
        </form>
    </div>
<br>
    <div class="container-wrapper">
        <?php
            foreach($datas as $data):?>
        <?php
            $timein = date_create($data['timein']);
            $timeout = date_create($data['timeout']);
            $date = date_create($data['date']);
        ?>
        <div class="container">
        <div class="bg-white">
            <div class="row">
                <div class="col-2">
                    <img src="image/Logo2.png" alt="logo2" width="100px" height="100px">
                </div>
                <div class="col-6">
                    <div class="d-flex align-items-center gap-3">
                        <div>
                            <h3 class="mb-0"><?php echo date_format($timein, "H:i"); ?></h3>
                            <p><?php echo $data['name']; ?></p>
                        </div>
                        <div>
                            <i class="fa-solid fa-angle-right"></i>
                        </div>
                        <div>
                            <h3 class="mb-0"><?php echo date_format($timeout, "H:i"); ?></h3>
                            <p><?php echo $data['departure']; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <h3>
                        <strong>IDR <?php echo number_format($data['price'], 0, ",", "."); ?>,-</strong>
                        <span style="font-size: 20px">/pax</span>
                    </h3>
                    <button type="button" class="btn btn-info text-white">pilih</button>
                </div>
            </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    
    

<section class="">
<!-- Footer -->
<footer class="text-center text-white" style="background-color: #00c2cb;">
  <!-- Grid container -->
  <div class="container p-4 pb-0">
    <!-- Section: CTA -->
    <section class="">
      <p class="d-flex justify-content-center align-items-center">
        <span class="me-3">Register for free</span>
        <button type="button" class="btn btn-outline-light btn-rounded">
          Sign up!
        </button>
      </p>
    </section>
    <!-- Section: CTA -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2020 Copyright:
    <a class="text-white" href="#">Alena Airline</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
</section>

</div>
<!-- End of .container -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

</body>
</html>
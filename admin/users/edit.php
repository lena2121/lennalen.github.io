<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Penumpang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.11.4/chartist.min.css" integrity="sha512-V0+DPzYyLzIiMiWCg3nNdY+NyIiK9bED/T1xNBj08CaIUyK3sXRpB26OUCIzujMevxY9TRJFHQIxTwgzb0jVLg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION['status']) != "login"){
            header("location:/studi_kasus/admin");
        }

        include_once '../../connect.php';

        $id = $_GET['id'];
        $sql = "SELECT * FROM users WHERE id='$id'";
        $datas = $conn->query($sql);

        while ($data = mysqli_fetch_array($datas)){
           
            $name = $data['name'];
            $phone = $data['phone'];
        }
        
        if(isset($_POST['submit'])){
            
            $name = $_POST['name'];
            $phone = $_POST['phone'];

            include_once '../../connect.php';
            $sql = "UPDATE users SET name = '$name', phone = '$phone' WHERE id= '$id'";
            $datas = $conn->query($sql);

            if(mysqli_affected_rows($conn)>0){
                header("Location:index.php");
            }else{
                $_SESSION['error'] = "mengupdate data gagal!";
            }
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
                            <a class="nav-link active" aria-current="page" href="../../index.php">
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
                            <li class="breadcrumb-item"><a href="#">Penumpang</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Penumpang</li>
                        </ol>
                    </nav>
                    <h1 class="h2">Edit Penumpang</h1>

                    <div class="card">
                        <div class="card-body">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nama"
                                required value="<?php echo $name ?>">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="08xxxxxxx"
                                required value="<?php echo $phone ?>">
                            </div>
                            <p style="color:red; font-size: 12px;"><?php if(isset($_SESSION['error'])){echo($_SESSION['error']); } ?></p>
                            <button types="submit" name="submit" class="btn btn-block btn-primary my-3" style="color: white;">Save</button>
                            </form>
                        </div>
                    </div>
                    <footer class="pt-5 d-flex justify-content-between">
                        <span>Copyright @ 2022 <a href="#">Alena Airline</a></span>
                        <ul class="nav m-0">
                            <li class="nav-item">
                                <a  class="nav-link text-secondary" href="#">Hubungi Kami</a>
                            </li>
                        </ul>
                    </footer>
            </main>
        </div>
    </div>

    <?php
        unset($_SESSION['error']);
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/fontawesome.min.css"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.11.4/chartist.min.js" integrity="sha512-9rxMbTkN9JcgG5euudGbdIbhFZ7KGyAuVomdQDI9qXfPply9BJh0iqA7E/moLCatH2JD4xBGHwV6ezBkCpnjRQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
</html>
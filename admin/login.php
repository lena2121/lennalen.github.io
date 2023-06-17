<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alena Airline</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.11.4/chartist.min.css" integrity="sha512-V0+DPzYyLzIiMiWCg3nNdY+NyIiK9bED/T1xNBj08CaIUyK3sXRpB26OUCIzujMevxY9TRJFHQIxTwgzb0jVLg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
<?php
        session_start();

        if(isset($_SESSION['status']) && $_SESSION['status'] === "login"){
            header("location:/studi_kasus/admin/dashboard.php");
            die();
        }

        include '../connect.php';

        if(isset($_POST['username']) && $_POST['password']){ 
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM admins WHERE username='$username' and password ='$password'";
        $data = $conn->query($sql);

        $check = mysqli_num_rows($data);

        if(isset($_POST['submit'])){
            if($check != 0){
                $_SESSION['username'] = $username;
                $_SESSION['status'] = "login";
                header("location:/studi_kasus/admin/dashboard.php");
                die();
            }else{
                $_SESSION['error'] = "gagal login, silahkan cek kembali username dan password anda!";
            }
        }
    }
?>

<div class = "container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center text-dark mt-3"> Login Form</h2>
                <div class="text-center mb-3 text dark">Alena Airline</div>
                <div class="card my-5">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="card-body cardbody-color p-lg-5">
                        <div class="text-center">
                            <img src="../image/logo.png" class="img-fluid profile-image-pi img-thumbail rounded-circle my-3" width="150px" alt="profile">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp" require placeholder="username">
                        </div>
                        <div class="mb-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="password" require>
                        </div>
                        <p style="color:red; font-size: 12px;"><?php if(isset($_SESSION['error'])){echo($_SESSION['error']);} ?>
                        </p>
                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-primary px-5 w-100">Login</button>
                        </div>
                        <div id="emailHelp" class="form-text text-center mb-4 text-dark">
                            Not Registered?
                            <a href="#" class="text-dark fw-bold">Create an Account</a>
                            <br></br>
                            <a href="../index.php" class="text-dark fw-bold">Back To Home</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
        unset($_SESSION['error']);
    ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.11.4/chartist.min.js" integrity="sha512-9rxMbTkN9JcgG5euudGbdIbhFZ7KGyAuVomdQDI9qXfPply9BJh0iqA7E/moLCatH2JD4xBGHwV6ezBkCpnjRQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
</html>

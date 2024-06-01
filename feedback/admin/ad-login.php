<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "feedback";

$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn) {
    die("Sorry conection failed!!! " . mysqli_connect_error());
}


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Assignment10</title>
</head>

<body>


    <!-- navbar  -->
    <nav class="navbar navbar-expand-lg navbar-dark text-white" style="background-color: #0a4275;">
        <a class="navbar-brand" href="/feedback/feedback-index.php">FEEDBACK HOME</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

       
    </nav>

    <section style="height: 70vh;">
        <div class="card text-center my-5">
            <div class="card-body">
                <h3 class="card-title">ADMIN LOGIN</h3>
            </div>
        </div>

        <!-- login form  -->

        <div class="container">
            <form method="POST">
                <?php
                if (isset($_POST['submit'])) {
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $select = "select * from admin where user = '$user' and pass = '$pass'";
                    $sql = mysqli_query($conn, $select);
                    if (mysqli_num_rows($sql) == 0) {

                        echo "Please Register first";
                    } else {

                        $_SESSION['username'] = $user;
                        $_SESSION['loggedin'] = true;
                        header('location: view-records.php');
                    }
                }


                ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Admin user id</label>
                    <input type="text" class="form-control" id="roll-no" name="user" aria-describedby="emailHelp" Required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" Required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Login</button>
            </form>


        </div>

    </section>




    <!-- footer  -->

    <section>
        <footer class="text-center text-white my-5" style="background-color: #0a4275;">
            <!-- Grid container -->
            <div class="container p-4 pb-0">
                <!-- Section: CTA -->
                <section class="">
                    <p class="d-flex justify-content-center align-items-center">
                        <span class="me-3">Register for free</span>
                        <button data-mdb-ripple-init type="button" class="btn btn-outline-light btn-rounded">
                            Sign up!
                        </button>
                    </p>
                </section>
                <!-- Section: CTA -->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2024 Copyright:
                <a class="text-white" href="https://mdbootstrap.com/">Lakhya Borah CSM23061</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "feedback";

$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn) {
    die("Sorry conection failed!!! " . mysqli_connect_error());
}

session_start();
$student_id = $_SESSION["student_id"];
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}

if (isset($_POST['submit_feed'])) {
    $name = $_GET['std_id'];
    $rating = $_POST['rating'];
    $desc = $_POST['desc'];
    $insert = "INSERT INTO `feedback`(`student_papers_id`, `rating`, `description`) VALUES ('$name','$rating','$desc')";
    $sql = mysqli_query($conn, $insert);
    if ($sql) {
?>
        <script>
            alert("Successfull");
            open('fill_feedback.php', _SELF);
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("failed");
            open('fill_feedback.php', _SELF);
        </script>
<?php
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    <title>Feedback</title>
</head>

<body>
    <!-- MODEL  -->


    <!-- navbar  -->
    <nav class="navbar navbar-expand-lg navbar-dark text-white" style="background-color: #0a4275;">
        <a class="navbar-brand" href="/feedback/feedback-index.php">FEEDBACK HOME</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
      
    
    </nav>

    <div class="container my-3">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Welcome - <?php echo $_SESSION['username'] ?></h4>
            <p>Hey how are you doing? Welcome to Feedback Portal. You are logged in as
                <?php echo $_SESSION['username'] ?>. Aww yeah, if you have not submitted feedback please fill the
                feedback form.
            </p>
            <hr>
            <p class="mb-0">Whenever you need to, be sure to logout <a href="./logout.php"> using this link.</a></p>
        </div>

        <section style="height: 70vh;">
            <div class="card text-center my-5">
                <div class="card-body">
                    <h3 class="card-title">FEEDBACK Fill</h3>
                </div>
            </div>

            <!-- table  -->

            <div class="container">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Rating out of 10</label>
                        <input type="text" name="rating" class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <button class="btn btn-primary" name="submit_feed">Submit</button>
                </form>
            </div>
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
            
</body>

</html>
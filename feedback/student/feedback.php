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
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    <title>Feedback</title>
</head>

<body>
    <!-- MODEL  -->
    <div class="modal fade" id="feedForm" tabindex="-1" role="dialog" aria-labelledby="feedForm" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">feedback</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="/student/feedback.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="Rating">Rating</label>
                            <input type="text" class="form-control" id="rating" name="rating"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer d-block mr-auto">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
            <p class="mb-0">Whenever you need to, be sure to logout <a href="/feedback/logout.php"> using this link.</a></p>
        </div>

        <section style="height: 70vh;">
            <div class="card text-center my-5">
                <div class="card-body">
                    <h3 class="card-title">FEEDBACK RECORDS</h3>
                </div>
            </div>

            <!-- table  -->
            <div class="container my-5">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">Course ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Instructor</th>
                            <th scope="col">Feedback</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT student_papers.id as student_papers_id, course.course_id as course_id, course.course_name as course_name, instructor.inst_name as inst_name from course join papers on course.course_id = papers.course join instructor on papers.inst_id = instructor.inst_id join student_papers on student_papers.paper_id = papers.paper_id join student on student.s_id = student_papers.sid WHERE student.s_id = '$student_id'";
                        $result = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                  <th scope='row'>" . $row['course_id'] . "</th>
                                   <td>" . $row['course_name'] . "</td>
                                    <td>" . $row['inst_name'] . "</td>
                                       <td> <a class='feedback btn btn-sm btn-primary'href='fill_feedback.php?std_id=" . $row['student_papers_id'] . "' >Give Feedback</a> </td>
                                      </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
                integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
                crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
                integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
                crossorigin="anonymous"></script>
            <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
            <script>
                $(document).ready(function () {
                    $('#myTable').DataTable();
                });
            </script>
            <script>
                edits = document.getElementsByClassName('feedback');
                Array.from(edits).forEach((element) => {
                    element.addEventListener("click", (e) => {
                        console.log("feedback ");
                        $('#feedForm').modal('toggle');
                    })
                })
            </script>
</body>

</html>
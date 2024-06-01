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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

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
        <a class="navbar-brand" href="/feedback/logout.php">logout</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    
    </nav>

    <div class="card text-center my-5">
        <div class="card-body">
            <h5 class="card-title">FEEDBACK RECORDS</h5>
        </div>
    </div>




    <!-- display  -->

    <div class="ml-5 mr-5 my-5">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">Roll no</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Course ID</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Instructor</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Description</th>
                    <th scope="col">Filled Date Time</th>


                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT student.s_name as student_name, student.s_id as student_id, course.course_id as course_id, course.course_name as course_name, instructor.inst_name as inst_name, feedback.rating as rating, feedback.description as descr, feedback.timestamp as timestam from course join papers on course.course_id = papers.course join instructor on papers.inst_id = instructor.inst_id join student_papers on student_papers.paper_id = papers.paper_id join student on student.s_id = student_papers.sid join feedback on student_papers.id= feedback.student_papers_id";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                      <th scope='row'>" . $row['student_id'] . "</th>
                      <th scope='row'>" . $row['student_name'] . "</th>
                      <td>" . $row['course_id'] . "</td>
                      <td>" . $row['course_name'] . "</td>
                      <td>" . $row['inst_name'] . "</td>
                      <td>" . $row['rating'] . "</td>
                      <td>" . $row['descr'] . "</td>
                      <td>" . $row['timestam'] . "</td>
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
</body>

</html>
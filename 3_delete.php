<?php
include ("db_connect.php");

if (isset($_GET['delete'])) {
    $sno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `ass1` WHERE `serial_no` = $sno";
    $result = mysqli_query($conn, $sql);
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
        <a class="navbar-brand" href="/feedback/index.html">ASSIGNMENT 10</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/feedback/3_delete.php">Home <span class="sr-only">(current)</span></a>
                </li>
             
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <section>
        <div class="card text-center my-5">
            <div class="card-body">
                <h5 class="card-title">ASSIGNMENT 1</h5>
                <p class="card-text">Display table from database using a HTML/Javascript/PHP form.</p>
            </div>
        </div>


        <?php
        if ($delete) {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been deleted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
        }
        ?>


        <!-- display  -->


        <div class="container">


            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Adress1</th>
                        <th scope="col">Adress2</th>
                        <th scope="col">City</th>
                        <th scope="col">Satte</th>
                        <th scope="col">Zip</th>
                        <th scope="col">Action</th>


                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `ass1`";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
        <th scope='row'>" . $row['serial_no'] . "</th>
        <td>" . $row['email'] . "</td>
        <td>" . $row['password'] . "</td> 
         <td>" . $row['address1'] . "</td>  
         <td>" . $row['address2'] . "</td>
        <td>" . $row['city'] . "</td>
        <td>" . $row['state'] . "</td>
        <td>" . $row['zip'] . "</td>
        <td> <button class='delete btn btn-sm btn-danger' id=" . $row['serial_no'] . ">Delete</button></td>

      </tr>";
                    }
                    ?>


                </tbody>
            </table>
        </div>


    </section>



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
        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit ");
                serial_no = e.target.id;

                if (confirm("Are you sure you want to delete this note!")) {
                    console.log("yes");
                    window.location = `/feedback/3_delete.php?delete=${serial_no}`;
                    // TODO: Create a form and use post request to submit a form
                }
                else {
                    console.log("no");
                }
            })
        })
    </script>

</body>

</html>
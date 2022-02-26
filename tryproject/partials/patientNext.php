<?php
include 'connection.php';?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
  <!-- <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script> -->
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
    });
  </script>
  <title>Admin</title>
</head>

<body>



  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/tryProject/index.php">Blood Bank</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active me-2" aria-current="page" href="/tryProject/index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin_patient.php">Patient</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin_donor.php">Donor</a>
          </li>
        </ul>
      </div>
    </div>

  </nav>
  <h1 class="text-center" style="text-decoration: underline;">Your Details</h1>
  <div class="container">
    <table class="table table-dark table-striped" id="myTable">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Disease</th>
          <th scope="col">Age</th>
          <th scope="col">Blood Group</th>
          <th scope="col">Unit</th>
          <th scope="col">Status</th>

        </tr>
      </thead>
      <tbody>

       <?php
$email=$_GET['email'];
$sql = "Select * from `patient` where `patient`.`email`='$email'";
$result = mysqli_query($conn, $sql);


while ($row = mysqli_fetch_assoc($result)) {
  

  echo "
<tr>

<td>" . $row['patient_name'] . "</td>
<td>" . $row['email'] . "</td>
<td>" . $row['patient_disease'] . "</td>
<td>" . $row['patient_age'] . "</td>
<td>" . $row['patient_bloodgroup'] . "</td>
<td>" . $row['patient_unit'] . "</td>
<td>" . $row['p_status'] . "</td>";}
?>




      </tbody>
    </table>
  </div>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->


</body>

</html>
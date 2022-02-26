<?php include 'connection.php'; ?>

<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){

  $pname = $_POST['pname'];
  $pdis = $_POST['pdisease'];
  $page = $_POST['page'];
  $pblood = $_POST['pblood'];
  $punit = $_POST['punit'];
  $email=$_POST['email'];
  $status= "Pending";
  $sql = "INSERT INTO `patient` (`patient_name`,`email`, `patient_disease`, `patient_age`, `patient_unit`, `patient_bloodgroup`, `p_status`) VALUES ('$pname','$email', '$pdis', '$page', '$punit' , '$pblood' ,'$status')";
  $result = mysqli_query($conn, $sql);
  if ($result) {
  //  session_start();
  //  $_SESSION['pemail']=$email;
  // <a href="/tryProject/partials/patientNext.php?email=$email;"
  header("Location: /tryProject/partials/patientNext.php?email=$email");
  } 
  else
   {
     echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
    <strong>Something went wrong</strong> Please try Again.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>';
   }
  }
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Patient</title>
</head>

<style>
  #bg::before{
    content: "";
    margin: auto;
    position: absolute;
    background: url("../img/donor.jpeg") no-repeat center center/cover;
    height: 750px;
    width: 1350px;
    opacity: 1;
    z-index: -1;

  }
  .container{
    background-color: #f69898;
  }
</style>

<body>
  <div id="bg">
  <?php
  include 'header.php'; ?>


  <div class="container my-4 " style="border: 2px solid black; width:41%; ">
    <h1 class="text-center  my-2">Blood Requirement</h1>

    <form action='/tryProject/partials/patient.php' method="post">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Patient Name</label>
        <input type="text" class="form-control" id="pname" name="pname" aria-describedby="emailHelp">

        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Disease</label>
          <input type="text" class="form-control" id="pdisease" name="pdisease">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Age</label>
          <input type="number" class="form-control" id="page" name="page">
        </div>
        <div class="mb-3">
          <div class="dropdown">
            <tr>
              <td>
                <font size="6">Blood Group:</font>
              </td>
              <td><select name="pblood" id="pblood">
                  <option>O+</option>
                  <option>A+</option>
                  <option>B+</option>
                  <option>AB+</option>
                  <option>O-</option>
                  <option>A-</option>
                  <option>B-</option>
                  <option>AB-</option>
                </select></td>
            </tr>
          </div>


        </div>

        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Unit</label>
          <input type="number" class="form-control" id="punit" name="punit">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </div>
</body>

</html>


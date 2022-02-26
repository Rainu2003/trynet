<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Donor</title>
</head>
<style>
  #bg::before{
    content: "";
    margin: auto;
    position: absolute;
    background: url("../img/donor.jpeg") no-repeat center center/cover;
    height: 650px;
    width: 1370px;
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
    <h1 class="text-center  my-2">Blood Donation</h1>

    <form action='/tryProject/partials/donor.php' method="post">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Donor Name</label>
        <input type="text" class="form-control" id="dname" name="dname" aria-describedby="emailHelp">

        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Disease</label>
          <input type="text" class="form-control" id="ddisease" name="ddisease">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Age</label>
          <input type="number" class="form-control" id="dage" name="dage">
        </div>
        <div class="mb-3">
          <div class="dropdown">
            <tr>
              <td>
                <font size="6">Blood Group:</font>
              </td>
              <td><select name="dblood" id="dblood">
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
          <input type="number" class="form-control" id="dunit" name="dunit">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </div>
</body>

</html>

<?php include 'connection.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $dname = $_POST['dname'];
  $ddis = $_POST['ddisease'];
  $dage = $_POST['dage'];
  $dblood = $_POST['dblood'];
  $dunit = $_POST['dunit'];
  $changing_unit=$dunit;
  $sql = "INSERT INTO `donor` (`donor_name`, `donor_disease`, `donor_age`, `donor_unit`,`changing_unit`, `donor_bloodgroup`) VALUES ('$dname', '$ddis', '$dage', '$dunit' ,'$changing_unit', '$dblood')";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Thank you for Donating Blood!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>';
    
  } else {
     echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
    <strong>Something went wrong</strong> You should check in on some of those fields above.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>';
  }
}
?>

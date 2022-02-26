<?php include 'connection.php'; ?>
<?php
$approved = false;
$delete = false;
// if(isset($_GET['delete'])){
//   $sno = $_GET['delete'];
//   $delete = true;

//   $sql="DELETE FROM `patient` WHERE `patient`.`sno` = '$sno'";
//   $result = mysqli_query($conn, $sql);
// }
if (isset($_GET['delete'])) {
  $email = $_GET['delete'];
  $approved = true;
  // $status="Approved";
  $sql = "UPDATE `patient` SET `p_status` = 'Reject'  WHERE `patient`.`email` = '$email'";
  // $sql="UPDATE `patient` SET `p_status` = 'Approved' WHERE `patient`.`email` = 'adiit@546';";
  $result = mysqli_query($conn, $sql);
}


elseif (isset($_GET['approve'])) {
  $email = $_GET['approve'];
  $approved = true;
  $status = "Approved";


  $sql10="SELECT * FROM `patient` WHERE `patient`.`email` = '$email'";
  $result10 = mysqli_query($conn, $sql10);
  $row10 = mysqli_fetch_assoc($result10);              
  $status = $row10['p_status'];

  if($status=='Approved'){
    echo '<div class="alert alert-warning" role="alert">
    This is Already Approved;
     </div>';  }
  else{
  $sql = "UPDATE `patient` SET `p_status` = 'Approved'  WHERE `patient`.`email` = '$email'";
  $result = mysqli_query($conn, $sql);
  $sql1= "Select * from `patient` where `patient`.`email` = '$email'";
  $result1=mysqli_query($conn, $sql1);
  $row = mysqli_fetch_assoc($result1);
     $p_unit = $row['patient_unit'];    
     $bgroup = $row['patient_bloodgroup'];
     
     



     while($p_unit>0){
      static $num=0;
  $sql2 = "SELECT * FROM `donor` WHERE donor_bloodgroup='$bgroup' AND sno>'$num'";
  $result2 = mysqli_query($conn, $sql2);
  $row2 = mysqli_fetch_assoc($result2);              
  $d_unit = $row2['changing_unit'];
  
  $num = $row2['sno'];   
                  
     
      //  echo $d_unit;
      $sql8="SELECT SUM(changing_unit) AS count FROM donor WHERE donor_bloodgroup='$bgroup'";
      $result8=mysqli_query($conn, $sql8);
      $row8=mysqli_fetch_assoc($result8);
      $kunit=$row8['count'];
      if($kunit<$p_unit){
        echo '<div class="alert alert-warning" role="alert">
        Sorry, WE HAVE NOT ENOUGH BLOOD but we give you '.$kunit.' Unit Blood   
        exit();   
           </div>';  
      
      }


       if($d_unit<=$p_unit){
         
          $p_unit=$p_unit-$d_unit;
          $d_unit=0;       
          //  $f_blood = $d_unit - $p_unit;
          $sql3 = "UPDATE `donor` SET `changing_unit` = '$d_unit'  WHERE `donor`.`sno` = '$num'";  
          $result=mysqli_query($conn, $sql3);
        }
        else{
           
           $d_unit=$d_unit- $p_unit;
            $p_unit=0;
          
          
          $sql3 = "UPDATE `donor` SET `changing_unit` = '$d_unit'  WHERE `donor`.`sno` = '$num'";    
          $result=mysqli_query($conn, $sql3);
        }
  }

  echo '<div class="alert alert-warning" role="alert">
        Successfully Approved;
  </div>';
  //   $sql3="SELECT SUM(donor_unit) AS count FROM donor WHERE donor_bloodgroup='$bgroup'";
  //   $result3=mysqli_query($conn, $sql3);
  //   $row3=mysqli_fetch_assoc($result3);
  //   $tunit=$row3['count'];     //
  //   $funit=$tunit-$p_unit;
    
  // header("Location: /tryProject/partials/admin.php?funit=$funit&group=$bgroup");

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
  <link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
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
  <h1 class="text-center" style="text-decoration: underline;">Patient Details</h1>
  <div class="container">
    <table class="table table-dark table-striped" id="myTable">
      <thead>
        <tr>
          <th scope="col">S.No</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Disease</th>
          <th scope="col">Age</th>
          <th scope="col">Blood Group</th>
          <th scope="col">Unit</th>
          <th scope="col">Status</th>

          <th scope="col">Action</th>

        </tr>
      </thead>
      <tbody>

       <?php

        $sql = "Select * from `patient`";
        $result = mysqli_query($conn, $sql);
        $sno = 0;

        while ($row = mysqli_fetch_assoc($result)) {
          $sno = $sno + 1;

          echo "
      <tr>
      <th scope='row'>" . $sno . "</th>
      <td>" . $row['patient_name'] . "</td>
      <td>" . $row['email'] . "</td>
      <td>" . $row['patient_disease'] . "</td>
      <td>" . $row['patient_age'] . "</td>
      <td>" . $row['patient_bloodgroup'] . "</td>
      <td>" . $row['patient_unit'] . "</td>
      <td>" . $row['p_status'] . "</td>

      <td><button class='approve btn btn-sm btn-danger' id=" . $row['sno'] . ">Approve</button> <button class='delete btn btn-sm btn-danger' id=" . $row['sno'] . ">Reject</button></td> 
      </tr>";
        }
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


  <script>
    approved = document.getElementsByClassName('approve');
    Array.from(approved).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("approve", e.target.parentNode.parentNode);
        tr = e.target.parentNode.parentNode;

        email = tr.getElementsByTagName("td")[1].innerText;
        

        if (confirm("Are you sure you want to Approved this Request!")) {
          console.log("yes");
          window.location = `/tryProject/partials/admin_patient.php?approve=${email}`;
          // window.location = `/tryProject/partials/admin_patient.php?bgroup=${group}`;
          // window.location = `/tryProject/partials/admin_patient.php?p_unit=${p_unit}`;

        } else {
          console.log("no");
        }
      })

    })


    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("delete");
        tr = e.target.parentNode.parentNode;
        // sno = e.target.id;
        email = tr.getElementsByTagName("td")[1].innerText;


        if (confirm("Are you sure you want to Reject this Request!")) {
          console.log("yes");
          window.location = `/tryProject/partials/admin_patient.php?delete=${email}`;

        } else {
          console.log("no");
        }
      })
    })
  </script>
</body>

</html>
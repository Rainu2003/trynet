
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
      .box10{
        border: 2px solid black;
        margin: 12px;
        display: inline-block;
        width: 22%;
        box-sizing: border-box;
      }
      .last{
        padding-left: 105px;
        padding-bottom: 20px;
      }
      .conj{
        float: right;
        padding-right: 36px;
      }
      .yo{
        padding-left: 95px;
        padding-bottom: 20px;
      }
      .box9{
        border: 2px solid black;
        margin: 8px;
        display: inline-block;
        width: 23.3%;
        box-sizing: border-box;
      }
    </style>
    <title>Admin</title>
  </head>
  <body>
    <div class="bg">

               
      <?php
       include 'connection.php';             
       ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand mx-2" href="/tryProject/index.php">Blood Bank</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active me-2" aria-current="page" href="/tryProject/partials/admin.php">Home</a>
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

<h2 class="text-center">Blood Bank Details</h2>
<div class="yo">
  
<?php
  // session_start();
     $sql= "SELECT * FROM `catogeries` ";
     $result=mysqli_query($conn, $sql);
     while($row=mysqli_fetch_assoc($result)){
         $bgroup=$row['blood_group'];
         

         $sql1="SELECT SUM(changing_unit) AS count FROM donor WHERE `donor_bloodgroup`='$bgroup'";
         $result1=mysqli_query($conn, $sql1);
         $row1=mysqli_fetch_assoc($result1);
         $bunit=$row1['count'];
         
         
        
         echo'<div class="box9">

         <div class="con">
         <img src="/tryProject/img/bloodDrop.jpg"  alt="..."> 
         <h1 class="conj">'.$bgroup.'</h1>
         <h1 class="conj">Unit:' .$bunit. '</h1>
         </div>
         </div>';
         
     
        }
        ?>
</div>

<div class="last">
        <?php
        $sql="Select * from `patient`";
        $result=mysqli_query($conn, $sql);
        $sno=0;

        while($row=mysqli_fetch_assoc($result)){
        $sno=$sno+1;
        }
        echo
        '<div class="box10">
          <h1 style="font-weight: 320;" >Total_Patient :-
          '.$sno.'</h1>
        </div>';


        $sql1="Select * from `donor`";
        $result1=mysqli_query($conn, $sql1);
        $sno1=0;
        
        while($row=mysqli_fetch_assoc($result1)){
          $sno1=$sno1+1;}
          echo'      
        <div class="box10">
        <h1 style="font-weight: 320;"> Total_Donor :- '.$sno1.'</h1>
        </div>';
        
                 $sql2="SELECT SUM(changing_unit) AS count FROM donor";
                 $result2=mysqli_query($conn, $sql2);
                 $row2=mysqli_fetch_assoc($result2);
                 $dunit=$row2['count'];
        
                 $sql3="SELECT SUM(patient_unit) AS count FROM patient WHERE p_status='Pending'";
                 $result3=mysqli_query($conn, $sql3);
                 $row3=mysqli_fetch_assoc($result3);
                 $punit=$row3['count'];

                //  $sql4="SELECT SUM(patient_unit) AS count FROM patient WHERE p_status='Approved'";
                //  $result4=mysqli_query($conn, $sql4);
                //  $row4=mysqli_fetch_assoc($result4);
                //  $Aunit=$row4['count'];
            
                //  $b_available = $dunit-$Aunit;
               
                 echo '
                         <div class="box10">
                            <h1 style="font-weight: 320;">Blood_Required: '.$punit.' Unit</h1>
                       </div>
                
                    
                    <div class="box10">
                        <h1 style="font-weight: 320;">Blood_Available:  '.$dunit.' Unit</h1>
                </div>';
                
            
        ?>

</div>

        
 
         
        
  <!-- class="col-md-4">
       <div class="card" style="width: 18rem;">
       <img s<div class="container my-3" id="ques">
       <div class="row my-3">
        fetch all the categories and use a loop for iterate  --> 
<!-- </div>
</div>  -->
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
  <h5 class="card-title"><a href="threads.php?catid='. $bgroup .'">'. $bunit .'</a></h5>
  <div class="card-body">
  <a href="threads.php?catid='. $bgroup .'" class="btn btn-primary">View Threads</a>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  //  <p class="card-text">'. substr($desc, 0, 90) .'...</p>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    </div>
  </body>
</html>




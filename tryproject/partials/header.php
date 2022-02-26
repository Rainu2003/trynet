<?php
session_start();

include "loginModal.php";
include "signupModal.php";


echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid d-flex">
<img src="/tryProject/img/start.jpg" alt=".." width="45" height="45">
  <a class="navbar-brand" href="/forum">Blood Bank</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/tryProject">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/tryProject/partials/about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="/tryProject/partials/contact.php">Contact</a>
      </li>
    </ul>
    // <div class="row mx-2">
    // </div>';

    if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true)
{
  echo '<form class="d-flex" action="search.php" method="get">
 
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item d-flex">
      <img src="/tryProject/img/donor1.jpeg" alt=".." width="45" height="45">
        <a class="nav-link active" aria-current="page" href="/tryProject/partials/donor.php">Donor</a>
      </li>
      <li class="nav-item d-flex" >
        <img src="/tryProject/img/patient.jpeg" alt=".." width="45" height="45">
        <a class="nav-link active" href="/tryProject/partials/patient.php">Patient</a>
      </li>
      <li class="nav-item d-flex">
      <img src="/tryProject/img/admin.jpeg" alt=".." width="45" height="45">

        <a class="nav-link active" href="/tryProject/partials/adminModal.php">Admin</a>
      </li>
    </ul>
  <p class="text-light my-0 mx-3">Welcome '. $_SESSION['useremail'].'</p>
  <a href="/tryProject/partials/logout.php" class="btn btn-outline-success ml-2">Logout</a>

  </form>';
}
else{


    echo '

        <button class="btn btn-outline-success ml-2"  data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
        <button class="btn btn-outline-success mx-2"  data-bs-toggle="modal" data-bs-target="#signupModal">SignUp</button>';
}

        echo'</div>
    </div>
</nav>';


if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
 <strong>Success!</strong> You can login now.
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}


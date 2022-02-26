<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Signup for an iDiscuss</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/tryProject/partials/handlesignup.php" method="post">
      <!-- <form action="/tryProject/index.php" method="post"> -->

<div class="modal-body">
<div class="mb-3">
<label for="exampleInputEmail1" class="form-label">Username</label>
<input type="text" class="form-control" id="signupemail" name="signupemail" aria-describedby="emailHelp">
 
  </div> 
<div class="mb-3">
<label for="exampleInputPassword1" class="form-label">Password</label>
<input type="password" class="form-control" id="password1" name="password">
</div>
<div class="mb-3">
<label for="exampleInputPassword1" class="form-label">Confirm Password</label>
<input type="password" class="form-control" id="cpassword1" name="cpassword">
</div>
<button type="submit" class="btn btn-primary">Sign up</button>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
</div>
</form>
</div>
</div>
</div>
  







<!-- <div class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->
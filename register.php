
<?php
include_once "views/header.php";
?>
  
  <body>
  <div class ="container-fluid d-flex d-sm-inline-flex min-vh-100 justify-content-center align-items-center">
    <div class="card col-md-4 text-center">
      <div class="card-body">
      <img class="mb-4 mt-3" src="public/images/android-chrome-512x512.png" alt="" width="156" height="156">
        <h1 class="h3 mb-4 font-weight-normal">Sign up to Tax Help</h1>
        <form class="form-signin" action="/html/check-register.php" method="POST"
          oninput='password2.setCustomValidity(password.value != password2.value ? "Passwords do not match." : "")'>
          <input type="text" name="firstName" class="form-control top" placeholder="First Name" required autofocus>
          <input type="text" name="lastName" class="form-control bottom" placeholder="Last Name" required>
          <input type="email" name ="email" class="form-control top" placeholder="Email address" required>
          <input type="password" name="password" class="form-control middle" placeholder="Password" required>
          <input type="password" name ="password2" class="form-control bottom" placeholder="Repeat Password" required>
          <?php
		  if (isset($_GET['error'])){
            if($_GET['error'] == 1){
              echo "
              <div class='d-grid gap-2 d-sm-flex justify-content-sm-center'>
              <img class='' src='public/images/error.png' width='20' height='20'>
                    <p style='color:red'>Account with that email already exists.</p>
              </div>
               ";
			}
		  }
            ?>
          <button class="btn btn-lg btn-primary btn-block m-3 " type="submit">Sign Me Up!</button>
          <p class="text-muted">&copy; Tax Help.</p>
        </form>
      </div>
    </div>
  </div>
  </body>
</html>
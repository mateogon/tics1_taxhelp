
<?php
include_once "views/header.php";
?>
  
  <body>
    <div class ="container-fluid d-flex d-sm-inline-flex min-vh-100 justify-content-center align-items-center">
      <div class="card col-md-4 text-center">
        <div class="card-body m-4">
          <form class="form-signin" action="/html/check-login.php" method="post" >
            
            <img class="mb-3" src="public/images/android-chrome-512x512.png" alt="" width="156" height="156">
            <h1 class="h3 mb-4 font-weight-normal">Log in</h1>
            <div class="w-100">
            <input id = "inputEmail" type="email" name ="email" class="form-control top" placeholder="Email address" required>
            <input id = "inputPassword" type="password" name="password" class="form-control bottom" placeholder="Password" required>
            </div>
            <?php
			if (isset($_GET['error'])){
            if($_GET['error'] == "2"){
              echo "
              <div class='d-grid gap-2 d-sm-flex justify-content-sm-center'>
              <img class='' src='public/images/error.png' width='20' height='20'>
                    <p style='color:red'>Email not registered.</p>
              </div>
               ";
            } else if($_GET['error'] == "1"){
              echo "
              <div class='d-grid gap-2 d-sm-flex justify-content-sm-center'>
              <img class='' src='public/images/error.png' width='20' height='20'>
                    <p style='color:red'>Wrong password.</p>
              </div>
               ";
            }
			}
            ?>
			<!-- <button class="btn btn-lg btn-primary btn-block mt-3" type= "submit">Enter old</button> -->
            
            <a class="btn btn-lg btn-primary btn-block mt-3" href= "" onclick= "login()">Enter</a>
          </form>
        </div>
        <div class="card-footer">
          <p class="mt-4 mb-1 text-muted">&copy; Tax Help.</p>
        </div>
      </div>
    </div>
    </body>
</html>

<script>

$(".delete-post").click(function(event){
    console.log("delete post");
});

function login(){
    $.ajax({
        url: "/html/apiv1.php/user/login",
        dataType: "json",
        type: 'POST',
        data: {'email' : $("#inputEmail").val(), 'password': $("#inputPassword").val()},
        context: document.body
    }).done(function( data ){
      if (data.status){
		location.href ="/html/cotizar.php";
      }else{
		 console.log(data)
        location.href = "/html/login.php?error="+data.error_code.toString();
      }
    });

    };

</script>
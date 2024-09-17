<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
	<title>Login Account</title>
	<link rel="icon" href="../../assets/img/logo/faf1.png">
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="../../assets/css/bootstrap.min.css" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="../../assets/css/form.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center fadeInDown h-100">
		<div class="card">
			<div class="card-header">
				<h1>LOGIN ADMIN</h1>
			</div>
			<div class="card-body">
				<form action="./cek-login.php" method="post">
					<div class="input-group form-group fadeIn second custom-class-border-bottom">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name="username" class="form-control" placeholder="Username">
						
					</div>
					<div class="input-group form-group fadeIn third mt-4 custom-class-border-bottom">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="pass" class="form-control form-password" placeholder="Password">
					</div>
					<div class="row align-items-center remember py-3">
						<input type="checkbox" class="form-checkbox">Show Password
					</div>
					<div class="form-group row justify-content-center">
						<button type="submit" name="login" class="btn2">Login</button>
					</div>
				</form>
			</div>
			<div class="card-footer links">
				<div class="d-flex justify-content-center">
					<a class="mx-1" href="../../">Home</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>

<script type="text/javascript">
  $(document).ready(function() {
    $('.form-checkbox').click(function() {
      if ($(this).is(':checked')) {
        $('.form-password').attr('type', 'text');
      } else {
        $('.form-password').attr('type', 'password');
      }
    });
  });
</script>
</html>
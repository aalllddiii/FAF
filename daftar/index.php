
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
	<title>Sign Up Account</title>
	<link rel="icon" href="../assets/img/logo/faf1.png">
   <!--Made with love by Mutiullah Samim -->
   <!--BOOTSTRAP 4 CDN-->
   <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="../assets/css/form.css">

</head>
<body>
	<div class="container">
		<div class="d-flex justify-content-center fadeInDown">
			<div class="card card-daftar">
				<div class="card-header">
					<h1>DAFTAR</h1>
				</div>
				<div class="card-body">
					<form action="./simpan.php" method="post">
						<div class="fadeIn second">

							<div class="input-group form-group custom-class-border-bottom">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-trophy"></i></span>
								</div>
	                    	    <select name="lomba" class="form-control" required>
									<option value="">Kategori Lomba</option>
									<option value="Comic Strip">Comic Strip</option>
									<option value="Solo Vocal">Solo Vocal</option>
									<option value="Acoustic">Acoustic</option>
									<option value="Dance Cover">Dance Cover</option>
	                    	    </select>
							</div>

							<div class="input-group form-group mb-0 custom-class-border-bottom">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-users"></i></span>
								</div>
								<input type="text" name="nama_tim" class="form-control" placeholder="Nama Tim *" required>
							</div>

							<small>* Jika mengikuti lomba solo vocal dan comic strip, harap diisi dengan tanda -</small>

							<div class="input-group form-group mt-3 custom-class-border-bottom">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-university"></i></span>
								</div>
								<input type="text" name="instansi" class="form-control" placeholder="Instansi" required>
							</div>

							<div class="input-group form-group custom-class-border-bottom">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-user-cog"></i></span>
								</div>
								<input type="text" name="nama_k" class="form-control" placeholder="Nama Lengkap **" required>
							</div>
							<div class="input-group form-group custom-class-border-bottom">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-code-branch"></i></span>
								</div>
								<input type="text" name="npm_k" class="form-control" placeholder="NPM/NIM/NIS **" required>
							</div>
						</div>

						<div class="fadeIn third">

							<div class="input-group form-group custom-class-border-bottom">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-at"></i></span>
								</div>
								<input type="email" name="email_k" class="form-control" placeholder="E-mail **" required>
							</div>

							<div class="input-group form-group custom-class-border-bottom">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-key"></i></span>
								</div>
								<input type="password" name="pass" class="form-control form-password" placeholder="Password" required>
	                    	</div>

	                    	<div class="input-group form-group custom-class-border-bottom">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-phone"></i></span>
								</div>
								<input type="text" name="nohp_k" class="form-control" placeholder="No. Handphone **" required>
							</div>

	                    	<div class="input-group form-group custom-class-border-bottom">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fab fa-line"></i></span>
								</div>
								<input type="text" name="idline_k" class="form-control" placeholder="ID Line **" required>
							</div>
							
						</div>
						<h6>Note:</h6>
						<small>** Masukan identitas ketua jika memilih lomba tim</small>

						<div class="form-group row justify-content-center mt-5">
							<button type="submit" name="daftar" class="btn2">Daftar</button>
						</div>
					</form>
				</div>
				<div class="card-footer links">
					<div class="d-flex justify-content-center">
						I have an account
					</div>
					<div class="d-flex justify-content-center">
	                <a class="mx-1" href="../login/">Login</a> | <a class="mx-1" href="../">Back</a>
					</div>
	            </div>
			</div>
		</div>
	</div>


<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/vendor/jquery/js/jquery.min.js"></script>
</body>

</html>
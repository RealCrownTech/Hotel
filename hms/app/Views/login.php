<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="The Ashokas Hotel">
	<meta name="author" content="Ashokas">

	<title>User Login</title>

	<link rel="canonical" href="" />
	<link rel="shortcut icon" href="public/assets/img/logo.png">

	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

	<!-- Choose your prefered color scheme -->
	<link href="public/assets/css/light.css" rel="stylesheet">
</head>

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky" style="background-image: url(public/assets/img/photos/login_bg.jpg); background-size: cover;">
	<div class="main d-flex justify-content-center w-100">
		<main class="content d-flex p-0">
			<div class="container d-flex flex-column">
				<div class="row h-100">
					<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
						<div class="d-table-cell align-middle">							

							<div class="text-center mt-4">
								<h1 class="h2">Welcome back, Ashokas</h1>
								<p class="lead">
									Sign in to your account to continue
								</p>
							</div>

							<div class="card" style="opacity: 0.8;">
								<div class="card-body">
									<div class="m-sm-4">
										<div class="text-center">
											<img src="public/assets/img/avatars/avatar.png" alt="The Ashokas" class="img-fluid rounded-circle" width="132" height="132" />
										</div>
										<?= form_open(); ?>
											<div class="mb-3">
												<label class="form-label">Username</label>
												<input class="form-control form-control-lg" type="text" name="email" placeholder="Enter your username" />
											</div>
											<div class="mb-3">
												<label class="form-label">Password</label>
												<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" />
												<small>
							            <a href="pages-reset-password.html">Forgot password?</a>
							          </small>
											</div>
											<div>
												<div class="form-check align-items-center">
													<input id="customControlInline" type="checkbox" class="form-check-input" value="remember-me" name="remember-me" checked>
													<label class="form-check-label text-small" for="customControlInline">Remember me next time</label>
												</div>
											</div>
											<div class="text-center mt-3">
												<a href="home" class="btn btn-lg btn-primary">Sign in</a>
											</div>
										<?= form_close(); ?>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</main>
	</div>

	<script src="public/assets/js/app.js"></script>

</body>

</html>
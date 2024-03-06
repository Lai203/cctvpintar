<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-7 mx-auto">
			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<div class="row">
						<div class="col-lg">
							<div class="p-5">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Login Page</h1>
									<div class="col-lg-7">
										<img class="img-fluid rounded mb-4 mb-lg-0" src="<?= base_url('assets/img/rc-logo.png'); ?>" alt="Logo" />
									</div>
								</div>

								<?= $this->session->flashdata('message'); ?>

								<form class="user" method="post" action="<?= base_url('login'); ?>">
									<div class="form-group">
										<input type="text" class="form-control form-control-user mb-2" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
										<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<div class="form-group">
										<input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
										<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<div class="text-center">
										<button type="submit" class="btn btn-primary btn-user text-center mt-2">
											Login
										</button>
									</div>
									<div class="text-center">
										<a class="small" href="forgot-password.html">Forgot Password?</a>
									</div>
									<div class="text-center">
										<a class="small" href="<?= base_url('auth/registration'); ?>">Create an Account!</a>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
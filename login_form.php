
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="for_logi_form">					
						<section id="login">
							<div class="container">
								<div class="row">
									<div class="col-xs-12">
										<div class="form-wrap">
										<h1>Log in with your email account</h1>
										<div class="alert alert-danger alert-dismissable" ng-show="error.length > 0">
                                        <i class="fa fa-ban"></i>
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                        <b>Alert!</b>{{ error }}
                                    </div>
									
									<div class="alert alert-success alert-dismissable" ng-show="success.length > 0">
                                        <i class="fa fa-ban"></i>
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                        <b>Wow!</b>{{ success }}
                                    </div>
											<form role="form" name="myForm" ng-submit="submitForm(form)" method="post" id="login-form" novalidate autocomplete="off">
												<div class="form-group">
													<label for="email" class="sr-only">Email</label>
													<input type="email" name="email" id="email" ng-model="form.email" required class="form-control" placeholder="somebody@example.com">
												    <span style="color:red" ng-show="myForm.email.$dirty && myForm.email.$invalid">
													<span ng-show="myForm.email.$error.required">Email is required.</span>
													<span ng-show="myForm.email.$error.email">Invalid email address.</span>
													</span>
												</div>
												<div class="form-group">
													<label for="key" class="sr-only">Password</label>
													<input type="password" name="password" id="key" class="form-control" name="password" ng-model="form.password" required placeholder="Password">
												    <span style="color:red" ng-show="myForm.password.$dirty && myForm.password.$invalid">
										  <span ng-show="myForm.password.$error.required">Password is required.</span>
										  </span>
												</div>
												 <div class="checkbox">
													<span class="character-checkbox" onClick="showPassword()"></span>
													<span class="label">Show password</span>
												</div>

												<input type="submit" ng-disabled="myForm.$invalid" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Log in">
											</form>
											<a href="javascript:;" class="forget" data-toggle="modal" data-target=".forget-modal">Forgot your password?</a>
											<hr>
										</div>
									</div> <!-- /.col-xs-12 -->
								</div> <!-- /.row -->
							</div> <!-- /.container -->
						</section>
					</div>
				</div>
			</div>			
		</div>

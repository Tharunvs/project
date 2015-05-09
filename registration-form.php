<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="for_logi_form">					
						<section id="sign-up_form">
    <div class="container">
    	<div class="row">
    	    <div class="col-xs-12">
        	    <div class="form-wrap">
                <h1>Registration with your email account</h1>
				<div class="alert alert-danger alert-dismissable" ng-show="error.length > 0">
					<i class="fa fa-ban"></i>
					<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
					<b>Alert!</b>{{ error }}
				</div>
                    <form role="form" method="post" name="myForm" ng-submit="signupForm(form)" id="sign-up-form" novalidate autocomplete="off">
                        <div class="col-md-6">
						<div class="form-group">
                            <label for="name" class="sr-only">Name</label>
                            <input type="text" name="name" ng-model="form.user_name" required class="form-control" placeholder="Enter Your Name">
                            <span style="color:red" ng-show="myForm.name.$dirty && myForm.name.$invalid">
						  <span ng-show="myForm.name.$error.required">Name is required.</span>
						  </span>
						</div>
						</div>
						
						
						<div class="col-md-6">
						<div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" ng-model="form.user_email" required class="form-control" placeholder="Enter Your Email">
                            <span style="color:red" ng-show="myForm.email.$dirty && myForm.email.$invalid">
							<span ng-show="myForm.email.$error.required">Email is required.</span>
							<span ng-show="myForm.email.$error.email">Invalid email address.</span>
							</span>
						</div>
						</div>
						<div class="col-md-6">
						<div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" ng-model="form.user_password" required class="form-control" placeholder="Password">
                            <span style="color:red" ng-show="myForm.password.$dirty && myForm.password.$invalid">
						  <span ng-show="myForm.password.$error.required">Password is required.</span>
						  </span>
						</div>
						</div>
						<div class="col-md-6">
						<div class="form-group">
                            <label for="phone" class="sr-only">Phone</label>
							
                            <input type="text" name="phone" class="form-control" ng-model="form.user_phone" ng-pattern="/^(\d{10,12})$/" required placeholder="Phone Number">
                             <span style="color:red" ng-show="myForm.phone.$dirty && myForm.phone.$invalid">
						  <span ng-show="myForm.phone.$error.required">Phone Number is required.</span>
						  <span ng-show="myForm.phone.$error.pattern">Invalid Phone Number.</span>
						  </span>
						</div>
						</div>
						<div class="col-md-6">
                        <div class="form-group">
                            <label for="address" class="sr-only">Address</label>
                            <input type="text" name="address" class="form-control" ng-model="form.user_address" required placeholder="Address">
                            <span style="color:red" ng-show="myForm.address.$dirty && myForm.address.$invalid">
						  <span ng-show="myForm.address.$error.required">Address is required.</span>
						  </span>
						</div>
                        </div>
						
						<div class="col-md-6">
                        <div class="form-group">
                            <label for="city" class="sr-only">City</label>
                            <input type="text" name="city" class="form-control" ng-model="form.user_city" ng-pattern="/^([a-zA-Z' ]+)$/" required placeholder="City">
                            <span style="color:red" ng-show="myForm.city.$dirty && myForm.city.$invalid">
						  <span ng-show="myForm.city.$error.required">City Name is required.</span>
						  <span ng-show="myForm.city.$error.pattern">Invalid City Name.</span>
						  </span>
						</div>
                        </div>
						
						<div class="col-md-6">
                        <div class="form-group">
                            <label for="address" class="sr-only">State</label>
                            <input type="text" name="state" class="form-control" ng-model="form.user_state" ng-pattern="/^([a-zA-Z' ]+)$/" required placeholder="State">
                            <span style="color:red" ng-show="myForm.state.$dirty && myForm.state.$invalid">
						  <span ng-show="myForm.state.$error.required">State is required.</span>
						  <span ng-show="myForm.state.$error.pattern">Invalid State Name.</span>
						  </span>
						</div>
                        </div>
						
						<div class="col-md-6">
                        <div class="form-group">
                            <label for="address" class="sr-only">Zipcode</label>
                            <input type="text" name="zipcode" class="form-control" ng-model="form.user_zipcode" ng-pattern="/^(\d{6}-\d{5}|\d{5})$/" required placeholder="Zipcode">
                            <span style="color:red" ng-show="myForm.zipcode.$dirty && myForm.zipcode.$invalid">
						  <span ng-show="myForm.zipcode.$error.required">Address is required.</span>
						  <span ng-show="myForm.zipcode.$error.pattern">Invalid Zipcode.</span>
						  </span>
						</div>
                        </div>
						
						<div class="col-md-12">
						
                        <input type="submit" ng-disabled="myForm.$invalid" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Sign up">
                        </div>
					</form>
                    
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
	
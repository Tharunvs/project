<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="for_logi_form">					
						<section id="sign-up_form">
    <div class="container">
    	<div class="row">
    	    <div class="col-xs-12">
        	    <div class="form-wrap">
                <h1>Change Password form</h1>
				<div class="alert alert-danger alert-dismissable" ng-show="error.length > 0">
					<i class="fa fa-ban"></i>
					<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
					<b>Alert!</b>{{ error }}
				</div>
				<div class="alert alert-success alert-dismissable" ng-show="success.length > 0">
					<i class="fa fa-ban"></i>
					<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
					<b>Alert!</b>{{ success }}
				</div>
                    <form role="form" method="post" name="myForm" ng-submit="changeForm(form)" id="sign-up-form" novalidate autocomplete="off">
                        
						<div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" ng-model="form.email" required class="form-control" placeholder="Enter Your Address">
                            <span style="color:red" ng-show="myForm.email.$dirty && myForm.email.$invalid">
							<span ng-show="myForm.email.$error.required">Email is required.</span>
							<span ng-show="myForm.email.$error.email">Invalid email address.</span>
							</span>
						</div>
						<div class="form-group">
                            <label for="password" class="sr-only">Old Password</label>
                            <input type="password" name="oldpassword" ng-model="form.oldpassword" required class="form-control" placeholder="Password">
                            <span style="color:red" ng-show="myForm.oldpassword.$dirty && myForm.oldpassword.$invalid">
						  <span ng-show="myForm.oldpassword.$error.required">Old Password is required.</span>
						  </span>
						</div>
						
						<div class="form-group">
                            <label for="password" class="sr-only">New Password</label>
                            <input type="password" name="newpassword" ng-model="form.newpassword" required class="form-control" placeholder="Password">
                            <span style="color:red" ng-show="myForm.newpassword.$dirty && myForm.newpassword.$invalid">
						  <span ng-show="myForm.newpassword.$error.required">New Password is required.</span>
						  </span>
						</div>

                        
                        <input type="submit" ng-disabled="myForm.$invalid" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Sign up">
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
	
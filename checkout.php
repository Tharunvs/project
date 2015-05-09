
  <div class="container" ng-init="mycartlist()">
    <div class="alert alert-success" ng-show="success.length > 0">{{ success }}</div>
    <div class="row" ng-show="totalItems > 0">
		
		<div class="col-md-8">
			<div class="my_cart_box" >
				<div class="fnl_payment_head">
					<h1>Checkout</h1>
					
				</div>
				<div class="mycart-header">
					<div class="check-prodct-no">S.No</div>
					<div class="check-prodct-Name">Product Namae</div>
					<div class="check-prodct-price">Price</div>
					<div class="check-prodct-price">Qnt</div>
									</div>
				<div class="mycart-detail" ng-repeat="data in list">
					<div class="check-prodct-no">{{ $index + 1 }}</div>
					<div class="check-prodct-Name">
						<div class="crt_pro_left"><img height="50px" width="50px" ng-src="admin/upload/{{mySplit(data.product_image,0)}}"></div>
						<div class="crt_pro_right">{{ data.product_title }}<br> {{ data.product_brand }}</div>
					</div>
					<div class="check-prodct-price">${{ data.product_price }}</div>
					<div class="check-prodct-price">{{ data.quantity }}</div>
					
				</div>
				
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="product_final_list">
				<div  class="product_final_head">
					<h3>Order Total</h3>
				</div>
				<div class="product_final_dtl">
					<p>{{ totalItems }} Items</p>
					<span>${{ getTotal() }}</span>
				</div>
				<!--
				<div class="product_final_dtl">
					<p>Shipping</p>
					<span>$00.00</span>
				</div>
				<div class="product_final_dtl">
					<p>Texes</p>
					<span>$00.00</span>
				</div>
				-->
				<div class="product_final_total">
					<p>Total Balance</p>
					<span>${{ getTotal() }}</span>
				</div>
			</div>
		</div>
		
	</div>
	<div class="col-md-12" ng-show="totalItems > 0">
	<form role="form" method="post" name="myForm" ng-submit="paymentForm(form)" id="sign-up-form" novalidate autocomplete="off">
	<div class="row" ng-init="userdetail()">
		<div class="col-md-6">
			<div class="postal_address">
				<div class="shipping_head">
					<h3>Shipping Address</h3>
				</div>
				<div class="address_dtl_box">
					<label>Name</label>
					<input type="text" name="name" ng-model="form.user_name" required class="add_name">
				  <span style="color:red" ng-show="myForm.name.$dirty && myForm.name.$invalid">
				  <span ng-show="myForm.name.$error.required">Name is required.</span>
				  </span>
				</div>
				<div class="address_dtl_box">
					<label>Street Address</label>
					<input type="text" name="address" ng-model="form.user_address" required class="add_address">
				    <span style="color:red" ng-show="myForm.address.$dirty && myForm.address.$invalid">
				  <span ng-show="myForm.address.$error.required">Address is required.</span>
				  </span>
				</div>
				<div class="address_dtl_box">
					<label>City</label>
					<input type="text" name="city" ng-model="form.user_city" ng-pattern="/^([a-zA-Z' ]+)$/" required class="add_city">
				    <span style="color:red" ng-show="myForm.city.$dirty && myForm.city.$invalid">
				  <span ng-show="myForm.city.$error.required">City is required.</span>
				  <span ng-show="myForm.city.$error.pattern">Invalid City Name.</span>
				  
				  </span>
				</div>
				
				<div class="address_dtl_box">
					<label>Country</label>
					<input type="text" name="country" ng-model="form.user_country" ng-pattern="/^([a-zA-Z' ]+)$/" required class="add_city">
				    <span style="color:red" ng-show="myForm.country.$dirty && myForm.country.$invalid">
				  <span ng-show="myForm.country.$error.required">Country is required.</span>
				  <span ng-show="myForm.country.$error.pattern">Invalid Country Name.</span>
				  </span>
				</div>
				
				<div class="address_dtl_box">
					<label>Zip Code</label>
					<input type="text" name="zipcode" ng-model="form.user_zipcode" ng-pattern="/^(\d{6}-\d{5}|\d{6})$/" required="" class="add_zip">
				    <span style="color:red" ng-show="myForm.zipcode.$dirty && myForm.zipcode.$invalid">
				  <span ng-show="myForm.zipcode.$error.required">Zipcode is required.</span>
				  <span ng-show="myForm.zipcode.$error.pattern">Invalid Zipcode.</span>
				  </span>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="payment_box">
			<div class="payment_head">
				<h3>Payment</h3>
			</div>
			<div class="payment_dtl_box">
					<label>16 Digit Card Number,</label>
					<input type="text" name="card_no" ng-pattern="/^(\d{14,16})$/" ng-model="form.card_no" required class="card_no">
			       <span style="color:red" ng-show="myForm.card_no.$dirty && myForm.card_no.$invalid">
				  <span ng-show="myForm.card_no.$error.required">Card Number is required.</span>
				  <span ng-show="myForm.card_no.$error.pattern">Invalid Card Number.</span>
				  </span>
			</div>
			<div class="payment_dtl_box">
					<label>Name On Card</label>
					<input type="text" name="card_name" ng-pattern="/^([a-zA-Z' ]+)$/" ng-model="form.card_name" required class="card_name">
			       <span style="color:red" ng-show="myForm.card_name.$dirty && myForm.card_name.$invalid">
				  <span ng-show="myForm.card_name.$error.required">Card Name is required.</span>
				  <span ng-show="myForm.card_name.$error.pattern">Invalid Card Name.</span>
				  </span>
			</div>
			<div class="payment_dtl_box">
					<label>Expiry date</label>
					
					<select name="end_month" ng-model="form.end_month" class="card_expr_month">
						<option value="Jan">Jan</option>
						<option value="Feb">Feb</option>
						<option value="Mar">Mar</option>
						<option value="Apr">Apr</option>
						<option value="May">May</option>
						<option value="Jun">Jun</option>
						<option value="Jul">Jul</option>
						<option value="Aug">Aug</option>
						<option value="Sep">Sep</option>
						<option value="Oct">Oct</option>
						<option value="Nov">Nov</option>
						<option value="Dec">Dec</option>
					</select>
					
					<select name="end_year" ng-model="form.end_year" class="card_expr_year">
						<option value="2015">2015</option>
						<option value="2016">2016</option>
						<option value="2017">2017</option>
						<option value="2018">2018</option>
						<option value="2019">2019</option>
						<option value="2020">2020</option>
					</select>
			</div>
			<div class="payment_dtl_box">
					<label>CVV Number</label>
					<input type="text" name="cvv_no" ng-pattern="/^(\d{3})$/" ng-model="form.cvv_no" class="card_code">
			     <span style="color:red" ng-show="myForm.cvv_no.$dirty && myForm.cvv_no.$invalid">
				  <span ng-show="myForm.cvv_no.$error.required">CVV Number is required.</span>
				  <span ng-show="myForm.cvv_no.$error.pattern">Invalid CVV Number.</span>
				  
				  </span>
			</div>
			</div>			

		</div>
	</div>
	<div class="order_place_btn">
		<button ng-disabled="myForm.$invalid" type="submit" class="order_btn">“Place the Order”.</button>
	</div>
	</form>
	</div>
	<div class="col-md-12" ng-hide="totalItems > 0">
	    <div class="order_place_btn">
	        <h1>Your Shopping Cart Is Empty</h1>
	    </div>
	</div>
  </div>

 
  <div class="container" ng-init="mycartlist()">
    <div class="row">
		<div class="col-md-12">
		<form role="form" method="post" name="myForm" action="#checkout">
			<div class="my_cart_box">
				<div class="my_cart_head">
					<h1>Your Shopping bag - {{ totalItems }} Items</h1>
					
				</div>
				<div class="mycart-header">
					<div class="cart-prodct-no">S.No</div>
					<div class="cart-prodct-Name">Product Namae</div>
					<div class="cart-prodct-price">Price</div>
					<div class="cart-prodct-qntty">Qty.</div>
					<div class="cart-prodct-qntty">Subtotal</div>
					<div class="cart-prodct-close">&nbsp;</div>
				</div>
				<div class="mycart-detail" ng-repeat="data in list">
					<div class="cart-prodct-no">{{$index + 1}}</div>
					<div class="cart-prodct-Name">
						<div class="crt_pro_left"><img height="50px" width="50px" ng-src="admin/upload/{{mySplit(data.product_image,0)}}"></div>
						<div class="crt_pro_right">{{ data.product_title }}<br> {{ data.product_brand }}</div>
					</div>
					<div class="cart-prodct-price">{{ data.product_price | currency }}</div>
					<div class="cart-prodct-qntty">
					
					<input type="text" required pattern="^[1-9][0-9]*$" name="quantity" ng-blur="updatecart(data.product_id,data.quantity)" ng-model="data.quantity" class="cart_qty">
					<span style="color:red" ng-show="myForm.quantity.$dirty && myForm.quantity.$invalid">
					<span ng-show="myForm.quantity.$error.required">Invalid.</span>
					<span ng-show="myForm.quantity.$error.pattern">Not Allow</span>
					
					</span>
					
					</div>
					<div class="cart-prodct-qntty" ng-init="price = data.product_price * data.quantity">{{ price | currency }}</div>

					<div class="cart-prodct-close"><a ng-click="removeCartItem(data.product_id,$index)" ><img src="front_design/img/close_icon.jpg"></a></div>
				</div>
				<div class="mycart-footer">
					<div class="mycart-footer-left">
						<button type="submit"  class="cntnu_shop"  ng-disabled="myForm.$invalid">Proceed to Checkout</button>
					    
					</div>
					<div class="mycart-footer-right">
						<h3>Subtotal ${{ getTotal() }}</h3>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
  </div>

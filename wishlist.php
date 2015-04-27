 
  <div class="container" ng-init="mywishlist()">
    <div class="row">
		<div class="col-md-12">
			<div class="my_cart_box">
				<div class="my_cart_head">
					<h1>Your Wishlist bag - {{ totalItems }} Items</h1>
		
				</div>
				<div class="mycart-header">
					<div class="cart-prodct-no">S.No</div>
					<div class="cart-prodct-Name">Product Namae</div>
					<div class="cart-prodct-price">Price</div>
				
					<div class="cart-prodct-qntty">&nbsp;</div>
					<div class="cart-prodct-close">&nbsp;</div>
				</div>
				<div class="mycart-detail" ng-repeat="data in list">
					<div class="cart-prodct-no">{{$index + 1}}</div>
					<div class="cart-prodct-Name">
						<div class="crt_pro_left"><img height="50px" width="50px" ng-src="admin/upload/{{mySplit(data.product_image,0)}}"></div>
						<div class="crt_pro_right">{{ data.product_title }}<br> {{ data.product_brand }}</div>
					</div>
					<div class="cart-prodct-price">{{ data.product_price | currency }}</div>
					<div class="cart-prodct-qntty" ><button ng-click="addtocart(data.product_id,$index)" class="btn btn-success">Add To Cart</button></div>

					<div class="cart-prodct-close"><a ng-click="removeWishItem(data.product_id,$index)" ><img src="front_design/img/close_icon.jpg"></a></div>
				</div>
				
			</div>
		</div>
	</div>
  </div>

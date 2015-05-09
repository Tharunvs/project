<div class="container">
    <div class="row" ng-init="myOrders()">
		<div class="col-md-12">
			<div class="my_cart_box" ng-repeat="data in list">
				<div class="my_cart_head">
					<h4>Your Order ID :<b> {{ data.order_id }}</b>  Order Date : <b>{{ data.order_date }} </b><button ng-class="data.status=='Pending'?'btn-warning':'btn-danger'" class="btn">{{ data.status }}</button>
				</h4>
					</div>
				<div class="mycart-header" ng-init="pro = productorders(data.order_id)">
					<div class="cart-prodct-no">1</div>
					<div class="cart-prodct-Name">Product Title</div>
					<div class="cart-prodct-price">Price</div>
					<div class="cart-prodct-qntty">Qty.</div>
					<div class="cart-prodct-qntty">Subtotal</div>
					
				</div>
				<div class="mycart-detail" ng-repeat="new in pro.product">
					<div class="cart-prodct-no">{{ $index + 1 }}</div>
					<div class="cart-prodct-Name">
						
						<div class="crt_pro_right">{{ new.product_title }}<br />{{ new.product_brand }}</div>
					</div>
					<div class="cart-prodct-price">{{ new.product_price | currency }}</div>
					<div class="cart-prodct-qntty">{{ new.quantity }}</div>
					<div class="cart-prodct-qntty" ng-init="price = new.product_price * new.quantity">{{ price | currency }}</div>
                </div>
				
					<div class="mycart-footer-right">
						<h4>Subtotal {{ data.order_amount | currency }}</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
  </div>

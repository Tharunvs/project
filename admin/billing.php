
                <!-- Content Header (Page header) -->
                <section class="content-header" ng-init="getOrder()">
                    <h1>
                        Bill Number
                        <small>#{{ order.order_id }}</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#orders">Order List</a></li>
                        <li class="active">Blank page</li>
                    </ol>
                </section>


                <!-- Main content -->
                <section class="content invoice">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="page-header">
                                <i class="fa fa-globe"></i> {{ order.order_id }}
                                <small class="pull-right">Date: {{ order.order_date }}</small>
                            </h2>
                        </div><!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-8 invoice-col">
                            Shipping Address
                            <address>
                                <strong>{{ order.order_name }}.</strong><br>
                                {{ order.order_address }}<br>
                                {{ order.order_city }}<br>
                                {{ order.order_country }}<br/>
                                
                            </address>
                        </div>
						<!--
                        <div class="col-sm-4 invoice-col">
                            To
                            <address>
                                <strong>John Doe</strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                Phone: (555) 539-1037<br/>
                                Email: john.doe@example.com
                            </address>
                        </div>-->
						
                        <div class="col-sm-4 invoice-col">
                            
                            <b>Order ID:</b> {{ order.order_id }}<br/>
                            
                            <b>Total Amount:</b> {{ order.order_amount }}
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <table class="table table-striped" ng-init="pro = productorders(data.order_id)">
                                <thead>
                                    <tr>
                                        <th>Serial #</th>
                                        <th>Product</th>
                                        <th>Unit Price</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="new in pro.product">
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ new.product_title }}<br />{{ new.product_brand }}</td>
                                        <td>{{ new.product_price }}</td>
                                        <td>{{ new.quantity }}</td>
                                        <td>${{ new.quantity * new.product_price }}</td>
                                    </tr>
                                   
                                </tbody>
                            </table>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-xs-6">
                            
                        </div><!-- /.col -->
                        <div class="col-xs-6">
                            <p class="lead">Order Date {{ order.order_date }}</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Subtotal:</th>
                                        <td>${{ order.order_amount }}</td>
                                    </tr>
									<!--
                                    <tr>
                                        <th>Tax (12.5%)</th>
                                        <td>${{ (order.order_amount * 12.5)/100}}</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping:</th>
                                        <td>$5.80</td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td>$265.24</td>
                                    </tr>-->
                                </table>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-xs-12">
                            
                            <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
                            <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
                        </div>
                    </div>
                </section><!-- /.content -->
         
        
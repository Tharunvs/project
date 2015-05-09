<section class="content-header">
	<h1>{{ title }}<small>Preview</small>                    </h1>
	<ol class="breadcrumb">
		<li><a href="#dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#orders"> Order list</a></li>
		<li class="active"> User</li>
	</ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-2">PageSize:
            <select ng-model="entryLimit" class="form-control">
                <option>5</option>
                <option>10</option>
                <option>20</option>
                <option>50</option>
                <option>100</option>
            </select>
        </div>
        <div class="col-md-3">Filter:
            <input type="text" ng-model="search" ng-change="filter()" placeholder="Filter" class="form-control" />
        </div>
        <div class="col-md-4">
            <h4>Filtered {{ filtered.length }} of {{ totalItems}} total Orders</h5>
        </div>
		
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12" ng-show="filteredItems > 0">
            <table class="table table-striped table-bordered">
            <thead>
            <th>Order ID&nbsp;<a ng-click="sort_by('order_id');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>Customer Name&nbsp;<a ng-click="sort_by('user_name');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>Order Date&nbsp;<a ng-click="sort_by('order_date');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>Total Amount&nbsp;<a ng-click="sort_by('order_amount');"><i class="glyphicon glyphicon-sort"></i></a></th>
            
			<th>Status&nbsp;<a ng-click="sort_by('status');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>Action</th>
			</thead>
            <tbody>
                <tr ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
                    <td>{{data.order_id}}</td>
                    <td>{{data.user_name}}</td>
                    <td>{{data.order_date}}</td>
					<td>{{data.order_amount}}</td>
                    <td><button ng-click="ChangeStatus(data.order_id,data.status)" ng-class="data.status=='Pending'?'btn-warning':'btn-danger'" class="btn">{{ data.status }}</button>
					</td>

					<td>
					<a href="#/billing/{{data.order_id}}" class="btn btn-success">View Billing</a>
					</td>
                </tr>
            </tbody>
            </table>
        </div>
        <div class="col-md-12" ng-show="filteredItems == 0">
            <div class="col-md-12">
                <h4>No Orders found</h4>
            </div>
        </div>
        <div class="col-md-12" ng-show="filteredItems > 0">  

            <div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
            
            
        </div>
    </div>
</section>
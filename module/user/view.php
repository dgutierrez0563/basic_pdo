<div class="container-fluid">
	<section class="content-header">
	    <ol class="breadcrumb">
	        <li class="breadcrumb-item">
	        	<a href="?module=home">Home</a>
	        </li>
		    <li class="breadcrumb-item active">User Management</li>
	    </ol>
	</section>
	<section class="content">
		<!-- Example DataTables Card-->
		<div class="card mb-3">
		    <div class="card-header">
				<i class="fa fa-list"></i> User Information
				<a class="btn btn-primary btn-sm pull-right" href="?module=add" title="New User" data-toggle="tooltip">
		      		<i class="fa fa-plus"></i> Add User
		    	</a>
		    </div>
		    <div class="card-body">
		      	<div class="table-responsive">
		        	<table class="table row-border table-hover" id="dataTable" width="100%" cellspacing="0">
		    			<thead>
		    				<tr class="back_info">
		    					<th>ID</th>
		    					<th>User</th>
		    					<th>Role</th>
		    					<th>Status</th>
		    					<th class="center">Action</th>
		    				</tr>
		    			</thead>
		    			<tbody>
    					<?php
    						require_once ('./config/User.php');
    						$data = User::getAll();
    						$no=1;
							foreach($data as $item): ?>
		    				<tr>
		    					<td><?php echo $no; ?></td>
		    					<td><?php echo $item['UserName']; ?></td>
		    					<td><?php echo $item['Role']; ?></td>
		    					<td><?php echo $item['Status']; ?></td>
		    					<td class="center">
		    						<a href="?module=add" title="Edit" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-primary btn-xs" value=""><i class="fa fa-edit"></i></a>
		    					</td>
		    				</tr>
							<?php $no++; endforeach; ?>
		    			</tbody>
		    		</table>
		    	</div>
		    </div>
		</div>
	</section>
<br><br>
<br><br><br><br>
</div>
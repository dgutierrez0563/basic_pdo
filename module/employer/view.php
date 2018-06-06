<div class="container-fluid">
	<section class="content-header">
	    <ol class="breadcrumb">
	        <li class="breadcrumb-item">
	        	<a href="?module=home">Home</a>
	        </li>
		    <li class="breadcrumb-item active">Employer Management</li>
	    </ol>
	</section>
	<section class="content">
		<!-- Example DataTables Card-->
		<div class="card mb-3">
		    <div class="card-header">
				<i class="fa fa-list"></i> Employer Information
				<a class="btn btn-primary btn-sm pull-right" href="?module=add" title="New Employer" data-toggle="tooltip">
		      		<i class="fa fa-plus"></i> Add Employer
		    	</a>
		    </div>
		    <div class="card-body">
		      	<div class="table-responsive">
		        	<table class="table row-border table-hover" id="dataTable" width="100%" cellspacing="0">
		    			<thead>
		    				<tr class="back_info">
		    					<th>No.</th>
		    					<th>Name</th>
		    					<th>Email</th>
		    					<th>Phone 1</th>
		    					<th>Status</th>
		    					<th>Action</th>
		    				</tr>
		    			</thead>
		    			<tbody>
    					<?php
    						require_once ('./proses/employer/Employer.php');
    						$data = Employer::getAll();
    						$no=1;
							foreach($data as $item): ?>
		    				<tr>
		    					<!-- <td><?php //echo $item['IDUser']; ?></td> -->
		    					<td><?php echo $no; ?></td>
		    					<td><?php echo $item['IDEmployer']; ?></td>
		    					<td><?php echo $item['UserName']; ?></td>
		    					<td><?php echo $item['Role']; ?></td>
		    					<td><?php echo $item['Status']; ?></td>
		    					<td style="text-align: center;">
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
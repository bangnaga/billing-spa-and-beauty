<div class="row">
	<div class="col-md-10 col-md-offset-1"><?php echo $this->session->flashdata('alert'); ?></div>
	<div class="col-md-12">
		<div class="col-md-4">
	<?php
	if($this->app->role(2,'create')) :
	?>
			<a href="<?php echo site_url('master/addpackage') ?>" class="btn btn-white btn-default btn-bold btn-sm btn-round">
				<i class="ace-icon fa fa-plus gray"></i> Add New Record
			</a>
	<?php  
	endif;
	?>
			<div class="space-4"></div>
		</div>
		<div class="col-md-3 pull-right">
	<?php echo form_open(site_url("master/package"), array('method' => 'get')); ?>
			<div class="input-group">
				<input class="form-control input-sm" name="q" type="text" placeholder="Search..." value="<?php echo $this->input->get('q') ?>" />
				<span class="input-group-addon" type="button">
					<i class="ace-icon fa fa-search"></i>
				</span>
			</div>
	<?php echo form_close(); ?>
			<div class="space-4"></div>
		</div>
<?php echo form_open(site_url('master/bulkpackage')); ?>
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th width="30">
						<label class="pos-rel">
							<input type="checkbox" class="ace" /> <span class="lbl"></span>
						</label>
					</th>
					<th>Room</th>
					<th>Name</th>
					<th>Duration</th>
					<th>Price</th>
					<th>Description</th>
					<th width="100">Actions</th>
				</tr>
			</thead>
			<tbody>
<?php  
// Start Loop Rooms
foreach($package as $row) :
?>
				<tr>
					<td>
		<?php  
		if($row->package_ID != 1) : 
		?>
						<label class="pos-rel">
							<input type="checkbox" class="ace" name="package[]" value="<?php echo $row->package_ID ?>" /> <span class="lbl"></span>
						</label>
		<?php  
		endif;
		?>
					</td>
					<td><?php echo $row->room_name; ?></td>
					<td width="300"><?php echo $row->package_name; ?></td>
					<td><?php echo $row->duration; ?></td>
					<td><?php echo number_format($row->price); ?></td>
					<td><?php echo $row->package_description; ?></td>
					<td class="text-center">
						<div class="hidden-sm hidden-xs action-buttons">
	<?php
	if($this->app->role(2,'update')) :
	?>
							<a class="green" href="<?php echo site_url("master/getpackage/{$row->package_ID}") ?>" data-rel="popover" data-trigger="hover" data-placement="top" data-content="Update">
									<i class="ace-icon fa fa-pencil bigger-130"></i>
							</a>
	<?php  
	endif;
	if($this->app->role(2,'delete')) :
		if($row->package_ID != 1) : 
	?>
							<a class="red open-package-delete" data-id="<?php echo $row->package_ID; ?>" data-rel="popover" data-trigger="hover" data-placement="top" data-content="Delete">
								<i class="ace-icon fa fa-trash-o bigger-130"></i>
							</a>
	<?php  
		endif;
	endif;
	?>
						</div>
					</td>
				</tr>
<?php  
endforeach;
?>
			</tbody>
			<thead>
			<tr>
				<th>
					<label class="pos-rel">
						<input type="checkbox" class="ace" /> <span class="lbl"></span>
					</label>
				</th>
				<th colspan="7">
					<small style="padding-right:20px;">With selected :</small>
	<?php
	if($this->app->role(2,'update')) :
	?>
					<button name="action" value="set_update" class="btn btn-minier btn-white btn-round btn-primary" data-rel="popover" data-trigger="hover" data-placement="top" data-content="Update">
						<i class="ace-icon fa fa-pencil"></i> <small> Update</small>
					</button>
	<?php  
	endif;
	if($this->app->role(2,'delete')) :
	?>
					<a class="btn btn-minier btn-white btn-round btn-danger package-delete-multiple" data-rel="popover" data-trigger="hover" data-placement="top" data-content="Delete">
						<i class="ace-icon fa fa-trash-o"></i> <small> Delete</small>
					</a>
	<?php  
	endif;
	?>
				</th>
			</tr>
			</thead>
		</table>
		<div class="modal" id="modal-delete-multiple">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header bg-delete">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h5 class="modal-title"><i class="fa fa-question-circle"></i> Delete Package</h5>
					</div>
			<div class="modal-body">
				<p class="bigger-110 bolder center grey">
					<i class="ace-icon fa fa-hand-o-right blue bigger-120"></i> Are you sure ?
				</p>
			</div>
					<div class="modal-footer text-center">
						<a class="btn btn-sm pull-right btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</a>
						<button name="action" value="delete" class="btn btn-sm pull-left btn-danger"><i class="fa fa-trash-o"></i> Yes</button>
					</div>
				</div>
			</div>
		</div>
<?php echo form_close(); ?>
		<div class="col-md-12 text-center">
			<?php echo $this->pagination->create_links(); ?>
		</div>
	</div>
</div>

<div class="modal" id="modal-delete">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header bg-delete">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h5 class="modal-title"><i class="fa fa-question-circle"></i> Delete Room</h5>
			</div>
			<div class="modal-body">
				<p class="bigger-110 bolder center grey">
					<i class="ace-icon fa fa-hand-o-right blue bigger-120"></i> Are you sure ?
				</p>
			</div>
			<div class="modal-footer text-center">
				<a class="btn btn-sm pull-right btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</a>
				<a id="button-delete" class="btn btn-sm pull-left btn-danger"><i class="fa fa-trash-o"></i> Yes</a>
			</div>
		</div>
	</div>
</div>
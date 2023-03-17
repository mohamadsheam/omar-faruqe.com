<style type="text/css">
	.req {
		color: red;
		font-weight: bold;
	}

	.op {
		color: gray;
		font-weight: lighter;
	}

</style>

<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
	<!-- ============================================================== -->
	<!-- Start Page Content -->
	<!-- ============================================================== -->
	<div class="row">
		<div class="col-md-8">
		<?php echo form_open_multipart('', ''); ?>
			<div class="card">
				<div class="card-header">
				    <p class="card-title m-b-0">
						<h3 class="float-left"></i><?php echo ('Edit_Profile') ;?></h3>
						<a href="<?php echo site_url('profile/all');?>" class="btn btn-primary float-right"><i class="mdi mdi-keyboard-return"></i><?php echo lang('Back');?></a>
					</p>
                </div>
				<div class="card-body">

					<!-- hidden fileds -->
					<input type="hidden" name="old_image" value="<?php echo $record[0]->image;?>">

					<div class="form-group row">
					    <label class="col-sm-3 text-right"> <?php echo ('Date') ;?> </label>
					    <div class="input-group col-sm-9">
					        <input type="text" class="form-control" value="<?php echo $record[0]->date;?>" name="date" id="datepicker-autoclose" >
					    </div>
					</div>
					<div class="form-group row">
					    <label class="col-sm-3 text-right"><?php echo ('Image') ;?> </label>
					    <div class="col-sm-9">
					        <input type="file" name="image_file" class="form-control">
					    </div>
					</div>
					<div class="form-group row">
					    <label class="col-sm-3 text-right"><?php echo ('Full_Name') ;?> </label>
					    <div class="col-sm-9">
					        <input type="text" name="fullname" class="form-control" value="<?php echo $record[0]->fullname;?>" required>
					    </div>
					</div>

					<div class="form-group row">
					    <label class="col-sm-3 text-right"><?php echo ('Email') ;?> <span class="op">[optional]</span></label>
					    <div class="col-sm-9">
					        <input type="email" name="email" class="form-control" value="<?php echo $record[0]->email;?>">
					    </div>
					</div>

					<div class="form-group row">
					    <label class="col-sm-3 text-right"><?php echo ('Privilege') ;?> </label>
					    <div class="col-sm-9">
					        <select class="select2 form-control" name="privilege" required >
					        	<option value="admin" <?php if($record[0]->privilege=='admin'){echo "selected";} ;?>>Admin</option>
					        	<option value="user" <?php if($record[0]->privilege=='user'){echo "selected";} ;?>>User</option>
					        </select>
					    </div>
					</div>

				</div>
				<div class="card-footer">
					<input type="submit" name="update" class="btn btn-primary float-right" value="<?php echo lang('save') ;?>">
				</div>
			</div>
		<?php echo form_close();?>
		</div>
		<div class="col-md-4">
			<img class="animated slideInRight slow" src="<?php echo base_url('').$record[0]->image;?>" alt="No Image" width="350" height="350">
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- End PAge Content -->
	<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->

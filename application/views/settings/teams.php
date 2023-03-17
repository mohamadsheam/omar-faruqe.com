<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">

                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Team Members</h3>
                        <button class=" float-right btn btn-default btn-sm" onclick="addNewTeam()" >
                            <i class="fas fa-plus-circle"></i> Add New
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Contact</th>
                                    <th>FB link</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($team_members as $key => $r) { ?>
                                    <tr>
                                        <td><?php echo $key+1; ?></td>
                                        <td><img src="<?php echo base_url().$r->image; ?>" width="50px" height='50px' class="img-fluid mb-2" alt="white sample"/> </td>
                                        <td><?php echo $r->name; ?></td>
                                        <td><?php echo $r->designation; ?></td>
                                        <td><?php echo $r->mobile; ?></td>
                                        <td><?php echo $r->fb; ?></td>
                                        <td>
                                            <a class="btn-sm btn-warning" onclick="editModalFn(<?php echo $r->id; ?>)"><i class="fas fa-pencil-alt"></i></a>

                                            <a class="btn-sm btn-danger" onclick="confirmFn(<?php echo $r->id; ?>)"><i class="fas fa-trash"></i></a>

                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</div>





<div class="modal fade" id="addNewProduct">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

        <div class="modal-body">
            <div class="card card-success card-outline">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="fas fa-plus"></i>
                    Add Member Info
                  </h3>
                </div>
                <div class="card-body">

                    <?php echo form_open_multipart('Settings/add_team_member', ''); ?>


                    <div class="form-group">
                        <label>Name<span class="req">*</span></label>
                        <div class="input-group">
                            <input type="text" name="team_name" class="form-control" required="">

                        </div>
                    </div>

                    <div class="form-group">
                        <label>Contact No<span class="req">*</span></label>
                        <div class="input-group">
                            <input type="text" name="contact_no" class="form-control" required="">

                        </div>
                    </div>

                    <div class="form-group">
                        <label>FB Link</label>
                        <div class="input-group">
                            <input type="text" name="fb_link" class="form-control">

                        </div>
                    </div>

                    <div class="form-group">
                        <label>Image<span class="req">*</span></label>
                        <div class="input-group">
                            <input type="file" name="team_image"  class="form-control" required accept="image/*">
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Designation<span class="req">*</span></label>
                        <div class="input-group">
                            <input type="text" name="designation" class="form-control">
                        </div>
                    </div>


                </div>
                <!-- /.card-body -->
            </div>

        </div>
        <div class="modal-footer">
            <input type="submit" name="submit" class="btn btn-primary float-right" value="Save">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        <?php echo form_close(); ?>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>




<div class="modal fade" id="editProduct">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

        <div class="modal-body">
            <div class="card card-success card-outline">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="fas fa-plus"></i>
                    Update Member Info
                  </h3>
                </div>
                <div class="card-body">

                    <?php echo form_open_multipart('Settings/update_team_member', ''); ?>

                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="old_image" id="old_image">


                    <div class="form-group">
                        <label>Name<span class="req">*</span></label>
                        <div class="input-group">
                            <input type="text" id="team_name" name="team_name" class="form-control" required="">

                        </div>
                    </div>

                    <div class="form-group">
                        <label>Contact No<span class="req">*</span></label>
                        <div class="input-group">
                            <input type="text" id="contact_no" name="contact_no" class="form-control" required="">

                        </div>
                    </div>

                    <div class="form-group">
                        <label>FB Link</label>
                        <div class="input-group">
                            <input type="text" id="fb_link" name="fb_link" class="form-control">

                        </div>
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <div class="input-group">
                            <input type="file" name="team_image"  class="form-control" accept="image/*">
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Designation<span class="req">*</span></label>
                        <div class="input-group">
                            <input type="text" id="designation" name="designation" class="form-control">
                        </div>
                    </div>


                </div>
                <!-- /.card-body -->
            </div>

        </div>
        <div class="modal-footer">
            <input type="submit" name="submit" class="btn btn-primary float-right" value="Save">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        <?php echo form_close(); ?>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>




<script type="text/javascript">

//Date picker
$('#reservationdate').datetimepicker({
    format: 'YYYY-MM-DD'
});


function addNewTeam(){
    $("#addNewProduct").modal('toggle');
}


function editModalFn(id){
    $.ajax({
        url: BASE_URL + "Settings/fetch_single_info_teams",
        type: 'POST',
        data: {'id': id},
        success: function(result) {
            console.log(JSON.parse(result));
            var data = JSON.parse(result);
            $("#designation").val(data[0].designation);
            $("#fb_link").val(data[0].fb);
            $("#contact_no").val(data[0].mobile);
            $("#team_name").val(data[0].name);
            $("#old_image").val(data[0].image);
            $("#id").val(data[0].id);


            $("#editProduct").modal('toggle');
        }

    })
}



function confirmFn(id){

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {

            window.location = BASE_URL+'Settings/delete_team_member/'+id;

        }
    })
}
</script>

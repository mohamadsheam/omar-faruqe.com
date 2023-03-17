<div class="content-wrapper">

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">

        <!-- general form elements -->
        <div class="card card-primary">

          <div class="card-header" data-toggle="collapse" data-target="#form" style="cursor: pointer;">
            <h3 class="card-title">Add New User</h3>
            <div class="card-tools">
                <i class="fas fa-plus"></i> Show/Hide
            </div>
          </div>
          <!-- /.card-header -->

          <div id="form" class="collapse">
            <!-- form start -->

            <?php echo form_open_multipart('', ''); ?>
              <div class="card-body">

                <div class="form-group">
                  <label for="exampleInputEmail1">Full Name <span class="req">*</span></label>
                  <div class="input-group">
                    <input type="text" name="fullname" class="form-control" placeholder="Full name" required="">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Email <span class="req">*</span></label>
                  <div class="input-group">
                    <input type="Email" name="email" class="form-control" placeholder="Email address" required="">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label>Password <span class="req">*</span></label>
                  <div class="input-group">
                    <input type="password" name="password" class="form-control" placeholder="minimum 6 characters" minlength="6" required="">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <div class="input-group">

                    <input type="file" class="form-control" name="image_file">

                  </div>
                </div>

                <div class="form-group">
                  <label>Contact <span class="req">*</span></label>
                  <div class="input-group">
                    <input type="text" name="contact" class="form-control" placeholder="without +88" minlength="11" required>
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label>Location</label>
                  <div class="input-group">
                      <textarea class="form-control" placeholder="Location" name="address"></textarea>
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label>User Role <span class="req">*</span></label>
                  <div class="input-group">
                      <select class="form-control" required name="user_role">
                        <option value="super">Super</option>
                        <option value="admin">Admin</option>
                      </select>
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-cogs"></i></span>
                    </div>
                  </div>

                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <input type="submit" name="submit" class="btn btn-primary float-right" value="Save">
              </div>
            <?php echo form_close();?>
          </div>
        </div>


        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">All Users</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="datatable" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Privilege</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                <?php foreach ($users as $key => $user) {  ?>
                <tr>
                  <td><?php echo $key+1; ?></td>
                  <td><?php echo $user->fullname; ?></td>
                  <td><?php echo $user->contact; ?></td>
                  <td><?php echo $user->email; ?></td>
                  <td><?php echo $user->privilege; ?></td>
                  <td>
                      <a class="btn-sm btn-primary" href="<?php echo base_url('Users/profile/').$user->id; ?>"><i class="fas fa-eye"></i></a>
                      <!-- <a class="btn-sm btn-warning" href="<?php echo base_url('Users/editUser/').$user->id; ?>"><i class="fas fa-pencil-alt"></i></a> -->
                      <?php if($this->session->userdata('user_id') != $user->id){ ?>
                      <a class="btn-sm btn-danger" onclick="confirmFn(<?php echo $user->id; ?>)"><i class="fas fa-trash"></i></a>
                      <?php } ?>
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
</div>
</section>
</div>

<script type="text/javascript">
  var table = 'users';

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

        var postData = {
          'table': table,
          'id': id,
        };


        $.ajax({
            url: BASE_URL + "api/Delete",
            type: 'POST',
            data: postData,
            success: function(response) {
              //console.log(response);
                Swal.fire({
                  title: 'Deleted',
                  text: "Data has been deleted!",
                  timer: 3000
                });

                setTimeout(function(){
                    location.reload();
                }, 3500);

            },
            error: function(data) {
                toastr.error('Opps!', 'Something went wrong');
            }
        });



      }
    })
}
</script>

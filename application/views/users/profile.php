<?php //print_r($records); ?>
<div class="content-wrapper">
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" style="cursor: pointer;" title="Click to enlarge"
                  onclick="view_image('<?php echo base_url(''.$records[0]->image) ?>')"
                       src="<?php echo base_url(''.$records[0]->image) ?>"
                       alt="No Image found">
                </div>

                <h3 class="profile-username text-center"><?php echo $records[0]->fullname; ?></h3>

                <p class="text-muted text-center"><?php echo $records[0]->privilege; ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Contact</b> <a class="float-right"><?php echo $records[0]->contact; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right"><?php echo $records[0]->email; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Location</b> <a class="float-right"><?php echo $records[0]->address; ?></a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <!-- <li class="nav-item"><a class="<?php echo $activity; ?> nav-link" href="#activity" data-toggle="tab">Activity</a></li> -->
                  <li class="nav-item"><a class="<?php echo $setting; ?> nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class=" <?php echo $activity; ?> tab-pane" id="activity">
                    <!-- Post -->

                        <div class="callout callout-danger">
                          <h5>I am a danger callout!</h5>

                          <p>There is a problem that we need to fix. A wonderful serenity has taken possession of my entire
                            soul,
                            like these sweet mornings of spring which I enjoy with my whole heart.</p>
                        </div>
                        <div class="callout callout-info">
                          <h5>I am an info callout!</h5>

                          <p>Follow the steps to continue to payment.</p>
                        </div>
                        <div class="callout callout-warning">
                          <h5>I am a warning callout!</h5>

                          <p>This is a yellow callout.</p>
                        </div>
                        <div class="callout callout-success">
                          <h5>I am a success callout!</h5>

                          <p>This is a green callout.</p>
                        </div>

                    <!-- /.post -->
                  </div>

                  <div class="<?php echo $setting; ?> tab-pane" id="settings">
                    <?php echo form_open_multipart('', ''); ?>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Full name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" value="<?php echo $records[0]->fullname; ?>" placeholder="Full Name" name="fullname">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" value="<?php echo $records[0]->email; ?>" placeholder="Email" name="email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Old Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control"  placeholder="Old Password" id="password">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" min="6" placeholder="New Password"  id="confirm_password" name="password">
                          <span id='message'></span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Contact</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" value="<?php echo $records[0]->contact; ?>" name="contact" placeholder="Without +88">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">User Role</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="user_role">
                              <option value="super" <?php echo ($records[0]->privilege =='super')? 'selected':''; ?> >Super</option>
                              <option value="admin" <?php echo ($records[0]->privilege =='admin')? 'selected':''; ?> >Admin</option>
                            </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="location" class="col-sm-2 col-form-label">Location</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="address" placeholder="Location"><?php echo $records[0]->address; ?></textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <!-- <button type="submit" class="btn btn-info">Update</button> -->
                          <input id="submitButton" type="submit" name="submit" class="btn btn-info" value="Update">

                          <a href="<?php echo base_url();?>Users/"
                              rel="noopener" class="btn btn-dark float-right">
                              Back
                          </a>

                        </div>
                      </div>

                    <?php echo form_close();?>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
</div>


<!-- image modal -->
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title" id="myModalLabel">Preview</h4>
    </div>
    <div class="modal-body">
      <img src="" id="imagepreview" style="width:100%;max-width:600px" >
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>

<script type="text/javascript">

function view_image(path){

    $('#imagepreview').attr('src', path);
    $('#imagemodal').modal('show');
}

    document.getElementById("submitButton").disabled = false;
    $('#password, #confirm_password').on('keyup', function () {
        document.getElementById("submitButton").disabled = false;
        if ($('#password').val() == $('#confirm_password').val()) {
            $('#message').html('Matching').css('color', 'green');
            document.getElementById("submitButton").disabled = false;
        } else{
            $('#message').html('Not Matching').css('color', 'red');
            document.getElementById("submitButton").disabled = true;
        }
    });

</script>

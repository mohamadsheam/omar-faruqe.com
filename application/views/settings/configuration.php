<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">

                    <div class="card card-primary">

                        <div class="card-header" >
                            <h3 class="card-title">Footer Social Icons</h3>

                        </div>
                        <!-- /.card-header -->

                            <?php echo form_open_multipart('', ''); ?>
                            <div class="card-body">


                                <div class="form-group">
                                    <label>FB Link <span class="req">*</span></label>
                                    <div class="input-group">
                                        <input type="text" name="about_video" class="form-control" required="" value="<?php echo $social_icons[0]->fb; ?>">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Twitter Link <span class="req">*</span></label>
                                    <div class="input-group">
                                        <input type="text" name="about_video" class="form-control" required="" value="<?php echo $social_icons[0]->tw; ?>">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Youtube Link <span class="req">*</span></label>
                                    <div class="input-group">
                                        <input type="text" name="about_video" class="form-control" required="" value="<?php echo $social_icons[0]->you; ?>">

                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <input type="submit" name="submit" class="btn btn-primary float-right" value="Save">
                            </div>
                            <?php echo form_close(); ?>


                    </div>

                </div>


                <div class="col-12">
                    <div class="card card-success">
                      <div class="card-header">
                        <h4 class="card-title">Banner</h4>
                        <button class=" float-right btn btn-default btn-sm" onclick="addNewProduct()" >
                            <i class="fas fa-plus-circle"></i> Add New
                        </button>
                      </div>
                      <div class="card-body">
                        <div class="row">

                            <?php foreach ($sliders as $key => $pr) { ?>

                              <div class="col-sm-2">
                                <a href="<?php echo base_url().$pr->image_path; ?>" data-toggle="lightbox"
                                 data-title="<?php echo $pr->title; ?>" data-gallery="gallery"

                                 >
                                  <img src="<?php echo base_url().$pr->image_path; ?>" class="img-fluid mb-2" alt="white sample"/>
                                </a>
                                <br>
                                <span class="float-right">
                                    <a onclick="confirmFn(<?php echo $pr->id; ?>)" class="btn-sm btn-danger" ><i class="fas fa-trash"></i></a>
                                </span>
                                <span class="float-left">
                                    <a onclick="editModalFn(<?php echo $pr->id; ?>)" class="btn-sm btn-warning" ><i class="fas fa-pencil-alt"></i></a>
                                </span>
                                <br><br>
                              </div>

                            <?php } ?>

                        </div>
                      </div>
                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</div>






<div class="modal fade" id="editProduct">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

        <div class="modal-body">
            <div class="card card-success card-outline">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="fas fa-plus"></i>
                    Update Product
                  </h3>
                </div>
                <div class="card-body">

                    <?php echo form_open_multipart('Settings/edit_product', ''); ?>


                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="old_image" id="old_image">


                    <div class="form-group">
                        <label>Product Title <span class="req">*</span></label>
                        <div class="input-group">
                            <input type="text" id="product_title" name="product_title" class="form-control" required="">

                        </div>
                    </div>

                    <div class="form-group">
                        <label>Product Image </label>
                        <div class="input-group">
                            <input type="file" name="product_image" class="form-control" accept="image/*">

                        </div>
                    </div>

                    <div class="form-group">
                        <label>Product Desc <span class="req">*</span></label>
                        <div class="input-group">
                            <textarea class="form-control" id="product_desc" placeholder="Remarks" name="product_desc" required></textarea>
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


<div class="modal fade" id="addNewProduct">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

        <div class="modal-body">
            <div class="card card-success card-outline">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="fas fa-plus"></i>
                    Add Product
                  </h3>
                </div>
                <div class="card-body">

                    <?php echo form_open_multipart('Settings/add_slider', ''); ?>


                    <div class="form-group">
                        <label>Slider Title <span class="req">*</span></label>
                        <div class="input-group">
                            <input type="text" name="product_title" class="form-control" required="">

                        </div>
                    </div>

                    <div class="form-group">
                        <label>Slider Image <span class="req">*</span></label>
                        <div class="input-group">
                            <input type="file" name="product_image"  class="form-control" required accept="image/*">

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


<script>
  $(function () {
    $(function () {
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
          event.preventDefault();
          $(this).ekkoLightbox({
            alwaysShowClose: true,

          });
        });
    })


    $("#summernote").summernote({
        height: 300,
        toolbar: [
            [ 'style', [ 'style' ] ],
            [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
            [ 'fontname', [ 'fontname' ] ],
            [ 'fontsize', [ 'fontsize' ] ],
            [ 'color', [ 'color' ] ],
            [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
            [ 'table', [ 'table' ] ],
            [ 'insert', [ 'link'] ],
            [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
        ]
    });

  })


     function editModalFn(id){
        $.ajax({
            url: BASE_URL + "Settings/fetch_single_info",
            type: 'POST',
            data: {'id': id},
            success: function(result) {
                //console.log(JSON.parse(result));
                var data = JSON.parse(result);
                $("#product_title").val(data[0].product_name);
                $("#product_desc").val(data[0].product_desc);
                $("#old_image").val(data[0].image);
                $("#id").val(data[0].id);


                $("#editProduct").modal('toggle');
            }

        })
    }


    function addNewProduct(){
        $("#addNewProduct").modal('toggle');
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
                window.location = BASE_URL+'Settings/delete_slider/'+id;
            }
        })
    }
</script>

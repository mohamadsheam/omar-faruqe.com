<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">

                    <div class="card card-primary">

                        <div class="card-header" >
                            <h3 class="card-title">About Us</h3>

                        </div>
                        <!-- /.card-header -->

                        <div id="form">
                            <!-- form start -->

                            <?php echo form_open_multipart('', ''); ?>
                            <div class="card-body">


                                <div class="form-group">
                                    <label>Video Link <span class="req">*</span></label>
                                    <div class="input-group">
                                        <input type="text" name="about_video" class="form-control" required="" value="<?php echo $info[0]->about_video; ?>">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Remarks </label>
                                    <div class="input-group">
                                        <textarea class="form-control" id="summernote" style="width:auto; height: auto;"  name="text">
                                            <?php echo $info[0]->text; ?>
                                        </textarea>

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

                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</div>

<script>
  $(function () {
    // Summernote
    //$('#summernote').summernote()


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
</script>

<!-- Main content -->
<section class="content">
  <div class="error-page">
    <h2 class="headline text-warning"> 404</h2>

    <div class="error-content">
      <h3><i class="fas fa-exclamation-triangle text-danger"> Oops! Something went wrong.</i></h3>

      <p>
        We could not find the page you were looking for.
        Meanwhile, you may <a href="<?php echo base_url(); ?>">return to dashboard.</a>
      </p>

      <?php if( ENVIRONMENT == 'development'){ ?>

      <h4>A PHP Error was encountered</h4>

      <p>Severity: <?php echo $severity; ?></p>
      <p>Message:  <?php echo $message; ?></p>
      <p>Filename: <?php echo $filepath; ?></p>
      <p>Line Number: <?php echo $line; ?></p>

    <?php } ?>
      <form class="search-form">
        <div class="input-group">
          <input type="hidden" name="search" class="form-control" placeholder="Search">

          <!-- <div class="input-group-append">
            <button type="submit" name="submit" class="btn btn-warning"><i class="fas fa-search"></i>
            </button>
          </div> -->
        </div>
        <!-- /.input-group -->
      </form>
    </div>
    <!-- /.error-content -->
  </div>
  <!-- /.error-page -->
</section>
<!-- /.content -->

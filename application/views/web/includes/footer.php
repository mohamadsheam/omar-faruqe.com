<!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <div class="right-text-content">
                            <ul class="social-icons">
                                <li><a href="<?php echo ($social_icons) ? $social_icons[0]->fb: '#';?>" target="__blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="<?php echo ($social_icons) ? $social_icons[0]->tw: '#';?>" target="__blank"><i class="fa fa-twitter"></i></a></li>
                                <!-- <li><a href="#"><i class="fa fa-linkedin"></i></a></li> -->
                                <li><a href="<?php echo ($social_icons) ? $social_icons[0]->you: '#';?>" target="__blank"><i class="fa fa-youtube"></i></a></li>
                            </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="logo">
                        <!-- <a href="index.html"><img src="assets/images/white-logo.png" alt=""></a> -->
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12">
                    <div class="left-text-content">
                        <p>© Copyright Omar Faruqe, 2017- <?php echo date('Y'); ?>

                        <br>Crafted By: <a href="https://www.linkedin.com/in/mohammadsheam/" rel="nofollow">Mohammad Sheam</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="<?php echo base_url() ?>public/assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="<?php echo base_url() ?>public/assets/js/popper.js"></script>
    <script src="<?php echo base_url() ?>public/assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="<?php echo base_url() ?>public/assets/js/owl-carousel.js"></script>
    <script src="<?php echo base_url() ?>public/assets/js/accordions.js"></script>
    <script src="<?php echo base_url() ?>public/assets/js/datepicker.js"></script>
    <script src="<?php echo base_url() ?>public/assets/js/scrollreveal.min.js"></script>
    <script src="<?php echo base_url() ?>public/assets/js/waypoints.min.js"></script>
    <script src="<?php echo base_url() ?>public/assets/js/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url() ?>public/assets/js/imgfix.min.js"></script>
    <script src="<?php echo base_url() ?>public/assets/js/slick.js"></script>
    <script src="<?php echo base_url() ?>public/assets/js/lightbox.js"></script>
    <script src="<?php echo base_url() ?>public/assets/js/isotope.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?php echo base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>

    <!-- Global Init -->
    <script src="<?php echo base_url() ?>public/assets/js/custom.js"></script>
    <script>

        $(function(){
          <?php echo $this->session->flashdata('notification'); ?>
        });

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);

            });
        });

    </script>
  </body>
</html>

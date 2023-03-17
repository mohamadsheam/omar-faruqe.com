 <!-- ***** Main Banner Area Start ***** -->
    <div id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="left-content">
                        <div class="inner-content">
                            <h4>M/S Sagor Traders</h4>
                            <h6>THE BEST EXPERIENCE</h6>
                            <!-- <div class="main-white-button scroll-to-section">
                                <a href="#reservation">Make A Reservation</a>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="main-banner header-text">
                        <div class="Modern-Slider">
                        <?php foreach($sliders as $slider){ ?>
                          <!-- Item -->
                          <div class="item">
                            <div class="img-fill">
                                <img src="<?php echo base_url().$slider->image_path ?>" alt="">
                            </div>
                          </div>
                          <!-- // Item -->
                        <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

<style>
    .contact-form .myButton {
  margin-top: -10px;
  font-size: 13px;
  color: #fff;
  background-color: #fb5849;
  padding: 12px 25px;
  width: 100%;
  box-shadow: none;
  border: none;
  display: inline-block;
  border-radius: 3px;
  font-weight: 600;
  transition: all .3s;
}

.contact-form .myButton:hover {
  opacity: .8;
  zoom: 1.05;
}
</style>

<!-- ***** About Area Starts ***** -->
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>About Us</h6>
                            <h2>We Leave A Delicious Memory For You</h2>
                        </div>
                        <p class="text-justify"><?php echo ($about_us)? $about_us[0]->text: '';?></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="right-content">
                        <div class="thumb">
                            <a rel="nofollow" href="<?php echo $about_us? $about_us[0]->about_video: 'https://www.youtube.com/user/MaricoLimited' ?>" target="__blank"><i class="fa fa-play"></i></a>
                            <img src="<?php echo base_url(); ?>public/assets/images/about-video-bg1.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** About Area Ends ***** -->

    <!-- ***** Menu Area Starts ***** -->
    <section class="section" id="menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-heading">
                        <h6>Our Products</h6>
                        <h2>We have maintain our quality</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-item-carousel">
            <div class="col-lg-12">
                <div class="owl-menu-item owl-carousel">
                    <?php foreach($products as $pr){  ?>
                    <div class="item">
                        <div class='card' style="background-image: url('<?php echo $pr->image; ?>');">
                            <!-- <div class="price"><h6>$100004</h6></div> -->
                            <div class='info'>
                              <h1 class='title'><?php echo $pr->product_name; ?></h1>
                              <p class='description'><?php echo $pr->product_desc; ?></p>
                              <div class="main-text-button">
                                  <div class="scroll-to-section">
                                      <p>&nbsp;</p>
                                  </div>
                              </div>
                            </div>
                        </div>
                    </div>

                    <?php } ?>

                </div>
            </div>
        </div>
    </section>
    <!-- ***** Menu Area Ends ***** -->



    <!-- ***** Chefs Area Starts ***** -->
    <section class="section" id="chefs">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4 text-center">
                    <div class="section-heading">
                        <h6>Our Team</h6>
                        <h2>We offer the best support for you</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach($members as $member){ ?>
                <div class="col-lg-3">
                    <div class="chef-item">
                        <div class="thumb">
                            <div class="overlay"></div>
                            <ul class="social-icons">
                                <?php //if($member->fb !=''){ ?>
                                <li><a href="<?php echo (!empty($member->fb)) ? $member->fb: '#'; ?>"><i class="fa fa-facebook"></i></a></li>
                                <?php //} ?>
                                <!-- <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li> -->
                            </ul>
                            <img src="<?php echo base_url().$member->image; ?>" alt="Chef #1">
                        </div>
                        <div class="down-content">
                            <h4><?php echo $member->name; ?></h4>
                            <span><?php echo $member->designation; ?></span>
                            <span><?php echo $member->mobile; ?></span>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- ***** Chefs Area Ends ***** -->

    <!-- ***** Reservation Us Area Starts ***** -->
    <section class="section" id="reservation">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>Contact Us</h6>
                            <h2><?php echo $contact? $contact[0]->contact_header:''; ?></h2>
                        </div>
                        <p><?php echo $contact? $contact[0]->contact_text:''; ?></p>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="phone">
                                    <i class="fa fa-phone"></i>
                                    <h4>Phone Numbers</h4>
                                    <span><?php echo ($contact)? $contact[0]->mobile : ''; ?></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="message">
                                    <i class="fa fa-envelope"></i>
                                    <h4>Emails</h4>
                                    <span><?php echo ($contact)? $contact[0]->emails: ''; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="contact-form">
                        <form id="contact" method="post">
                          <div class="row">
                            <div class="col-lg-12">
                                <h4>Inbox us</h4>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                              <fieldset>
                                <input name="name" type="text" id="name" placeholder="Your Name*" required="">
                              </fieldset>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                              <fieldset>
                              <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email Address*" required="">
                            </fieldset>
                            </div>

                            <div class="col-lg-12">
                              <fieldset>
                                <textarea name="message" rows="6" id="message" placeholder="Message*" required=""></textarea>
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <?php if($lastMeassge){ ?>
                                <fieldset>
                                <!-- <button type="submit" id="form-submit" class="main-button-icon">Send Your Message</button> -->
                                <span style="color: red;">
                                    We have received a message from you already, please be patient. We shall reply ASAP.
                                </span>
                              </fieldset>
                                <?php }else{ ?>
                              <fieldset>
                                <!-- <button type="submit" id="form-submit" class="main-button-icon">Send Your Message</button> -->
                                <input type="submit" id="form-submit" name="submit" class="myButton" value="Send Your Message">
                              </fieldset>
                                <?php } ?>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Reservation Area Ends ***** -->



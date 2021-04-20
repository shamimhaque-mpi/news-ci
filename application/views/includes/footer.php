        <?php
            $footer = read('footer');
            $header = read('header');
        ?>
        <!-- download area start -->
        <div class="download_area">
            <div class="container">
                <div class="download_content">
                    <a href="" class="brand">
                        <!-- <img src="<?php echo site_url('public/images/logo/01.png');?>" alt=""> -->
                        DEMO<span>NEWS</span>
                    </a>
        
                    <div class="app">
                        <p>মোবাইল অ্যাপ্লিকেশন ডাউনলোড করুন</p>
                        <div>
                            <a href=""><img src="<?php echo site_url('public/images/app_1.png');?>" alt=""></a>
                            <a href=""><img src="<?php echo site_url('public/images/app_2.png');?>" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- download area end -->
        
        

        <!-- footer section strat -->
        <footer class="primary_fotter">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4">
                        <div class="contact_info">
                            <h5>আমাদের সংবাদপত্রে আপনাকে স্বাগতম</h5>
                            <p>কার্যালয় : <?=($footer ? $footer[0]->location : '')?></p>
                            <p>মোবাইল : <a href="tel:<?=($footer ? $footer[0]->phone : '')?>"><?=($footer ? $footer[0]->phone : '')?></a></p>
                            <p>ই-মেইল : <a href="mailto:<?=($footer ? $footer[0]->email : '')?>"><?=($footer ? $footer[0]->email : '')?></a></p>
                        </div>
                        <ul class="social_link">
                            <li><a href="<?=($footer ? $footer[0]->fb_link : '')?>" class="facebook"><i class="icon ion-logo-facebook"></i></a></li>
                            <li><a href="<?=($footer ? $footer[0]->tw_link : '')?>" class="twitter"><i class="icon ion-logo-twitter"></i></a></li>
                            <li><a href="<?=($footer ? $footer[0]->youtube : '')?>" class="youtube"><i class="icon ion-logo-youtube"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-xl-8 offset-xl-1 col-lg-8">
                        <div class="row">
                            <div class="col-lg-4 col-6">
                                <h5>সর্বশেষ সংবাদ</h5>
                                <ul class="menu_list">
                                    <li><a href="#">বিনোদন</a></li>
                                    <li><a href="#">বাংলাদেশ</a></li>
                                    <li><a href="#">আন্তর্জাতিক</a></li>
                                    <li><a href="#">খেলা</a></li>
                                    <li><a href="#">বিজ্ঞান</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-4 col-6">
                                <h5>জনপ্রিয় বিভাগ</h5>
                                <ul class="menu_list">
                                    <li><a href="#">বিনোদন</a></li>
                                    <li><a href="#">অর্থনীতি</a></li>
                                    <li><a href="#">বাঁচার জীবন</a></li>
                                    <li><a href="#">খেলা</a></li>
                                    <li><a href="#">শিক্ষা</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-4 col-6">
                                <h5>জনপ্রিয় বিভাগ</h5>
                                <ul class="menu_list">
                                    <li><a href="#">বিনোদন</a></li>
                                    <li><a href="#">বাংলাদেশ</a></li>
                                    <li><a href="#">আন্তর্জাতিক</a></li>
                                    <li><a href="#">খেলা</a></li>
                                    <li><a href="#">বিজ্ঞান</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="athor_info">
                    <div class="text-right">
                        <h5>সম্পাদক</h5>
                        <p><?=($footer ? $footer[0]->editor_name : '')?></p>
                        <p>মোবাইলঃ <?=($footer ? $footer[0]->editor_mobile : '')?></p>
                    </div>
                    <div class="separator">
                        <h5>প্রকাশক</h5>
                        <p><?=($footer ? $footer[0]->publisher_name : '')?></p>
                        <p>মোবাইলঃ <?=($footer ? $footer[0]->editor_mobile : '')?></p>
                    </div>
                </div>
            </div>
        </footer>
        <footer class="secondary_footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 md_separator">
                        <p>© ২০২০-২০২১ সর্বাধিক অধিকার সংরক্ষিত</p>
                    </div>
                    <div class="col-md-6 text-md-right">
                        <p>নির্মাণে - <a href="http://www.freelanceitlab.com/" target="_blank">Freelance iT Lab</a></p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer section end -->



        <!-- bootstrap js -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
        <!-- owl carousel js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <!-- news ticker js -->
    	<script src="<?php echo site_url('public/vendors/ticker/js/breaking-news-ticker.min.js')?>"></script>
        <!-- include js -->
        <script src="<?php echo site_url('public/js/app.js')?>"></script>
        <script>
        
            /* news text slider */
            $('#newsTicker14').breakingNews({
                scrollSpeed: '2',
                radius: '0',
                // effect: 'fade',
                delayTimer: '3000'
            });

            /* carousel costom script */
            $('.carousel').carousel({
                interval: false,
            });

            /* gallery carousel */
            $('.gallery_carousel').owlCarousel({
                autoplay:true,
                loop:true,
                dots:false,
                nav:false,
                autoplayTimeout:5000,
                margin: 10,
                responsive:{
                    1330:{items:6},
                    1200:{items:4},
                    991:{items:3},
                    768:{items:3},
                    420:{items:2},
                    0:{items:2}
                }
            });
        </script>
    </body>
</html>

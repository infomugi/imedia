<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo CHtml::encode($this->pageTitle); ?></title>
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/classic/img/logo.png">
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-responsive.css" />
  <script>
    function cetak(){
      document.getElementById("p").style.visibility="hidden";
      window.print();
    }
  </script>
</head>

<body class="">
  <div id="invoice" style="width: 800px;text-align: center;padding: 10px;">
    <div style="text-align: left;">
      <?php echo $content; ?>
    </div>
  </div>
</body>
</html>



<h1><a href="#" accesskey="h"><img src="<?php echo Yii::app()->baseUrl; ?>/image/template/logo/logo.png" alt="Infomugi" width="178" height="53"></a></h1>
<nav id="skip">
    <ul>
        <li><a href="index.html#nav" accesskey="n">Skip to navigation (n)</a></li>
        <li><a href="index.html#content" accesskey="c">Skip to content (c)</a></li>
        <li><a href="index.html#footer" accesskey="f">Skip to footer (f)</a></li>
    </ul>
</nav>
<nav id="nav">

<?php
$this->widget('zii.widgets.CMenu', array(
    'htmlOptions' => array('class' => 'nav'),
    'encodeLabel'=>FALSE,
    'items' => array(
        array('label' => 'Dashboard', 'url' => array('/site/dashboard'), 'visible' => !Yii::app()->user->isGuest),
        array('label' => 'Home', 'url' => array('/site'), 'visible' => Yii::app()->user->isGuest),
        array('label' => 'Jasa Website', 'url' => array('/promo')),
        array('label' => 'Portofolio', 'url' => array('/article/portofolio')),
        )
    ));
    ?>    

<ul>
    <li class="desktop-only"><i class="fa fa-phone"></i> 087824931504</li>
  <li><a class="a" href="<?php echo Yii::app()->baseUrl; ?>/contact" target="_blank" title="Kontak Kami">Kirim Pesan</a></li>
</ul>
</nav>            

<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
?>
<!-- START: 1 - Our Expertise -->
<section id="content" class="home-a">
    <article>
        <?php echo Yii::app()->db->createCommand("SELECT content FROM setting where id_setting=1")->queryScalar();?>
        <ul class="list-c">
            <?php foreach (Category::getExpertise() as $data) { ?>   
                <li><span class="header"><i class="<?php echo $data["icon"]; ?>" data-icon="&#xe026;"></i> <?php echo $data["name"]; ?></span> <?php echo $data["description"]; ?> <a href="article/category/name/<?php echo strtolower($data["name"]); ?>">Contoh</a></li>  
                <?php } ?>  
            </ul>
        </article>
        <!-- END: 1 - Our Expertise -->

        <!-- START: 2 - Portofolio -->
        <article class="b c">
            <?php echo Yii::app()->db->createCommand("SELECT content FROM setting where id_setting=2")->queryScalar();?>
            <ul class="gallery-b">
                <?php foreach (Post::getPortofolio() as $data) { ?>   
                    <li>
                        <img src="image/posting/middle/<?php echo $data["image"]; ?>" alt="<?php echo $data["image"]; ?>" width="360" height="270">
                        <div>
                            <h3><?php echo $data["title"]; ?></h3>               
                            <p><?php echo $data["keyword"]; ?></p>
                            <p class="link-b"><a href="article/<?php echo $data["url"]; ?>">View</a></p>
                        </div>
                        <span>Mobile</span>
                    </li>
                    <?php } ?>  
                </ul>
                <p class="link-d"><?php echo CHtml::link('<i class="fa fa-plus"></i> Load More',array('article/portofolio'),array('title'=>'More'));?></p>
            </article>
            <!-- END: 2 - Portofolio -->

            <!-- START: 4 - Our Team -->
<!-- 
            <article>
                <?php echo Yii::app()->db->createCommand("SELECT content FROM setting where id_setting=4")->queryScalar();?>
                <ul class="list-d">
                    <?php foreach (Users::getTeam() as $data) { ?>   
                        <li>
                            <img src="image/avatar/<?php echo $data["avatar"]; ?>" alt="Placeholder" width="154" height="154">
                            <h3><span><?php echo $data["firstname"]; ?> <?php echo $data["lastname"]; ?></span> <?php echo $data["work"]; ?></h3>
                            <span>
                                <?php echo $data["about"]; ?>
                            </span>
                            <ul class="social-a">
                                <li class="li fa fa-path"><a rel="external" href="#0">Path</a></li>
                                <li class="fb fa fa-facebook"><a rel="external" href="#1">Facebook</a></li>
                                <li class="tw fa fa-twitter"><a rel="external" href="#2">Twitter</a></li>
                                <li class="dr fa fa-google-plus"><a rel="external" href="#3">Google Plus</a></li>
                            </ul>
                        </li>
                        <?php } ?>  
                    </ul>
                </article>
-->
                <!-- END: 4 - Our Team -->

                <!-- START: 5 - Start a Project -->
                <?php echo Yii::app()->db->createCommand("SELECT content FROM setting WHERE id_setting=5 AND active=1")->queryScalar();?>
                <!-- END: 5 - Start a Project -->

                <!-- START: 6 - Twitter Feed -->
                <?php echo Yii::app()->db->createCommand("SELECT content FROM setting WHERE id_setting=10 AND active=1")->queryScalar();?>
                <!-- END: 6 - Twitter Feed -->

                <!-- START: 7 - Count Project -->
                <?php echo Yii::app()->db->createCommand("SELECT content FROM setting WHERE id_setting=6 AND active=1" )->queryScalar();?>
                <!-- END: 7 - Count Project -->

            </section>
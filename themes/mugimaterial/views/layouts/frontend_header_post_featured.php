 <?php echo Yii::app()->db->createCommand("SELECT content FROM setting where id_setting=7")->queryScalar();?>

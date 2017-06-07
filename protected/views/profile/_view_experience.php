<div class="row workDetails">
<div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
  <div class="workYear"><?php echo CHtml::encode($data->date); ?></div>
  </div>
  <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 rightArea">
    <div class="arrowpart"></div>
    <div class="exCon">
      <h4><?php echo CHtml::encode($data->name); ?></h4>
      <h5><?php echo CHtml::encode($data->Division->name); ?></h5>
      <p><?php echo CHtml::encode($data->description); ?></p>
    </div>
  </div>
</div>

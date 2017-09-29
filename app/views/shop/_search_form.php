<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<?= Html::beginForm(Url::to(['/shop/search']), 'get') ?>
  <div class="o-searchForm d-flex">
    <div class="form-group">
      <?= Html::textInput('text', $text, ['class' => 'form-control', 'placeholder' => 'Traži']) ?>
    </div>
    <div class="form-group">
      <?= Html::submitButton('<i class="glyphicon glyphicon-search"></i>', ['class' => 'btn btn-default']) ?>
    </div>
  </div>
<?= Html::endForm() ?>

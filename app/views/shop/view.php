<?php
use app\models\AddToCartForm;
use yii\easyii\modules\catalog\api\Catalog;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = $item->seo('title', $item->model->title);
$this->params['breadcrumbs'][] = ['label' => 'Katalog', 'url' => ['shop/index']];
$this->params['breadcrumbs'][] = ['label' => $item->cat->title, 'url' => ['shop/cat', 'slug' => $item->cat->slug]];
$this->params['breadcrumbs'][] = $item->model->title;

$colors = [];
if(!empty($item->data->color) && is_array($item->data->color)) {
    foreach ($item->data->color as $color) {
        $colors[$color] = $color;
    }
}
?>

<div class="o-shopItemView">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h1 class="o-shopItemView_ttl"><?= $item->seo('h1', $item->title) ?></h1>

        <div class="row">
          <div class="col-md-3 imgFull">
            <?= Html::img($item->thumb(120, 240)) ?>
          </div>
          <div class="col-md-9">
            <div class="row">
              <div class="col-md-8">
                <h2>
                  <span class="label label-warning"><?php echo number_format($item->price, 2, ',', '.'); ?> HRK</span>
                  <?php if($item->discount) { ?>
                    <del class="small"><?php echo number_format($item->oldPrice, 2, ',', '.'); ?></del>
                  <?php } ?>
                </h2>
                <h3>Karakteristike</h3>
                <?php foreach ($category->fields as $field) {
                  if (isset($item->data->{$field->name})) { ?>
                    <span class="text-muted"><?php echo $field->title; ?>:</span>
                    <?php if (is_array($item->data->{$field->name})) {
                      foreach ($item->data->{$field->name} as $key => $value) {
                        echo $value  . ', ';
                      }
                    } else {
                      echo $item->data->{$field->name};
                    } ?>
                    <br/>
                  <?php }
                }

                if(!empty($item->data->features)) { ?>
                  <br/>
                  <span class="text-muted">Features:</span> <?= implode(', ', $item->data->features) ?>
                <?php } ?>
              </div>
              <div class="col-md-4">
                <?php if(Yii::$app->request->get(AddToCartForm::SUCCESS_VAR)) : ?>
                  <h4 class="text-success"><i class="glyphicon glyphicon-ok"></i> Dodano za upit</h4>
                <?php elseif($item->available) : ?>
                  <br/>
                  <div class="well well-sm">
                    <?php $form = ActiveForm::begin(['action' => Url::to(['/shopcart/add', 'id' => $item->id])]); ?>
                    <?php if(count($colors)) : ?>
                      <?= $form->field($addToCartForm, 'color')->dropDownList($colors) ?>
                    <?php endif; ?>
                    <?= $form->field($addToCartForm, 'count') ?>
                    <?= Html::submitButton('Dodaj za upit', ['class' => 'btn btn-warning']) ?>
                    <?php ActiveForm::end(); ?>
                  </div>
                <?php endif; ?>
              </div>
            </div>

            <br />
            <?= $item->description ?>
          </div>

          <div class="col-sm-12">
            <?php if(count($item->photos)) : ?>
            <div class="o-gallery">
              <h4 class="o-gallery_ttl">Photos</h4>

              <div class="row">

                <?php foreach($item->photos as $photo) : ?>
                  <div class="col-xs-3 col-md-2">
                    <div class="o-novelty">
                      <!-- TODO increase variation to 200x200 -->
                      <?= $photo->box(null, 100) ?>
                    </div>
                  </div>
                <?php endforeach;?>
                <?php Catalog::plugin() ?>

              </div>

            </div>
            <?php endif; ?>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>

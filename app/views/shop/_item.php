<?php use yii\helpers\Html; ?>

<div class="row">
    <div class="col-md-2">
        <?= Html::img($item->thumb(100, 160)) ?>
    </div>
    <div class="col-md-10">
        <p><?= Html::a($item->title, ['shop/view', 'slug' => $item->slug]) ?></p>
        <p>
          <?php $counter = 0; foreach ($category->fields as $field) {
            if ($counter == 3) break; ?>
            <span class="text-muted"><?php echo $field->title; ?>:</span> <?= $item->data->{$field->name} ?>
            <br/>
          <?php $counter++; }

          if(!empty($item->data->features)) { ?>
            <span class="text-muted">Ostalo:</span> <?php echo implode(', ', $item->data->features);
          } ?>
        </p>
        <h3>
          <?php if($item->discount) { ?>
              <del class="small"><?php echo number_format($item->oldPrice, 2, ',', '.'); ?></del>
          <?php }
          echo number_format($item->price, 2, ',', '.'); ?> HRK
        </h3>
    </div>
</div>
<br>

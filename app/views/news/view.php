<?php
use yii\easyii\modules\news\api\News;
use yii\helpers\Url;

$this->title = $news->seo('title', $news->model->title);
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['news/index']];
$this->params['breadcrumbs'][] = $news->model->title;
?>
<div class="container">
  <div class="row">
    <div class="col-sm-12">

      <div class="o-newsView">

        <h1 class="o-newsView_title"><?= $news->title; ?></h1>

        <hr class="c-hr">

        <?= $news->text ?>

        <?php if(count($news->photos)) : ?>
          <div class="o-gallery">
            <h4 class="o-gallery_ttl">Photos</h4>

            <div class="row">

              <?php foreach($news->photos as $photo) : ?>
                <div class="col-xs-3 col-md-2">
                  <div class="o-novelty">
                    <!-- TODO increase variation to 200x200 -->
                    <?= $photo->box(100, 100) ?>
                  </div>
                </div>
              <?php endforeach;?>

              <div class="col-sm-12">
                <?php News::plugin() ?>
              </div>

            </div>
          </div>
        <?php endif; ?>

        <div class="mb-4">
          <?php foreach($news->tags as $tag) : ?>
              <a href="<?= Url::to(['/news', 'tag' => $tag]) ?>" class="label label-info"><?= $tag ?></a>
          <?php endforeach; ?>
        </div>

        <div class="small-muted">Views: <?= $news->views ?></div>

      </div>

    </div>
  </div>
</div>

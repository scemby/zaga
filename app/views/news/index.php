<?php
use yii\easyii\modules\news\api\News;
use yii\easyii\modules\page\api\Page;
use yii\helpers\Html;
use yii\helpers\Url;

$page = Page::get('page-news');

$this->title = $page->seo('title', $page->model->title);
$this->params['breadcrumbs'][] = $page->model->title;
?>

<div class="container">
  <div class="row">
    <div class="col-sm-12">

      <h1><?= $this->title ?></h1>

      <ul class="o-news">


        <?php foreach($news as $item) : ?>
          <li class="o-news_item">
            <div class="row">
              <div class="col-md-2">
                <!-- TODO add img with according class -->
                <!-- <img class="o-news_img" src="" alt="">-->
                <?= Html::img($item->thumb(160, 120)) ?>
              </div>

              <div class="col-md-10">

                <!-- TODO add item title and link to it -->
                <a class="o-news_link" href="#">Some static title which needs to be changed</a>

                <div class="o-news_date"><?= $item->date ?></div>

                <div class="o-news_desc"><?= $item->short ?></div>

                <div>
                  <?php foreach($item->tags as $tag) : ?>
                    <a href="<?= Url::to(['/news', 'tag' => $tag]) ?>" class="label label-info"><?= $tag ?></a>
                  <?php endforeach; ?>
                </div>

              </div>
            </div>
          </li>
        <?php endforeach; ?>

      </ul>


    </div>
  </div>
</div>

<?= News::pages() ?>

<?php

use yii\easyii\modules\feedback\api\Feedback;
use yii\easyii\modules\page\api\Page;

$page = Page::get('page-contact');

$this->title = $page->seo('title', $page->model->title);
$this->params['breadcrumbs'][] = $page->model->title;
?>

<div class="o-contactPage">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h1 class="m-0"><?= $page->seo('h1', $page->title) ?></h1>
      </div>
    </div>

    <div class="row">
      <div class="col-md-7">
        <?php if(Yii::$app->request->get(Feedback::SENT_VAR)) : ?>
          <h4 class="text-success"><i class="glyphicon glyphicon-ok"></i> Poruka uspješno poslana.</h4>
        <?php else : ?>
          <div class="well well-sm mt-3">
            <?= Feedback::form() ?>
          </div>
        <?php endif; ?>
      </div>
      <div class="col-md-5">
        <?= $page->text ?>
      </div>
    </div>
  </div>
</div>

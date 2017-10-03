<?php
use yii\easyii\modules\catalog\api\Catalog;
use yii\easyii\modules\file\api\File;
use yii\easyii\modules\page\api\Page;
use yii\helpers\Url;
use yii\helpers\Html;

$page = Page::get('page-shop');

$this->title = $page->seo('title', $page->model->title);
$this->params['breadcrumbs'][] = 'Katalog';

function renderNode($node, $initialImage = true){
    if(!count($node->children)){
        $html = '<li class="o-catalog_item">';

        if ($initialImage) {
          $nodeImage = Catalog::cat($node->category_id);
          $html .= '<div class="text-center">' . Html::img($nodeImage->image) . '</div>';
        }

        $html .= Html::a($node->title, ['/shop/cat', 'slug' => $node->slug]) . '</li>';
    } else {
      $html = '<li class="o-catalog_item o-catalog_item-drop relative">';

      if ($initialImage) {
        $nodeImage = Catalog::cat($node->category_id);
        $html .= '<div class="text-center">' . Html::img($nodeImage->image) . '</div>';
      }

      $html .= '<input id="' . $node->slug . '" class="o-toggle_trigger" type="checkbox">
        <label class="o-toggle_label" for="' . $node->slug . '">
          ' . $node->title . '
          <span class="first">↓</span>
          <span class="second">←</span>
        </label>';

      $html .= '<ul class="o-catalog_list">';

      foreach($node->children as $child){
        $html .= renderNode($child, false);
      }

      $html .= '</ul></li>';
    }

    return $html;
} ?>

<div class="p-catalog">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="o-catalog">

          <ul class="o-catalog_list">
            <?php foreach(Catalog::tree() as $node) echo renderNode($node); ?>
          </ul>

        </div>
      </div>
      <div class="col-md-3">
        <div class="o-newProducts">

          <?= $this->render('_search_form', ['text' => '']) ?>

          <h4 class="o-newProducts_mainTtl">Najnoviji proizvodi</h4>

          <div>
            <?php foreach(Catalog::last(5) as $item) { ?>
              <article class="o-newProducts_item">
                <a href="<?= Url::to(['/shop/view/' . $item->slug]) ?>">
                  <table>
                    <tbody>
                      <tr>

                        <td>
                          <?= Html::img($item->thumb(70)) ?>
                        </td>

                        <td>
                          <div>
                            <h2 class="o-newProducts_ttl"><?= $item->title; ?></h2>
                          </div>
                          <span class="label label-warning"><?php echo number_format($item->price, 2, ',', '.'); ?> HRK</span>
                        </td>

                      </tr>
                    </tbody>
                  </table>
                </a>
              </article>
            <?php } ?>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

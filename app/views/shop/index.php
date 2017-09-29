<?php
use yii\easyii\modules\catalog\api\Catalog;
use yii\easyii\modules\file\api\File;
use yii\easyii\modules\page\api\Page;
use yii\helpers\Html;

$page = Page::get('page-shop');

$this->title = $page->seo('title', $page->model->title);
$this->params['breadcrumbs'][] = 'Katalog';

function renderNode($node){
    if(!count($node->children)){
        $html = '<li class="list-group-item test1">'.Html::a($node->title, ['/shop/cat', 'slug' => $node->slug]).'</li>';
    } else {
        $html = '<li class="list-group-item test2">'.$node->title.'</li>';
        $html .= '<ul class="list-group test3">';
        foreach($node->children as $child) $html .= renderNode($child);
        $html .= '</ul>';
    }
    return $html;
}
?>

<div class="p-catalog">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="o-catalog">
<!--          --><?php //foreach(Catalog::tree() as $node) echo renderNode($node); ?>
          
          <ul class="o-catalog_list">

            <li class="o-catalog_item o-catalog_item-drop">
              <input id="cat1" class="o-toggle_trigger" type="checkbox">
              <a href="#">Nav</a>
              <label class="o-toggle_label" for="cat1">
                <span class="first">↓</span>
                <span class="second">←</span>
              </label>

              <ul class="o-catalog_list">

                <li class="o-catalog_item o-catalog_item-drop">
                  <input id="cat2" class="o-toggle_trigger" type="checkbox">
                  <a href="#">Nav Nav</a>
                  <label class="o-toggle_label" for="cat2">
                    <span class="first">↓</span>
                    <span class="second">←</span>
                  </label>

                  <ul class="o-catalog_list">
                    <li class="o-catalog_item">
                      <a href="#">Nav Nav Nav</a>
                    </li>
                  </ul>

                </li>

                <li class="o-catalog_item">
                  <a href="#">Nav Nav 2</a>
                </li>

                <li class="o-catalog_item">
                  <a href="#">Nav Nav 3</a>
                </li>

                <li class="o-catalog_item o-catalog_item-drop">
                  <input id="cat3" class="o-toggle_trigger" type="checkbox">
                  <a href="#">Nav Nav</a>
                  <label class="o-toggle_label" for="cat3">
                    <span class="first">↓</span>
                    <span class="second">←</span>
                  </label>

                  <ul class="o-catalog_list">
                    <li class="o-catalog_item">
                      <a href="#">Nav Nav Nav</a>
                    </li>
                  </ul>

                </li>

              </ul>

            </li>

            <li class="o-catalog_item">
              <a href="#">Something</a>
            </li>

            <li class="o-catalog_item o-catalog_item-drop">
              <input id="cat4" class="o-toggle_trigger" type="checkbox">
              <a href="#">Nav</a>
              <label class="o-toggle_label" for="cat4">
                <span class="first">↓</span>
                <span class="second">←</span>
              </label>

              <ul class="o-catalog_list">

                <li class="o-catalog_item o-catalog_item-drop">
                  <input id="cat5" class="o-toggle_trigger" type="checkbox">
                  <a href="#">Nav Nav</a>
                  <label class="o-toggle_label" for="cat5">
                    <span class="first">↓</span>
                    <span class="second">←</span>
                  </label>

                  <ul class="o-catalog_list">
                    <li class="o-catalog_item">
                      <a href="#">Nav Nav Nav</a>
                    </li>
                  </ul>

                </li>

                <li class="o-catalog_item">
                  <a href="#">Nav Nav 2</a>
                </li>

                <li class="o-catalog_item">
                  <a href="#">Nav Nav 3</a>
                </li>

                <li class="o-catalog_item o-catalog_item-drop">
                  <input id="cat6" class="o-toggle_trigger" type="checkbox">
                  <a href="#">Nav Nav</a>
                  <label class="o-toggle_label" for="cat6">
                    <span class="first">↓</span>
                    <span class="second">←</span>
                  </label>

                  <ul class="o-catalog_list">
                    <li class="o-catalog_item">
                      <a href="#">Nav Nav Nav</a>
                    </li>
                  </ul>

                </li>

              </ul>

            </li>

            <li class="o-catalog_item">
              <a href="#">Something</a>
            </li>

            <li class="o-catalog_item">
              <a href="#">Something</a>
            </li>

            <li class="o-catalog_item">
              <a href="#">Something</a>
            </li>

            <li class="o-catalog_item">
              <a href="#">Something</a>
            </li>

            <li class="o-catalog_item o-catalog_item-drop">
              <input id="cat7" class="o-toggle_trigger" type="checkbox">
              <a href="#">Nav</a>
              <label class="o-toggle_label" for="cat7">
                <span class="first">↓</span>
                <span class="second">←</span>
              </label>

              <ul class="o-catalog_list">

                <li class="o-catalog_item o-catalog_item-drop">
                  <input id="cat8" class="o-toggle_trigger" type="checkbox">
                  <a href="#">Nav Nav</a>
                  <label class="o-toggle_label" for="cat8">
                    <span class="first">↓</span>
                    <span class="second">←</span>
                  </label>

                  <ul class="o-catalog_list">
                    <li class="o-catalog_item">
                      <a href="#">Nav Nav Nav</a>
                    </li>
                  </ul>

                </li>

                <li class="o-catalog_item">
                  <a href="#">Nav Nav 2</a>
                </li>

                <li class="o-catalog_item">
                  <a href="#">Nav Nav 3</a>
                </li>

                <li class="o-catalog_item o-catalog_item-drop">
                  <input id="cat9" class="o-toggle_trigger" type="checkbox">
                  <a href="#">Nav Nav</a>
                  <label class="o-toggle_label" for="cat9">
                    <span class="first">↓</span>
                    <span class="second">←</span>
                  </label>

                  <ul class="o-catalog_list">
                    <li class="o-catalog_item">
                      <a href="#">Nav Nav Nav</a>
                    </li>
                  </ul>

                </li>

              </ul>

            </li>

            <li class="o-catalog_item">
              <a href="#">Something</a>
            </li>

            <li class="o-catalog_item o-catalog_item-drop">
              <input id="cat10" class="o-toggle_trigger" type="checkbox">
              <a href="#">Nav</a>
              <label class="o-toggle_label" for="cat10">
                <span class="first">↓</span>
                <span class="second">←</span>
              </label>

              <ul class="o-catalog_list">

                <li class="o-catalog_item o-catalog_item-drop">
                  <input id="cat11" class="o-toggle_trigger" type="checkbox">
                  <a href="#">Nav Nav</a>
                  <label class="o-toggle_label" for="cat11">
                    <span class="first">↓</span>
                    <span class="second">←</span>
                  </label>

                  <ul class="o-catalog_list">
                    <li class="o-catalog_item">
                      <a href="#">Nav Nav Nav</a>
                    </li>
                  </ul>

                </li>

                <li class="o-catalog_item">
                  <a href="#">Nav Nav 2</a>
                </li>

                <li class="o-catalog_item">
                  <a href="#">Nav Nav 3</a>
                </li>

                <li class="o-catalog_item o-catalog_item-drop">
                  <input id="cat12" class="o-toggle_trigger" type="checkbox">
                  <a href="#">Nav Nav</a>
                  <label class="o-toggle_label" for="cat12">
                    <span class="first">↓</span>
                    <span class="second">←</span>
                  </label>

                  <ul class="o-catalog_list">
                    <li class="o-catalog_item">
                      <a href="#">Nav Nav Nav</a>
                    </li>
                  </ul>

                </li>

              </ul>

            </li>

          </ul>

        </div>
      </div>
      <div class="col-md-3">
        <div class="o-newProducts">

          <?= $this->render('_search_form', ['text' => '']) ?>

          <h4 class="o-newProducts_mainTtl">Najnoviji proizvodi</h4>

          <div>
            <?php foreach(Catalog::last(10) as $item) : ?>
              <article class="o-newProducts_item">
                <a href="#">
                  <table>
                    <tbody>
                      <tr>

                        <td>
                          <!-- TODO needs to add larger variation (70px) -->
                          <?= Html::img($item->thumb(30)) ?>
                        </td>

                        <td>
                          <div>

                            <!-- TODO add title without link since we cannot have nested links -->
                            <h2 class="o-newProducts_ttl"><?= $item->title; ?></h2>
                          </div>
                          <span class="label label-warning"><?php echo number_format($item->price, 2, ',', '.'); ?> HRK</span>
                        </td>

                      </tr>
                    </tbody>
                  </table>
                </a>
              </article>
            <?php endforeach; ?>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

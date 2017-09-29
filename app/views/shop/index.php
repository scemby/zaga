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

            <li class="o-catalog_item">
              <article class="o-article">
                <a class="o-catalog_link" href="#">Felco</a>
              </article>
            </li>

            <li class="o-catalog_item">
              <article class="o-article">
                <a class="o-catalog_link" href="#">Elektroagregati</a>
              </article>
            </li>

            <li class="o-catalog_item">
              <article class="o-article">
                <a class="o-catalog_link" href="#">Labin progres</a>
              </article>
            </li>

            <li class="o-catalog_item">
              <article class="o-article">
                <a class="o-catalog_link" href="#">Motokopačice</a>
              </article>
            </li>

            <li class="o-catalog_item">
              <article class="o-article">
                <input id="cat1" class="o-toggle_trigger" type="checkbox">
                <label class="o-toggle_label o-catalog_link" for="cat1">
                  STIHL proizvodi
                  <span class="first">↓</span>
                  <span class="second">←</span>
                </label>

                <div class="o-toggle_body">
                  <ul class="o-article_list">
                    <li class="o-article_item"><a href="#">Motorne pile</a></li>
                    <li class="o-article_item"><a href="#">Električne pile</a></li>
                    <li class="o-article_item"><a href="#">Akumulatorske pile</a></li>
                    <li class="o-article_item"><a href="#">Motorne kose</a></li>
                    <li class="o-article_item"><a href="#">Električne kose</a></li>
                    <li class="o-article_item"><a href="#">Električne kose</a></li>
                    <li class="o-article_item"><a href="#">Električne kose</a></li>
                    <li class="o-article_item"><a href="#">Električne kose</a></li>
                    <li class="o-article_item"><a href="#">Električne kose</a></li>
                    <li class="o-article_item"><a href="#">Električne kose</a></li>
                  </ul>
                </div>
              </article>
            </li>

            <li class="o-catalog_item">
              <article class="o-article">
                <a class="o-catalog_link" href="#">Strižna kosa</a>
              </article>
            </li>

            <li class="o-catalog_item">
              <article class="o-article">
                <a class="o-catalog_link" href="#">LOMBARDINI MARINE - uskoro</a>
              </article>
            </li>

            <li class="o-catalog_item">
              <article class="o-article">
                <input id="cat2" class="o-toggle_trigger" type="checkbox">
                <label class="o-toggle_label o-catalog_link" for="cat2">
                  Oprema za maslinarstvo
                  <span class="first">↓</span>
                  <span class="second">←</span>
                </label>

                <div class="o-toggle_body">
                  <ul class="o-article_list">
                    <li class="o-article_item"><a href="#">Mreže</a></li>
                    <li class="o-article_item"><a href="#">Grabljice</a></li>
                    <li class="o-article_item"><a href="#">Inox bačve za ulje</a></li>
                    <li class="o-article_item"><a href="#">Inox slavine</a></li>
                  </ul>
                </div>
              </article>
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

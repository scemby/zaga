<?php

use yii\easyii\modules\shopcart\api\Shopcart;
use yii\easyii\modules\subscribe\api\Subscribe;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;

$asset = \app\assets\AppAsset::register($this);
$goodsCount = count(Shopcart::goods());

$this->beginContent('@app/views/layouts/base.php'); ?>

<header class="o-mainHeader">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">

        <nav class="navbar navbar-default o-mainHeader_nav">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-menu">
                <span class="sr-only">Menu</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="o-mainHeader_logo" href="<?= Url::home() ?>">
              <img src="<?= $asset->baseUrl ?>/logo-white.png" height="180%"/>
            </a>
          </div>

          <div class="collapse navbar-collapse shopCart" id="navbar-menu">
            <?= Menu::widget([
              'options' => ['class' => 'nav navbar-nav'],
              'items' => [
                ['label' => 'Naslovna', 'url' => ['site/index']],
                ['label' => 'Katalog', 'url' => ['shop/index']],
                // ['label' => 'Felco', 'url' => "http://www.felco-racki.com"],
                ['label' => 'Novosti', 'url' => ['news/index']],
                //['label' => 'Galerija', 'url' => ['gallery/index']],
                ['label' => 'Kontakt', 'url' => ['/contact/index']],
              ],
            ]); ?>
            <a href="<?= Url::to(['/shopcart']) ?>" class="btn btn-default navbar-btn navbar-right color-white"
                title="Pošalji upit">
              <i class="c-icon"><img class="c-icon_img" src="<?= $asset->baseUrl ?>/icons/info.png" alt="i"></i>
              <?php if($goodsCount > 0) { ?>
                  <?= $goodsCount ?> <?= $goodsCount > 1 ? 'items' : 'item' ?> - <?php echo number_format(Shopcart::cost(), 2, ',', '.'); ?> HRK
              <?php } ?>
            </a>

          </div>
        </nav>

      </div>
    </div>
  </div>
</header>

<main>
  <?php /* if($this->context->id != 'site') : ?>
      <br/>
      <?php echo Breadcrumbs::widget([
          'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
      ])?>
  <?php endif; */ ?>
  <?= $content ?>
  <div class="push"></div>
</main>

<footer class="o-mainFooter" style="background-image: url('<?php echo $asset->baseUrl ?>/footer-background.png');">
  <div class="container">
    <div class="row">

      <div class="col-sm-12">

        <div class="d-flex-md justify-content-between-md text-md-down-center">
          <div class="o-mainFooter_logo">
            <img class="o-mainFooter_logo_img" src="<?= $asset->baseUrl ?>/logo-white.png">
          </div>

          <div class="o-mainFooter_brands">
            <img class="o-mainFooter_brands_img" src="<?= $asset->baseUrl ?>/logos_banner.png">
          </div>
        </div>

        <div class="o-mainFooter_sep"></div>
      </div>

      <div class="col-md-4 col-sm-6 ">
        <p>Porijeklo kapitala  100% domaći kapital - izvor FINA (domaći kapital - izvor DZS) 20.000 Kn uplaćen u cijelosti.
          Direktor i član uprave društva je Matija Rački zastupa društvo pojedinačno i samostalno.</p>
        <p><i class="fa fa-map-pin"></i> Zagrebačka 18, 51500 Krk</p>
        <p><i class="fa fa-phone"></i> Tel.: ‎+385 51 220 330</p>
        <p><i class="fa fa-envelope"></i> E-mail: <a href="mailto:info@zaga-racki.hr">info@zaga-racki.hr</a></p>
      </div>

      <div class="col-md-4 col-sm-6">
        <h6 class="heading7">Ostale informacije</h6>
        <ul class="footer-ul">
          <li>OIB: 71162092072</li>
          <li>Trgovački sud u Rijeci</li>
          <li>Godina osnivanja: 2002</li>
          <li>Registracijski broj: 040173519</li>
          <li>Registracijski broj: 040173519</li>
          <li>Poslovna banka: PBZ HR4023400091110078470</li>
          <li>BIC/SWIFT: PBZGHR2X</li>
        </ul>
      </div>

      <div class="col-md-4 col-sm-12">

        <div class="o-subscribe_wrap">
          <div>
            Prijava na newsletter
          </div>

          <div class="o-subscribe">
            <?php if(Yii::$app->request->get(Subscribe::SENT_VAR)) : ?>
              Uspješno ste se prijavili
            <?php else : ?>
              <?= Subscribe::form() ?>
            <?php endif; ?>
          </div>
        </div>

      </div>

    </div>
  </div>

  <div class="o-copyright">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="o-tbl o-tbl-full o-tbl-middle o-tbl-fix">
            <div class="o-tbl_cell text-md-down-center">
              © 2017 - zaga-racki.hr
            </div>

            <div class="o-tbl_cell">
              <div class="o-social d-flex justify-content-center">
                <a href="https://www.facebook.com/zagakrk">
                  <img src="<?= $asset->baseUrl ?>/icons/facebook.png" alt="Facebook">
                </a>
              </div>
            </div>

            <div class="o-tbl_cell text-md-down-center text-md-right">
              Developed by <a href="http://tonxyx.com">Tonxyx</a> &amp; <a href="mailto:scemby@gmail.com">Scemby</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

<?php $this->endContent(); ?>

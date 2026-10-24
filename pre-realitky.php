<?php
require_once __DIR__ . '/includes/config.php';
$page_title = 'Pre realitné kancelárie a správcov';
$page_desc  = 'Spolupráca pre realitné kancelárie, developerov a správcov nehnuteľností: prednostné termíny, jednotný postup a individuálna cena.';
$active     = '';
include __DIR__ . '/includes/header.php';
$tick = 'M5 13l4 4L19 7';
?>
<section class="page-head">
  <div class="wrap">
    <ul class="crumbs"><li><a href="<?= url() ?>">Domov</a></li><li>Pre realitky a správcov</li></ul>
    <h1>Certifikáty, ktoré nezdržia obchod.</h1>
    <p class="lead">Pre realitné kancelárie, developerov a správcov budov ponúkame dlhodobú spoluprácu s rýchlymi termínmi.</p>
  </div>
</section>

<section>
  <div class="wrap split">
    <div class="reveal">
      <span class="eyebrow">Výhody spolupráce</span>
      <h2>Jeden partner pre všetky vaše nehnuteľnosti.</h2>
      <ul class="checks">
        <li><span class="tick"><?= icon($tick, 20) ?></span><div><b>Prednostné termíny</b><span>Obhliadku dohodneme tak, aby ste neprišli o klienta.</span></div></li>
        <li><span class="tick"><?= icon($tick, 20) ?></span><div><b>Jednotný postup</b><span>Rovnaké podklady a komunikácia pri každej zákazke.</span></div></li>
        <li><span class="tick"><?= icon($tick, 20) ?></span><div><b>Cena pri väčšom počte</b><span>Pri viacerých objektoch pripravíme individuálnu ponuku.</span></div></li>
        <li><span class="tick"><?= icon($tick, 20) ?></span><div><b>Komunikácia s majiteľom</b><span>Dohodneme sa priamo s vlastníkom alebo s vami.</span></div></li>
      </ul>
    </div>
    <div class="form-card reveal" data-d="1">
      <h3>Pre koho</h3>
      <div class="chips" style="margin-bottom:1.6rem">
        <?php foreach (['Realitné kancelárie', 'Developeri', 'Správcovia bytových domov', 'Spoločenstvá vlastníkov', 'Banky a poisťovne', 'Firmy s portfóliom budov'] as $x): ?><span class="chip"><?= e($x) ?></span><?php endforeach; ?>
      </div>
      <a class="btn btn-block" href="<?= url('kontakt') ?>?typ=ine#formular">Dohodnúť spoluprácu</a>
    </div>
  </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>

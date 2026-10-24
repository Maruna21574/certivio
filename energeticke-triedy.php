<?php
require_once __DIR__ . '/includes/config.php';
$page_title = 'Energetické triedy A0 – G vysvetlené';
$page_desc  = 'Čo znamenajú energetické triedy A0 až G, ako sa určujú a ako môžete triedu svojej budovy zlepšiť.';
$active     = '';
include __DIR__ . '/includes/header.php';
$classes = $CLASSES;
?>
<section class="page-head">
  <div class="wrap">
    <ul class="crumbs"><li><a href="<?= url() ?>">Domov</a></li><li>Energetické triedy</li></ul>
    <h1>Čo znamenajú triedy A0 – G.</h1>
    <p class="lead">Energetická trieda ukazuje, ako hospodárne budova nakladá s energiou. A0 je najlepšia, G najslabšia.</p>
  </div>
</section>

<section>
  <div class="wrap">
    <div class="sec-head center reveal">
      <span class="eyebrow">Vyskúšajte</span>
      <h2>Aká je <mark>vaša</mark> energetická trieda?</h2>
      <p class="lead">Posuňte ukazovateľ po stupnici a pozrite sa, čo jednotlivé triedy znamenajú.</p>
    </div>
    <?php include __DIR__ . '/includes/class-picker.php'; ?>
  </div>
</section>

<section class="bg-soft">
  <div class="wrap narrow-text reveal">
    <h2>Ako sa trieda určuje</h2>
    <p>Trieda vychádza z vypočítanej potreby energie budovy v porovnaní s referenčnými hodnotami pre daný typ budovy. Hodnotí sa obálka (steny, strecha, okná) aj technické systémy: vykurovanie, príprava teplej vody, vetranie, chladenie a osvetlenie.</p>
    <p>Presné hranice tried závisia od typu budovy, preto ich pri každej zákazke určíme podľa platnej legislatívy.</p>
  </div>
</section>

<section>
  <div class="wrap">
    <div class="sec-head reveal"><span class="eyebrow">Prehľad</span><h2>Význam jednotlivých tried.</h2></div>
    <div class="faq">
      <?php foreach ($classes as [$n, $c, $d]): ?>
        <details class="reveal"><summary><span style="display:flex;align-items:center;gap:14px"><span class="scale-bar <?= $c ?>" style="width:52px;height:34px;border-radius:8px;padding:0;justify-content:center"><?= $n ?></span>Trieda <?= $n ?></span></summary><div class="ans"><p><?= e($d) ?></p></div></details>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="bg-soft">
  <div class="wrap split">
    <div class="reveal">
      <span class="eyebrow">Zlepšenie triedy</span>
      <h2>Ako budovu posunúť vyššie.</h2>
      <ul class="tick-list">
        <?php foreach (['Zateplenie fasády a strechy', 'Výmena okien a dverí', 'Modernizácia zdroja tepla (napr. tepelné čerpadlo)', 'Rekuperácia pri vetraní', 'Regulácia vykurovania a efektívna príprava teplej vody', 'Úprava osvetlenia a využitie obnoviteľných zdrojov'] as $x): ?>
          <li><?= icon('M5 13l4 4L19 7', 24) ?><span><?= e($x) ?></span></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="panel reveal" data-d="1">
      <h3>Poradíme, čo sa oplatí.</h3>
      <p style="max-width:34ch">Pri každom certifikáte dostanete odporúčania na zlepšenie triedy.</p>
      <a class="btn" href="<?= url('kontakt') ?>">Nezáväzná ponuka</a>
    </div>
  </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>

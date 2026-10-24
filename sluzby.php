<?php
require_once __DIR__ . '/includes/config.php';
$page_title = 'Služby – energetické certifikáty';
$page_desc  = 'Energetické certifikáty bytov, rodinných domov, bytových domov a nebytových budov. Ďalej termovízne meranie a test vzduchotesnosti.';
$active     = 'sluzby';
include __DIR__ . '/includes/header.php';
$arrow = 'M5 12h14M13 6l6 6-6 6';
?>

<section class="page-head">
  <div class="wrap">
    <ul class="crumbs"><li><a href="<?= url() ?>">Domov</a></li><li>Služby</li></ul>
    <h1>Služby pre každú budovu.</h1>
    <p class="lead">Energetické certifikáty pre byty, domy aj firemné budovy a súvisiace merania, ktoré odhalia, kde skutočne unikajú vaše peniaze.</p>
  </div>
</section>

<section>
  <div class="wrap">
    <div class="svc-grid">
      <?php $i = 0; foreach ($SERVICES as $slug => $s): $i++; ?>
        <a class="svc reveal" data-d="<?= $i % 3 ?>" href="<?= url('sluzby/' . $slug) ?>">
          <div class="ico-box"><?= icon($s['icon'], 28) ?></div>
          <h3><?= e($s['title']) ?></h3>
          <p><?= e($s['short']) ?></p>
          <div class="meta"><span><b><?= e($s['price']) ?></b> · <?= e($s['time']) ?></span><span class="go"><?= icon($arrow, 18) ?></span></div>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="bg-soft">
  <div class="wrap split">
    <div class="reveal">
      <span class="eyebrow">Neviete, čo potrebujete?</span>
      <h2>Poradíme vám <mark>zadarmo</mark>.</h2>
      <p class="lead">Opíšte nám situáciu a povieme vám, či certifikát potrebujete, čo bude treba pripraviť a koľko to bude stáť.</p>
      <a class="btn" href="<?= url('kontakt') ?>">Napísať nám <?= icon($arrow, 20) ?></a>
    </div>
    <div class="reveal" data-d="1">
      <ul class="checks">
        <li><span class="tick"><?= icon('M5 13l4 4L19 7', 20) ?></span><div><b>Predávate alebo prenajímate?</b><span>Certifikát je povinný. Zvládneme ho v krátkom čase.</span></div></li>
        <li><span class="tick"><?= icon('M5 13l4 4L19 7', 20) ?></span><div><b>Staviate alebo rekonštruujete?</b><span>Certifikát je súčasťou kolaudácie. Skontrolujeme projekt vopred.</span></div></li>
        <li><span class="tick"><?= icon('M5 13l4 4L19 7', 20) ?></span><div><b>Chcete znížiť náklady?</b><span>Termovízia a odporúčania ukážu, kde sa oplatí investovať.</span></div></li>
      </ul>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

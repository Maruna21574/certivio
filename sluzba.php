<?php
require_once __DIR__ . '/includes/config.php';

$slug = $_GET['s'] ?? '';
if (!isset($SERVICES[$slug])) {
    http_response_code(404);
    include __DIR__ . '/404.php';
    exit;
}
$s = $SERVICES[$slug];
$page_title = $s['title'];
$page_desc  = $s['short'] . ' ' . $s['price'] . ', dodanie ' . mb_strtolower($s['time']) . '.';
$active     = 'sluzby';
include __DIR__ . '/includes/header.php';
$tick  = 'M5 13l4 4L19 7';
$arrow = 'M5 12h14M13 6l6 6-6 6';
$orderType = isset($PRICING[$slug]) ? $slug : '';
?>

<section class="page-head">
  <div class="wrap">
    <ul class="crumbs"><li><a href="<?= url() ?>">Domov</a></li><li><a href="<?= url('sluzby') ?>">Služby</a></li><li><?= e($s['title']) ?></li></ul>
    <h1><?= e($s['title']) ?></h1>
    <p class="lead"><?= e($s['lead']) ?></p>
  </div>
</section>

<section>
  <div class="wrap detail">
    <div>
      <h2>Pre koho je táto služba</h2>
      <ul class="tick-list">
        <?php foreach ($s['for'] as $x): ?><li><?= icon($tick, 24) ?><span><?= e($x) ?></span></li><?php endforeach; ?>
      </ul>

      <h2>Čo je súčasťou</h2>
      <ul class="tick-list">
        <?php foreach ($s['includes'] as $x): ?><li><?= icon($tick, 24) ?><span><?= e($x) ?></span></li><?php endforeach; ?>
      </ul>

      <h2>Čo budeme potrebovať</h2>
      <ul class="tick-list">
        <?php foreach ($s['docs'] as $x): ?><li><?= icon($tick, 24) ?><span><?= e($x) ?></span></li><?php endforeach; ?>
      </ul>
      <p style="margin-top:1.2rem;color:var(--ink-2);font-size:.96rem">Nemáte všetky podklady? Nevadí – chýbajúce údaje zistíme pri obhliadke.</p>

      <h2>Ďalšie služby</h2>
      <div class="chips">
        <?php foreach ($SERVICES as $k => $o): if ($k === $slug) continue; ?>
          <a class="chip" href="<?= url('sluzby/' . $k) ?>"><?= e($o['title']) ?></a>
        <?php endforeach; ?>
      </div>
    </div>

    <aside class="aside-card">
      <h3>Rýchla ponuka</h3>
      <dl>
        <div><dt>Cena</dt><dd class="big"><?= e($s['price']) ?></dd></div>
        <div><dt>Dodanie</dt><dd><?= e($s['time']) ?></dd></div>
        <div><dt>Forma</dt><dd>Elektronicky + tlač</dd></div>
        <div><dt>Územie</dt><dd><?= e($COMPANY['region']) ?></dd></div>
      </dl>
      <a class="btn" href="<?= url('kontakt') ?>?typ=<?= e($orderType) ?>#formular">Nezáväzná ponuka</a>
      <p class="note">Konečná cena závisí od veľkosti a stavu objektu.</p>
    </aside>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

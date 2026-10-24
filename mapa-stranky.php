<?php
require_once __DIR__ . '/includes/config.php';
$page_title = 'Mapa stránky';
$page_desc  = 'Prehľad všetkých stránok webu CERTIVIO.';
$active     = '';
$hide_cta   = true;
include __DIR__ . '/includes/header.php';
$groups = [
  'Hlavné' => [['Úvod', ''], ['Služby', 'sluzby'], ['Cenník', 'cennik'], ['Postup spolupráce', 'postup'], ['Kontakt', 'kontakt']],
  'Informácie' => [['Časté otázky', 'faq'], ['Energetické triedy', 'energeticke-triedy'], ['Legislatíva', 'legislativa'], ['Pre realitky a správcov', 'pre-realitky'], ['O nás', 'o-nas']],
  'Právne' => [['Ochrana osobných údajov', 'ochrana-osobnych-udajov'], ['Obchodné podmienky', 'obchodne-podmienky'], ['Cookies', 'cookies']],
  'Služby' => [],
];
foreach ($SERVICES as $k => $s) { $groups['Služby'][] = [$s['title'], 'sluzby/' . $k]; }
?>
<section class="page-head">
  <div class="wrap">
    <ul class="crumbs"><li><a href="<?= url() ?>">Domov</a></li><li>Mapa stránky</li></ul>
    <h1>Mapa stránky</h1>
  </div>
</section>
<section>
  <div class="wrap values">
    <?php foreach ($groups as $g => $items): ?>
      <div class="value">
        <h3><?= e($g) ?></h3>
        <ul class="tick-list">
          <?php foreach ($items as [$label, $href]): ?><li><?= icon('M5 13l4 4L19 7', 24) ?><a href="<?= url($href) ?>"><?= e($label) ?></a></li><?php endforeach; ?>
        </ul>
      </div>
    <?php endforeach; ?>
  </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>

<?php
require_once __DIR__ . '/includes/config.php';
$page_title = 'Cookies';
$page_desc  = 'Informácie o používaní cookies na webe CERTIVIO.';
$active     = '';
$hide_cta   = true;
include __DIR__ . '/includes/header.php';
?>

<section class="page-head">
  <div class="wrap">
    <ul class="crumbs"><li><a href="<?= url() ?>">Domov</a></li><li>Cookies</li></ul>
    <h1>Cookies</h1>
  </div>
</section>

<section>
  <div class="wrap prose">
    <p><em>Tento text je vzor. Ak neskôr pridáte analytiku alebo marketingové nástroje, doplňte ho a pridajte súhlasový banner.</em></p>

    <h2>Čo sú cookies</h2>
    <p>Cookies sú malé textové súbory, ktoré si web ukladá vo vašom prehliadači. Pomáhajú mu správne fungovať.</p>

    <h2>Aké cookies používame</h2>
    <ul>
      <li><strong>PHPSESSID</strong> – technická cookie na ochranu kontaktného formulára pred zneužitím (CSRF token a limit odosielania). Platí do zatvorenia prehliadača. Nevyžaduje súhlas.</li>
    </ul>
    <p>Web nepoužíva analytické ani reklamné cookies a nesleduje vašu aktivitu.</p>

    <h2>Písma</h2>
    <p>Web načítava písma zo služby Google Fonts, pri čom sa vašej IP adresy dotkne server poskytovateľa. Ak to chcete obmedziť, môžu byť písma uložené priamo na našom serveri.</p>

    <h2>Ako cookies vypnúť</h2>
    <p>Cookies môžete zablokovať alebo vymazať v nastaveniach prehliadača. Kontaktný formulár potom nemusí fungovať správne.</p>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

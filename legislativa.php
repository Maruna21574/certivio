<?php
require_once __DIR__ . '/includes/config.php';
$page_title = 'Legislatíva energetickej hospodárnosti budov';
$page_desc  = 'Prehľad povinností pri energetickej certifikácii budov na Slovensku: kedy je certifikát povinný, platnosť a zápis do systému.';
$active     = '';
include __DIR__ . '/includes/header.php';
?>
<section class="page-head">
  <div class="wrap">
    <ul class="crumbs"><li><a href="<?= url() ?>">Domov</a></li><li>Legislatíva</li></ul>
    <h1>Legislatíva v skratke.</h1>
    <p class="lead">Čo ukladá zákon pri predaji, prenájme a výstavbe budov. Orientačný prehľad bez právneho poradenstva.</p>
  </div>
</section>

<section>
  <div class="wrap prose">
    <p><em>Informácie sú orientačné. Pre konkrétny prípad vychádzame z aktuálneho znenia právnych predpisov a radi vám ho vysvetlíme.</em></p>

    <h2>Hlavné predpisy</h2>
    <ul>
      <li>Zákon č. 555/2005 Z. z. o energetickej hospodárnosti budov v platnom znení,</li>
      <li>vykonávacie vyhlášky k zákonu, vrátane vyhlášky č. 364/2012 Z. z.,</li>
      <li>súvisiace slovenské technické normy a európske smernice o energetickej hospodárnosti budov.</li>
    </ul>

    <h2>Kedy je certifikát potrebný</h2>
    <ul>
      <li>pri predaji alebo prenájme budovy či jej samostatnej časti,</li>
      <li>pri kolaudácii novej budovy,</li>
      <li>pri podstatnej obnove budovy,</li>
      <li>pri vybraných verejných budovách, kde je trieda zverejnená.</li>
    </ul>

    <h2>Platnosť a evidencia</h2>
    <p>Certifikát platí 10 rokov. Vyhotovuje ho oprávnená osoba a eviduje sa v ústrednom informačnom systéme energetickej hospodárnosti budov.</p>

    <h2>Povinnosti vlastníka</h2>
    <ul>
      <li>zabezpečiť vyhotovenie certifikátu pred predajom alebo prenájmom,</li>
      <li>odovzdať ho kupujúcemu alebo nájomcovi,</li>
      <li>uviesť údaje o energetickej hospodárnosti v inzercii, ak to zákon vyžaduje.</li>
    </ul>

    <p style="margin-top:2rem"><a class="btn" href="<?= url('kontakt') ?>">Potrebujem certifikát</a></p>
  </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>

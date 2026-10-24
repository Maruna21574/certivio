<?php
require_once __DIR__ . '/includes/config.php';
$page_title = 'Ochrana osobných údajov';
$page_desc  = 'Zásady ochrany osobných údajov spoločnosti CERTIVIO.';
$active     = '';
$hide_cta   = true;
include __DIR__ . '/includes/header.php';
?>

<section class="page-head">
  <div class="wrap">
    <ul class="crumbs"><li><a href="<?= url() ?>">Domov</a></li><li>Ochrana osobných údajov</li></ul>
    <h1>Ochrana osobných údajov</h1>
  </div>
</section>

<section>
  <div class="wrap prose">
    <p><em>Tento text je vzor. Pred spustením webu ho nechajte skontrolovať a doplňte podľa skutočného spracovania údajov vo vašej firme.</em></p>

    <h2>1. Prevádzkovateľ</h2>
    <p><?= e($COMPANY['name']) ?>, <?= e($COMPANY['street']) ?>, <?= e($COMPANY['city']) ?>, IČO: <?= e($COMPANY['ico']) ?>, e-mail: <a href="mailto:<?= e($COMPANY['email']) ?>"><?= e($COMPANY['email']) ?></a>.</p>

    <h2>2. Aké údaje spracúvame</h2>
    <p>Prostredníctvom kontaktného formulára spracúvame údaje, ktoré nám sami poskytnete: meno a priezvisko, e-mail, telefón, obec, údaje o nehnuteľnosti (typ, plocha, účel) a obsah správy.</p>

    <h2>3. Účel a právny základ</h2>
    <ul>
      <li>vybavenie dopytu a príprava cenovej ponuky (opatrenia pred uzavretím zmluvy, čl. 6 ods. 1 písm. b) GDPR),</li>
      <li>plnenie zmluvy a zákonných povinností po objednaní služby (čl. 6 ods. 1 písm. b) a c) GDPR),</li>
      <li>súhlas pri odoslaní formulára (čl. 6 ods. 1 písm. a) GDPR).</li>
    </ul>

    <h2>4. Doba uchovávania</h2>
    <p>Údaje z dopytu uchovávame po dobu nevyhnutnú na jeho vybavenie, najdlhšie 12 mesiacov. Údaje z uzavretých zákaziek uchovávame po dobu stanovenú právnymi predpismi.</p>

    <h2>5. Príjemcovia</h2>
    <p>Údaje neposkytujeme tretím stranám, okrem poskytovateľov hostingu a e-mailu, ktorí údaje spracúvajú v našom mene, a orgánov verejnej moci, ak to vyžaduje zákon.</p>

    <h2>6. Vaše práva</h2>
    <p>Máte právo na prístup k údajom, opravu, vymazanie, obmedzenie spracúvania, prenosnosť údajov a právo namietať. Súhlas môžete kedykoľvek odvolať. Máte tiež právo podať sťažnosť Úradu na ochranu osobných údajov SR (<a href="https://dataprotection.gov.sk" target="_blank" rel="noopener">dataprotection.gov.sk</a>).</p>

    <h2>7. Kontakt</h2>
    <p>S otázkami k ochrane údajov nás kontaktujte na <a href="mailto:<?= e($COMPANY['email']) ?>"><?= e($COMPANY['email']) ?></a>.</p>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

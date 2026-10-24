<?php
require_once __DIR__ . '/includes/config.php';
$page_title = 'Obchodné podmienky';
$page_desc  = 'Všeobecné obchodné podmienky spoločnosti CERTIVIO pre vyhotovenie energetických certifikátov.';
$active     = '';
$hide_cta   = true;
include __DIR__ . '/includes/header.php';
?>
<section class="page-head">
  <div class="wrap">
    <ul class="crumbs"><li><a href="<?= url() ?>">Domov</a></li><li>Obchodné podmienky</li></ul>
    <h1>Obchodné podmienky</h1>
  </div>
</section>
<section>
  <div class="wrap prose">
    <p><em>Tento text je vzor. Pred použitím ho nechajte posúdiť právnikom a doplňte podľa vašej praxe.</em></p>
    <h2>1. Úvodné ustanovenia</h2>
    <p>Poskytovateľom služieb je <?= e($COMPANY['name']) ?>, <?= e($COMPANY['street']) ?>, <?= e($COMPANY['city']) ?>, IČO: <?= e($COMPANY['ico']) ?> (ďalej „poskytovateľ“). Tieto podmienky upravujú vyhotovenie energetických certifikátov a súvisiacich meraní.</p>
    <h2>2. Objednávka a cena</h2>
    <p>Zákazka vzniká potvrdením cenovej ponuky objednávateľom. Cena vychádza z typu, veľkosti a stavu budovy. Cenník na webe je orientačný.</p>
    <h2>3. Súčinnosť objednávateľa</h2>
    <p>Objednávateľ poskytne úplné a pravdivé podklady a zabezpečí prístup do objektu v dohodnutom termíne. Za oneskorenie spôsobené chýbajúcou súčinnosťou poskytovateľ nezodpovedá.</p>
    <h2>4. Termín dodania</h2>
    <p>Termín vyhotovenia sa počíta od obhliadky a doručenia úplných podkladov. Uvedené lehoty sú orientačné.</p>
    <h2>5. Platobné podmienky</h2>
    <p>Cena sa uhrádza na základe faktúry v lehote splatnosti. Pri expresnom vyhotovení sa účtuje príplatok podľa ponuky.</p>
    <h2>6. Zodpovednosť a reklamácie</h2>
    <p>Poskytovateľ zodpovedá za správnosť výpočtu podľa platných predpisov a poskytnutých podkladov. Reklamáciu možno uplatniť e-mailom na <a href="mailto:<?= e($COMPANY['email']) ?>"><?= e($COMPANY['email']) ?></a>.</p>
    <h2>7. Záverečné ustanovenia</h2>
    <p>Vzťahy sa riadia právom Slovenskej republiky. Ochrana osobných údajov je upravená v samostatných <a href="<?= url('ochrana-osobnych-udajov') ?>">zásadách</a>.</p>
  </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>

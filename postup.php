<?php
require_once __DIR__ . '/includes/config.php';
$page_title = 'Postup spolupráce';
$page_desc  = 'Ako prebieha vypracovanie energetického certifikátu: od dopytu cez obhliadku a výpočet až po odovzdanie a registráciu.';
$active     = 'postup';
include __DIR__ . '/includes/header.php';
$arrow = 'M5 12h14M13 6l6 6-6 6';
?>

<section class="page-head">
  <div class="wrap">
    <ul class="crumbs"><li><a href="<?= url() ?>">Domov</a></li><li>Postup</li></ul>
    <h1>Od dopytu po hotový certifikát.</h1>
    <p class="lead">Celý proces je jednoduchý a väčšinu vybavíme online. Vy len sprístupníte nehnuteľnosť.</p>
  </div>
</section>

<section>
  <div class="wrap">
    <div class="steps steps-long">
      <div class="step reveal">
        <h3>Dopyt a cenová ponuka</h3>
        <p>Vyplníte krátky formulár alebo nám zavoláte. Potrebujeme vedieť typ budovy, približnú plochu, lokalitu a účel (predaj, prenájom, kolaudácia). Do 24 hodín dostanete jasnú cenovú ponuku.</p>
      </div>
      <div class="step reveal">
        <h3>Podklady a termín</h3>
        <p>Spoločne zhrnieme, čo je potrebné pripraviť (projekt, list vlastníctva, údaje o vykurovaní). Dohodneme termín obhliadky, ktorý vám vyhovuje.</p>
      </div>
      <div class="step reveal">
        <h3>Obhliadka</h3>
        <p>Prídeme na miesto, zameriame budovu a zdokumentujeme konštrukcie, okná a technické zariadenia. Trvá to zvyčajne 30 – 90 minút podľa veľkosti objektu.</p>
      </div>
      <div class="step reveal">
        <h3>Výpočet a vyhotovenie</h3>
        <p>Podľa platnej legislatívy vypočítame energetickú hospodárnosť, určíme triedu A0 – G a pripravíme certifikát spolu s odporúčaniami na zlepšenie.</p>
      </div>
      <div class="step reveal">
        <h3>Registrácia a odovzdanie</h3>
        <p>Certifikát zaregistrujeme v ústrednom informačnom systéme a pošleme vám ho elektronicky. Na požiadanie aj v tlačenej podobe. Platí 10 rokov.</p>
      </div>
    </div>
  </div>
</section>

<section class="bg-soft">
  <div class="wrap split">
    <div class="reveal">
      <span class="eyebrow">Pripravte si</span>
      <h2>Na obhliadku <mark>stačí málo</mark>.</h2>
      <p class="lead">Čím viac podkladov máte, tým rýchlejšie hotovo. Ak niečo chýba, doplníme pri obhliadke.</p>
      <a class="btn" href="<?= url('kontakt') ?>">Začať dopytom <?= icon($arrow, 20) ?></a>
    </div>
    <div class="panel reveal" data-d="1">
      <h3>Kontrolný zoznam</h3>
      <ul>
        <li><span>List vlastníctva alebo kúpna zmluva</span></li>
        <li><span>Projektová dokumentácia alebo pôdorys</span></li>
        <li><span>Údaje o zdroji tepla a ohreve vody</span></li>
        <li><span>Prístup do technických priestorov</span></li>
      </ul>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

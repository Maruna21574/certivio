<?php
require_once __DIR__ . '/includes/config.php';
$page_title = 'O nás';
$page_desc  = 'CERTIVIO – vypracovanie energetických certifikátov budov. Spoľahlivo, zrozumiteľne a v súlade s legislatívou.';
$active     = 'o-nas';
include __DIR__ . '/includes/header.php';
$arrow = 'M5 12h14M13 6l6 6-6 6';
?>

<section class="page-head">
  <div class="wrap">
    <ul class="crumbs"><li><a href="<?= url() ?>">Domov</a></li><li>O nás</li></ul>
    <h1>Energia je jednoduchá, keď jej rozumiete.</h1>
    <p class="lead">Sme CERTIVIO – špecialisti na energetické certifikáty budov. Tomu, čo je pre mnohých byrokracia, dávame jasný a zrozumiteľný rámec.</p>
  </div>
</section>

<section>
  <div class="wrap split">
    <div class="about-visual reveal">
      <svg class="bg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width=".6" aria-hidden="true"><path d="M3 11l9-8 9 8M5 10v11h14V10M10 21v-6h4v6"/></svg>
      <q>Dobrý certifikát nie je papier do zásuvky. Je to jasná odpoveď na otázku, koľko budova skutočne stojí.</q>
    </div>
    <div class="reveal" data-d="1">
      <span class="eyebrow">Kto sme</span>
      <h2>Prístup, ktorý šetrí váš čas.</h2>
      <p>Vypracúvame energetické certifikáty pre byty, rodinné domy, bytové domy aj nebytové budovy. Pracujeme dôsledne, komunikujeme zrozumiteľne a držíme termíny.</p>
      <p>Pri každej zákazke dbáme na to, aby výsledok nebol len formálnym dokumentom. Súčasťou certifikátu sú odporúčania, ktoré majiteľom pomáhajú rozhodnúť sa, kde sa oplatí investovať.</p>
      <div class="stat-row">
        <div><b>A0–G</b><span>všetky triedy</span></div>
        <div><b>10 r.</b><span>platnosť certifikátu</span></div>
        <div><b>SK</b><span>celé Slovensko</span></div>
      </div>
    </div>
  </div>
</section>

<section class="bg-soft">
  <div class="wrap">
    <div class="sec-head center reveal">
      <span class="eyebrow">Naše zásady</span>
      <h2>Na čom si zakladáme.</h2>
    </div>
    <div class="values">
      <div class="value reveal"><span class="num">01</span><h3>Presnosť</h3><p>Výpočty vychádzajú zo skutočného stavu budovy a platnej legislatívy, nie z odhadov.</p></div>
      <div class="value reveal" data-d="1"><span class="num">02</span><h3>Zrozumiteľnosť</h3><p>Odpovede bez odborného žargónu. Vždy viete, čo robíme, prečo a koľko to stojí.</p></div>
      <div class="value reveal" data-d="2"><span class="num">03</span><h3>Rýchlosť</h3><p>Na dopyt odpovedáme do 24 hodín a certifikát odovzdávame v dohodnutom termíne.</p></div>
    </div>
  </div>
</section>

<section>
  <div class="wrap" style="text-align:center">
    <div class="sec-head center reveal" style="margin-bottom:2rem">
      <h2>Začnime vašou nehnuteľnosťou.</h2>
      <p class="lead" style="margin-inline:auto">Pošlite nám základné údaje a ozveme sa s ponukou.</p>
    </div>
    <a class="btn" href="<?= url('kontakt') ?>">Nezáväzná ponuka <?= icon($arrow, 20) ?></a>
  </div>
</section>

<?php $hide_cta = true; include __DIR__ . '/includes/footer.php'; ?>

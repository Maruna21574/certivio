<?php
require_once __DIR__ . '/includes/config.php';
$page_title = 'Cenník energetických certifikátov';
$page_desc  = 'Orientačné ceny energetických certifikátov bytov, rodinných domov a firemných budov. Vyskúšajte kalkulačku a získajte odhad ceny za pár sekúnd.';
$active     = 'cennik';
include __DIR__ . '/includes/header.php';
$tick  = 'M5 13l4 4L19 7';
$arrow = 'M5 12h14M13 6l6 6-6 6';
?>

<section class="page-head">
  <div class="wrap">
    <ul class="crumbs"><li><a href="<?= url() ?>">Domov</a></li><li>Cenník</li></ul>
    <h1>Jasné ceny, žiadne prekvapenia.</h1>
    <p class="lead">Cena závisí od typu a veľkosti budovy. Nižšie nájdete orientačné ceny a kalkulačku. Presnú ponuku dostanete do 24 hodín.</p>
  </div>
</section>

<section>
  <div class="wrap">
    <div class="price-grid">
      <div class="price reveal">
        <h3>Byt</h3>
        <div class="amount"><small>od</small>90 €</div>
        <p class="sub-note">byt do 60 m²</p>
        <ul>
          <li><?= icon($tick, 18) ?>Obhliadka a zameranie</li>
          <li><?= icon($tick, 18) ?>Certifikát elektronicky aj tlačený</li>
          <li><?= icon($tick, 18) ?>Registrácia v systéme</li>
          <li><?= icon($tick, 18) ?>Odporúčania na zlepšenie</li>
        </ul>
        <a class="btn btn-ghost" href="<?= url('kontakt') ?>?typ=byt#formular">Chcem ponuku</a>
      </div>
      <div class="price featured reveal" data-d="1">
        <span class="tag">Najčastejšie</span>
        <h3>Rodinný dom</h3>
        <div class="amount"><small>od</small>160 €</div>
        <p class="sub-note">dom do 120 m²</p>
        <ul>
          <li><?= icon($tick, 18) ?>Obhliadka domu a konštrukcií</li>
          <li><?= icon($tick, 18) ?>Komplexný výpočet obálky aj techniky</li>
          <li><?= icon($tick, 18) ?>Certifikát a energetická stupnica</li>
          <li><?= icon($tick, 18) ?>Návrh úsporných opatrení</li>
        </ul>
        <a class="btn" href="<?= url('kontakt') ?>?typ=rodinny-dom#formular">Chcem ponuku</a>
      </div>
      <div class="price reveal" data-d="2">
        <h3>Bytový / nebytový objekt</h3>
        <div class="amount"><small>od</small>260 €</div>
        <p class="sub-note">podľa veľkosti a účelu</p>
        <ul>
          <li><?= icon($tick, 18) ?>Obhliadka technických priestorov</li>
          <li><?= icon($tick, 18) ?>Výpočet podľa účelu využitia</li>
          <li><?= icon($tick, 18) ?>Certifikát a protokol</li>
          <li><?= icon($tick, 18) ?>Individuálna cenová ponuka</li>
        </ul>
        <a class="btn btn-ghost" href="<?= url('kontakt') ?>?typ=nebytove-budovy#formular">Chcem ponuku</a>
      </div>
    </div>
  </div>
</section>

<section class="bg-soft" id="kalkulacka">
  <div class="wrap">
    <div class="sec-head reveal">
      <span class="eyebrow">Kalkulačka</span>
      <h2>Odhad ceny za <mark>10 sekúnd</mark>.</h2>
    </div>
    <div class="calc reveal" id="calc" data-pricing='<?= e(json_encode($PRICING, JSON_UNESCAPED_UNICODE)) ?>' data-express="<?= EXPRESS_SURCHARGE ?>">
      <div>
        <div class="field">
          <label for="calc-type">Typ budovy</label>
          <select id="calc-type">
            <?php foreach ($PRICING as $k => $p): ?><option value="<?= e($k) ?>"><?= e($p['label']) ?></option><?php endforeach; ?>
          </select>
        </div>
        <div class="field">
          <label for="calc-area">Úžitková plocha <span class="range-val" id="calc-area-val" style="float:right"></span></label>
          <input class="range" id="calc-area" type="range" min="20" max="400" step="5" value="60">
        </div>
        <label class="check" style="margin:0">
          <input type="checkbox" id="calc-express">
          <span>Expresné vyhotovenie (prednostný termín obhliadky a spracovanie)</span>
        </label>
      </div>
      <div class="calc-result">
        <small>Orientačná cena</small>
        <div class="sum" id="calc-sum">od 90 €</div>
        <p>Cena je orientačná, bez DPH ak nie je uvedené inak. Presnú ponuku pošleme po zadaní údajov.</p>
        <a class="btn" id="calc-order" href="<?= url('kontakt') ?>" data-base="<?= url('kontakt') ?>">Objednať <?= icon($arrow, 20) ?></a>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="wrap split">
    <div class="reveal">
      <span class="eyebrow">V cene</span>
      <h2>Čo dostanete vždy.</h2>
      <ul class="tick-list">
        <li><?= icon($tick, 24) ?><span>Obhliadka a zameranie nehnuteľnosti</span></li>
        <li><?= icon($tick, 24) ?><span>Výpočet energetickej hospodárnosti a určenie triedy</span></li>
        <li><?= icon($tick, 24) ?><span>Certifikát v elektronickej a tlačenej podobe</span></li>
        <li><?= icon($tick, 24) ?><span>Registrácia v ústrednom informačnom systéme</span></li>
        <li><?= icon($tick, 24) ?><span>Odporúčania na zlepšenie energetickej triedy</span></li>
      </ul>
    </div>
    <div class="panel reveal" data-d="1">
      <h3>Ďalšie merania</h3>
      <ul>
        <?php foreach (['termovizia', 'blower-door'] as $k): $s = $SERVICES[$k]; ?>
          <li><a href="<?= url('sluzby/' . $k) ?>"><?= e($s['title']) ?></a><b><?= e($s['price']) ?></b></li>
        <?php endforeach; ?>
        <li><span>Doprava mimo Bratislavy</span><b>podľa vzdialenosti</b></li>
      </ul>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

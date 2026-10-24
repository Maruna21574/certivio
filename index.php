<?php
require_once __DIR__ . '/includes/config.php';
$page_title = SITE_NAME . ' – ' . SITE_TAG;
$page_desc  = 'Energetický certifikát budovy rýchlo a spoľahlivo. Byty, rodinné domy, bytové domy a firemné budovy na celom Slovensku. Nezáväzná ponuka do 24 hodín.';
$active     = 'home';
include __DIR__ . '/includes/header.php';
$arrow = 'M5 12h14M13 6l6 6-6 6';
$tick  = 'M5 13l4 4L19 7';
?>

<section class="hero">
  <div class="wrap hero-grid">
    <div>
      <span class="eyebrow">Energetické certifikáty budov</span>
      <h1>Certifikát, ktorý <mark>otvorí cestu</mark> k predaju.</h1>
      <p class="lead">Vypracujeme energetický certifikát vášho bytu, domu alebo firemnej budovy. Bez zbytočných pochybností, v zákonnej lehote a so zápisom do ústredného systému.</p>
      <div class="hero-actions">
        <a class="btn" href="<?= url('kontakt') ?>">Nezáväzná ponuka <?= icon($arrow, 20) ?></a>
        <a class="btn btn-ghost" href="<?= url('cennik') ?>">Cenník a kalkulačka</a>
      </div>
    </div>

    <div class="cert-wrap" aria-hidden="true">
      <div class="cert">
        <div class="cert-top">
          <div><small>Energetický certifikát</small><strong>Rodinný dom, Bratislava</strong></div>
          <span class="cert-valid">Platí 10 rokov</span>
        </div>
        <div class="scale">
          <?php
          $rows = [['A0','c-a0','34%'],['A1','c-a1','44%'],['B','c-b','54%'],['C','c-c','64%'],['D','c-d','74%'],['E','c-e','84%'],['F','c-f','92%'],['G','c-g','100%']];
          foreach ($rows as [$cls, $c, $w]): ?>
            <div class="scale-row">
              <div class="scale-bar <?= $c ?>" style="--w:<?= $w ?>"><?= $cls ?></div>
              <?php if ($cls === 'B'): ?><span class="scale-pin">Vaša budova</span><?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="cert-foot"><span>Evid. č. 2026-000123</span><span>Zapísané v registri</span></div>
      </div>
    </div>
  </div>
</section>

<section class="facts">
  <div class="wrap">
    <div class="facts-grid reveal">
      <div class="fact"><b>10<i> rokov</i></b><span>platnosť vyhotoveného certifikátu</span></div>
      <div class="fact"><b>A0<i>–</i>G</b><span>klasifikácia energetickej hospodárnosti</span></div>
      <div class="fact"><b>24<i> h</i></b><span>odpoveď s cenovou ponukou</span></div>
      <div class="fact"><b>100<i> %</i></b><span>elektronicky, bez zbytočných ciest</span></div>
    </div>
  </div>
</section>

<section id="sluzby">
  <div class="wrap">
    <div class="slider-head">
      <div class="sec-head reveal">
        <span class="eyebrow">Naše služby</span>
        <h2>Pre každý typ budovy.</h2>
        <p class="lead">Od jednoizbového bytu po výrobnú halu. Vyberte si, čo potrebujete, alebo nám napíšte a poradíme.</p>
      </div>
      <div class="slider-nav">
        <button type="button" class="slider-btn" data-dir="-1" aria-label="Predchádzajúce"><?= icon('M19 12H5M11 6l-6 6 6 6', 20) ?></button>
        <button type="button" class="slider-btn" data-dir="1" aria-label="Ďalšie"><?= icon($arrow, 20) ?></button>
      </div>
    </div>
    <div class="svc-grid svc-slider" id="svc-slider">
      <?php $i = 0; foreach ($SERVICES as $slug => $s): $i++; ?>
        <a class="svc reveal" data-d="<?= $i % 3 ?>" href="<?= url('sluzby/' . $slug) ?>">
          <div class="ico-box"><?= icon($s['icon'], 28) ?></div>
          <h3><?= e($s['title']) ?></h3>
          <p><?= e($s['short']) ?></p>
          <div class="meta"><span><b><?= e($s['price']) ?></b></span><span class="go"><?= icon($arrow, 18) ?></span></div>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="bg-soft">
  <div class="wrap split">
    <div class="reveal">
      <span class="eyebrow">Prečo certifikát</span>
      <h2>Nie je to len papier. Je to <mark>povinnosť</mark> aj výhoda.</h2>
      <ul class="checks">
        <li><span class="tick"><?= icon($tick, 20) ?></span><div><b>Zákonná povinnosť</b><span>Pri predaji a prenájme budovy či bytu musíte certifikát odovzdať kupujúcemu alebo nájomcovi.</span></div></li>
        <li><span class="tick"><?= icon($tick, 20) ?></span><div><b>Dôvera kupujúceho</b><span>Jasná informácia o nákladoch na energie zrýchľuje rozhodovanie a posilňuje vašu pozíciu.</span></div></li>
        <li><span class="tick"><?= icon($tick, 20) ?></span><div><b>Plán na úspory</b><span>Súčasťou výstupu sú odporúčania, ako znížiť spotrebu a zlepšiť triedu budovy.</span></div></li>
      </ul>
    </div>
    <div class="panel reveal" data-d="1">
      <h3>Kedy ho budete potrebovať?</h3>
      <ul>
        <li><span>Predaj alebo prenájom nehnuteľnosti</span><b>povinné</b></li>
        <li><span>Kolaudácia novej budovy</span><b>povinné</b></li>
        <li><span>Podstatná obnova budovy</span><b>povinné</b></li>
        <li><span>Plán zateplenia alebo rekonštrukcie</span><b>odporúčané</b></li>
      </ul>
    </div>
  </div>
</section>

<section>
  <div class="wrap">
    <div class="sec-head center reveal">
      <span class="eyebrow">Ako to funguje</span>
      <h2>Štyri kroky k certifikátu.</h2>
    </div>
    <div class="steps">
      <div class="step reveal"><h3>Dopyt</h3><p>Pošlite nám údaje o nehnuteľnosti. Do 24 hodín dostanete cenovú ponuku.</p></div>
      <div class="step reveal" data-d="1"><h3>Obhliadka</h3><p>Dohodneme termín a prídeme si budovu pozrieť a zamerať.</p></div>
      <div class="step reveal" data-d="2"><h3>Výpočet</h3><p>Spracujeme energetickú hospodárnosť a určíme triedu budovy.</p></div>
      <div class="step reveal" data-d="3"><h3>Odovzdanie</h3><p>Certifikát vám pošleme elektronicky aj v tlačenej podobe.</p></div>
    </div>
    <p style="text-align:center;margin-top:2.4rem"><a class="link-arrow" href="<?= url('postup') ?>">Celý postup <?= icon($arrow, 18) ?></a></p>
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
        <p>Cena je orientačná. Presnú ponuku pošleme po zadaní údajov.</p>
        <a class="btn" id="calc-order" href="<?= url('kontakt') ?>" data-base="<?= url('kontakt') ?>">Objednať <?= icon($arrow, 20) ?></a>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="wrap">
    <div class="sec-head reveal">
      <span class="eyebrow">Časté otázky</span>
      <h2>Odpovede na to, čo sa pýtate najčastejšie.</h2>
    </div>
    <div class="faq reveal">
      <?php foreach (array_slice($FAQ, 0, 4) as $f): ?>
        <details><summary><?= e($f['q']) ?></summary><div class="ans"><p><?= e($f['a']) ?></p></div></details>
      <?php endforeach; ?>
    </div>
    <p style="margin-top:2rem"><a class="link-arrow" href="<?= url('faq') ?>">Všetky otázky <?= icon($arrow, 18) ?></a></p>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

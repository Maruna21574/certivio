<?php
require_once __DIR__ . '/includes/config.php';
$page_title = 'Kontakt a nezáväzná ponuka';
$page_desc  = 'Pošlite nám údaje o nehnuteľnosti a do 24 hodín dostanete cenovú ponuku na energetický certifikát. Telefón, e-mail aj formulár.';
$active     = 'kontakt';
$hide_cta   = true;
include __DIR__ . '/includes/header.php';

$types = $PRICING;
$types['termovizia']  = ['label' => 'Termovízne meranie'];
$types['blower-door'] = ['label' => 'Test vzduchotesnosti'];
$types['ine']         = ['label' => 'Iné / neviem'];
$selType = $_GET['typ'] ?? '';
$selArea = isset($_GET['plocha']) ? (int)$_GET['plocha'] : '';
$express = !empty($_GET['express']);
$arrow = 'M5 12h14M13 6l6 6-6 6';
?>

<section class="page-head">
  <div class="wrap">
    <ul class="crumbs"><li><a href="<?= url() ?>">Domov</a></li><li>Kontakt</li></ul>
    <h1>Poďme na to. Pošlite nám dopyt.</h1>
    <p class="lead">Vyplňte formulár a do 24 hodín sa vám ozveme s cenou a termínom. Alebo nám rovno zavolajte.</p>
  </div>
</section>

<section id="formular">
  <div class="wrap contact-grid">
    <div class="form-card">
<?php $flash = $_SESSION['flash'] ?? null; unset($_SESSION['flash']); ?>
      <div id="form-msg" class="form-msg<?= $flash ? ($flash['ok'] ? ' ok' : ' err') : '' ?>" role="status" aria-live="polite"><?= $flash ? e($flash['message']) : '' ?></div>
      <form id="contact-form" method="post" action="<?= url('send.php') ?>" novalidate>
        <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
        <input type="hidden" name="ts" value="<?= time() ?>">
        <div class="hp" aria-hidden="true"><label>Web <input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>

        <div class="field">
          <span class="legend">Čo potrebujete?</span>
          <div class="pills">
            <?php foreach ($types as $k => $t): ?>
              <label><input type="radio" name="typ" value="<?= e($k) ?>" <?= $selType === $k ? 'checked' : '' ?> <?= $k === 'ine' ? '' : '' ?>><span><?= e($t['label']) ?></span></label>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="row-2">
          <div class="field">
            <label for="ucel">Účel</label>
            <select id="ucel" name="ucel">
              <option value="">Vyberte…</option>
              <option>Predaj</option>
              <option>Prenájom</option>
              <option>Kolaudácia</option>
              <option>Rekonštrukcia</option>
              <option>Iné</option>
            </select>
          </div>
          <div class="field">
            <label for="plocha">Úžitková plocha (m²)</label>
            <input id="plocha" name="plocha" type="number" min="1" inputmode="numeric" value="<?= e($selArea) ?>" placeholder="napr. 75">
          </div>
        </div>

        <div class="row-2">
          <div class="field">
            <label for="meno">Meno a priezvisko *</label>
            <input id="meno" name="meno" type="text" required autocomplete="name" maxlength="120">
          </div>
          <div class="field">
            <label for="obec">Obec / mesto nehnuteľnosti</label>
            <input id="obec" name="obec" type="text" maxlength="120">
          </div>
        </div>

        <div class="row-2">
          <div class="field">
            <label for="email">E-mail *</label>
            <input id="email" name="email" type="email" required autocomplete="email" maxlength="160">
          </div>
          <div class="field">
            <label for="tel">Telefón</label>
            <input id="tel" name="tel" type="tel" autocomplete="tel" maxlength="40">
          </div>
        </div>

        <div class="field">
          <label for="sprava">Správa</label>
          <textarea id="sprava" name="sprava" maxlength="3000" placeholder="Doplňte napr. rok výstavby, zateplenie, preferovaný termín…"></textarea>
        </div>

        <label class="check"><input type="checkbox" name="express" value="1" <?= $express ? 'checked' : '' ?>><span>Mám záujem o expresné vyhotovenie</span></label>
        <label class="check"><input type="checkbox" name="gdpr" value="1" required><span>Súhlasím so spracovaním osobných údajov na účely vybavenia dopytu podľa <a href="<?= url('ochrana-osobnych-udajov') ?>" target="_blank" rel="noopener">zásad ochrany osobných údajov</a>. *</span></label>

        <button class="btn btn-block" type="submit">Odoslať dopyt <?= icon($arrow, 20) ?></button>
      </form>
    </div>

    <aside class="info-card">
      <h2 style="font-size:1.7rem">Priamy kontakt</h2>
      <ul class="info-list">
        <li><span class="ico-box"><?= icon('M22 16.9v3a2 2 0 01-2.2 2 19.8 19.8 0 01-8.6-3.1 19.5 19.5 0 01-6-6A19.8 19.8 0 012.1 4.2 2 2 0 014.1 2h3a2 2 0 012 1.7c.1 1 .4 1.9.7 2.8a2 2 0 01-.5 2.1L8.1 9.9a16 16 0 006 6l1.3-1.3a2 2 0 012.1-.4c.9.3 1.8.6 2.8.7a2 2 0 011.7 2z', 22) ?></span><div><small>Telefón</small><a href="tel:<?= e($COMPANY['phone_raw']) ?>"><?= e($COMPANY['phone']) ?></a></div></li>
        <li><span class="ico-box"><?= icon('M4 4h16a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zM22 6l-10 7L2 6', 22) ?></span><div><small>E-mail</small><a href="mailto:<?= e($COMPANY['email']) ?>"><?= e($COMPANY['email']) ?></a></div></li>
        <li><span class="ico-box"><?= icon('M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 1118 0zM12 13a3 3 0 100-6 3 3 0 000 6z', 22) ?></span><div><small>Sídlo</small><b><?= e($COMPANY['street']) ?>, <?= e($COMPANY['city']) ?></b></div></li>
        <li><span class="ico-box"><?= icon('M12 6v6l4 2M12 22a10 10 0 100-20 10 10 0 000 20z', 22) ?></span><div><small>Pracovná doba</small><b><?= e($COMPANY['hours']) ?></b></div></li>
      </ul>
      <p style="margin:1.8rem 0 0;font-size:.92rem;color:var(--ink-2)">Pôsobíme na celom Slovensku. Termín obhliadky vždy dohodneme vopred.</p>
    </aside>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

</main>

<?php if (empty($hide_cta)): ?>
<section class="cta-band">
  <div class="wrap cta-in">
    <div>
      <h2>Potrebujete energetický certifikát?</h2>
      <p>Pošlite nám pár údajov o nehnuteľnosti – ozveme sa s ponukou a termínom obhliadky.</p>
    </div>
    <div class="cta-actions">
      <a class="btn btn-dark" href="<?= url('kontakt') ?>">Nezáväzná ponuka</a>
      <a class="btn btn-ghost" href="tel:<?= e($COMPANY['phone_raw']) ?>"><?= e($COMPANY['phone']) ?></a>
    </div>
  </div>
</section>
<?php endif; ?>

<footer class="site-footer">
  <div class="wrap foot-grid">
    <div class="foot-brand">
      <a class="brand brand-light" href="<?= url() ?>"><span class="logo-word">CERTIVIO</span></a>
      <p>Vypracovanie energetických certifikátov budov – rýchlo, zrozumiteľne a v súlade s legislatívou.</p>
    </div>
    <div>
      <h3>Služby</h3>
      <ul>
        <?php foreach ($SERVICES as $slug => $s): ?>
          <li><a href="<?= url('sluzby/' . $slug) ?>"><?= e($s['title']) ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div>
      <h3>Informácie</h3>
      <ul>
        <li><a href="<?= url('cennik') ?>">Cenník</a></li>
        <li><a href="<?= url('postup') ?>">Postup spolupráce</a></li>
        <li><a href="<?= url('faq') ?>">Časté otázky</a></li>
        <li><a href="<?= url('energeticke-triedy') ?>">Energetické triedy</a></li>
        <li><a href="<?= url('legislativa') ?>">Legislatíva</a></li>
        <li><a href="<?= url('pre-realitky') ?>">Pre realitky a správcov</a></li>
        <li><a href="<?= url('o-nas') ?>">O nás</a></li>
        <li><a href="<?= url('kontakt') ?>">Kontakt</a></li>
      </ul>
    </div>
    <div>
      <h3>Kontakt</h3>
      <ul class="foot-contact">
        <li><a href="tel:<?= e($COMPANY['phone_raw']) ?>"><?= e($COMPANY['phone']) ?></a></li>
        <li><a href="mailto:<?= e($COMPANY['email']) ?>"><?= e($COMPANY['email']) ?></a></li>
        <li><?= e($COMPANY['street']) ?>, <?= e($COMPANY['city']) ?></li>
        <li><?= e($COMPANY['hours']) ?></li>
      </ul>
    </div>
  </div>
  <div class="wrap foot-bottom">
    <span>© <?= date('Y') ?> <?= e($COMPANY['name']) ?> · IČO <?= e($COMPANY['ico']) ?></span>
    <span class="foot-links">
      <a href="<?= url('ochrana-osobnych-udajov') ?>">Ochrana osobných údajov</a>
      <a href="<?= url('obchodne-podmienky') ?>">Obchodné podmienky</a>
      <a href="<?= url('cookies') ?>">Cookies</a>
      <a href="<?= url('mapa-stranky') ?>">Mapa stránky</a>
    </span>
  </div>
</footer>

<div class="m-bar">
  <a class="btn btn-dark" href="tel:<?= e($COMPANY['phone_raw']) ?>">Zavolať</a>
  <a class="btn" href="<?= url('kontakt') ?>">Nezáväzná ponuka</a>
</div>

<script src="<?= asset('js/main.js') ?>" defer></script>
</body>
</html>

<?php
require_once __DIR__ . '/includes/config.php';
$page_title = 'Časté otázky o energetických certifikátoch';
$page_desc  = 'Kedy je energetický certifikát povinný, ako dlho platí, čo je potrebné pripraviť a ako rýchlo ho dostanete.';
$active     = 'faq';
include __DIR__ . '/includes/header.php';
?>

<section class="page-head">
  <div class="wrap">
    <ul class="crumbs"><li><a href="<?= url() ?>">Domov</a></li><li>Časté otázky</li></ul>
    <h1>Časté otázky.</h1>
    <p class="lead">Najčastejšie otázky k energetickým certifikátom. Nenašli ste odpoveď? Napíšte nám.</p>
  </div>
</section>

<section>
  <div class="wrap">
    <div class="faq">
      <?php foreach ($FAQ as $f): ?>
        <details class="reveal"><summary><?= e($f['q']) ?></summary><div class="ans"><p><?= e($f['a']) ?></p></div></details>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<script type="application/ld+json">
<?= json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => array_map(fn($f) => ['@type' => 'Question', 'name' => $f['q'], 'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f['a']]], $FAQ),
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>

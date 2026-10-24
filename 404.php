<?php
require_once __DIR__ . '/includes/config.php';
http_response_code(404);
$page_title = 'Stránka sa nenašla';
$page_desc  = 'Stránka, ktorú hľadáte, neexistuje.';
$active     = '';
$hide_cta   = true;
$noindex    = true;
include __DIR__ . '/includes/header.php';
?>

<section class="err-404">
  <div class="wrap">
    <div class="code">4<span>0</span>4</div>
    <h2 style="margin-top:1rem">Táto stránka má energetickú triedu G.</h2>
    <p class="lead" style="margin-inline:auto">Stránku sme nenašli. Možno bola presunutá alebo ste zadali nesprávnu adresu.</p>
    <p style="margin-top:2rem"><a class="btn" href="<?= url() ?>">Späť na úvod</a></p>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

<?php
require_once __DIR__ . '/includes/config.php';
header('Content-Type: application/xml; charset=utf-8');
$pages = ['', 'sluzby', 'cennik', 'postup', 'faq', 'o-nas', 'kontakt', 'energeticke-triedy', 'legislativa', 'pre-realitky', 'obchodne-podmienky', 'mapa-stranky', 'ochrana-osobnych-udajov', 'cookies'];
foreach (array_keys($SERVICES) as $s) { $pages[] = 'sluzby/' . $s; }
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach ($pages as $p): ?>
  <url><loc><?= e(SITE_DOMAIN . '/' . $p) ?></loc><changefreq>monthly</changefreq></url>
<?php endforeach; ?>
</urlset>

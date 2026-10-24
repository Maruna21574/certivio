<?php
/** @var string $page_title @var string $page_desc @var string $active */
$page_title = $page_title ?? SITE_NAME . ' – ' . SITE_TAG;
$full_title = ($page_title === SITE_NAME . ' – ' . SITE_TAG) ? $page_title : $page_title . ' | ' . SITE_NAME;
$page_desc  = $page_desc ?? 'Energetické certifikáty budov rýchlo a spoľahlivo. Byty, rodinné domy, bytové domy aj firemné budovy na celom Slovensku.';
$active     = $active ?? '';
$canonical  = SITE_DOMAIN . strtok($_SERVER['REQUEST_URI'] ?? '/', '?');
$infoNav = [
    'postup'             => 'Postup spolupráce',
    'faq'                => 'Časté otázky',
    'energeticke-triedy' => 'Energetické triedy',
    'legislativa'        => 'Legislatíva',
    'pre-realitky'       => 'Pre realitky a správcov',
];
$infoActive = array_key_exists(basename($_SERVER['SCRIPT_NAME'] ?? '', '.php'), $infoNav);
?><!DOCTYPE html>
<html lang="sk">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($full_title) ?></title>
<meta name="description" content="<?= e($page_desc) ?>">
<meta name="theme-color" content="#FFCC3B">
<link rel="canonical" href="<?= e($canonical) ?>">
<link rel="icon" type="image/svg+xml" href="<?= url('assets/img/favicon.svg') ?>">
<meta property="og:type" content="website">
<meta property="og:locale" content="sk_SK">
<meta property="og:title" content="<?= e($full_title) ?>">
<meta property="og:description" content="<?= e($page_desc) ?>">
<meta property="og:url" content="<?= e($canonical) ?>">
<?php if (!empty($noindex)): ?><meta name="robots" content="noindex, follow"><?php endif; ?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,700;12..96,800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= asset('css/style.css') ?>">
<script type="application/ld+json">
<?= json_encode([
    '@context' => 'https://schema.org',
    '@type'    => 'ProfessionalService',
    'name'     => SITE_NAME,
    'description' => SITE_TAG,
    'url'      => SITE_DOMAIN,
    'telephone'=> $COMPANY['phone_raw'],
    'email'    => $COMPANY['email'],
    'areaServed' => 'SK',
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>
</script>
</head>
<body>
<a class="skip" href="#obsah">Preskočiť na obsah</a>

<header class="site-header" id="top">
  <div class="wrap header-in">
    <a class="brand" href="<?= url() ?>" aria-label="CERTIVIO – domov">
      <span class="logo-word">CERTIVIO</span>
    </a>

    <button class="burger" id="burger" aria-label="Menu" aria-expanded="false" aria-controls="nav">
      <span></span><span></span><span></span>
    </button>

    <nav class="nav" id="nav" aria-label="Hlavná navigácia">
      <ul>
        <li class="has-sub">
          <a href="<?= url('sluzby') ?>" class="<?= $active === 'sluzby' ? 'is-active' : '' ?>">Služby</a>
          <ul class="sub">
            <?php foreach ($SERVICES as $slug => $s): ?>
              <li><a href="<?= url('sluzby/' . $slug) ?>"><?= e($s['title']) ?></a></li>
            <?php endforeach; ?>
          </ul>
        </li>
        <li><a href="<?= url('cennik') ?>" class="<?= $active === 'cennik' ? 'is-active' : '' ?>">Cenník</a></li>
        <li class="has-sub">
          <a href="<?= url('postup') ?>" class="<?= $infoActive ? 'is-active' : '' ?>">Informácie</a>
          <ul class="sub">
            <?php foreach ($infoNav as $slug => $label): ?>
              <li><a href="<?= url($slug) ?>"><?= e($label) ?></a></li>
            <?php endforeach; ?>
          </ul>
        </li>
        <li><a href="<?= url('o-nas') ?>" class="<?= $active === 'o-nas' ? 'is-active' : '' ?>">O nás</a></li>
        <li class="nav-cta"><a class="btn btn-sm" href="<?= url('kontakt') ?>">Nezáväzná ponuka</a></li>
      </ul>
    </nav>
  </div>
</header>

<main id="obsah">

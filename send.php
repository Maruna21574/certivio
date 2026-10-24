<?php
require_once __DIR__ . '/includes/config.php';

$isAjax = ($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '') === 'fetch';

function respond(bool $ok, string $message, bool $isAjax): void {
    if ($isAjax) {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['ok' => $ok, 'message' => $message], JSON_UNESCAPED_UNICODE);
    } else {
        $_SESSION['flash'] = ['ok' => $ok, 'message' => $message];
        header('Location: ' . url('kontakt') . '#formular');
    }
    exit;
}

function clean(string $key, int $max = 200): string {
    $v = trim((string)($_POST[$key] ?? ''));
    $v = preg_replace('/[\r\n]+/', ' ', $v);
    return mb_substr($v, 0, $max);
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ' . url('kontakt'));
    exit;
}

// Ochrana: CSRF, honeypot, minimálny čas vyplnenia, limit odosielania
if (!hash_equals($_SESSION['csrf'] ?? '', (string)($_POST['csrf'] ?? ''))) {
    respond(false, 'Platnosť formulára vypršala. Obnovte stránku a skúste to znova.', $isAjax);
}
if (!empty($_POST['website'])) {
    respond(true, 'Ďakujeme, správa bola odoslaná.', $isAjax); // bot – tváríme sa, že OK
}
if (time() - (int)($_POST['ts'] ?? 0) < 3) {
    respond(false, 'Formulár bol odoslaný príliš rýchlo. Skúste to prosím znova.', $isAjax);
}
if (time() - ($_SESSION['last_send'] ?? 0) < 30) {
    respond(false, 'Správu ste už odoslali. Chvíľu počkajte a skúste to znova.', $isAjax);
}

$meno = clean('meno', 120);
$email = clean('email', 160);
$tel = clean('tel', 40);
$obec = clean('obec', 120);
$typ = clean('typ', 40);
$ucel = clean('ucel', 40);
$plocha = clean('plocha', 10);
$sprava = trim(mb_substr((string)($_POST['sprava'] ?? ''), 0, 3000));
$express = !empty($_POST['express']) ? 'áno' : 'nie';

if ($meno === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    respond(false, 'Vyplňte prosím meno a platný e-mail.', $isAjax);
}
if (empty($_POST['gdpr'])) {
    respond(false, 'Pre odoslanie je potrebný súhlas so spracovaním osobných údajov.', $isAjax);
}

$typLabel = $PRICING[$typ]['label'] ?? ($typ ?: 'neuvedené');

$body = "Nový dopyt z webu CERTIVIO\n"
      . "===========================\n\n"
      . "Meno:      $meno\n"
      . "E-mail:    $email\n"
      . "Telefón:   " . ($tel ?: '-') . "\n"
      . "Obec:      " . ($obec ?: '-') . "\n\n"
      . "Typ:       $typLabel\n"
      . "Účel:      " . ($ucel ?: '-') . "\n"
      . "Plocha:    " . ($plocha ? "$plocha m²" : '-') . "\n"
      . "Expres:    $express\n\n"
      . "Správa:\n" . ($sprava ?: '-') . "\n\n"
      . "---\nOdoslané: " . date('d.m.Y H:i') . " | IP: " . ($_SERVER['REMOTE_ADDR'] ?? '-') . "\n";

$subject = '=?UTF-8?B?' . base64_encode('Nový dopyt z webu – ' . $meno) . '?=';
$headers = [
    'From: ' . SITE_NAME . ' <' . MAIL_FROM . '>',
    'Reply-To: ' . $email,
    'MIME-Version: 1.0',
    'Content-Type: text/plain; charset=UTF-8',
    'Content-Transfer-Encoding: 8bit',
    'X-Mailer: PHP/' . PHP_VERSION,
];

$sent = @mail(MAIL_TO, $subject, $body, implode("\r\n", $headers), '-f' . MAIL_FROM);

if ($sent) {
    $_SESSION['last_send'] = time();
    respond(true, 'Ďakujeme! Dopyt sme prijali a ozveme sa vám do 24 hodín.', $isAjax);
}
respond(false, 'Správu sa nepodarilo odoslať. Skúste to prosím znova alebo nám zavolajte na ' . $COMPANY['phone'] . '.', $isAjax);

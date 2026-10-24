<?php
/**
 * CERTIVIO – konfigurácia webu
 * Upravte kontaktné údaje a ceny nižšie – prejavia sa na celom webe.
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

const SITE_NAME   = 'CERTIVIO';
const SITE_TAG    = 'Energetické certifikáty budov';
const SITE_DOMAIN = 'https://www.certivio.sk';   // zmeňte na skutočnú doménu
const MAIL_TO     = 'info@certivio.sk';          // sem prichádzajú správy z formulára
const MAIL_FROM   = 'web@certivio.sk';           // odosielateľ (musí existovať na hostingu)

$COMPANY = [
    'phone'      => '+421 900 000 000',
    'phone_raw'  => '+421900000000',
    'email'      => 'info@certivio.sk',
    'name'       => 'CERTIVIO s. r. o.',
    'street'     => 'Ulica 1',
    'city'       => '811 01 Bratislava',
    'ico'        => '00 000 000',
    'dic'        => '0000000000',
    'hours'      => 'Po – Pi 8:00 – 17:00',
    'region'     => 'Celé Slovensko',
];

/** Orientačné ceny pre kalkulačku (EUR). base = základ, per_m2 = príplatok za každý m² nad limit. */
$PRICING = [
    'byt'            => ['label' => 'Byt',                 'base' => 90,  'limit' => 60,  'per_m2' => 0.9],
    'rodinny-dom'    => ['label' => 'Rodinný dom',         'base' => 160, 'limit' => 120, 'per_m2' => 0.8],
    'bytovy-dom'     => ['label' => 'Bytový dom',          'base' => 380, 'limit' => 400, 'per_m2' => 0.45],
    'nebytove-budovy'=> ['label' => 'Nebytová budova',     'base' => 260, 'limit' => 200, 'per_m2' => 0.7],
    'nova-budova'    => ['label' => 'Nová budova',         'base' => 190, 'limit' => 120, 'per_m2' => 0.8],
];
const EXPRESS_SURCHARGE = 0.35; // +35 % za expresné vyhotovenie

/** Služby – zdroj pre prehľad aj detailné podstránky. */
$SERVICES = [
    'byt' => [
        'title'   => 'Energetický certifikát bytu',
        'short'   => 'Pre predaj, prenájom alebo kúpu bytu. Rýchlo a bez zbytočného papierovania.',
        'icon'    => 'M4 21V9l8-6 8 6v12M9 21v-7h6v7',
        'lead'    => 'Predávate alebo prenajímate byt? Energetický certifikát je povinnou súčasťou ponuky aj zmluvy. Vybavíme ho za vás – od obhliadky až po registráciu v ústrednom systéme.',
        'for'     => ['Predaj alebo prenájom bytu', 'Kúpa bytu s nutnosťou doloženia certifikátu', 'Byty v bytových domoch aj v novostavbách'],
        'includes'=> ['Obhliadka a zameranie bytu', 'Výpočet energetickej hospodárnosti', 'Vyhotovenie certifikátu v tlačenej aj elektronickej podobe', 'Registrácia v ústrednom informačnom systéme', 'Odporúčania na zlepšenie triedy'],
        'docs'    => ['List vlastníctva alebo kúpna zmluva', 'Pôdorys bytu (ak ho máte)', 'Údaje o vykurovaní a ohreve vody', 'Fotografie technických zariadení'],
        'price'   => 'od 90 €',
        'time'    => '2 – 4 pracovné dni',
    ],
    'rodinny-dom' => [
        'title'   => 'Energetický certifikát rodinného domu',
        'short'   => 'Dôkladné posúdenie obálky budovy aj technických systémov domu.',
        'icon'    => 'M3 11l9-8 9 8M5 10v11h14V10M10 21v-6h4v6',
        'lead'    => 'Rodinný dom posudzujeme komplexne – obvodové konštrukcie, okná, strechu, vykurovanie aj prípravu teplej vody. Výsledkom je presný certifikát a konkrétne tipy, kde dom zbytočne stráca energiu.',
        'for'     => ['Predaj alebo prenájom domu', 'Vlastníci, ktorí chcú poznať skutočnú energetickú náročnosť', 'Podklad pre dotácie a rekonštrukciu'],
        'includes'=> ['Obhliadka domu a zameranie konštrukcií', 'Výpočet potreby energie a triedy A0 – G', 'Certifikát vrátane energetickej stupnice', 'Registrácia v ústrednom informačnom systéme', 'Odporúčané opatrenia s odhadom úspor'],
        'docs'    => ['Projektová dokumentácia (ak existuje)', 'Kolaudačné rozhodnutie alebo list vlastníctva', 'Informácie o zateplení, oknách a zdroji tepla', 'Spotreby energií za posledné roky (nepovinné)'],
        'price'   => 'od 160 €',
        'time'    => '3 – 5 pracovných dní',
    ],
    'bytovy-dom' => [
        'title'   => 'Energetický certifikát bytového domu',
        'short'   => 'Pre spoločenstvá vlastníkov a správcov – jeden certifikát pre celý dom.',
        'icon'    => 'M5 21V4h9v17M14 9h5v12M8 8h3M8 12h3M8 16h3M3 21h18',
        'lead'    => 'Pre spoločenstvá vlastníkov, bytové družstvá a správcov pripravujeme certifikáty celých bytových domov. Podklady slúžia aj pri plánovaní zateplenia, výmeny okien či zdroja tepla.',
        'for'     => ['Spoločenstvá vlastníkov bytov', 'Bytové družstvá a správcovské spoločnosti', 'Príprava obnovy domu a žiadostí o podporu'],
        'includes'=> ['Obhliadka spoločných priestorov a technických miestností', 'Výpočet pre celú budovu', 'Certifikát bytového domu', 'Registrácia v ústrednom informačnom systéme', 'Prehľad možných úsporných opatrení'],
        'docs'    => ['Projektová dokumentácia domu', 'Údaje o vykurovacej sústave a meraní tepla', 'Kolaudačné rozhodnutie', 'Doklad o oprávnenosti konať za vlastníkov'],
        'price'   => 'od 380 €',
        'time'    => '5 – 10 pracovných dní',
    ],
    'nebytove-budovy' => [
        'title'   => 'Nebytové a obchodné budovy',
        'short'   => 'Kancelárie, obchody, haly, sklady, penzióny či školy.',
        'icon'    => 'M3 21h18M5 21V8l7-4 7 4v13M9 12h2M13 12h2M9 16h2M13 16h2',
        'lead'    => 'Posudzujeme administratívne a obchodné budovy, výrobné haly, ubytovacie zariadenia aj verejné budovy. Každá prevádzka má iné nároky – prístup prispôsobíme účelu aj spôsobu využívania.',
        'for'     => ['Predaj alebo prenájom nebytových priestorov', 'Verejné budovy a prevádzky s povinnosťou zverejniť triedu', 'Firmy plánujúce modernizáciu'],
        'includes'=> ['Obhliadka prevádzky a technológií', 'Výpočet podľa účelu využitia budovy', 'Certifikát a protokol energetickej hospodárnosti', 'Registrácia v ústrednom informačnom systéme', 'Návrh opatrení na zníženie nákladov'],
        'docs'    => ['Projektová dokumentácia', 'Údaje o vetraní, chladení a osvetlení', 'Prevádzkový režim budovy', 'Kolaudačné rozhodnutie'],
        'price'   => 'od 260 €',
        'time'    => '4 – 8 pracovných dní',
    ],
    'nova-budova' => [
        'title'   => 'Certifikát pre novostavbu a kolaudáciu',
        'short'   => 'Energetický certifikát ako súčasť kolaudácie novej alebo rekonštruovanej stavby.',
        'icon'    => 'M12 3v4M5 7l3 3M19 7l-3 3M4 21l8-12 8 12H4z',
        'lead'    => 'Pri nových budovách a podstatných obnovách sa certifikát dokladá pri kolaudácii. Spolupracujeme s projektantmi aj stavebníkmi, aby bol výpočet v súlade s projektom a stavba splnila požadované parametre.',
        'for'     => ['Stavebníci rodinných domov a bytových projektov', 'Developeri a projektanti', 'Rekonštrukcie s podstatnou zmenou budovy'],
        'includes'=> ['Kontrola projektu z hľadiska energetických požiadaviek', 'Výpočet pre skutočné vyhotovenie stavby', 'Certifikát pre kolaudačné konanie', 'Registrácia v ústrednom informačnom systéme', 'Konzultácia pred dokončením stavby'],
        'docs'    => ['Projekt pre stavebné povolenie', 'Zmeny oproti projektu počas výstavby', 'Technické listy materiálov a technológií', 'Stavebné povolenie'],
        'price'   => 'od 190 €',
        'time'    => '3 – 6 pracovných dní',
    ],
    'termovizia' => [
        'title'   => 'Termovízne meranie',
        'short'   => 'Odhalíme tepelné mosty, netesnosti a skryté poruchy konštrukcií.',
        'icon'    => 'M14 14.76V4a2 2 0 10-4 0v10.76a4 4 0 104 0z',
        'lead'    => 'Termovízna kamera ukáže, kde vám uniká teplo – cez okná, nadpražia, rohy alebo zle zateplené plochy. Výstupom je prehľadná fotodokumentácia s popisom zistení.',
        'for'     => ['Kontrola kvality zateplenia a stavebných prác', 'Hľadanie príčin vlhkosti a plesní', 'Podklad pre reklamáciu alebo rekonštrukciu'],
        'includes'=> ['Meranie za vhodných klimatických podmienok', 'Fotodokumentácia v tepelnom aj bežnom spektre', 'Popis zistených nedostatkov', 'Odporúčanie nápravy'],
        'docs'    => ['Prístup do objektu v dohodnutom termíne', 'Základné informácie o stavbe', 'Miesta, kde sa prejavujú problémy'],
        'price'   => 'od 120 €',
        'time'    => 'Termín podľa počasia',
    ],
    'blower-door' => [
        'title'   => 'Test vzduchotesnosti (Blower Door)',
        'short'   => 'Overenie vzduchotesnosti obálky – dôležité pre nízkoenergetické stavby.',
        'icon'    => 'M9.59 4.59A2 2 0 1111 8H2M12.59 19.41A2 2 0 1014 16H2M17.73 7.73A2.5 2.5 0 1119.5 12H2',
        'lead'    => 'Test vzduchotesnosti ukáže, koľko vzduchu uniká cez škáry a netesnosti obálky budovy. Je kľúčový pre pasívne a nízkoenergetické domy aj ako kontrola kvality po dokončení stavby.',
        'for'     => ['Nízkoenergetické a pasívne domy', 'Kontrola po dokončení hrubej stavby alebo zateplenia', 'Podklad pre žiadosti o podporu'],
        'includes'=> ['Meranie zariadením Blower Door', 'Vyhodnotenie výmeny vzduchu n50', 'Lokalizácia netesností (v kombinácii s termovíziou)', 'Protokol o meraní'],
        'docs'    => ['Prístup do všetkých priestorov', 'Uzatvorené okná a dvere pripravené na test', 'Projektová dokumentácia'],
        'price'   => 'od 180 €',
        'time'    => 'Termín po dohode',
    ],
];

$FAQ = [
    ['q' => 'Kedy je energetický certifikát povinný?',
     'a' => 'Pri predaji alebo prenájme budovy či jej samostatnej časti (byt, nebytový priestor), pri kolaudácii nových budov a pri podstatnej obnove. Vlastník musí certifikát odovzdať kupujúcemu alebo nájomcovi.'],
    ['q' => 'Ako dlho platí energetický certifikát?',
     'a' => 'Energetický certifikát platí 10 rokov od vyhotovenia. Ak sa budova podstatne zmení (napr. zateplenie, výmena zdroja tepla), odporúčame vyhotoviť nový.'],
    ['q' => 'Čo všetko potrebujem pripraviť?',
     'a' => 'Najčastejšie list vlastníctva, projektovú dokumentáciu alebo pôdorys a základné informácie o vykurovaní a oknách. Ak niečo chýba, poradíme vám, ako to nahradiť obhliadkou a meraním.'],
    ['q' => 'Je obhliadka nehnuteľnosti nevyhnutná?',
     'a' => 'Áno, certifikát musí vychádzať zo skutočného stavu budovy. Obhliadka trvá zvyčajne 30 – 90 minút podľa veľkosti objektu.'],
    ['q' => 'Ako rýchlo dostanem certifikát?',
     'a' => 'Štandardne do niekoľkých pracovných dní od obhliadky a doručenia podkladov. Ak sa vám páli, ponúkame expresné vyhotovenie.'],
    ['q' => 'Čo ak vyjde zlá energetická trieda?',
     'a' => 'Trieda neurčuje, či nehnuteľnosť môžete predať. Certifikát však dáva kupujúcim jasnú informáciu o nákladoch. K výsledku pripájame odporúčania, ako triedu zlepšiť.'],
    ['q' => 'Je certifikát zapísaný v registri?',
     'a' => 'Áno. Každý certifikát registrujeme v ústrednom informačnom systéme energetickej hospodárnosti budov a dostanete jeho identifikačné číslo.'],
    ['q' => 'Pôsobíte aj mimo Bratislavy?',
     'a' => 'Pôsobíme na celom Slovensku. Pri vzdialenejších objektoch sa dohodneme na termíne obhliadky vopred.'],
];

/** Energetické triedy – [označenie, CSS trieda, popis, odporúčanie]. Texty sú všeobecné, bez číselných hodnôt. */
$CLASSES = [
    ['A0', 'c-a0', 'Budova s mimoriadne nízkou potrebou energie, spĺňa najprísnejšie požiadavky.', 'Stačí udržiavať technické systémy v dobrom stave.'],
    ['A1', 'c-a1', 'Veľmi úsporná budova, typická pre moderné novostavby.', 'Priestor na zlepšenie je malý, dôležitá je údržba a správne nastavenie systémov.'],
    ['B',  'c-b',  'Úsporná budova s dobrou kvalitou obálky aj technických systémov.', 'Pri predaji či prenájme je to silný argument. Zlepšenie býva otázkou detailov.'],
    ['C',  'c-c',  'Budova s priemernou spotrebou, často po čiastočnej obnove.', 'Dobrý základ. Ďalší posun môže priniesť regulácia vykurovania alebo modernejší zdroj tepla.'],
    ['D',  'c-d',  'Vyššia spotreba energie, vhodná na zateplenie alebo výmenu zdroja tepla.', 'Oplatí sa zvážiť zateplenie alebo modernizáciu vykurovania.'],
    ['E',  'c-e',  'Neúsporná budova, náklady na energie sú citeľne vyššie.', 'Obnova sa zvyčajne oplatí. Začať sa dá oknami, strechou alebo zdrojom tepla.'],
    ['F',  'c-f',  'Veľmi neúsporná budova, odporúčame komplexnú obnovu.', 'Odporúčame komplexné posúdenie a plán obnovy po etapách.'],
    ['G',  'c-g',  'Najslabšia trieda, budova stráca veľké množstvo energie.', 'Budova potrebuje rozsiahlu obnovu. Certifikát ukáže, kde začať.'],
];

/* ---------- pomocné funkcie ---------- */

function base_path(): string {
    $dir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/'));
    return rtrim($dir === '/' ? '' : $dir, '/');
}

function url(string $path = ''): string {
    return base_path() . '/' . ltrim($path, '/');
}

function asset(string $path): string {
    $file = __DIR__ . '/../assets/' . $path;
    $v = is_file($file) ? filemtime($file) : 1;
    return url('assets/' . $path) . '?v=' . $v;
}

function e($s): string {
    return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8');
}

function icon(string $d, int $size = 28): string {
    return '<svg class="ico" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="' . e($d) . '"/></svg>';
}

function csrf_token(): string {
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(16));
    }
    return $_SESSION['csrf'];
}

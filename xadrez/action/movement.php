<?php

session_start();

const PECA = ['t', 'c', 'b', 'ra', 're', 'p', 'T', 'C', 'B', 'RA', 'RE', 'P'];
const VAGA = '*';

if ($_SESSION["jogada"]['peca'] || $_SESSION["jogada"]['vaga']) {
    $jogada = $_SESSION["jogada"];
} else {
    $jogada = [
        'peca' => null,
        'vaga' => null,
    ];
}

if (!$jogada['peca'] && array_search($_GET['casa'], PECA)) {
    $jogada['peca'] = [
        'eixoX' => $_GET['eixoX'],
        'eixoY' => $_GET['eixoY'],
        'casa' => $_GET['casa']
    ];
}

if (!$jogada['vaga'] && $_GET['casa'] == VAGA) {
    $jogada['vaga'] = [
        'eixoX' => $_GET['eixoX'],
        'eixoY' => $_GET['eixoY'],
        'casa' => $_GET['casa']
    ];
}

if ($jogada['peca'] && $jogada['vaga']) {
    $_SESSION["tabuleiro"][$jogada['vaga']['eixoY']][$jogada['vaga']['eixoX']] = $jogada['peca']['casa'];
    $_SESSION["tabuleiro"][$jogada['peca']['eixoY']][$jogada['peca']['eixoX']] = $jogada['vaga']['casa'];
    $jogada['peca'] = null;
    $jogada['vaga'] = null;
}

$_SESSION["jogada"] = $jogada;

echo '<script>window.location.href = "/";</script>';
exit();

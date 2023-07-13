<?php

session_start();

if (!$_SESSION["tabuleiro"]) {
    $_SESSION["tabuleiro"] = [
        ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'],
        ['t', 'c', 'b', 'ra', 're', 'b', 'c', 't'],
        ['p', 'p', 'p', 'p', 'p', 'p', 'p', 'p', 'p'],
        ['*', '*', '*', '*', '*', '*', '*', '*'],
        ['*', '*', '*', '*', '*', '*', '*', '*'],
        ['*', '*', '*', '*', '*', '*', '*', '*'],
        ['*', '*', '*', '*', '*', '*', '*', '*'],
        ['P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P'],
        ['T', 'C', 'B', 'RA', 'RE', 'B', 'C', 'T'],
    ];
}

foreach ($_SESSION["tabuleiro"] as $eixoY => $coluna) {
    echo "<b>". $eixoY . "</b>";
    echo " ";
    foreach ($coluna as $eixoX => $casa) {
        if ($eixoY != 0) {
            echo "<a href='/action/movement.php?eixoX=" . $eixoX . "&eixoY=" . $eixoY . "&casa=" . $casa . "'>";
        } else {
            echo "<b>";
        }

        echo $casa;

        if ($eixoY != 0) {
            echo "</a>";
        } else {
            echo "</b>";
        }

        echo " ";
    }
    echo "</br>";
}

echo "</br>";
echo '<form action="/action/reset.php" method="POST">';
echo '    <input type="submit" value="Resetar">';
echo '</form>';


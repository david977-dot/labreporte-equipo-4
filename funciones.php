<?php
if (session_status() === PHP_SESSION_NONE) session_start();

function h($v) { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }

function mensaje($tipo, $texto) {
    $_SESSION['mensaje'] = ['tipo' => $tipo, 'texto' => $texto];
}

function mostrar_mensaje() {
    if (!empty($_SESSION['mensaje'])) {
        $m = $_SESSION['mensaje'];
        echo '<div class="alerta '.h($m['tipo']).'">'.h($m['texto']).'</div>';
        unset($_SESSION['mensaje']);
    }
}

function ir($pagina) {
    header("Location: $pagina");
    exit;
}

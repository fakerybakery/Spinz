<?php
session_start();
if (isset($_GET['redeem'])) {
    $_SESSION['coins'] = 0;
    echo '0';
    exit;
}
$_SESSION['coins'] += intval($_GET['coins']);
echo $_SESSION['coins'];
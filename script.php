<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    if ($action == 'on') {
        // Exécuter le script Python pour allumer la lumière
        $output = shell_exec('python3 /var/www/html/led_on.py');
        echo "Lumière allumée";
    } elseif ($action == 'off') {
        // Exécuter le script Python pour éteindre la lumière
        $output = shell_exec('python3 /var/www/html/led_off.py');
        echo "Lumière éteinte";
    } else {
        echo "Action non reconnue";
    }
} else {
    echo "Aucune action spécifiée";
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrôle de Lumière</title>
    <link rel="stylesheet" href="style.css">
    <script>
        let responses = [];
        function json(i) {
            fetch('boutton.json')
                .then(response => response.json())
                .then(data => {
                    responses = data; // Stocker les données JSON dans la variable
                    document.getElementById('light-status').innerText = data[i].message;
                    console.log('Données JSON chargées:', responses);

                })}
         fetch('boutton.json')
                        .then(response => response)
                        .then(data => {
                            responses = data; // Stocker les données JSON dans la variable
                            console.log('Données JSON chargées:', responses);
                        })
        // Fonction pour allumer la lumière
        function turnOn() {
                        fetch('index.php?action=on')
                            .then(response => response)
                            .then(data => {
                                if (data.status == "allumé") {
                                    json(0);
                                    
                                    console.log(data);
                                }
                            });
                    }

        // Fonction pour éteindre la lumière
        function turnOff() {
                        fetch('index.php?action=off')
                            .then(response => response)
                            .then(data => {
                                if (data.status == "éteint") {
                                    json(1);
                                    console.log(data);
                                }
                            });
                    }
    </script>
</head>

<body>

    <div class="container">
        <h1>Contrôle de Lumière</h1>
        <div id="light-status">Lumière éteinte</div>
        <div class="light-bulb" id="light-bulb">💡</div>
        <button class="button on-btn" onclick="turnOn()">Allumer</button>
        <button class="button off-btn" onclick="turnOff()">Éteindre</button>
    </div>
    <?php
    if (isset($_GET['action'])) {
        $action = $_GET['action'];

        if ($action == 'on') {
            // Exécuter le script Python pour allumer la lumière
            $command = 'sudo -u www-data /var/www/html/led_on.py';
            $output = shell_exec($command);

        } elseif ($action == 'off') {
            // Exécuter le script Python pour éteindre la lumière
            $command = 'sudo -u www-data /var/www/html/led_off.py';
            $output = shell_exec($command);

        } else {
            echo "<p>Action non reconnue</p>";
        }
    }
    ?>


</body>

</html>
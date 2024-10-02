function turnOn() {
    document.getElementById('light-status').textContent = "Lumière allumée";
    document.getElementById('light-bulb').classList.add('light-on');
}

function turnOff() {
    document.getElementById('light-status').textContent = "Lumière éteinte";
    document.getElementById('light-bulb').classList.remove('light-on');
}
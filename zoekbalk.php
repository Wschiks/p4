<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
</head>
<body>
    <div class="zoekform blauw width100 flex">
        <form id="destinationForm">
            <div class="rijsbalk">
            <select class="rijsvak font2 border" id="destination" name="destination" required>
                <option value="">Bestemming</option>
                <option value="Madrid">Madrid</option>
                <option value="Hawaï">Hawaï</option>
                <option value="Ijsland">Ijsland</option>
                <option value="Druten">Druten</option>
                <option value="Ostenrijk">Ostenrijk</option>
                <option value="Marrokko">Marrokko</option>
            </select>

            <label class="ppvak font2" for="">vertrek:</label>
            <input class="rijsvak font2" type="date" id="arrivalDate" name="arrivalDate"   required>

            <label class="ppvak font2" for="">aankomst:</label>
            <input class="rijsvak font2" type="date" id="departureDate" name="departureDate"  required>

        <label class="ppvak font2" for="">personen</label>
            <input class="rijsvak font2 border2" type="number" id="persons" name="persons"  min="1" max="10" required>
            
            </div>
<div class="rijsbutton">
            <button class="rijsbuttonelements" type="submit">Zoeken</button>
            </div>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('destinationForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const destination = document.getElementById('destination').value;
            const arrivalDate = document.getElementById('arrivalDate').value;
            const departureDate = document.getElementById('departureDate').value;
            const persons = document.getElementById('persons').value;

            if (new Date(arrivalDate) >= new Date(departureDate)) {
                alert("De vertrekdatum moet na de aankomstdatum liggen.");
                return;
            }

        });
    </script>
</body>
</html>

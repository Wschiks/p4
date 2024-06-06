<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
</head>
<body>
    <div class="search-form">
        <form id="destinationForm">
            <label for="destination">Bestemming:</label>
            <select id="destination" name="destination" required>
                <option value="">Selecteer een bestemming</option>
                <option value="Madrid">Madrid</option>
                <option value="Hawaï">Hawaï</option>
                <option value="Ijsland">Ijsland</option>
                <option value="Druten">Druten</option>
                <option value="Ostenrijk">Ostenrijk</option>
                <option value="Marrokko">Marrokko</option>
            </select>

            <label for="arrivalDate">Aankomstdatum:</label>
            <input type="date" id="arrivalDate" name="arrivalDate" required>

            <label for="departureDate">Vertrekdatum:</label>
            <input type="date" id="departureDate" name="departureDate" required>

            <label for="persons">Aantal personen:</label>
            <input type="number" id="persons" name="persons" min="1" max="10" required>

            <button type="submit">Zoeken</button>
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

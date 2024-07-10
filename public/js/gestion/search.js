const url = "http://127.0.0.1:8000/gestion/rapports/search?";

document.getElementById('searchForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Empêche la soumission du formulaire par défaut

    // Récupère les valeurs des champs
    let dateSelect = document.getElementById('dateSelect').value;
    let animal_id = document.getElementById('animalSelect').value;

    // Construit les paramètres de la requête
    let params = new URLSearchParams();
    params.append('date', dateSelect);
    params.append('animal_id', animal_id);

    // Envoie une requête fetch au serveur
    fetch(url + params, {
        method: 'GET',
        headers: {
            'Accept': 'text/html',
        },
    })
        .then(response => response.text())
        .then(data => {
            // Met à jour la section des résultats avec les données de la réponse
            document.getElementById('searchResults').innerHTML = data;

        })
        .catch(error => console.error('Error in fetch request:', error));
    //RAZ des selectes
    document.getElementById('dateSelect').value = "Rechercher par dates";
    document.getElementById('animalSelect').value = "Rechercher par animal";
});

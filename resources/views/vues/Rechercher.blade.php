@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center">Liste des visiteurs</h2>


        <div class="d-flex justify-content-center mb-4">
            <input type="text" id="searchInput" class="form-control w-50" placeholder="Rechercher un visiteur par nom ou Nom du laboratoire">
        </div>


        <table class="table" id="visitorsTable">
            <thead>
            <tr>
                <th>Nom du visiteur</th>
                <th>Prénom du visiteur</th>
                <th>Laboratoire</th>
            </tr>
            </thead>
            <tbody>
            @foreach($visiteurs as $visiteur)
                <tr>
                    <td>{{ $visiteur->nom_visiteur }}</td>
                    <td>{{ $visiteur->prenom_visiteur }}</td>
                    <td>{{ $visiteur->laboratoire->nom_laboratoire}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script>
        // Définition de la fonction qui filtre le tableau
        function filterTable() {
            // ===== 1. Récupérer ce que l'utilisateur a tapé =====
            // On prend l'élément HTML de la barre de recherche (son id est "searchInput")
            let input = document.getElementById("searchInput");
            // On récupère le texte tapé et on le met en minuscules pour simplifier la recherche
            let filter = input.value.toLowerCase();

            // ===== 2. Récupérer le tableau à filtrer =====
            // On sélectionne le tableau HTML (son id est "visitorsTable")
            let table = document.getElementById("visitorsTable");
            // On récupère toutes les lignes (<tr>) de ce tableau
            let rows = table.getElementsByTagName("tr");

            // ===== 3. Parcourir toutes les lignes du tableau =====
            // On commence à i = 1 pour sauter la première ligne (l'en-tête du tableau)
            for (let i = 1; i < rows.length; i++) {
                // On récupère toutes les cellules (<td>) de la ligne actuelle
                let cols = rows[i].getElementsByTagName("td");
                // Un drapeau pour savoir si on a trouvé une correspondance
                let match = false;

                // ===== 4. Vérifier chaque cellule de la ligne =====
                for (let j = 0; j < cols.length; j++) {
                    // La cellule actuelle qu'on examine
                    let cell = cols[j];
                    // Si la cellule existe (sécurité)
                    if (cell) {
                        // On récupère le texte de la cellule (compatible tous navigateurs)
                        let text = cell.textContent || cell.innerText;
                        // Si le texte de la cellule contient ce qu'on a recherché
                        if (text.toLowerCase().includes(filter)) {
                            // On lève le drapeau "match" car on a trouvé
                            match = true;
                            // On peut s'arrêter de vérifier les autres cellules de cette ligne
                            break;
                        }
                    }
                }

                // ===== 5. Afficher ou masquer la ligne selon si on a trouvé =====
                if (match) {
                    // Si correspondance : afficher la ligne (style vide = affichage normal)
                    rows[i].style.display = "";
                } else {
                    // Si pas de correspondance : cacher la ligne
                    rows[i].style.display = "none";
                }
            }
        }

        // ===== 6. Activer la surveillance de la barre de recherche =====
        // Dès que l'utilisateur tape quelque chose dans la barre (événement "input"),
        // on appelle la fonction filterTable() pour actualiser l'affichage
        document.getElementById("searchInput").addEventListener("input", filterTable);
    </script>
@endsection

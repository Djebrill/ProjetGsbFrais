@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center">Rechercher un visiteur</h2>

        <!-- Affichage des erreurs -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulaire de recherche -->
        <div class="d-flex justify-content-center">
            <form action="{{ route('nom.de.la.route.recherche') }}" method="GET" class="w-50">
                <div class="input-group">
                    <input type="text" id="searchInput" name="query" class="form-control" placeholder="Rechercher un visiteur par nom ou ID laboratoire" onkeyup="filterTable()" required>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">
                            <span class="glyphicon glyphicon-search"></span> Rechercher
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Tableau des résultats -->
        <table class="table mt-4" id="visitorsTable">
            <thead>
            <tr>
                <th>Nom du visiteur</th>
                <th>ID du laboratoire</th>
            </tr>
            </thead>
            <tbody>
            @foreach($visiteurs as $visiteur)
                <tr>
                    <td>{{ $visiteur->nom_visiteur }}</td>
                    <td>{{ $visiteur->id_laboratoire }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- Script pour la filtration côté client -->
    <script>
        function filterTable() {
            let input = document.getElementById("searchInput");
            let filter = input.value.toLowerCase();
            let table = document.getElementById("visitorsTable");
            let tr = table.getElementsByTagName("tr");

            for (let i = 1; i < tr.length; i++) {
                let tdName = tr[i].getElementsByTagName("td")[0];
                let tdLab = tr[i].getElementsByTagName("td")[1];

                if (tdName || tdLab) {
                    let txtValueName = tdName.textContent || tdName.innerText;
                    let txtValueLab = tdLab.textContent || tdLab.innerText;

                    if (txtValueName.toLowerCase().includes(filter) || txtValueLab.toLowerCase().includes(filter)) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
@endsection

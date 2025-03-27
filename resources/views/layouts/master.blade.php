<!doctype html>
<html lang="fr">
{!! Html::style('assets/css/bootstrap.css') !!}
{!! Html::style('assets/css/gsb.css') !!}
    <head>
    </head>
    <body class="body">
        <div class="container">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-target">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar+ bvn"></span>
                        </button>
                    </div>
                    @if (Session::get('id') == 0)
                        <a class="navbar-brand" href="{{url('/')}}">GSB Frais</a>
                        <div class="collapse navbar-collapse" id="navbar-collapse-target">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="{{url('/formLogin')}}" data-toggle="collapse" data-target=".navbar-collapse.in">Se connecter</a></li>
                            </ul>
                        </div>
                    @else
                        <a class="navbar-brand" href="{{url('/debut')}}">GSB Frais</a>
                        <div class="collapse navbar-collapse" id="navbar-collapse-target">
                            <ul class="nav navbar-nav">
                                <li><a href="/rechercher" data-toggle="collapse" data-target=".navbar-collapse.in">Rechercher</a></li>
                                <li><a href="/inviter" data-toggle="collapse" data-target=".navbar-collapse.in">Inviter</a></li>
                                <li><a href="/activite" data-toggle="collapse" data-target=".navbar-collapse.in">Activité Complementaire</a></li>
                                <li><a href="{{url('/getListeFrais')}}" data-toggle="collapse" data-target=".navbar-collapse.in">Liste fiches de frais</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <span></span> <!-- Affiche le login ici -->
                                </li>
                                <li><a href="{{url('/getLogin')}}" data-toggle="collapse" data-target=".navbar-collapse.in">({{ Session::get('login') }})
                                        Se déconnecter</a></li>
                            </ul>
                        </div>
                    @endif
                </div><!--/.container-fluid -->
            </nav>
        </div>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>

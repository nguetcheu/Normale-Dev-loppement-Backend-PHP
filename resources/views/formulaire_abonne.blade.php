<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  @vite(['resources/js/app.js'])
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Abonne</title>



  <!-- Styles -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>

<body>
  <div class="card uper">
    <div class="card-header text-center">
      Ajouter un abonne
    </div>

    <div class="card-body">
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div><br />
      @endif

      <div class="container">
        <div class="row">
          <div class="col-6">
            <form method="post" action="/abonne_store">
              @csrf
              <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" class="form-control" name="nom" />
              </div>

              <label for="prenom">Prenom:</label>
              <input type="text" class="form-control" name="prenom" />

              <label for="age">Age:</label>
              <input type="number" class="form-control" name="age" />

              <div class="form-group">
                <label for="sexe">Choisir le sexe </label>
                <select class="form-control" id="sexe" name="sexe">
                  <option>M</option>
                  <option>F</option>
                </select>
              </div>

              <div class="form-group">
                <label for="id_region">Rubrique ID:</label>
                <select name="id_region" class="form-control">
                  @foreach(App\Models\Rubrique::pluck('id') as $rubriqueId)
                  <option value="{{ $regionId }}">{{ $rubriqueID }}</option>
                  @endforeach
                </select>
              </div>

              <button type="submit" class="btn btn-primary">Ajouter</button>
            </form><br>
          </div>
          <div class=" m-4 col-4">
            <h3 class="text-center">Veuillez remplir le formulaire</h3>
            <table class="table table-striped">
              <thead>
                <tr>
                  <td>ID</td>
                  <td>Label</td>
                </tr>
              </thead>

              <tbody>
                @foreach($rubrique as $rubrique)
                <tr>
                  <td>{{$rubrique->id}}</td>
                  <td>{{$rubrique->nom}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <a href="/" class="btn btn-outline-danger"> Retourner a l'accueil </a>
        </div>
      </div>

    </div>
  </div>
</body>

</html>
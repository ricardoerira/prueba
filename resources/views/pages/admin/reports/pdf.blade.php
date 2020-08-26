  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TABLA DE PRODUCTOS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        @page {
            margin: 0cm 0cm;
            font-size: 1em;
        }
        body {
            margin: 3cm 2cm 2cm;
        }
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 1.5cm;
            background-color:dimgrey;
            color: white;
            text-align: center;
            line-height: 20px;
        }
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 1cm;
            background-color: dimgrey;
            color: white;
            text-align: center;
            line-height: 35px;
        }
    </style>
</head>
<body>
    <header>
        <br>
        <p><strong>Instituto Distrital de la Participación y Acción Comunal - IDPAC</strong></p>
    </header>
    <main>
        <div class="container">
            <h5 style="text-align: center"><strong>Reporte de condiciones de salud</strong></h5>
              <table class="table table-striped text-center">
                <thead>
                  <tr>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Cargo</th>
                    <th>Patologia</th>
                    <TH>Trabaja</TH>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $dat)
                    <tr>
                        <td scope="row">{{ $dat['id'] }}</td>
                        <td>{{ $dat['name'] }}</td>
                        <td>{{ $dat['cargo'] }}</td>
                        <td>{{ $dat['pathology'] }}</td>
                        <td>{{ $dat['work'] }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
        </div>
    </main>
    <footer>
        <p><strong>Copyright © 2020 </strong></p>
    </footer>
</body>
</html>
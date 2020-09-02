<table>
    <thead>
    <tr>
        <th>Cedula</th>
        <th>Nombre</th>
        <th>Cargo</th>
        <th>Tipo de vinculacion</th>
        <th>Observacion</th>
        <th>Puede trabajar</th>
    </tr>
    </thead>
    <tbody>
            @foreach ($dataP as $dat)
            <tr>
                <td>{{ $dat['id'] }}</td>
                <td>{{ $dat['name'] }}</td>
                <td>{{ $dat['cargo'] }}</td>
                <td>{{ $dat['vinculacion'] }}</td>
                <td>{{ $dat['observacion'] }}</td>
                <td>{{ $dat['trabaja'] }}</td>
            </tr>
            @endforeach
    </tbody>
</table>

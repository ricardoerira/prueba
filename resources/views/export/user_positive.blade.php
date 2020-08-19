<table>
    <thead>
    <tr>
        <th>Número de documento</th>
        <th>Nombres y Apellidos</th>
        <th>Correo electrónico</th>
        <th>Estado</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->status }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
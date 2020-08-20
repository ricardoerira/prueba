<table>
    <thead>
    <tr>
        <th>Numero de Encuesta</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    @foreach($surveys as $survey)
        <tr>
            <td>{{ $survey->id }}</td>
            <td>{{ $survey->id }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
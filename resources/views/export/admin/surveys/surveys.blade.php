<table>
    <thead>
    <tr>
        <th>Numero de Encuesta</th>
        <th>Nombres y Apellidos</th>
        <th>Email</th>
        @foreach($surveys as $survey)
            @foreach ($survey->answers as $answer)
                <th>{{$answer->question->name}}</th>
            @endforeach
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($surveys as $survey)
        <tr>
            <td>{{ $survey->id }}</td>
            <td>{{ $survey->surveyed->name }}</td>
            <td>{{ $survey->surveyed->email }}</td>
            @foreach ($survey->answers as $answer)
                <td>{{$answer->text}}</td>
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>
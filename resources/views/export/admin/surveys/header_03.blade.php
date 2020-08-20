<table>
    <thead>
    <tr>
        <th>Numero de Encuesta</th>
        <th>Nombres y Apellidos</th>
        <th>Email</th>
        <th>¿Dónde está ejerciendo sus actividades diarias?</th>
        <th>Relacione los nombres de los funcionarios(as)/contratistas con los que mantuvo contacto cercano</th>
        <th>En el(los) espacio(s) de trabajo: permaneció a menos de 2 metros de distancia con otras personas</th>
        <th>En área(s) de alimentación: permaneció a menos de 2 metros de distancia con otras personas</th>
        <th>¿Usó tapabocas en transporte público y áreas de afluencia masiva de personas?</th>
        <th>¿Usó guantes cuando manipuló documentos externos, manejó dinero, manejo residuos, realizo actividades de aseo?</th>
        <th>Recibió instrucciones de uso, colocación y retiro de EPP?</th>
        <th>¿Realizó el lavado de manos con agua limpia, jabón y toallas de un solo uso?</th>
        <th>¿Realizó el lavado frecuente de manos, mínimo, cada 3 horas?</th>
        <th>¿El jabón duró en contacto con sus manos, mínimo, entre 20 y 30 segundos?</th>
        <th>Para la higiene de las manos, ¿usó alcohol glicerinado?</th>
        <th>Midió su temperatura corporal con alguno de los siguientes mecanismos</th>
        <th>Si midió su temperatura corporal, ¿cuál fue el resultado en °C</th>
        <th>Fiebre</th>
        <th>Dolor de garganta</th>
        <th>Congestión nasal</th>
        <th>Tos</th>
        <th>Fatiga</th>
        <th>Dolor de músculos</th>
        <th>Midió su temperatura corporal con alguno de los siguientes mecanismos</th>
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
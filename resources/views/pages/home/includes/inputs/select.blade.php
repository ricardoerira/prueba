<select
    name="answers[]"
    id="@if($question->questionsDependedMy()->exists()){{'depended'}}@endif"
    class="form-control w-50"
    @if ( $question->answer_required_yn  == 1)
        required
    @endif
>
    <option value="">Seleccione...</option>
    @foreach ($question->choices as $choices)
        <option value="{{ $choices->id }}">{{ $choices->name }}</option>
    @endforeach
</select>
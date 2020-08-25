<select
    name="answers[{{$question->id}}]"
    id = "select_depended_{{$question->id}}"
    class="form-control w-50"
    @if ( $question->answer_required_yn  == 1)
        required
    @endif
    @if (isset($ant))
        @if($header->id == 6)
            @if(questionExist($question->id, $ant))
                disabled
             @endif
        @endif

    @endif
>
    <option value="">Seleccione...</option>
    @foreach ($question->choices as $choices)
            <option value="{{ $choices->id }}" 
            @if(isset($ant))
            value="{{getAnswerChoice($question->id, $ant)}}"
                @if(strval(getAnswerChoice($question->id, $ant)) == $choices->id)
                    selected
                @endif
            @endif>{{ $choices->name }}</option>
    @endforeach
</select>
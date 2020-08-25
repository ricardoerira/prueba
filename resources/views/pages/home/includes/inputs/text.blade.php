<input
    type="text"
    name="answers[{{$question->id}}]"
    @if (isset($ant))
        value = "{{getAnswerText($question->id, $ant)}}"
    @endif
    class="form-control"
    @if ( $question->answer_required_yn  == 1)
        required
    @endif
    @if (isset($ant) && $header->id == 6)
        @if(questionExist($question->id, $ant))
            disabled
        @endif
    @endif
>
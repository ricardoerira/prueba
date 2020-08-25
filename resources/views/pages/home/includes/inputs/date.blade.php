
<input
    type="date"
    name="answers[{{$question->id}}]"
    @if (isset($ant))
        value = "{{getAnswerText($question->id, $ant)}}"
    @endif
    id="date_depended_{{$question->id}}"
    class="form-control w-50"
    @if ( $question->answer_required_yn  == 1)
        required
    @endif
    @if ($header->id == 6 && isset($ant))
        @if(questionExist($question->id, $ant))
            disabled
        @endif
    @endif
>
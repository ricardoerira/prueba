<input
    type="number"
    name="answers[{{$question->id}}]"
    class="form-control w-50"
    @if ( $question->answer_required_yn  == 1)
        required
    @endif
    @if (isset($ant))
        @if(questionExist($question->id, $ant))
            disabled
        @endif
    @endif
>
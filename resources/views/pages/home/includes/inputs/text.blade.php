<input
    type="text"
    name="answers[{{$question->id}}]"
    @if (isset($ant))
        value = "{{getAnswerText($question->id, $ant)}}"
    @endif
    id="text_depended_{{$question->id}}"
    class="form-control @error('answers.' . $question->id) is-invalid @enderror"
    @if ( $question->answer_required_yn  == 1)
        required
    @endif
    @if (isset($ant) && $header->id == 6)
        @if(questionExist($question->id, $ant))
            disabled
        @endif
    @endif
>

@error('answers.' . $question->id)
<div class="invalid-feedback">
    {{ $message }}
</div>
@enderror
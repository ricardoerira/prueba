
<input
    type="date"
    name="answers[{{$question->id}}]"
    @if (isset($ant))
        value = "{{getAnswerText($question->id, $ant)}}"
    @endif
    id="date_depended_{{$question->id}}"
    class="form-control w-50 @error('answers.' . $question->id) is-invalid @enderror"
    @if ( $question->answer_required_yn  == 1)
        required
    @endif
    @if ($header->id == 6 && isset($ant))
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
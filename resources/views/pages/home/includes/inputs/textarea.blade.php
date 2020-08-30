<textarea
    type="text"
    name="answers[{{$question->id}}]"
    class="form-control"
    @if ( $question->answer_required_yn  == 1)
        required
    @endif
    @if ($header->id == 6 && isset($ant))
        @if(questionExist($question->id, $ant))
            disabled
        @endif
    @endif
></textarea>

@error('answers.' . $question->id)
<div class="invalid-feedback">
    {{ $message }}
</div>
@enderror
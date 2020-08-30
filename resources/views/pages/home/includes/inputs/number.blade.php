<input
    type="number"
    name="answers[{{$question->id}}]"
    class="form-control w-50 @error('answers.' . $question->id) is-invalid @enderror"
    @if ( $question->answer_required_yn  == 1)
        required
    @endif
    @if (isset($ant))
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
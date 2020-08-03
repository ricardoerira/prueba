<input
    type="number"
    name="answers[]"
    class="form-control w-50"
    @if ( $question->answer_required_yn  == 1)
        required
    @endif
>
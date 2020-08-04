<input
    type="text"
    name="answers[]"
    class="form-control"
    @if ( $question->answer_required_yn  == 1)
        required
    @endif
>
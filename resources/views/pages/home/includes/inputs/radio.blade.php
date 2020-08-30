<fieldset id="@if($question->questionsDependedMy()->exists()){{'depended'}}@endif">
    <div class="form-check">
        @foreach ($question->choices as $key => $choice)
        <input
            type="radio"
            value="{{ $choice->id }}"
            name="answers[{{$question->id}}]"
            class="form-check-input"
            id="radio_depended_{{$question->id}}_{{$key}}"
            @if ($question->answer_required_yn == 1) required @endif
            @if (isset($ant))
                @if(questionExist($question->id, $ant))
                    @if($header->id == 6)
                        @if (lastAnswer($question->id, $ant) == false)
                            disabled
                        @endif
                    @endif
                @endif
                @if (getAnswerChoice($question->id, $ant) == $choice->id)
                    checked
                @endif

            @endif
        >
        <label for="answers[]" class="form-check-label">{{ $choice->name }}</label>
        <br>
        @endforeach
    </div>
</fieldset>

@error('answers.' . $question->id)
<div class="invalid-feedback">
    {{ $message }}
</div>
@enderror
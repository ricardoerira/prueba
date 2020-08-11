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
        >
        <label for="answers[]" class="form-check-label">{{ $choice->name }}</label>
        <br>
        @endforeach
    </div>
</fieldset>
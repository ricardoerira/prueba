<input type="hidden" name="questions[]" value="{{ $question->id }}">

<label for="answers[]">{{ $question->name }}</label>
<div class="form-check">
    @foreach ($question->choices as $choice)
        <input type="radio" value="{{ $choice->id }}" name="answers[]" class="form-check-input">
        <label for="answers[]" class="form-check-label">{{ $choice->name }}</label>
        <br>
    @endforeach
</div>
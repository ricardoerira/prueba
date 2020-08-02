<div class="form-check">
    @foreach ($question->choices as $choice)
        <input type="radio" value="{{ $choice->id }}" name="answers[]" class="form-check-input">
        <label for="answers[]" class="form-check-label">{{ $choice->name }}</label>
        <br>
    @endforeach
</div>
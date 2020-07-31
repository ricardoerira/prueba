
<input type="hidden" name="questions[]" value="{{ $question->id }}">

<label for="answers[]">{{ $question->name }}</label>
<input type="text" name="answers[]" class="form-control">
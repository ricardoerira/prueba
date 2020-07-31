
<input type="hidden" name="questions[]" value="{{ $question->id }}">

<label for="answers[]">{{ $question->name }}</label>
<textarea type="text" name="answers[]" class="form-control"></textarea>
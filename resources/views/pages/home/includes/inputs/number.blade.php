
<input type="hidden" name="questions[]" value="{{ $question->id }}">

<label for="answers[]">{{ $question->name }}</label>
<input type="number" name="answers[]" class="form-control w-50">
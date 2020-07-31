<input type="hidden" name="questions[]" value="{{ $question->id }}">

<label for="answers[]">{{ $question->name }}</label>
<select name="answers[]" id="" class="form-control w-50">
    <option value="0">Seleccione...</option>
    @foreach ($question->choices as $choices)
        <option value="{{ $choices->id }}">{{ $choices->name }}</option>
    @endforeach
</select>
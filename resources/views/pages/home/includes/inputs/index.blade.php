@if ( $question->inputType->name == 'text' )
    @include('pages.home.includes.inputs.text')
@endif

@if ( $question->inputType->name == 'number' )
    @include('pages.home.includes.inputs.number')
@endif

@if ( $question->inputType->name == 'textarea' )
    @include('pages.home.includes.inputs.textarea')
@endif

@if ( $question->inputType->name == 'radio' )
    @include('pages.home.includes.inputs.radio')
@endif

@if ( $question->inputType->name == 'select' )
    @include('pages.home.includes.inputs.select')
@endif
@if ( !$sections->count() )
<option> There is no section for this class.</option>
@else 
    @foreach( $sections as $section )
        <option value="{{ $section->id }}">{{ $section->title }}</option>                 
    @endforeach
 @endif
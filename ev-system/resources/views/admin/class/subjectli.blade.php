@if ( !$subjects->count() )
<option value="">There is no subject for this class.</option>
@else 
@foreach( $subjects as $subject )
                   
                          <option value="{{ $subject->id }}">{{ $subject->title }}</option>
                          
                        
 @endforeach
 @endif
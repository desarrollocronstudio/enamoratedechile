@if ( $errors->count() > 0 )
<div class="errors">
    <p><strong>Se encontraron los siguientes errores:</strong></p>
    <ul>
        @foreach( $errors->all() as $message )
        <li>{{ $message }}</li>
        @endforeach
    </ul>
</div>
@endif
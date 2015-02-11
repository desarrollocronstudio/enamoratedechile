@if(Session::has('message'))
    <div class="alert alert-{{ Session::get('message')['status'] }}">
        <p>{{ Session::get('message')['message'] }}</p>
    </div>
@endif
@if(!empty($controllerName) && !empty($controllerPath))
    @foreach($controllerName as $key=>$name)
        <option value="{{$controllerPath[$key]}}">{{$name}}</option>
    @endforeach
@endif
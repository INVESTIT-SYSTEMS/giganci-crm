@include('Layout_forms.headlayout')
<h1>Potencjalni</h1>
@foreach($user as $users)
    <h2>{{ $users['name']}}</h2>
@endforeach

{{--<a href="{{route('PotentialStudent_routes.edit', ['user' => $users])}}"></a>--}}



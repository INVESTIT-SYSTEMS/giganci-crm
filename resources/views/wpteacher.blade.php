@include('Layout_forms.headlayout')
<h1>Nauczyciele</h1>
<p>Gruby m.in.</p>
@foreach($user as $teacher)
    {{$teacher['name']}}
    <a href="{{ route('TeacherController_routes.edit', ['TeacherController_route'=>$teacher])  }}">Edit</a>
@endforeach


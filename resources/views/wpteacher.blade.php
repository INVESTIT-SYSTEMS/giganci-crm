@include('Layout_forms.headlayout')
<h1>Nauczyciele</h1>
<p>Gruby m.in.</p>
@foreach($teacher as $user)
    {{$user['name']}}
    <a href="{{ route('addTeacher.edit', ['addTeacher'=>$user])  }}">Edit</a>
@endforeach


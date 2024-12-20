<head>
    <title>Edytuj nauczyciela</title>
</head>
@include('Layout_forms.headlayout')

<section class="contentteacheredit">
    <h1>Edytuj nauczyciela</h1>
    <section class="bg-gray-300 teachercontentedit">
        <form action="{{route('teachers.update', ['teacher'=>$teachers])}}" method="POST" id="teacherForm">
            @csrf
            @method('put')
            <table class="">
                <tr>
                    <td>Imie:</td>
                    <td><input type="text" name="name" id="name" value="{{$teachers->name}}">
                        <br>
                        <span>@error('name'){{$message}}@enderror</span></td>
                </tr>
                <tr>
                    <td>Nazwisko:</td>
                    <td><input type="text" name="surname" id="surname" value="{{$teachers->surname}}">
                        <br>
                        <span>@error('surname'){{$message}}@enderror</span></td>
                </tr>
                <tr>
                    <td>Numer telefonu:</td>
                    <td><input type="text" name="phone_number" id="phone_number" value="{{$teachers->phone_number}}">
                        <br>
                        <span>@error('phone_number'){{$message}}@enderror</span></td>
                </tr>
                <tr>
                    <td>E-mail:</td>
                    <td><input type="text" name="email" id="email" value="{{$teachers->email}}">
                        <br>
                        <span>@error('email'){{$message}}@enderror</span></td>
                </tr>
            </table>
            <button type="submit" class="teacheredit">Edytuj Nauczyciela</button>
        </form>
    </section>
</section>
@include('Layout_forms.footerlayout')

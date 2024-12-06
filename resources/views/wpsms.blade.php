@include('Layout_forms.headlayout')

<section class="contentsms">
    <h1>Korespondencja seryjna</h1>
    @if(session('send'))
        <p>{{session('send')}}</p>
    @endif
    <section class="bg-gray-300 smssection">
        @if(session('sucess'))
            <p>{{session('succes')}}</p>
        @endif
        <form action="{{route('mail.send')}}" method="get">
            @csrf
        <div class="sendmessage">
            <h3>SMS & E-mail</h3>

            <table class="message">
                <tr>
                    <td><input type="text" name="" id="" placeholder="Podaj tytuł"></td>
                </tr>
                <tr>
                    <td> <textarea name="message" placeholder="Wpisz swoją wiadomość"></textarea></td>
                </tr>
            </table>
            <div class="studentmessage">
            <table>
                <tr>
                    <th>Imie i nazwisko ucznia</th>
                    <th>Imie i nazwisko rodzica</th>
                    <th>Grupa ucznia</th>
                    <th>Numer telefonu</th>
                    <th>E-mail</th>
                </tr>
                @if(!empty($student))
                @foreach($student as $info)
                <tr>
                    <td class="colored">{{$info->name}} {{$info->surname}}</td>
                    <td>{{$info->parent_name}} {{$info->parent_surname}}</td>
                    <td>{{$info->group ? $info->group->name:'Brak grupy'}}</td>
                    <td>{{$info->parent_phone_number}}</td>
                    <td class="colored"><input hidden name="emails[]" value="{{$info->parent_email}}">{{$info->parent_email}}</td>
                </tr>
                @endforeach
                @endif
            </table>
            </div>
            <button type="submit" class="send">Wyślij</button></a>
        </form>
    </section>

</section>
@include('Layout_forms.footerlayout')

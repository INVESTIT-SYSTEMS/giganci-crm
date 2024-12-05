@include('Layout_forms.headlayout')

<section class="contentsms">
    <h1>Korespondencja seryjna</h1>
    <section class="bg-gray-300 smssection">
        <form action="{{route('mail.send')}}" method="get">
            @csrf
        <div class="sendmessage">
            <h3>SMS & E-mail</h3>
            <table class="message">
                <tr>
                    <td> <textarea placeholder="Wpisz swoją wiadomość"></textarea></td>
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
                @foreach($student as $info)
                <tr>
                    <td class="colored">{{$info->name}} {{$info->surname}}</td>
                    <td>{{$info->parent_name}} {{$info->parent_surname}}</td>
                    <td>{{$info->group ? $info->group->name:'Brak grupy'}}</td>
                    <td>{{$info->parent_phone_number}}</td>
                    <td class="colored"><input hidden name="emails[]" value="{{$info->parent_email}}">{{$info->parent_email}}</td>
                </tr>
                @endforeach
            </table>
            </div>
            <button type="submit" class="send">Wyślij</button></a>
        </form>
    </section>

</section>
@include('Layout_forms.footerlayout')

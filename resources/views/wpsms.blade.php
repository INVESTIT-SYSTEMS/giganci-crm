@include('Layout_forms.headlayout')

<section class="contentsms">
    <h1>Korespondencja seryjna</h1>
    <section class="bg-gray-300 smssection">

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
                    <td class="colored">{{$info->parent_email}}</td>
                    <td>{{$info->group->location->town}}</td>
                </tr>
                @endforeach
            </table>
            </div>
            <button class="send">Wyślij</button>

    </section>

</section>
@include('Layout_forms.footerlayout')

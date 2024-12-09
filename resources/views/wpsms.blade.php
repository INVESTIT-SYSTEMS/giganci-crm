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
        <form action="{{route('mailStudent.send')}}" method="get">
            @csrf
        <div class="sendmessage">
            <div class="buttoncontent">
                <a href="wpsmsSend.blade.php"><button class="messagebutton">SMS</button></a>
            </div>

            <table class="message">
                <tr>
                    <td><input type="text" name="title" id="" placeholder="Podaj tytuł"></td>
                </tr>
                <tr>
                    <td> <textarea name="message" placeholder="Wpisz swoją wiadomość"></textarea></td>
                </tr>
                <input type="checkbox" name="checkEmail" id="1"> Emial <br>
                <input type="checkbox" name="checkSMS" id="2"> SMS
            </table>
            <div class="studentmessage">
            <table>
                <form action="{{route('sms.index')}}" method="post">
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
                    <td class="colored">
                        <input hidden value="{{$info->name}}">{{$info->name}}
                        <input hidden value="{{$info->surname}}">{{$info->surname}}
                    </td>
                    <td>
                        <input hidden name="name" value="{{$info->parent_name}}">{{$info->parent_name}}
                        <input hidden name="surname" value=" {{$info->parent_surname}}">{{$info->parent_surname}}
                    </td>
                    <td>
                        <input hidden value="$info->group->name">{{$info->group ? $info->group->name:'Brak grupy'}}
                    </td>
                    <td>
                        <input hidden name="parent_phone_numbers[]" value="{{$info->parent_phone_number}}">{{$info->parent_phone_number}}
                    </td>
                    <td class="colored">
                        <input hidden name="emails[]" value="{{$info->parent_email}}">{{$info->parent_email}}
                    </td>
                </tr>
                @endforeach
                @endif
            </table>
            </div>
            <button type="submit" class="send">Wyślij</button></a>
        </div>
        </form>
    </section>

</section>
@include('Layout_forms.footerlayout')

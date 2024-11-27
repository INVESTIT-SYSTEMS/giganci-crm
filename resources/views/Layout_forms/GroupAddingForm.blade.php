<head>
    <title>Dodaj grupę</title>
</head>
@include('Layout_forms.headlayout')

<section class="contentgroupadd">
    <h1>Dodaj grupę</h1>
    <section class="groupsectionadd">
        <form action="{{route('groups.store')}}" method="post" id="group">
            @csrf
            @method('post')
            <table class="">
                <tr>
                    <td>Nazwa grupy:</td>
                    <td><input type="text" name="name" id="" placeholder="Podaj nazwe grupy"></td>
                </tr>
                <tr>
                    <td>Dzień tygodnia:</td>
                    <td><select name="classes_day" form="group">
                            <option value="Poniedziałek">Poniedziałek</option>
                            <option value="Wtorek">Wtorek</option>
                            <option value="Środa">Środa</option>
                            <option value="Czwartek">Czwartek</option>
                            <option value="Piątek">Piątek</option>
                            <option value="Sobota">Sobota</option>
                            <option value="Niedziela">Niedziela</option>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Godzina zajęć:</td>
                    <td><input type="text" name="classes_hour" id="" placeholder="Podaj godzinę zajęć"></td>
                </tr>
                <tr>
                    <td>Nauczyciel:</td>
                    <td><select name="teacher_id" form="group">
                            @foreach($teachers as $teacher)
                                <option value="{{ $teacher['id'] }}">{{$teacher['name']}} {{ $teacher['surname']}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Lokalizacja:</td>
                    <td><select name="location_id" form="group">
                            @foreach($locations as $location)
                                <option value="{{ $location['id'] }}">{{$location['town']}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
            </table>
            <button type="submit" class="groupadd">Dodaj Grupę</button>
        </form>
    </section>
</section>
@include('Layout_forms.footerlayout')

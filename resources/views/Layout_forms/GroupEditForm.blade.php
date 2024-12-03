<head>
    <title>Edytuj grupę</title>
</head>
@include('Layout_forms.headlayout')

<section class="contentgroupedit">
    <h1>Edytuj grupę</h1>
    <section class="bg-gray-300 groupsectionedit">
        <form action="{{route('groups.update', ['group'=>$groups])}}" method="post" id="group">
            @csrf
            @method('put')
            <table class="">
                <tr>
                    <td>Nazwa grupy:</td>
                    <td><input type="text" name="name" id="" value="{{$groups->name}}">
                        <br>
                        <span>@error('name'){{$message}}@enderror</span></td>
                </tr>
                <tr>
                    <td>Dzień tygodnia:</td>
                    <td><select name="classes_day" form="group" >
                            <option @selected($groups->classes_day == 'Poniedziałek') value="Poniedziałek">Poniedziałek</option>
                            <option @selected($groups->classes_day == 'Wtorek') value="Wtorek">Wtorek</option>
                            <option @selected($groups->classes_day == 'Środa') value="Środa">Środa</option>
                            <option @selected($groups->classes_day == 'Czwartek') value="Czwartek">Czwartek</option>
                            <option @selected($groups->classes_day == 'Piątek') value="Piątek">Piątek</option>
                            <option @selected($groups->classes_day == 'Sobota') value="Sobota">Sobota</option>
                            <option @selected($groups->classes_day == 'Niedziela') value="Niedziela">Niedziela</option>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Godzina zajęć:</td>
                    <td><input type="text" name="classes_hour" id="" value="{{$groups->classes_hour}}">
                        <br>
                        <span>@error('classes_hour'){{$message}}@enderror</span></td>
                </tr>
                <tr>
                    <td>Nauczyciel:</td>
                    <td><select name="teacher_id" form="group">
                            @foreach($teachers as $teacher)
                                <option @selected($groups->teacher_id == $teacher->id)>{{$teacher->name}} {{ $teacher->surname}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Lokalizacja:</td>
                    <td><select name="location_id" form="group">
                            @foreach($locations as $location)
                                <option @selected($groups->location_id == $location->id)>{{$location->town}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
            </table>
            <button type="submit" class="groupedit">Edytuj Grupę</button>
        </form>
    </section>
</section>
@include('Layout_forms.footerlayout')

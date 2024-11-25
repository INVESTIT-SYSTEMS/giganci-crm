<head>
    <title>Edytuj grupę</title>
</head>
@include('Layout_forms.headlayout')

<section class="contentgroupedit">
    <h1>Edytuj grupę</h1>
    <section class="groupsectionedit">
        <form action="{{route('addGroup.update', ['addGroup'=>$group])}}" method="post" id="group">
            @csrf
            @method('put')
            <table class="">
                <tr>
                    <td>Nazwa grupy:</td>
                    <td><input type="text" name="name" id="" value="{{$group['name']}}"></td>
                </tr>
                <tr>
                    <td>Dzień tygodnia:</td>
                    <td><select name="classes_day" form="group" >
                            <option @if($group['classes_day'] == 'Poniedziałek')selected @endif value="Poniedziałek">Poniedziałek</option>
                            <option @if($group['classes_day'] == 'Wtorek')selected @endif value="Wtorek">Wtorek</option>
                            <option @if($group['classes_day'] == 'Środa')selected @endif value="Środa">Środa</option>
                            <option @if($group['classes_day'] == 'Czwartek')selected @endif value="Czwartek">Czwartek</option>
                            <option @if($group['classes_day'] == 'Piątek')selected @endif value="Piątek">Piątek</option>
                            <option @if($group['classes_day'] == 'Sobota')selected @endif value="Sobota">Sobota</option>
                            <option @if($group['classes_day'] == 'Niedziela')selected @endif value="Niedziela">Niedziela</option>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Godzina zajęć:</td>
                    <td><input type="text" name="classes_hour" id="" value="{{$group['classes_hour']}}"></td>
                </tr>
                <tr>
                    <td>Nauczyciel:</td>
                    <td><select name="teacher_id" form="group">
                            @foreach($teachers as $teacher)
                                <option
                                    @if($teacher['id'] == $group['teacher_id'])
                                        selected value="{{$teacher['id']}}"
                                    @else
                                        value="{{$teacher['id']}}"
                                    @endif
                                >
                                    {{$teacher['name']}} {{ $teacher['surname']}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Lokalizacja:</td>
                    <td><select name="location_id" form="group">
                            @foreach($locations as $location)
                                <option
                                    @if($location['id'] == $group['location_id'])
                                        selected value="{{$location['id']}}"
                                    @else
                                        value="{{ $location['id'] }}"
                                    @endif
                                >
                                    {{$location['town']}}</option>
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


{{--@section()--}}
{{--    <form action="{{route('addGroup.update', ['addGroup'=>$group])}}" method="post" id="group">--}}
{{--        @csrf--}}
{{--        @method('put')--}}
{{--        <input type="text" name="name" id="">--}}
{{--        <select name="classes_day" form="group" >--}}
{{--            <option @if($group['classes_day'] == 'Poniedziałek')selected @endif value="Poniedziałek">Poniedziałek</option>--}}
{{--            <option @if($group['classes_day'] == 'Wtorek')selected @endif value="Wtorek">Wtorek</option>--}}
{{--            <option @if($group['classes_day'] == 'Środa')selected @endif value="Środa">Środa</option>--}}
{{--            <option @if($group['classes_day'] == 'Czwartek')selected @endif value="Czwartek">Czwartek</option>--}}
{{--            <option @if($group['classes_day'] == 'Piątek')selected @endif value="Piątek">Piątek</option>--}}
{{--            <option @if($group['classes_day'] == 'Sobota')selected @endif value="Sobota">Sobota</option>--}}
{{--            <option @if($group['classes_day'] == 'Niedziela')selected @endif value="Niedziela">Niedziela</option>--}}

{{--        </select>--}}
{{--        <input type="text" name="classes_hour" id="">--}}
{{--        <select name="teacher_id" form="group">--}}
{{--            @foreach($teachers as $teacher)--}}
{{--                <option--}}
{{--                @if($teacher['id'] == $group['teacher_id'])--}}
{{--                    selected value="{{$teacher['id']}}"--}}
{{--                @else--}}
{{--                    value="{{$teacher['id']}}"--}}
{{--                @endif--}}
{{--                >--}}
{{--                    {{$teacher['name']}} {{ $teacher['surname']}}</option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
{{--        <select name="location_id" form="group">--}}
{{--                @foreach($locations as $location)--}}
{{--                    <option--}}
{{--                        @if($location['id'] == $group['location_id'])--}}
{{--                            selected value="{{$location['id']}}"--}}
{{--                        @else--}}
{{--                            value="{{ $location['id'] }}"--}}
{{--                        @endif--}}
{{--                        >--}}
{{--                        {{$location['town']}}</option>--}}
{{--                @endforeach--}}
{{--        </select>--}}
{{--        <button type="submit">Edytuj Grupę</button>--}}
{{--    </form>--}}

{{--@endsection--}}

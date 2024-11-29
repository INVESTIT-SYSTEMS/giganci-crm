@include('Layout_forms.headlayout')

<section class="contentsms">

    <section class="bg-gray-300 smssection">
        @foreach($student as $info)
            <div class="gap">
                <tr>
                    <td><input type="checkbox" class="checkboxes" name="check[]" form="send" value="{{$info->id}}"></td>
                    <td class="colored">{{$info->name}}</td>
                    <td>{{$info->surname}}</td>
                    <td class="colored">{{$info->birth_year}}</td>
                    <td>{{$info->parent_name}}</td>
                    <td class="colored">{{$info->parent_surname}}</td>
                    <td>{{$info->parent_phone_number}}</td>
                    <td class="colored">{{$info->parent_email}}</td>
                    <td>{{$info->group ? $info->group->name:'Brak grupy'}}</td>
                    <td class="colored">
                        <a href="{{ route('students.edit', ['student' => $info])}}"><button>Edit</button></a> <br>
                        <form action="{{ route('students.destroy', ['student' => $info]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="del">X</button>
                        </form>
                    </td>
                </tr>
            </div>
        @endforeach
    </section>

</section>
@include('Layout_forms.footerlayout')

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students</title>
</head>
<body>
<form action="{{route('addStudent.store')}}" method="POST">
    @csrf
    <input type="text" name="name" id="name"> <br>
    <input type="text" name="surname" id="surname"> <br>
    <input type="text" name="birth_year" id="birth_year"> <br>
    <input type="text" name="parent_name" id=""> <br>
    <input type="text" name="parent_surname" id=""> <br>
    <input type="text" name="parent_phone_number" id=""> <br>
    <input type="email" name="parent_email" id=""> <br>
    <button type="submit">Edytuj</button>
</form>


</body>
</html>

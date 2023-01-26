<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body>
        <h1>View Student with phone number</h1>
            @foreach ($all_data as $student)
            <h3>Student ID : {{ $student->id }}</h3>
            <ul>
                <li>Name : {{ $student->name }}</li>
                <li>Email :  {{ $student->email }}</li>
                <li>Phone :
                    <ul>
                        @foreach($student->relationWithPhone as $phones)
                        <li>{{ $phones->phone }}</li>
                        @endforeach
                    </ul>
                </li>
                <li>Created at : {{ $student->created_at }}</li>
                <li>Updated at : {{ $student->updated_at }}</li>
            </ul>
            @endforeach
        
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
        </ul>
    </body>
</html>

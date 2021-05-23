{{--to add--}}
<!DOCTYPE html>
<html>
<head>
    <style>
        .button {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 50px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>
</head>
<body>

@foreach($masters as $master)
<a href={{"profile_teacher/".$master->id}} > <button class="button">{{$master->title}}</button></a>
@endforeach

</body>
</html>

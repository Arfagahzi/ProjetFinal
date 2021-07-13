

@foreach($masters as $master)
    <a href={{"profile_teacher/".$master->id}} >
        <button class="button">{{$master->title}}</button>
    </a>
@endforeach




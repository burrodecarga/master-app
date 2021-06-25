<div>
    <div>
        @foreach($condominio->socials as $social)
        <p>{{$social->name.' - '.$social->url}}</p>
        @endforeach
    </div>
</div>

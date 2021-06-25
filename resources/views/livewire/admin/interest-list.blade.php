<div>
    <div class="text-sm">
        @foreach($condominio->interests as $interest)
        <p>{{$interest->value.' % -  '.$interest->date}}</p>
        @endforeach
    </div>
</div>

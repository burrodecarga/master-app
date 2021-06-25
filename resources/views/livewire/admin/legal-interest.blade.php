<div>
    <div class="w-full p-3 flex items-center text-xs">
         <input type="date" wire:model="date" class="mr-2 text-sm">
         <input type="text" placeholder="interest % value..." class="rounded w-1/2" wire:model="value">
          <button type="button" role="button" wire:click="add" class="ml-2 text-sm"><i class="fa fa-plus-square fa-2x text-blue-500 cursor-pointer" title="{{__('add new interest')}}" ></i>
        </button>
    </div>
    <x-jet-input-error for="date" class="mt-2" />
    <x-jet-input-error for="value" class="mt-2" />

    <div>
        @foreach($condominio->interests as $interest)
        <a href="javascript:void(0)" class="px-1 py-1 block bg-green-300 my-1 " wire:click="del({{$interest->id}})" >
        {{$interest->value.' -  '.$interest->date}}
        <i class="fas fa-trash float-right mr-3 text-red-500"></i>
    </a>
        @endforeach
    </div>

</div>

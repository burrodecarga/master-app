<div>
    <div class="w-full p-3 flex items-center text-xs">

        <select wire:model="brand_id" class="rounded w-1/2 mr-2">
            <option class="bg-green-700 text-gray-400">select</option>
            @foreach($brands as $b)
            <option value="{{$b->id}}">{{$b->name}}</option>
            @endforeach
        </select>
         <input type="text" placeholder="url..." class="rounded w-1/2" wire:model="url">
          <button type="button" role="button" wire:click="add" class="ml-2 "><i class="fa fa-plus-square fa-2x text-blue-500 cursor-pointer" title="{{__('add new social')}}" ></i>
        </button>
    </div>
    <x-jet-input-error for="brand_id" class="mt-2" />
    <x-jet-input-error for="url" class="mt-2" />

    <div>
        @foreach($condominio->socials as $social)
        <a href="javascript:void(0)" class="px-1 py-1 block bg-green-300 my-1" wire:click="del({{$social->id}})" >
        {{$social->name.' - '.$social->url}}
        <i class="fas fa-trash float-right mr-3 text-red-500"></i>
    </a>
        @endforeach
    </div>

</div>

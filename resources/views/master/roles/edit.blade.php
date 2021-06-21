<x-app-layout>
    <div class="container w-3/4 rounded mx-auto my-4 p-6 sm:px-20 bg-white border-b border-gray-200 h-auto">
        <h1 class="text-center text-xl font-extrabold text-gray-500 my-2">{{__('Edit Role')}}</h1>
        <form action="{{route('roles.update',$role->id)}}" method="POST">
            @csrf
            @method('put')
            <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
                <div class="gird-col-span-1 md:col-span-4">
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input name="name" type="text" class="mt-1 block w-full" autocomplete="name" value="{{$role->name}}"/>
                    <x-jet-input-error for="name" class="mt-2" />
                </div>
                @foreach ($permissions as $permission )
                <div class="col-span-3 md:col-span-2 xl:col-span-1 text-sm flex items-center">
                    <div class="">
                        <input type="checkbox" name="permissions[]" value="{{$permission->name}}" @if($permissions_id->contains($permission->id)) checked @endif>
                        <label for="permissions">{{$permission->name}}</label>
                    </div>
                </div>
                @endforeach

                <div class="col-span-1 flex items-center justify-items-end">
                    <a href="{{route('roles.index')}}"
                        class="mr-3 float-right py-2 px-3 rounded bg-yellow-500 cursor-pointer hover:bg-yellow-900 hover:text-green-200 text-white block" >{{__('cancel')}}</a>
                    <input type="submit" value="{{__('update')}}" role="button"
                        class="float-right py-2 px-3 rounded bg-green-600 hover:bg-green-900 hover:text-yellow-200 cursor-pointer text-white block" />
                </div>
            </div>

        </form>
    </div>
</x-app-layout>

<x-app-layout>
    <div class="container w-1/2 rounded mx-auto my-4 p-6 sm:px-20 bg-white border-b border-gray-200 h-auto">
        <h1 class="text-center text-xl font-extrabold text-gray-500 my-2">{{__('New permission')}}</h1>
        <form action="{{route('permissions.store')}}" method="POST">
            @csrf
            @method('post')
            <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
                <div class="gird-col-span-1 md:col-span-4">
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input name="name" type="text" class="mt-1 block w-full" autocomplete="name" />
                    <x-jet-input-error for="name" class="mt-2" />
                </div>

                <div class="gird-col-span-1 md:col-span-4">
                    <x-jet-label for="permission" value="{{ __('Route') }}" />
                    <x-jet-input name="permission" type="text" class="mt-1 block w-full" autocomplete="permission" />
                    <x-jet-input-error for="permission" class="mt-2" />
                </div>



                <div class="col-span-1 flex items-center justify-items-end">
                    <a href="{{route('permissions.index')}}"
                        class="mr-3 float-right py-2 px-3 rounded bg-yellow-500 cursor-pointer hover:bg-yellow-900 hover:text-green-200 text-white block" >{{__('cancel')}}</a>
                    <input type="submit" value="{{__('create')}}" permission="button"
                        class="float-right py-2 px-3 rounded bg-green-600 hover:bg-green-900 hover:text-yellow-200 cursor-pointer text-white block" />
                </div>
            </div>

        </form>
    </div>
</x-app-layout>

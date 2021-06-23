<x-app-layout>
    <div class="container w-3/4 rounded mx-auto my-4 p-6 sm:px-20 bg-white border-b border-gray-200 h-auto">
        <h1 class="text-center text-xl font-extrabold text-gray-500 my-2">{{__('New Condominio')}}</h1>
        <form action="{{route('condominios.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('post')

        <div class="grid grid-cols-1 md:grid-cols-9 flex-row items-center gap-2 text-gray-500">
            <div class="bg-white col-span-1 sm:col-span-4">
                <div class="bg-green-50 border-2">

                    @if($condominio->logo)
                    <img class="h-48 w-48 object-cover mx-auto p-3" src="{{asset('/storage/'.$condominio->logo)}}" alt="Man looking at item at a store">
                    @else
                      <img class="h-48 w-48 object-cover mx-auto p-3" src="{{asset('assets/logo/10.png')}}" alt="Man looking at item at a store">
                    @endif

                </div>
                <input type="file" name="logo" class="text-xs wrap">
            </div>
            <div class="bg-white col-span-1 md:col-span-5 p-3">
                <div class="col-span-1 sm:col-span-5">
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input name="name" type="text" class="mt-1 block w-full" autocomplete="name"
                    value="{{old('name')}}"/>
                    <x-jet-input-error for="name" class="mt-2" />
                </div>

                <div class="col-span-3 md:col-span-3">
                    <x-jet-label for="rut" value="{{ __('rut') }}" />
                    <x-jet-input name="rut" type="text"
                     class="mt-1 block w-full"
                     autocomplete="rut"
                      value="{{old('rut')}}"/>
                    <x-jet-input-error for="rut" class="mt-2" />
                </div>

                <div class="col-span-3 lg:col-span-3">
                    <x-jet-label for="address" value="{{ __('address') }}" />
                    <x-jet-input name="address" type="text" class="mt-1 block w-full" autocomplete="address"  value="{{old('address')}}"/>
                    <x-jet-input-error for="address" class="mt-2" />
                </div>

                <div class="col-span-3 lg:col-span-1">
                    <x-jet-label for="phone" value="{{ __('phone') }}" />
                    <x-jet-input name="phone" type="text" class="mt-1 block w-full" autocomplete="phone"  value="{{old('phone')}}"/>
                    <x-jet-input-error for="phone" class="mt-2" />
                </div>
                <div class="col-span-3 lg:col-span-1">
                    <x-jet-label for="mobil" value="{{ __('mobile') }}" />
                    <x-jet-input name="mobil" type="text" class="mt-1 block w-full" autocomplete="mobil"  value="{{old('mobil')}}"/>
                    <x-jet-input-error for="mobil" class="mt-2" />
                </div>

                <div class="col-span-3 lg:col-span-1">
                    <x-jet-label for="email" value="{{ __('email') }}" />
                    <x-jet-input name="email" type="text" class="mt-1 block w-full" autocomplete="email" value="{{old('email')}}" />
                    <x-jet-input-error for="email" class="mt-2" />
                </div>
                <div class="col-span-4 md:col-span-4">
                    <x-jet-label for="user_id" value="{{ __('Administrator') }}" />
                    <select name="user_id" class="w-full rounded text-sm text-gray-400 border-gray-300"  value="{{old('user_id')}}">
                        <option value="">{{__('Select Administrator')}}</option>
                        @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="user_id" class="" />
                </div>



                <div class="col-span-3 my-2 flex items-center justify-items-end">
                    <a href="{{route('condominios.index')}}"
                        class="mr-3 float-right py-2 px-3 rounded bg-yellow-500 cursor-pointer hover:bg-yellow-900 hover:text-green-200 text-white block">{{__('cancel')}}</a>
                    <input type="submit" value="{{__('create')}}" role="button"
                        class="float-right py-2 px-3 rounded bg-green-600 hover:bg-green-900 hover:text-yellow-200 cursor-pointer text-white block" />
                </div>
            </div>
        </div>
        </form>
    </div>
</x-app-layout>

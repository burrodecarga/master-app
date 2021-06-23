<x-app-layout>
    <div class="container w-3/4 rounded mx-auto my-4 p-6 md:px-20 bg-white border-b border-gray-200 h-auto">
        <h1 class="text-center text-xl font-extrabold text-gray-500 my-2">{{__('New Apartment')}}</h1>
        <form action="{{route('apartments.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('post')

            <div class="bg-white p-3 grid grid-cols-1 md:grid-cols-9 flex-row items-center gap-2 text-gray-500">

                <div class="col-span-9 md:col-span-4">
                    <x-jet-label for="condominio_id" value="{{ __('condominio') }}" />
                    <select name="condominio_id" class="w-full rounded text-sm text-gray-400 border-gray-300"
                        value="{{old('condominio_id')}}">
                        <option value="">{{__('Select Condominio')}}</option>
                        @foreach ($condominios as $condominio)
                        <option value="{{$condominio->id}}">{{$condominio->name}}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="condominio_id" class="" />
                </div>

                <div class="col-span-9 md:col-span-5">
                    <x-jet-label for="name" value="{{ __('Apartment') }}" />
                    <x-jet-input name="name" type="text" class="mt-1 block w-full" autocomplete="name"
                        value="{{old('name')}}" />
                    <x-jet-input-error for="name" class="mt-2" />
                </div>

                <div class="col-span-4 md:col-span-5">
                    <x-jet-label for="user_id" value="{{ __('owner') }}" />
                    <select name="user_id" class="w-full rounded text-sm text-gray-400 border-gray-300"
                        value="{{old('user_id')}}">
                        <option value="">{{__('Select Owner')}}</option>
                        @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="user_id" class="" />
                </div>


                <div class="col-span-9 md:col-span-4">
                    <x-jet-label for="rut" value="{{ __('rut') }}" />
                    <x-jet-input name="rut" type="text" class="mt-1 block w-full" autocomplete="rut"
                        value="{{old('rut')}}" />
                    <x-jet-input-error for="rut" class="mt-2" />
                </div>

                <div class="col-span-9">
                    <x-jet-label for="address" value="{{ __('address') }}" />
                    <x-jet-input name="address" type="text" class="mt-1 block w-full" autocomplete="address"
                        value="{{old('address')}}" />
                    <x-jet-input-error for="address" class="mt-2" />
                </div>

                <div class="col-span-9 lg:col-span-3">
                    <x-jet-label for="phone" value="{{ __('phone') }}" />
                    <x-jet-input name="phone" type="text" class="mt-1 block w-full" autocomplete="phone"
                        value="{{old('phone')}}" />
                    <x-jet-input-error for="phone" class="mt-2" />
                </div>
                <div class="col-span-9 lg:col-span-3">
                    <x-jet-label for="mobil" value="{{ __('mobile') }}" />
                    <x-jet-input name="mobil" type="text" class="mt-1 block w-full" autocomplete="mobil"
                        value="{{old('mobil')}}" />
                    <x-jet-input-error for="mobil" class="mt-2" />
                </div>

                <div class="col-span-9 lg:col-span-3">
                    <x-jet-label for="email" value="{{ __('email') }}" />
                    <x-jet-input name="email" type="text" class="mt-1 block w-full" autocomplete="email"
                        value="{{old('email')}}" />
                    <x-jet-input-error for="email" class="mt-2" />
                </div>

                <div class="col-span-9 lg:col-span-4">
                    <x-jet-label for="area" value="{{ __('area') }}" />
                    <x-jet-input name="area" type="text" class="mt-1 block w-full" autocomplete="area"
                        value="{{old('area',$apartment->area)}}" />
                    <x-jet-input-error for="area" class="mt-2" />
                </div>

                <div class="col-span-9 lg:col-span-5">
                    <x-jet-label for="alicuota" value="{{ __('alicuota') }}" />
                    <x-jet-input name="alicuota" type="text" class="mt-1 block w-full" autocomplete="alicuota"
                        value="{{old('alicuota',$apartment->alicuota)}}" />
                    <x-jet-input-error for="alicuota" class="mt-2" />
                </div>




                <div class="col-span-3 my-2 flex items-center justify-items-end">
                    <a href="{{route('apartments.index')}}"
                        class="mr-3 float-right py-2 px-3 rounded bg-yellow-500 cursor-pointer hover:bg-yellow-900 hover:text-green-200 text-white block">{{__('cancel')}}</a>
                    <input type="submit" value="{{__('create')}}" role="button"
                        class="float-right py-2 px-3 rounded bg-green-600 hover:bg-green-900 hover:text-yellow-200 cursor-pointer text-white block" />
                </div>

            </div>
        </form>
    </div>
</x-app-layout>

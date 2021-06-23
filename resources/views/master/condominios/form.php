<form action="{{route('condominios.store')}}" method="POST">
            @csrf
            @method('post')

            <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
                <div class="md:flex">
                  <div class="md:flex-shrink-0">
                    <img class="h-48 w-full object-cover md:h-full md:w-48" src="" alt="Man looking at item at a store">
                  </div>
                 <div class="p-8">

            <div class="grid grid-cols-1 gap-4 md:grid-cols-4">

                <div class="col-span-4 sm:col-span-3 md:col-span-3 lg:col-span-4">
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input name="name" type="text" class="mt-1 block w-full" autocomplete="name" />
                    <x-jet-input-error for="name" class="mt-2" />
                </div>

                <div class="col-span-4 md:col-span-4">
                    <x-jet-label for="rut" value="{{ __('rut') }}" />
                    <x-jet-input rut="rut" type="text" class="mt-1 block w-full" autocomplete="rut" />
                    <x-jet-input-error for="rut" class="mt-2" />
                </div>

                <div class="col-span-4 lg:col-span-3">
                    <x-jet-label for="address" value="{{ __('address') }}" />
                    <x-jet-input name="address" type="text" class="mt-1 block w-full" autocomplete="address" />
                    <x-jet-input-error for="address" class="mt-2" />
                </div>

                <div class="col-span-4 lg:col-span-1">
                    <x-jet-label for="phone" value="{{ __('phone') }}" />
                    <x-jet-input name="phone" type="text" class="mt-1 block w-full" autocomplete="phone" />
                    <x-jet-input-error for="phone" class="mt-2" />
                </div>
                <div class="col-span-4 lg:col-span-1">
                    <x-jet-label for="mobil" value="{{ __('mobil') }}" />
                    <x-jet-input name="mobil" type="text" class="mt-1 block w-full" autocomplete="mobil" />
                    <x-jet-input-error for="mobil" class="mt-2" />
                </div>

                <div class="col-span-4 lg:col-span-1">
                    <x-jet-label for="email" value="{{ __('email') }}" />
                    <x-jet-input name="email" type="text" class="mt-1 block w-full" autocomplete="email" />
                    <x-jet-input-error for="email" class="mt-2" />
                </div>

                <div class="col-span-4 md:col-span-4">
                    <x-jet-label for="user_id" value="{{ __('Administrator') }}" />
                    <select name="user_id" class="w-full rounded text-sm text-gray-400 border-gray-300">
                        <option value="">{{__('Select Administrator')}}</option>
                        @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="user_id" class="" />
                </div>



                <div class="col-span-4 flex items-center justify-items-end">
                    <a href="{{route('condominios.index')}}"
                        class="mr-3 float-right py-2 px-3 rounded bg-yellow-500 cursor-pointer hover:bg-yellow-900 hover:text-green-200 text-white block">{{__('cancel')}}</a>
                    <input type="submit" value="{{__('create')}}" role="button"
                        class="float-right py-2 px-3 rounded bg-green-600 hover:bg-green-900 hover:text-yellow-200 cursor-pointer text-white block" />
                </div>
            </div>
        </form>

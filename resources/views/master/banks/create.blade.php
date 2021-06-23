<x-app-layout>
    <div class="container w-3/4 rounded mx-auto my-4 p-6 md:px-20 bg-white border-b border-gray-200 h-auto">
        <h1 class="text-center text-xl font-extrabold text-gray-500 my-2">{{__('new bank')}}</h1>
        <form action="{{route('banks.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('post')

            <div class="bg-white p-3 grid grid-cols-1 md:grid-cols-9 flex-row items-center gap-2 text-gray-500">

                <div class="col-span-9 md:col-span-4">
                    <x-jet-label for="condominio_id" value="{{ __('condominio') }}" />
                    <select name="condominio_id" class="w-full rounded text-sm text-gray-400 border-gray-300"
                        value="{{old('condominio_id')}}">
                        <option value="">{{__('Select Condominio')}}</option>
                        @foreach ($condominios as $condominio)
                        <option value="{{$condominio->id}}" @if ($condominio->id==$bank->condominio_id) selected
                        @endif>{{$condominio->name}}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="condominio_id" class="" />
                </div>

                <div class="col-span-9 md:col-span-5">
                    <x-jet-label for="name" value="{{ __('bank') }}" />
                    <x-jet-input name="name" type="text" class="mt-1 block w-full" autocomplete="name"
                        value="{{old('name',$bank->name)}}" />
                    <x-jet-input-error for="name" class="mt-2" />
                </div>

                <div class="col-span-9 md:col-span-4">
                    <x-jet-label for="ctta" value="{{ __('ctta') }}" />
                    <x-jet-input name="ctta" type="text" class="mt-1 block w-full" autocomplete="ctta"
                        value="{{old('ctta',$bank->ctta)}}" />
                    <x-jet-input-error for="ctta" class="mt-2" />
                </div>

                <div class="col-span-9 md:col-span-5">
                    <x-jet-label for="owner" value="{{ __('owner') }}" />
                    <x-jet-input name="owner" type="text" class="mt-1 block w-full" autocomplete="owner"
                        value="{{old('owner',$bank->owner)}}" />
                    <x-jet-input-error for="owner" class="mt-2" />
                </div>

                <div class="col-span-3 my-2 flex items-center justify-items-end">
                    <a href="{{route('banks.index')}}"
                        class="mr-3 float-right py-2 px-3 rounded bg-yellow-500 cursor-pointer hover:bg-yellow-900 hover:text-green-200 text-white block">{{__('cancel')}}</a>
                    <input type="submit" value="{{__('create')}}" role="button"
                        class="float-right py-2 px-3 rounded bg-green-600 hover:bg-green-900 hover:text-yellow-200 cursor-pointer text-white block" />
                </div>

            </div>
        </form>
    </div>
</x-app-layout>

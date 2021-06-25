<x-app-layout>
    <h1 class="text-gray-600 text-center text-2xl font-extrabold my-3">{{__('list of condominios')}}</h1>
    <div class="container w-50 rounded mx-auto my-4 p-6 sm:px-20 bg-gray-50 border-b border-gray-200 h-auto flex flex-wrap">


        @foreach ($condominios as $condominio )
        <div class="max-w-xs rounded overflow-hidden shadow-lg my-2 mx-auto text-gray-500 p-2 bg-white">
            <img class="w-full p-4"
            @if ($condominio->logo)
            src="{{asset('storage/'.$condominio->logo)}}"
            @else
            src="{{asset('assets/logo/9.png')}}"
            @endif  alt="$condominio->name">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{$condominio->name}}</div>
                <p class="text-grey-darker text-base">
                    <a href="{{route('administrar',$condominio->id)}}" class="bg-gray-500 hover:bg-blue-300 text-white rounded py-2 px-3 cursor-pointer">Administrar</a>
                </p>
            </div>
            <div class="px-6 py-4">

            </div>
        </div>

        @endforeach
    </div>
</x-app-layout>

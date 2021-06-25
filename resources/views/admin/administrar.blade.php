<x-app-layout>
    <link rel="stylesheet" href="{{asset('fontawesome-free-5.15.3-web/css/all.min.css')}}">

    <div class="container w-full rounded mx-auto my-4 p-6 sm:px-20 bg-white border-b border-gray-200 h-auto">
        <grid class="grid grid-cols-8 text-gray-500">
            <div class="col-span-3 border-2 p-5">
                <ul class="">
                    <li><a href="" class="px-2 py-3 border-l-2 active:bg-green-700 ">Gastos</a></li>
                    <li><a href="" class="px-2 py-3 border-l-2 active:bg-green-700 ">Gastos</a></li>
                    <li><a href="" class="px-2 py-3 border-l-2 active:bg-green-700 ">Gastos</a></li>
                    <li></li>
                </ul>
                <div x-data="{open:false}" class="mb-2">
                    <a href="javascript:void(0)" class="px-2 py-3 border-2 bg-gray-200 block text-black font-extrabold"
                        x-on:click="open=!open">{{__('interest')}}</a>
                    <div x-show="open">
                        @livewire('admin.legal-interest',['condominio'=>$condominio->id])
                    </div>
                </div>
                <div x-data="{open:false}">
                    <a href="javascript:void(0)" class="px-2 py-3 border-2 bg-gray-200 block text-black font-extrabold"
                        x-on:click="open=!open">{{__('social media')}}</a>
                    <div x-show="open">
                        @livewire('admin.social-media',['condominio'=>$condominio->id])
                    </div>
                </div>
            </div>
            <div class="col-span-5 mx-auto">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="py-12 bg-gray-100">
                    <div class="mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="lg:text-center">
                            <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">
                                {{__('general information')}}</h2>
                            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                                {{$condominio->name}}
                            </p>
                            <p class="max-w-2xl text-xl text-gray-500 lg:mx-auto">
                                {{$condominio->address}}</p>
                            <p class="max-w-2xl text-md text-gray-500 lg:mx-auto">
                                {{__('phone  ').$condominio->phone}}-{{__('mobile ').$condominio->mobile}}</p>
                            <p class="max-w-2xl text-md text-gray-500 lg:mx-auto">
                                {{$condominio->email}}</p>

                        </div>

                        <div class="mt-10">
                            <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                                <div class="relative">
                                    <dt>
                                        <div
                                            class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                            <!-- Heroicon name: outline/globe-alt -->
                                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                            </svg>
                                        </div>
                                        <p class="ml-16 text-lg leading-6 font-medium text-gray-900">
                                            {{__('Social Media')}}</p>
                                    </dt>

                                    <dd class="mt-2 ml-16 text-base text-gray-500">
                                        @livewire('admin.social-list',['condominio'=>$condominio->id])
                                    </dd>

                                </div>

                                <div class="relative">
                                    <dt>
                                        <div
                                            class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                            <!-- Heroicon name: outline/scale -->
                                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                            </svg>
                                        </div>
                                        <p class="ml-16 text-lg leading-6 font-medium text-gray-900">
                                            {{__('banks - insterest')}}</p>
                                    </dt>
                                    @foreach ($condominio->banks as $bank )
                                    <dd class="mt-2 ml-16 text-base text-gray-500">
                                        {{ $bank->name.'  -  '.$bank->ctta}}
                                    </dd>
                                    @endforeach
                                    <br>
                                    <dd class="mt-2 ml-16 text-base text-gray-500">
                                        @livewire('admin.interest-list',['condominio'=>$condominio->id])
                                    </dd>
                                </div>

                                <div class="relative">
                                    <dt>
                                        <div
                                            class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                            <!-- Heroicon name: outline/lightning-bolt -->
                                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                                            </svg>
                                        </div>
                                        <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Transfers are
                                            instant</p>
                                    </dt>
                                    <dd class="mt-2 ml-16 text-base text-gray-500">
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit
                                        perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.
                                    </dd>
                                </div>

                                <div class="relative">
                                    <dt>
                                        <div
                                            class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                            <!-- Heroicon name: outline/annotation -->
                                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                            </svg>
                                        </div>
                                        <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Mobile
                                            notifications</p>
                                    </dt>
                                    <dd class="mt-2 ml-16 text-base text-gray-500">
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit
                                        perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>

            </div>
        </grid>
    </div>

</x-app-layout>

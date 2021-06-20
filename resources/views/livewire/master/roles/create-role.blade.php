<div>
    <x-jet-danger-button wire:click="$set('open',true)">
        {{__('new post')}}
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            {{__('New Role')}}
        </x-slot>

        <x-slot name="content">

            <div class="flex flex-1 mb-4 items-center ">
                <div class="w-full">
                    <x-jet-label value="Name" class="text-justify" />
                    <x-jet-input type="text" wire:model="name" class="w-full" />
                    <x-jet-input-error for="name"/>
                </div>

                <div class="w-full ml-3">
                    <x-jet-label value="Area" class="text-justify" />
                    <select class="w-full rounded" wire:model="area">
                        <option value="">Select Area</option>
                        <option value="operativa">operativa</option>
                        <option value="administrativa">administrativa</option>
                        <option value="comun">comun</option>
                    </select>
                    <x-jet-input-error for="area"/>
                </div>

            </div>

        </x-slot>

        <x-slot name="footer">
            <div>
                <button class="py-2 px-3 rounded bg-yellow-500 text-white hover:bg-yellow-700" wire:click="$set('open',false)">
                    cancelar
                </button>

                <button class="py-2 px-3 rounded bg-green-500 text-white hover:bg-green-700" wire:click="create">
                    Crear
                </button>
            </div>
        </x-slot>
    </x-jet-dialog-modal>

</div>

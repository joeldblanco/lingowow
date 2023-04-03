<div>
    <x-jet-dialog-modal wire:model="showModalMenu">

        <x-slot name="title">
            <div class="w-full center-h">SELECT ONE ACTIVITY</div>
        </x-slot>

        <x-slot name="content">

            <div class="mb-2">
                <div class="w-full center-h title-activity">WORDS</div>
                <div class="w-full grid grid-cols-4 gap-x-2 gap-y-2">
                    <div id="drag_the_word" class="w-full center-h card-menu">Drag the words</div>
                    <div id="mark_the_word" class="w-full center-h card-menu">Mark the words</div>
                    <div id="find_the_word" class="w-full center-h card-menu">Find the words</div>
                </div>
            </div>

            <div class="mb-2">
                <div class="w-full center-h title-activity">CARDS</div>
                <div class="w-full grid grid-cols-4 gap-x-2 gap-y-2">
                    <div id="card" class="w-full center-h card-menu">Cards</div>
                </div>
            </div>

            <div class="">
                <div class="w-full center-h title-activity">DICTATION</div>
                <div class="w-full grid grid-cols-4 gap-x-2 gap-y-2">
                    <div id="one_by_one" class="w-full center-h card-menu">One by one</div>
                </div>
            </div>

        </x-slot>

        <x-slot name="footer">
            Close
        </x-slot>

    </x-jet-dialog-modal> 
</div>

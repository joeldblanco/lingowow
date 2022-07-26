<x-app-layout>
    
    @if(isset($id))
        @livewire('chat',['show_id' => $id])
    @else
        @livewire('chat')
    @endif

</x-app-layout>
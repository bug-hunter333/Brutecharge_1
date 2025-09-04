{{-- resources/views/livewire/add-to-cart-button.blade.php --}}
<button 
    wire:click="addToCart" 
    class="{{ $this->getButtonClasses() }}"
    @if($isAdding) disabled @endif
>
    {!! $this->getButtonText() !!}
</button>
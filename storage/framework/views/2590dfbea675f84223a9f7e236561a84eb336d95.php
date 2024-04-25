<div>
  <button wire:click="decrement">-</button>
  <input type="number" wire:model="qty" min="1" value="1" max="<?php echo e($product->stock); ?>">
  <button wire:click="increment">+</button>
</div>
<?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/livewire/add-cart.blade.php ENDPATH**/ ?>
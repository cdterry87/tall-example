<div class="bg-white shadow-md px-8 py-4 z-50">
    <div class="flex flex-col md:flex-row items-center justify-between gap-4">
        <div>
            Are you sure you want to delete this product?
        </div>
        <div class="flex gap-4">
            <x-button
                label="Cancel"
                wire:click="deleteCancellation"
            />
            <x-button
                label="Delete"
                color="bg-red-600"
                text-color="text-white"
                wire:click="delete"
            />
        </div>
    </div>
</div>

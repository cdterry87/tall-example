<div>
    <div
        x-cloak
        x-data="{ isFormShown: @entangle('isFormShown') }"
        @keydown.window.escape="isFormShown = false"
    >
        <x-form>
            <x-product-form />
        </x-form>
    </div>

    <div class="flex items-center gap-4">
        <h1 class="block font-bold text-3xl">Products</h1>
        <x-button
            label="Create Product"
            color="bg-blue-600"
            text-color="text-white"
            wire:click="showForm"
        />
    </div>

    <div class="my-6">
        <x-message />

        @if ($isDeleteModalShown)
            <x-delete-modal />
        @endif
    </div>

    <div>
        <div class="flex flex-col sm:flex-row flex-wrap -m-3">
            @forelse($products as $product)
                <x-product :product="$product" />
            @empty
                <p class="font-bold text-lg mx-3">Sorry, there are no products at this time.</p>
            @endforelse
        </div>
    </div>
</div>

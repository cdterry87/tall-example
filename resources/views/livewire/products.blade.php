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

    <div class="flex flex-col md:flex-row items-center justify-between gap-4">
        <div class="flex items-center gap-4">
            <h1 class="block font-bold text-3xl">Products</h1>
            <x-button
                label="Create Product"
                color="bg-blue-600"
                text-color="text-white"
                wire:click="showForm"
            />
        </div>
        <div class="flex items-center gap-4">
            <x-select
                label="Show"
                wire:model="showing"
            >
                <option value="6">6</option>
                <option value="12">12</option>
                <option value="18">18</option>
            </x-select>
            <x-text
                type="search"
                size="20"
                placeholder="Search for a product..."
                wire:model.debounce.500ms="search"
            />
        </div>
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

    <div class="mt-6">
        {{ $products->links('layouts.pagination') }}
    </div>
</div>

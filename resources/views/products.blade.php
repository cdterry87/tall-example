<x-app-layout>
    <x-slot name="form">
        <livewire:product-form />
    </x-slot>

    <div
        x-data
        class="flex items-center gap-4"
    >
        <h1 class="block font-bold text-3xl">Products</h1>
        <x-button
            label="Create Product"
            @click.prevent="$dispatch('toggle-form')"
        />
    </div>

    <div class="mt-6">
        <livewire:products />
    </div>
</x-app-layout>

@props(['product'])

<div
    x-data
    class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 py-3 px-2"
>
    <div class="bg-white shadow-lg p-8 relative">
        <div class="absolute top-2 right-4">
            <button
                class="text-xs uppercase text-red-600"
                wire:click="delete({{ $product->id }})"
            >
                Delete
            </button>
        </div>

        <h2 class="font-bold text-xl">{{ $product->name }}</h2>

        <p class="text-gray-700 text-base mt-2 mb-6">
            {{ $product->description }}
        </p>

        <div class="flex justify-between items-center">
            <div>
                <button
                    class="block font-bold text-blue-500 hover:text-blue-700"
                    wire:click="edit({{ $product->id }})"
                >
                    View/Edit
                </button>
            </div>
            <div>
                <h3 class="font-bold text-green-600 text-lg">$ {{ $product->price }}</h3>
            </div>
        </div>
    </div>
</div>

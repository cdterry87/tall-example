@props(['product'])

<div
    x-data
    class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 py-3 px-2"
>
    <div class="bg-white rounded-lg shadow-lg p-8">
        <h2 class="font-bold text-xl">{{ $product->name }}</h2>

        <p class="text-gray-700 text-base mt-2 mb-6">
            {{ $product->description }}
        </p>

        <div class="flex justify-between items-center">
            <div>
                <button
                    class="block text-blue-500 hover:text-blue-700"
                    @click.prevent="$dispatch('toggle-form', {{ json_encode($product) }})"
                >
                    View/Edit
                </button>
            </div>
            <div>
                <h3 class="font-bold text-green-700 text-lg">$ {{ $product->price }}</h3>
            </div>
        </div>
    </div>
</div>

<div>
    <div
        x-cloak
        x-data="{ isFormShown: @entangle('isFormShown') }"
        @toggle-form.window="isFormShown = !isFormShown"
        @keydown.window.escape="isFormShown = false"
    >
        <div
            x-show="isFormShown"
            class="opacity-50 fixed top-0 left-0 z-40 w-screen h-screen bg-black overflow-hidden"
        ></div>

        <div
            x-show="isFormShown"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
            class="bg-white h-screen overflow-y-auto w-full md:w-2/3 xl:w-1/2 absolute top-0 right-0 transform duration-200 ease-in-out z-50 border-l border-ra-gray-2 shadow-xl p-10"
            @click.away="
            isFormShown = false
        "
        >
            <form
                wire:submit.prevent="store"
                class="flex flex-col gap-4"
            >
                <input
                    type="hidden"
                    name="id"
                    wire:model.defer="product_id"
                />
                <div class="flex flex-col sm:flex-row items-center sm:justify-between gap-2 sm:gap-4">
                    <div>
                        <h1 class="text-2xl font-bold">Product</h1>
                    </div>
                    <div class="flex gap-2">
                        <x-button
                            label="Save"
                            color="bg-blue-600"
                            text-color="text-white"
                            type="submit"
                        />
                        <x-button
                            label="Cancel"
                            color="bg-red-600"
                            text-color="text-white"
                            wire:click.prevent="hideForm"
                        />
                    </div>
                </div>

                <div class="flex flex-col divide-y divide-gray-300">
                    <div class="flex flex-col sm:flex-row sm:justify-between gap-1 sm:gap-4 py-4">
                        <label
                            class="font-bold"
                            for="name"
                        >
                            Name
                        </label>
                        <div class="w-full sm:w-64">
                            <x-text
                                wire:model.defer="name"
                                name="name"
                                full-width
                            />
                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:justify-between gap-1 sm:gap-4 py-4">
                        <label
                            class="font-bold"
                            for="description"
                        >
                            Description
                        </label>
                        <div class="w-full sm:w-64">
                            <x-textarea
                                wire:model.defer="description"
                                name="description"
                                full-width
                            />
                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:justify-between gap-1 sm:gap-4 py-4">
                        <label
                            class="font-bold"
                            for="price"
                        >
                            Price
                        </label>
                        <div class="w-full sm:w-64">
                            <x-text
                                wire:model.defer="price"
                                name="price"
                                full-width
                            />
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <div
        x-data
        class="flex items-center gap-4"
    >
        <h1 class="block font-bold text-3xl">Products</h1>
        <x-button
            label="Create Product"
            color="bg-blue-600"
            text-color="text-white"
            wire:click="create()"
        />
    </div>

    <x-message />

    <div class="mt-6">
        <div class="flex flex-col sm:flex-row flex-wrap -m-3">
            @forelse($products as $product)
                <x-product :product="$product" />
            @empty
                <p class="font-bold text-lg mx-3">Sorry, there are no products at this time.</p>
            @endforelse
        </div>
    </div>
</div>

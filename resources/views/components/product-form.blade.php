<form
    wire:submit.prevent="saveProduct"
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

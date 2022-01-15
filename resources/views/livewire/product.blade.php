<form
    wire:submit.prevent="saveProduct"
    class="flex flex-col gap-4"
>
    <div class="flex flex-col sm:flex-row items-center sm:justify-between gap-2 sm:gap-4">
        <div>
            <h1 class="text-2xl font-bold">Product</h1>
        </div>
        <div class="flex gap-2">
            <x-button
                label="Save"
                type="submit"
            />
            <x-button
                label="Cancel"
                color="bg-red-500"
                @click.prevent="$dispatch('toggle-form')"
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
                    name="price"
                    full-width
                />
            </div>
        </div>
    </div>
</form>

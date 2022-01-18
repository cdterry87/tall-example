<div>
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
            $wire.hideForm()
        "
    >
        {{ $slot }}
    </div>
</div>

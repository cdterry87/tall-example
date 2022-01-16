@if (session()->has('message'))
    <div
        class="bg-green-100 text-green-600 px-4 py-3 shadow-lg my-3"
        role="alert"
    >
        <div class="flex">
            <div>
                <p class="text-sm">{{ session('message') }}</p>
            </div>
        </div>
    </div>
@endif

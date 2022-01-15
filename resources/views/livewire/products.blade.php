<div class="flex flex-col sm:flex-row flex-wrap -m-3">
    @forelse($products as $product)
        <x-product :product="$product" />
    @empty
        <p class="font-bold text-lg mx-3">Sorry, there are no products at this time.</p>
    @endforelse
</div>

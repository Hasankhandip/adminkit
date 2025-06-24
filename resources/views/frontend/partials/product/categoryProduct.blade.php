  <section class="product-section padding-top padding-bottom mb-5">
      <div class="container">
          <div class="row g-3 justify-content-center">
              @include('frontend.partials.products')
              @if ($products->hasPages())
                  {{ $products->links() }}
              @endif
          </div>
      </div>
  </section>

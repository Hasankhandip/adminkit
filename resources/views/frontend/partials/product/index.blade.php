  <section class="product-section padding-top padding-bottom mb-5">
      <div class="container">
          <ul class="mr-list justify-content-center">
              <li class="mr-list__item">
                  <a class="mr-list__btn  @if (!request()->categoryId) active @endif"
                      href="{{ route('product.index') }}">@lang('All Products')</a>
              </li>

              @foreach ($categories as $category)
                  <li class="mr-list__item">
                      <a class="mr-list__btn  @if (request()->categoryId == $category->id) active @endif"
                          href="{{ route('product.index', $category->id) }}"> {{ __($category->name) }}</a>
                  </li>
              @endforeach
          </ul>

          <div class="row g-3 justify-content-center">
              @include('frontend.partials.products')
              @if ($products->hasPages())
                  {{ $products->links() }}
              @endif
          </div>
      </div>
  </section>

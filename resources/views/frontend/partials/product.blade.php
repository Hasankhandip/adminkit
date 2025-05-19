 <section class="product-section padding-bottom">
     <div class="container">
         <div class="row justify-content-center">
             <div class="col-lg-8 col-md-10">
                 <div class="section-header text-center">
                     <span class="subtitle">{{ $productContent->subtitle }}</span>
                     <h2 class="title">{{ $productContent->title }}</h2>
                 </div>
             </div>
         </div>
         <div class="row gy-4 justify-content-center">
             @foreach ($productItemContents as $productItem)
                 <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                     <div class="product-item h-100">
                         <div class="product-thumb">
                             <img src="{{ asset('assets/images/frontend/product/item/images/' . $productItem->image) }}"
                                 alt="products" />
                             <ul class="product-options">
                                 <li>
                                     <a class="image"
                                         href="{{ asset('assets/images/frontend/product/item/images/' . $productItem->image) }}"><i
                                             class="las la-expand"></i></a>
                                 </li>
                             </ul>
                         </div>
                         <div class="product-content">
                             <h6 class="product-title">
                                 <a href="{{ route('product.details') }}">{{ __($productItem->name) }}</a>
                             </h6>

                             <span class="product-availablity text--success">
                                 @if ($productItem->stock)
                                     <span class="text-success">
                                         @lang('In Stock')
                                     </span>
                                 @else
                                     <span class="text-danger">
                                         @lang('Out of Stock')
                                     </span>
                                 @endif
                             </span>

                             <div class="product-price">
                                 <span class="current-price">{{ __($productItem->price) }}</span>
                             </div>
                             <a class="add-to-cart cmn--btn-2"
                                 href="{{ $productItem->button_link }}">{{ __($productItem->button_name) }}</a>
                         </div>
                     </div>
                 </div>
             @endforeach
         </div>
     </div>
 </section>

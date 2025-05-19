 <section class="plan-section padding-bottom pos-rel">
     <div class="container">
         <div class="row justify-content-center">
             <div class="col-lg-8 col-md-10">
                 <div class="section-header text-center">
                     <span class="subtitle">{{ __($pricingContent->subtitle) }}</span>
                     <h2 class="title">{{ __($pricingContent->title) }}</h2>
                 </div>
             </div>
         </div>
         <div class="row justify-content-center gy-5">
             @foreach ($pricingContents as $pricingItem)
                 <div class="col-xl-4 col-lg-6 col-md-6 col-sm-10">
                     <div class="plan-item">
                         <span class="plan-serial">{{ $loop->iteration }}</span>
                         <div class="plan-bottom">
                             <div class="plan-header">
                                 <div class="plan-price"><sup>$</sup>{{ __($pricingItem->price) }}</div>
                             </div>
                             <div class="plan-body">
                                 <p class="plan-name">{{ __($pricingItem->name) }}</p>
                                 <ul class="plan-info">
                                     <li class="active">
                                         <i class="{{ $pricingItem->info_icon_one }}"
                                             data="bv"></i>{{ __($pricingItem->info_name_one) }}
                                     </li>
                                     <li class="active">
                                         <i class="{{ $pricingItem->info_icon_two }}"
                                             data="ref_com"></i>{{ __($pricingItem->info_name_two) }}
                                     </li>
                                     <li class="active">
                                         <i class="{{ $pricingItem->info_icon_three }}"
                                             data="tree_com"></i>{{ __($pricingItem->info_name_three) }}
                                     </li>
                                 </ul>
                                 <div class="text-center">
                                     <a href="{{ $pricingItem->button_link }}"
                                         class="cmn--btn-2 btn--md active"><span>{{ __($pricingItem->button_name) }}</span></a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             @endforeach
         </div>
     </div>
 </section>

 <section class="banner-section bg_img"
     style="
        background: url(https://script.viserlab.com/binaryecom/assets/images/frontend/banner/61af265b85b201638868571.jpg)
          left center;
      ">
     <span class="bg-shape"></span>
     <div class="container">
         <div class="banner-content">
             @foreach ($bannerContents as $banner)
                 <h1 class="title">
                     {{ __($banner->title) }}
                 </h1>
                 <p>
                     {{ __($banner->description) }}
                 </p>
                 <div class="button--wrapper">
                     <a class="cmn--btn active"
                         href="{{ route($banner->button_link_1) }}"><span>{{ __($banner->button_name_1) }}</span></a>
                     <a class="cmn--btn"
                         href="{{ route($banner->button_link_2) }}"><span>{{ __($banner->button_name_2) }}</span></a>
                 </div>
             @endforeach
         </div>
     </div>
     <div class="shapes d-none d-sm-block">
         <div class="shape shape1">
             <img src="https://script.viserlab.com/binaryecom/assets/templates/basic/images/shape/circle-triangle.png"
                 alt="shape" />
         </div>
         <div class="shape2 shape">
             <img src="https://script.viserlab.com/binaryecom/assets/templates/basic/images/shape/shape-circle.png"
                 alt="shape" />
         </div>
         <div class="shape3 shape">
             <img src="https://script.viserlab.com/binaryecom/assets/templates/basic/images/shape/dots-colour.png"
                 alt="shape" />
         </div>
         <div class="shape4 shape">
             <img src="https://script.viserlab.com/binaryecom/assets/templates/basic/images/shape/plus-big.png"
                 alt="shape" />
         </div>
         <div class="shape5 shape">
             <img src="https://script.viserlab.com/binaryecom/assets/templates/basic/images/shape/waves.png"
                 alt="shape" />
         </div>
     </div>
 </section>

@php
    $blogContent = App\Models\Frontend\FrontendBlog::first();
    $blogItemContents = App\Models\Frontend\FrontendBlogItem::take(3)->orderBy('id', 'asc')->get();
@endphp

<section class="blog-section padding-bottom pos-rel">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="section-header text-center">
                    <span class="subtitle">{{ __($blogContent->title) }}</span>
                    <h2 class="title">{{ __($blogContent->subtitle) }}</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center gy-4">
            @include('frontend.partials.blog')
        </div>
    </div>
    <div class="shape shape1">
        <img src="https://script.viserlab.com/binaryecom/assets/templates/basic/images/shape/blob1.png" alt="shap" />
    </div>
</section>

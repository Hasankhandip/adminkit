<section class="blog-section padding-bottom padding-top">
    <div class="container">
        <div class="row justify-content-center gy-4">
            @include('frontend.partials.blog')
            @if ($blogItemContents->hasPages())
                {{ $blogItemContents->links() }}
            @endif
        </div>
    </div>
    <div class="shape shape1">
        <img src="https://script.viserlab.com/binaryecom/assets/templates/basic/images/shape/blob1.png" alt="shap" />
    </div>
</section>

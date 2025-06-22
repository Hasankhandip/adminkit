@php
    $blogContents = App\Models\Frontend\FrontendBlogItem::first();
@endphp


<section class="blog-section padding-bottom padding-top">
    <div class="container">
        <div class="row justify-content-center gy-4">

            @foreach ($blogContents as $blogItem)
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="post-item h-100">
                        <div class="post-thumb">
                            <img src="{{ asset('assets/images/blog/image/' . $blogItem->image) }}" alt="blog" />
                            <div class="meta-date">
                                <span class="date">{{ $blogItem->date }}.{{ $blogItem->month }}</span>
                                <span>{{ $blogItem->year }}</span>
                            </div>
                        </div>
                        <div class="post-content">
                            <h4 class="title">
                                <a href="{{ $blogItem->blog_link }}">{{ $blogItem->title }}</a>
                            </h4>
                            <p>
                                {{ $blogItem->description }}
                            </p>
                            <a href="{{ $blogItem->button_link }}" class="read-more"> {{ $blogItem->button_name }}</a>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
    <div class="shape shape1">
        <img src="https://script.viserlab.com/binaryecom/assets/templates/basic/images/shape/blob1.png"
            alt="shap" />
    </div>
</section>

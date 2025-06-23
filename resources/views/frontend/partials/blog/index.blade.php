<section class="blog-section padding-bottom padding-top">
    <div class="container">
        <div class="row justify-content-center gy-4">

            @foreach ($blogContents as $blogItem)
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="post-item h-100">
                        <div class="post-thumb">
                            <img src="{{ getImage('blog/image/', $blogItem->image) }}" alt="blog" />

                            <div class="meta-date">
                                <span class="date">{{ __($blogItem->date) }}.{{ __($blogItem->month) }}</span>
                                <span>{{ __($blogItem->year) }}</span>
                            </div>
                        </div>
                        <div class="post-content">
                            <h4 class="title">
                                <a href="{{ __($blogItem->blog_link) }}">{{ __($blogItem->title) }}</a>
                            </h4>
                            <p>
                                {{ __($blogItem->description) }}
                            </p>
                            <a href="{{ __($blogItem->button_link) }}" class="read-more">
                                {{ __($blogItem->button_name) }}</a>
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

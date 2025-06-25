 @foreach ($blogItemContents as $blogItem)
     <div class="col-lg-4 col-md-6 col-sm-10">
         <div class="post-item h-100">
             <div class="post-thumb">
                 <img src="{{ getImage('frontend/blog/item/images/', $blogItem->image) }}" />
                 <div class="meta-date">
                     <span class="date">{{ __($blogItem->date) }}.{{ __($blogItem->month) }}</span>
                     <span>{{ __($blogItem->year) }}</span>
                 </div>
             </div>
             <div class="post-content">
                 <h4 class="title">
                     <a href="{{ $blogItem->blog_link }}">{{ __($blogItem->title) }}</a>
                 </h4>
                 <p>
                     {{ __($blogItem->description) }}
                 </p>
                 <a href="{{ $blogItem->button_link }}" class="read-more">
                     {{ __($blogItem->button_name) }}</a>
             </div>
         </div>
     </div>
 @endforeach

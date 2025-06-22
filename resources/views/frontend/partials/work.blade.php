@php
    $workContent = App\Models\Frontend\FrontendWork::first();
    $workItemContents = App\Models\Frontend\FrontendWorkItem::orderBy('id', 'asc')->get();
@endphp
<section class="work-section padding-bottom pos-rel">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="section-header text-center">
                    <span class="subtitle">{{ __($workContent->title) }}</span>
                    <h2 class="title">{{ __($workContent->subtitle) }}</h2>
                </div>
            </div>
        </div>
        <div class="row gy-5">
            @foreach ($workItemContents as $workItem)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="work-item">
                        <div class="work-icon"><i class="{{ $workItem->icon }}"></i></div>
                        <div class="work-content">
                            <h4 class="title">{{ __($workItem->title) }}</h4>
                            <p>
                                {{ __($workItem->description) }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="shape shape1">
        <img src="https://script.viserlab.com/binaryecom/assets/templates/basic/images/shape/circle-big.png"
            alt="shape" />
    </div>
</section>

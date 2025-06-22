@php
    $teamContent = App\Models\Frontend\FrontendTeam::first();
    $teamItemContents = App\Models\Frontend\FrontendTeamItem::first();
@endphp

<section class="team-section padding-bottom pos-rel">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="section-header text-center">
                    <span class="subtitle">{{ __($teamContent->subtitle) }}</span>
                    <h2 class="title">{{ __($teamContent->title) }}</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center gy-4">
            @foreach ($teamItemContents as $teamItem)
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="team-item">
                        <div class="team-thumb">
                            <img src="{{ getImage('frontend/team/images/', $teamItem->image) }}" />
                        </div>
                        <div class="team-content">
                            <h4 class="name">{{ $teamItem->name }}</h4>
                            <span class="designation">{{ $teamItem->designation }}</span>
                            <ul class="social-icons">
                                <li>
                                    <a href="{{ $teamItem->telegram_link }}" title="telegram" target="_blank">
                                        <i class="lab la-telegram-plane"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $teamItem->youtube_link }}" title="youtube" target="_blank">
                                        <i class="lab la-youtube"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $teamItem->twitter_link }}" title="twitter" target="_blank">
                                        <i class="lab la-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $teamItem->facebook_link }}" title="Facebook" target="_blank">
                                        <i class="lab la-facebook"></i>
                                    </a>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

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
                            <img src="{{ asset('assets/images/frontend/team/images/' . $teamItem->image) }}" />
                        </div>
                        <div class="team-content">
                            <h4 class="name">{{ $teamItem->name }}</h4>
                            <span class="designation">{{ $teamItem->designation }}</span>
                            <ul class="social-icons">
                                <li>
                                    <a href="{{ $teamItem->social_link_one }}"><i
                                            class="{{ $teamItem->social_icon_one }}"></i></a>
                                </li>
                                <li>
                                    <a href="{{ $teamItem->social_link_two }}"><i
                                            class="{{ $teamItem->social_icon_two }}"></i></a>
                                </li>
                                <li>
                                    <a href="{{ $teamItem->social_link_three }}"><i
                                            class="{{ $teamItem->social_icon_three }}"></i></a>
                                </li>
                                <li>
                                    <a href="{{ $teamItem->social_link_four }}"><i
                                            class="{{ $teamItem->social_icon_four }}"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<div class="column is-3 media-container">
    <div class="box-shadow has-background-white top-left-border-radius">
        <div class="has-text-centered has-text-white has-text-weight-bold red-bg p top-left-border-radius">
            Media
        </div>
        <div class="has-background-white media-header" style="background-image: url('{{ $firstCoverage->show_image_url }}')">
            <div class="media-header-icon">
                <div class="icon-holder">
                    <img src="/images/icons/{{ $firstCoverage->link_type }}.svg" alt="" class="{{ $firstCoverage->link_type === 'link' ? 'is-hidden' : null }}">
                </div>
            </div>
        </div>
        <div class="has-background-white p has-text-centered">
            <div class="pl-1 pr-1">
                <p class="has-text-grey-light is-size-7 mt is-uppercase mb-1">{{ $firstCoverage->presentable_published_date }}</p>
                <p class="is-size-5 subtitle has-text-weight-medium">{{ $firstCoverage->title }}</p>
                <div class="content">
                    {!! $firstCoverage->shortened_description !!}
                </div>
            </div>
            <a class="button is-danger is-outlined is-small is-rounded is-uppercase mt-1 mb-2" href="{{ $firstCoverage->read_url }}"  target="{{ $firstCoverage->content === null ? '_blank' : null }}">
                @if ($firstCoverage->link_type === 'youtube')
                    <fa class="mr" :icon="['fab', 'youtube']"></fa>
                    <span class="has-text-weight-bold">watch video</span>
                @endif
                @if ($firstCoverage->link_type === 'podcast')
                    <fa class="mr" :icon="['fas', 'microphone']"></fa>
                    <span class="has-text-weight-bold">listen to podcast</span>
                @endif
                @if ($firstCoverage->link_type === 'link')
                    <fa class="mr" :icon="['fas', 'book-open']"></fa>
                    <span class="has-text-weight-bold">Read More</span>
                @endif
            </a>
        </div>
    </div>
    <div class="columns is-gapless is-centered is-mobile">
        <div class="column is-narrow" style="border-right: 1px solid white; height: 60px;"></div>
    </div>
    <div class="box-shadow has-background-white">
        <div class="has-background-white media-header" style="background-image: url('{{ $secondCoverage->show_image_url }}')" class="{{ $firstCoverage->link_type === 'link' ? 'is-hidden' : null }}">
            <div class="media-header-icon">
                <div class="icon-holder">
                    <img src="/images/icons/{{ $secondCoverage->link_type }}.svg" alt="">
                </div>
            </div>
        </div>
        <div class="has-background-white p has-text-centered">
            <div class="pl-1 pr-1">
                <p class="has-text-grey-light is-size-7 mt is-uppercase mb-1">{{ $secondCoverage->presentable_published_date }}</p>
                <p class="is-size-5 subtitle has-text-weight-medium">{{ $secondCoverage->title }}</p>
                <div class="content">
                    {!! $secondCoverage->shortened_description !!}
                </div>
            </div>
            <a class="button is-danger is-outlined is-small is-rounded is-uppercase mt-2 mb-2" href="{{ $secondCoverage->read_url }}"   target="{{ $secondCoverage->content === null ? '_blank' : null }}">
                @if ($secondCoverage->link_type === 'youtube')
                    <fa class="mr" :icon="['fab', 'youtube']"></fa>
                    <span class="has-text-weight-bold">watch video</span>
                @endif
                @if ($secondCoverage->link_type === 'podcast')
                    <fa class="mr" :icon="['fas', 'microphone']"></fa>
                    <span class="has-text-weight-bold">listen to podcast</span>
                @endif
                @if ($secondCoverage->link_type === 'link')
                    <fa class="mr" :icon="['fas', 'book-open']"></fa>
                    <span class="has-text-weight-bold">Read More</span>
                @endif
            </a>
        </div>
    </div>
</div>

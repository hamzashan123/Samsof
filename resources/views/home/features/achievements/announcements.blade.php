<div class="box-shadow">
    <div class="has-text-white has-text-weight-bold has-background-warning p pl-1-5 top-left-border-radius">
        Important announcements
    </div>
    <div class="has-background-white-ter p-1-5">
        @foreach ($announcements as $index => $announcement)
            @if ($loop->index === 1 | $loop->index === 2)
                <div class="thicker-white-horizontal-line mb-1 mt-1"></div>
            @endif
            <a class="is-size-6 subtitle has-text-weight-medium" href="{{ $announcement->link }}">{{ $announcement->title }}</a>
        @endforeach
    </div>
</div>
<div class="mt-2 box-shadow">
    <div class="has-text-white has-text-weight-bold has-background-success p pl-1-5 top-left-border-radius">
        Thought leadership & opinions
    </div>
    <div class="has-background-white-ter p-1-5">
        @foreach ($opinions as $index => $opinion)
            @if ($loop->index === 1 | $loop->index === 2)
                <div class="thicker-white-horizontal-line mb-1 mt-1"></div>
            @endif
            @if ($opinion->content)
                <a class="is-size-6 subtitle has-text-weight-medium" href="{{ route('media') }}#opinions">{{ $opinion->title }}</a>
            @else
                <a class="is-size-6 subtitle has-text-weight-medium" href="{{ route('media') }}#opinions">{{ $opinion->title }}</a>
            @endif
        @endforeach
    </div>
</div>
<div class="mt-2 box-shadow">
    <div class="has-text-white has-text-weight-bold has-background-primary p pl-1-5 top-left-border-radius">
        Member’s Only
    </div>
    <div class="has-background-white-ter p-1-5">
        <p class="is-size-6 subtitle has-text-weight-medium">This area contains links to resources on the website that are only available to members of SASMFOS.</p>
        <div class="thicker-white-horizontal-line"></div>
        <div class="has-text-centered mt-2 mb-1">
            <a class="button is-small is-warning is-rounded is-uppercase" href="{{ route('members.login') }}">Member Access</a>
            <a class="button is-small is-primary is-rounded is-uppercase" href="{{ route('members.register') }}">Join</a>
        </div>
    </div>
</div>

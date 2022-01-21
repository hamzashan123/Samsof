<div>&nbsp;</div>
@if ($data->image_url)
    <div style="width: 100%; text-align: center">
        <img src="{{ $data->image_url }}" alt="" width="300">
    </div>
@endif
<h1 class="title has-text-primary">{{ $data->title }}</h1>
@if ($data->presentable_published_date)
    <p>
        {!! $data->presentable_published_date !!}
    </p>
@endif
<div>
    {!! $data->presentable_content !!}
</div>
<a href="{{ route('posts') }}">
    Read More Articles
</a>

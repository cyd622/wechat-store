<div class="tags">
    <ul>
    @foreach($tags as $tag)
        <li data-id="{{ $tag->id }}" data-title="{{ $tag->title }}" data-name="" >
            {{ $tag->title }}
        </li>
    @endforeach
    </ul>

    <div class="selected hidden">
        
    </div>
</div>
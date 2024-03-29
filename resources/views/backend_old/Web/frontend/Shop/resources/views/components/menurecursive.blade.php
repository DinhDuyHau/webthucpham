@if($menuparent->menuchild->count())
    <ul role="menu" class="sub-menu">
        @foreach($menuparent->menuchild as $menuchild)
            <li>
                <a href="shop.html">{{ $menuchild -> name }}</a>
                @if($menuparent->menuchild->count())
                    @include('components.menurecursive', ['menuparent'=>$menuchild])
                @endif
            </li>
        @endforeach
    </ul>
@endif

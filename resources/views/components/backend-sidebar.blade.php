<div>
    @foreach($items as $item)
        @if ($item->type == 'divider')
            <li class="app-menu-label">{{ $item->divider_title }}</li>
        @else
            @if($item->childs->isEmpty())
                <li class="{{ Request::is(ltrim($item->url,'/').'*') ? 'mm-active' : '' }}">
                    <a href="{{ $item->url }}">
                        <div class="parent-icon {{ $item->icon_color_class }}">
                          <i class="{{ $item->icon_class}}"></i>
                        </div>
                        <div class="menu-title">{{ $item->title }}</div>
                      </a>
                </li>
            @else
                <li
                    @foreach($item->childs as $child)
                        @if (Request::is(ltrim($child->url,'/').'*'))
                            class="mm-active"
                            @break
                        @endif
                    @endforeach
                >
                    <a class="has-arrow"
                    href="javascript:;">
                    <div class="parent-icon {{ $item->icon_color_class }}"><i class="{{ $item->icon_class }}"></i>
                    </div>
                    <div class="menu-title">{{ $item->title }}</div>
                  </a>
                    <ul>
                        @foreach($item->childs as $child)
                            <li class="{{ Request::is(ltrim($child->url,'/').'*') ? 'mm-active' : '' }}">
                                <a href="{{ $child->url }}" >
                                    <i class="{{ $child->icon_class }}"></i>
                                    {{ $child->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endif
        @endif
    @endforeach
</div>

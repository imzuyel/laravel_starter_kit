@extends('backend.app')
@section('title')
  Dynamically menu generated
@endsection
@push('css')
  <style>
    /* Nestable */
    .dd-handle:hover {
      color: #2ea8e5;
      background: #fff;
    }

    .dd-item>button {
      display: block;
      position: relative;
      cursor: pointer;
      float: left;
      padding: 0;
      text-indent: 100%;
      white-space: nowrap;
      overflow: hidden;
      border: 0;
      background: transparent;
      line-height: 1;
      text-align: center;
      top: 15px;
      /* right: 20px; */

    }

    .dd-item>button:before {
      content: '+';
      display: block;
      position: absolute;
      width: 100%;
      text-align: center;
      text-indent: 0;
    }

    .dd-item>button[data-action="collapse"]:before {
      content: '-';
    }

    .menu-builder .dd {
      position: relative;
      display: block;
      margin: 0;
      padding: 0;
      max-width: inherit;
      list-style: none;
      line-height: 20px;
    }

    .menu-builder .dd .item_actions {
      z-index: 9;
      position: relative;
      top: 21px;
      right: 20px;
    }

    .menu-builder .dd .item_actions .edit {
      margin-right: 2px;
    }

    .menu-builder .dd-handle {
      display: block;
      height: 65px;
      margin: 5px 0;
      padding: 20px;
      color: #333;
      text-decoration: none;
      border: 1px solid #ccc;
      background: #fafafa;
      border-radius: 3px;
      box-sizing: border-box;
      -moz-box-sizing: border-box;
    }

    .closed-sidebar:not(.closed-sidebar-mobile) .app-header .app-header__logo .navbar-brand {
      display: none;
    }

    .btn-sm,
    .btn-group-sm>.btn {
      padding: 0.10rem 0.4rem;
      font-size: 0.675rem;
      line-height: 1.5;
      border-radius: 0.2rem;
    }

    .btn i {
      font-size: .8rem;
    }

  </style>
@endpush
@section('content')
  <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
    <div class="breadcrumb-title pr-3">Dashboard</div>
    <div class="pl-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="{{ route('app.dashboard') }}"><i class='bx bx-home-alt'></i></a>
          </li>
          <li class="breadcrumb-item active"
            aria-current="page">Menu Builder ({{ $menu->name }})</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="row">
    <div class="ml-auto">
      <a class="btn btn-primary m-3  px-3"
        href="{{ route('app.menus.item.create', $menu->id) }}"
        data-toggle="tooltip"
        title="Add new item to  ({{ $menu->name }}) menu  &#9989;"><i class="bx bx-plus mr-1"></i>Add</a>
    </div>
    <div class="col-12 col-lg-12 mx-auto">
      <div class="main-card card radius-15 border-lg-top-info mb-3">
        <div class="card-body">
          <h5 class="card-title">How To Use:</h5>
          <p>You can output a menu anywhere on your site by calling <code>menu('name')</code></p>
        </div>
      </div>
      <div class="main-card card radius-15 border-lg-top-info mb-3">
        <div class="card-body menu-builder">
          <h5 class="card-title">Drag and drop the menu Items below to re-arrange them.</h5>
          <div class="dd">
            <ol class="dd-list">
              @forelse($menu->menuItems as $item)
                <li class="dd-item"
                  data-id="{{ $item->id }}">
                  <div class="pull-right item_actions">
                    <form action="{{ route('app.menus.item.destroy', ['id' => $menu->id, 'itemId' => $item->id]) }}"
                      method="POST">
                      @csrf()
                      @method('DELETE')
                      <button type="submit"
                        class="btn btn-sm btn-danger delete-confirm float-right delete"
                        data-toggle="tooltip"
                        title="Delete &#128683">
                        <i class="fadeIn animated bx bx-trash"></i>
                      </button>
                    </form>
                    <a class="btn btn-sm btn-info edit float-right"
                      href="{{ route('app.menus.item.edit', ['id' => $menu->id, 'itemId' => $item->id]) }}"
                      data-toggle="tooltip"
                      title="Edit &#128221"><i class="fadeIn animated bx bx-edit"></i></a>
                  </div>
                  <div class="dd-handle">
                    @if ($item->type == 'divider')
                      <span>Divider: {{ $item->divider_title }}</span>
                    @else
                      <span>{{ $item->title }}</span> <small class="url">{{ $item->url }}</small>
                    @endif
                  </div>

                  @if (!$item->childs->isEmpty())
                    <ol class="dd-list">
                      @foreach ($item->childs as $childItem)
                        <li class="dd-item"
                          data-id="{{ $childItem->id }}">
                          <div class="pull-right item_actions">
                            <form
                              action="{{ route('app.menus.item.destroy', ['id' => $menu->id, 'itemId' => $childItem->id]) }}"
                              method="POST">
                              @csrf()
                              @method('DELETE')
                              <button type="submit"
                                class="btn btn-sm btn-danger delete-confirm float-right delete"
                                data-toggle="tooltip"
                                title="Delete &#128683">
                                <i class="fadeIn animated bx bx-trash"></i>
                              </button>
                            </form>
                            <a class="btn btn-sm btn-info edit float-right"
                              href="{{ route('app.menus.item.edit', ['id' => $menu->id, 'itemId' => $childItem->id]) }}"
                              data-toggle="tooltip"
                              title="Edit &#128221"><i class="fadeIn animated bx bx-edit"></i></a>
                          </div>
                          <div class="dd-handle">
                            @if ($childItem->type == 'divider')
                              <span>Divider: {{ $childItem->divider_title }}</span>
                            @else
                              <span>{{ $childItem->title }}</span> <small class="url">{{ $childItem->url }}</small>
                            @endif
                          </div>
                        </li>
                      @endforeach
                    </ol>
                  @endif
                </li>
              @empty
                <div class="text-center">
                  <strong>No menu item found.</strong>
                </div>
              @endforelse
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('js')
  <link rel="stylesheet"
    href="{{ asset('backend/assets/plugins/nestable/jquery.nestable.min.css') }}">
  <script src="{{ asset('backend/assets/plugins/nestable/jquery.nestable.min.js') }}"></script>
  <script type="text/javascript">
    $(function() {
      $('.dd').nestable({
        maxDepth: 2
      });
      $('.dd').on('change', function(e) {
        $.post('{{ route('app.menus.order', $menu->id) }}', {
          order: JSON.stringify($('.dd').nestable('serialize')),
          _token: '{{ csrf_token() }}'
        }, function(data) {
          toastr.success('Successfully updated menu order.');
        });
      });
    });

  </script>
@endpush

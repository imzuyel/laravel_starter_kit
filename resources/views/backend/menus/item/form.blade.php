@extends('backend.app')
@section('title')
{{ isset($menuItem->id) ? 'Update menu item' : 'Create menu item' }}
@endsection
@push('css')
<link href="{{ asset('/') }}backend/assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('/') }}backend/assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
@endpush
@section('content')
<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
  <div class="breadcrumb-title pr-3">Dashboard</div>
  <div class="pl-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0 p-0">
        <li class="breadcrumb-item"><a href="{{ route('app.dashboard') }}"><i class='bx bx-home-alt'></i></a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">{{ isset($menuItem->id) ? 'Update menu item' : 'Create menu item' }}</li>
      </ol>
    </nav>
  </div>
</div>
<div class="row">
  <div class="ml-auto">
    <a class="btn btn-primary m-3  px-3" href="{{ route('app.menus.builder', $menu->id) }}" data-toggle="tooltip" title="Back to ({{ $menu->name }}) menu   &#9194;"><i class="bx bx-rewind mr-1"></i>Back</a>
  </div>
  <div class="col-12">
    <div class="main-card mb-3 card">
      <form id="itemFrom" role="form" method="POST" action="{{ isset($menuItem) ? route('app.menus.item.update', ['id' => $menu->id, 'itemId' => $menuItem->id]) : route('app.menus.item.store', $menu->id) }}">
        @csrf
        @isset($menuItem)
        @method('PUT')
        @endisset
        <div class="card-body">
          <h5 class="card-title">{{ isset($menuItem->id) ? 'Update menu item' : 'Create menu item' }}</h5>
          <div class="form-group">
            <label for="type">Type</label>
            <select class=" single-select" id="type" name="type" onchange="setItemType()">
              <option value="item" @isset($menuItem) {{ $menuItem->type == 'item' ? 'selected' : '' }} @endisset>Menu Item</option>
              <option value="divider" @isset($menuItem) {{ $menuItem->type == 'divider' ? 'selected' : '' }} @endisset>Divider</option>
            </select>
          </div>
          <div id="divider_fields">
            <div class="form-group">
              <label for="divider_title">Title of the Divider</label>
              <input type="text" class="form-control @error('divider_title') is-invalid @enderror" id="divider_title" name="divider_title" placeholder="Divider Title" value="{{ isset($menuItem) ? $menuItem->divider_title : old('divider_title') }}" autofocus>
              @error('divider_title')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div id="item_fields">
            <div class="form-group">
              <label for="title">Title of the Menu Item</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Title" value="{{ isset($menuItem) ? $menuItem->title : old('title') }}" autofocus>
              @error('title')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="url">URL for the Menu Item</label>
              <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url" placeholder="URL" value="{{ isset($menuItem) ? $menuItem->url : old('url') }}">
              @error('url')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="target">Open In</label>
              <select name="target" id="target" class="form-control @error('target') is-invalid @enderror single-select">
                <option value="_self" @isset($menuItem) {{ $menuItem->target == '_self' ? 'selected' : '' }} @endisset>
                  Same Tab/Window
                </option>
                <option value="_blank" @isset($menuItem) {{ $menuItem->target == '_blank' ? 'selected' : '' }} @endisset>
                  New Tab/Window
                </option>
              </select>
              @error('target')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="icon_class">Font Icon class for the Menu Item <a target="_blank" href="https://boxicons.com/">(Use
                  a Boxicons Font Class)</a> </label>
              <input type="text" class="form-control @error('icon_class') is-invalid @enderror" id="icon_class" name="icon_class" placeholder="Icon Class (optional)" value="{{ isset($menuItem) ? $menuItem->icon_class : old('icon_class') }}" autofocus>
              @error('icon_class')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="icon_color_class">Menu Icon color class for the Menu Item <a target="_blank" href="https://boxicons.com/">(Use
                  a Boxicons Font Class)</a> </label>
              <select class="single-select" id="icon_color_class" name="icon_color_class">

                <option value="icon-color-1" @isset($menuItem){{ $menuItem->icon_color_class === 'icon-color-1' ? 'selected' : '' }}@endisset>
                  icon-color-1
                </option>
                <option value="icon-color-2" @isset($menuItem){{ $menuItem->icon_color_class === 'icon-color-2' ? 'selected' : '' }}@endisset>
                  icon-color-2
                </option>
                <option value="icon-color-3" @isset($menuItem){{ $menuItem->icon_color_class === 'icon-color-3' ? 'selected' : '' }}@endisset>
                  icon-color-3
                </option>
                <option value="icon-color-4" @isset($menuItem){{ $menuItem->icon_color_class === 'icon-color-4' ? 'selected' : '' }}@endisset>
                  icon-color-4
                </option>
                <option value="icon-color-5" @isset($menuItem){{ $menuItem->icon_color_class === 'icon-color-5' ? 'selected' : '' }}@endisset>
                  icon-color-5
                </option>
                <option value="icon-color-6" @isset($menuItem){{ $menuItem->icon_color_class === 'icon-color-6' ? 'selected' : '' }}@endisset>
                  icon-color-6
                </option>
                <option value="icon-color-7" @isset($menuItem){{ $menuItem->icon_color_class === 'icon-color-7' ? 'selected' : '' }}@endisset>
                  icon-color-7
                </option>
                <option value="icon-color-1" @isset($menuItem){{ $menuItem->icon_color_class === 'icon-color-1' ? 'selected' : '' }}@endisset>
                  icon-color-1
                </option>
                <option value="icon-color-8" @isset($menuItem){{ $menuItem->icon_color_class === 'icon-color-8' ? 'selected' : '' }}@endisset>
                  icon-color-8
                </option>
                <option value="icon-color-9" @isset($menuItem){{ $menuItem->icon_color_class === 'icon-color-9' ? 'selected' : '' }}@endisset>
                  icon-color-9
                </option>
                <option value="icon-color-10" @isset($menuItem){{ $menuItem->icon_color_class === 'icon-color-10' ? 'selected' : '' }}@endisset>
                  icon-color-10
                </option>
                <option value="icon-color-11" @isset($menuItem){{ $menuItem->icon_color_class === 'icon-color-11' ? 'selected' : '' }}@endisset>
                  icon-color-11
                </option>
                <option value="icon-color-12" @isset($menuItem){{ $menuItem->icon_color_class === 'icon-color-12' ? 'selected' : '' }}@endisset>
                  icon-color-12
                </option>
                <option value="icon-color-13" @isset($menuItem){{ $menuItem->icon_color_class === 'icon-color-13' ? 'selected' : '' }}@endisset>
                  icon-color-13
                </option>
                <option value="icon-color-14" @isset($menuItem){{ $menuItem->icon_color_class === 'icon-color-14' ? 'selected' : '' }}@endisset>
                  icon-color-14
                </option>

              </select>
            </div>
          </div>
          <div class="float-right">
            <div class="btn-group">
              @if (isset($menuItem->id))
              <button type="submit" class="btn btn-primary px-2 mb-1" data-toggle="tooltip" title="Update These data &#128190;"><i class="bx bx-task"></i> Update</button>
              @else
              <button type="submit" class="btn btn-primary px-4 mb-1" data-toggle="tooltip" title="Save to database &#128190;"> <i class="bx bx-save"></i> Save</button>
              @endif
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
@push('js')
<script src="{{ asset('/') }}backend/assets/plugins/select2/js/select2.min.js"></script>
<script>
  $('.single-select').select2({
    theme: 'bootstrap4'
    , width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style'
    , placeholder: $(this).data('placeholder')
    , allowClear: Boolean($(this).data('allow-clear'))
  , });
</script>
<script type="text/javascript">
  function setItemType() {
    if ($('select[name="type"]').val() == 'divider') {
      $('#divider_fields').removeClass('d-none');
      $('#item_fields').addClass('d-none');
    } else {
      $('#divider_fields').addClass('d-none');
      $('#item_fields').removeClass('d-none');
    }
  };
  setItemType();
  $('input[name="type"]').change(setItemType);
</script>
@endpush

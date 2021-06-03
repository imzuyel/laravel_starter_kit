@extends('backend.app')
@section('title')
{{ isset($menu->id) ?"Update menu" : "Create Menu" }}
@endsection
@section('content')
  <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
    <div class="breadcrumb-title pr-3">Dashboard</div>
    <div class="pl-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="{{ route('app.dashboard') }}"><i class='bx bx-home-alt'></i></a>
          </li>
          <li class="breadcrumb-item active"
            aria-current="page">{{ isset($menu->id) ?"Update menu" : "Create Menu" }}</li>
        </ol>
      </nav>
    </div>
  </div>
  <form action="{{ isset($menu->id) ? route('app.menus.update', $menu->id) : route('app.menus.store') }}"
    method="post"
    enctype="multipart/form-data">
    @csrf
    @isset($menu->id)
      @method('PUT')
    @endisset
    <div class="row">
      <div class="col-12 col-lg-8 mx-auto">
        <div class="card radius-15 border-lg-top-info">
          <div class="card-header border-bottom-0 mb-4">
            <div class="d-flex align-items-center">
              <div>
                <h5 class="mb-lg-0">{{ isset($menu->id) ?"Update menu" : "Create Menu" }}</h5>
              </div>
              <div class="ml-auto">
                <a class="btn btn-primary"
                  href="{{ route('app.menus.index') }}"  data-toggle="tooltip" title="Back to menus &#9194;"><i class="bx bx-rewind mr-1"></i>Menus</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="form-body">
              <div class="form-group">
                <label class="col-form-label">Name</label>
                <input type="text"
                  class="form-control  @error('name') is-invalid @enderror"
                  name="name"
                  value="{{ $menu->name ?? old('name') }}"
                  placeholder="name"
                  {{ !isset($menu) ? 'required' : '' }}>
                @error('name')
                  <span class="text-danger"
                    role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <label class="col-form-label">Description</label>
                <textarea name="description"
                  id="description"
                  class="form-control  @error('description') is-invalid @enderror" placeholder="Description">{{ $menu->description ?? old('description') }}</textarea>
                @error('description')
                  <span class="text-danger"
                    role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="float-right">
                <div class="btn-group">
                  @if (isset($menu->id))
                    <button type="submit"
                      class="btn btn-primary px-2"
                      data-toggle="tooltip"
                      title="Update these data &#128190;"><i class="bx bx-task"></i> Update</button>
                  @else
                    <button type="submit"
                      class="btn btn-primary px-4"
                      data-toggle="tooltip"
                      title="Save to database &#128190;"> <i class="bx bx-save"></i> Save</button>
                  @endif
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </form>
@endsection

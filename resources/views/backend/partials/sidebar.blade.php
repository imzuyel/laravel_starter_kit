<div class="sidebar-wrapper"
  data-simplebar="true">
  <div class="sidebar-header">
    <div class="">
      <img src="{{ asset('backend/assets/images/logo-icon.png') }}"
        class="logo-icon-2"
        alt="" />
    </div>
    <div>
      <h4 class="logo-text">{{ setting('site_title','Starter') }}</h4>
    </div>
    <a href="javascript:;"
      class="toggle-btn ml-auto"> <i class="bx bx-menu"></i>
    </a>
  </div>
  <!--navigation-->
  <ul class="metismenu"
    id="menu">
    <x-backend-sidebar />
  </ul>
  <!--end navigation-->
</div>

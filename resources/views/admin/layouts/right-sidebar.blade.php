
<!--begin::Wrapper-->
<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
    <!--begin::Header-->
    <div id="kt_header" class="header header-fixed">
        <!--begin::Container-->
        <div class="container-fluid d-flex align-items-stretch justify-content-between">


            <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                <!--begin::Header Menu-->
                <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
              
                </div>
                <!--end::Header Menu-->
            </div>
            <!--begin::Topbar-->
            <div class="topbar">

                @livewire('admin.layouts.rightsidebar.profile')

            </div>
            <!--end::Topbar-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Header-->

    @yield('content')

    @include('admin.layouts.footer')

</div>
<!--end::Wrapper-->
<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
            {{-- <use xlink:href="{{ asset('assets/dist/assets/brand/coreui.svg#full')}}"></use> --}}
            {{-- <use xlink:href="{{ asset('images/logo_smpn_58_jkt.png')}}"></use> --}}
        </svg>
        <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
            {{-- <use xlink:href="{{ asset('assets/dist/assets/brand/coreui.svg#signet')}}"></use> --}}
            {{-- <use xlink:href="{{ asset('images/logo_smpn_58_jkt.png')}}"></use> --}}
        </svg>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('assets/dist/vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}">
                    </use>
                </svg>
                {{-- Dashboard<span class="badge badge-sm bg-info ms-auto">NEW</span></a></li> --}}
                Dashboard
            </a>
        </li>
        <li class="nav-title">Data</li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('customer') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('assets/dist/vendors/@coreui/icons/svg/free.svg#cil-drop') }}"></use>
                </svg> Data Pelanggan
            </a>
        </li>
        <li class="nav-title">Master</li>
        <li class="nav-group show" aria-expanded="true">
            <a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('assets/dist/vendors/@coreui/icons/svg/free.svg#cil-file') }}"></use>
                </svg>Master
            </a>
            <ul class="nav-group-items" style="height: auto;">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('theme') }}"><span class="nav-icon"></span>
                        Theme
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('bank') }}"><span class="nav-icon"></span>
                        Bank
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>

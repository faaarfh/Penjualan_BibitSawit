@php
    use App\Enums\Role;
    $user = auth()->user();
    $role = $user->role;
@endphp

<div id="sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a href="">UD. Putri Hijau</a>
                </div>
                <!-- theme toggle, biarin aja -->
            </div>
        </div>

<div class="sidebar-menu">
    <ul class="menu">
        <div class="d-flex align-items-center">
            <div class="avatar avatar-md">
                <img src="{{ auth()->user()->photo ? asset('storage/' . auth()->user()->photo) : asset('./assets/compiled/jpg/2.jpg') }}">
            </div>
            <p class="font-bold ms-3 mb-0">{{ $user->name }} - {{ $user->role}}</p>
        </div>
        <hr>

        <x-nav-link icon="bi-person-circle"
            href="{{ route('profile')}}"
            :active="request()->routeIs('profile')">
            Profil
        </x-nav-link>

        <li class="sidebar-title">Navigasi Utama</li>

        <x-nav-link icon="bi-house-door"
            href="{{ route('dashboard')}}"
            :active="request()->routeIs('dashboard')">
            Beranda
        </x-nav-link>

        @if ($role === Role::ADMIN)
            <x-nav-link icon="bi-people"
                href="{{ route('table.users')}}"
                :active="request()->routeIs('table.users')">
                    Pengguna
            </x-nav-link>
            <x-nav-link icon="bi-flower1"
                href="{{ route('table.bibit')}}"
                :active="request()->routeIs('table.bibit')">
                    Bibit
            </x-nav-link>

            <x-nav-link icon="bi-cart-check"
                href="{{ route('table.pesanan')}}"
                :active="request()->routeIs('table.pesanan')">
                    Pesanan
            </x-nav-link>

        <li class="sidebar-title">Laporan</li>
            <x-nav-link icon="bi-file-earmark-bar-graph"
                href="{{ route('laporan')}}"
                :active="request()->routeIs('laporan')">
                    Laporan
            </x-nav-link>
        @endif

        @if ($role === Role::PEMBELI)
            <x-nav-link icon="bi-book"
                href="{{ route('katalog-bibit')}}"
                :active="request()->routeIs('katalog-bibit')">
                    Katalog
            </x-nav-link>
            <x-nav-link icon="bi-cart"
                href="{{ route('table.pesanan')}}"
                :active="request()->routeIs('table.pesanan')">
                    Pesanan
            </x-nav-link>
        @endif


        <li class="sidebar-title">Akun</li>

        <x-nav-link icon="bi-box-arrow-right"
            href="{{ route('logout')}}">
            Keluar
        </x-nav-link>
    </ul>
</div>
    </div>
</div>

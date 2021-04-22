@if (!empty(Auth::guard('user')->user()->id))
    <?php
    $transactions = \App\Models\Transaction::where('users_id', Auth::guard('user')->user()->id)
    ->where('status', 0)
    ->first();
    $transactions2 = \App\Models\Transaction::where('users_id', Auth::guard('user')->user()->id)->first();

    if (!empty($transactions)) {
    $notif = \App\Models\TransactionDetails::where('transaction_id', $transactions->id)->count();
    }
    if (!empty($transactions2)) {
    $notPaid = \App\Models\Transaction::where('users_id', Auth::guard('user')->user()->id)
    ->where('status', 1)
    ->count();
    $delivered = \App\Models\Transaction::where('users_id', Auth::guard('user')->user()->id)
    ->where('status', 3)
    ->count();
    $reject = \App\Models\Transaction::where('users_id', Auth::guard('user')->user()->id)
    ->where('status', 5)
    ->count();
    $notifStatus = $notPaid + $delivered + $reject;
    }
    ?>
@endif

<section style="height:100%; width: 100%; box-sizing: border-box; background-color: #FFFFFF">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        .modal-header-2-2.modal {
            top: 2rem;
        }

        .header-2-2 .navbar,
        .hero-header-2-2 {
            padding: 3rem 2rem;
        }

        .header-2-2 .navbar-light .navbar-nav .nav-link {
            font-size: 18px;
            color: #1d1e3c;
            font-weight: 300;
            line-height: 1.5rem;
        }

        .header-2-2 .navbar-light .navbar-nav .nav-link:hover {
            font-size: 18px;
            color: #1d1e3c;
            font-weight: 600;
            line-height: 1.5rem;
        }

        .header-2-2 .navbar-light .navbar-nav .active>.nav-link,
        .header-2-2 .navbar-light .navbar-nav .nav-link.active,
        .header-2-2 .navbar-light .navbar-nav .nav-link.show,
        .header-2-2 .navbar-light .navbar-nav .show>.nav-link {
            font-weight: 600;
        }

        .header-2-2 .navbar-light .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(0, 0, 0, 1)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        .header-2-2 .navbar-light .navbar-toggler {
            border: none;
        }

        .modal-content-header-2-2 .modal-header,
        .modal-content-header-2-2 .modal-footer {
            border: none;
        }

        .btn:focus,
        .btn:active {
            outline: none !important;
        }

        .btn-fill-header-2-2 {
            background-color: #27C499;
            border-radius: 12px;
            color: #ffffff;
            font-weight: 600;
            padding: 12px 32px 12px 32px;
            font-size: 18px;
        }

        .btn-fill-header-2-2:hover {
            color: #ffffff;
            --tw-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1),
                0 4px 6px -2px rgba(0, 0, 0, 0.05);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),
                var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }

        .btn-no-fill-header-2-2 {
            color: #1D1E3C;
            font-weight: 300;
            line-height: 1.75rem;
            padding: 12px 32px 12px 32px;
            font-size: 18px;
        }

        .modal-header-2-2 .modal-dialog .modal-content {
            border-radius: 8px;
            background-color: #FFFFFF;
            border: none;
        }

        .responsive-header-2-2 li a {
            padding: 1rem 1rem;
        }

        .text-caption-header-2-2 {
            margin-bottom: 2rem;
            line-height: 1.625;
            font-size: 0.875rem;
            line-height: 1.25rem;
            font-weight: 600;
            color: #27C499;
        }

        .left-column-header-2-2 {
            margin-bottom: 0.75rem;
            width: 100%;
        }

        .right-column-header-2-2 {
            width: 100%;
        }

        .title-text-big-header-2-2 {
            font-weight: 600;
            margin-bottom: 2rem;
            font-size: 2.25rem;
            line-height: 2.5rem;
            color: #272E35;
        }

        .title-text-small-header-2-2 {
            font-weight: 600;
            margin-bottom: 2rem;
            font-size: 2.25rem;
            line-height: 2.5rem;
            color: #272E35;
            padding-left: 0;
            padding-right: 0;
        }

        .div-button-header-2-2 {
            margin-left: 0;
            margin-right: 0;
        }

        .btn-try-header-2-2 {
            font-weight: 600;
            color: #FFFFFF;
            padding: 1rem 1.5rem 1rem 1.5rem;
            font-size: 1rem;
            line-height: 1.5rem;
            border-radius: 0.75rem;
            background-color: #27C499;
            margin-bottom: 1rem;
            margin-right: 0;
        }

        .btn-try-header-2-2:hover {
            color: #FFFFFF;
            --tw-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1),
                0 4px 6px -2px rgba(0, 0, 0, 0.05);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),
                var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }

        .btn-outline-header-2-2 {
            font-weight: 400;
            border: 1px solid #555B61;
            color: #555B61;
            padding: 1rem 1.5rem 1rem 1.5rem;
            font-size: 1rem;
            line-height: 1.5rem;
            border-radius: 0.75rem;
            background-color: transparent;
            margin-bottom: 1rem;
        }

        .btn-outline-header-2-2:hover {
            border: 1px solid #27C499;
            color: #27C499;
        }

        .btn-outline-header-2-2:hover div path {
            fill: #27C499;
        }

        @media (min-width: 576px) {
            .modal-header-2-2 .modal-dialog {
                max-width: 95%;
                border-radius: 12px;
            }

            .header-2-2 .navbar {
                padding: 3rem 2rem;
            }

            .hero-header-2-2 {
                padding: 3rem 2rem 5rem 2rem;
            }

            .title-text-big-header-2-2 {
                font-size: 3rem;
                line-height: 1.2;
            }

            .title-text-small-header-2-2 {
                font-size: 3rem;
                line-height: 1.2;
                padding-left: 1.5rem;
                padding-right: 1.5rem;
            }

            .div-button-header-2-2 {
                margin-left: 0;
                margin-right: 0.75rem;
            }

            .btn-try-header-2-2 {
                margin-bottom: 0;
                margin-right: 0.75rem;
            }

            .btn-outline-header-2-2 {
                margin-bottom: 0;
            }
        }

        @media (min-width: 768px) {
            .header-2-2 .navbar {
                padding: 3rem 4rem;
            }

            .hero-header-2-2 {
                padding: 3rem 4rem 5rem 4rem;
            }

            .left-column-header-2-2 {
                margin-bottom: 3rem;
            }

            .title-text-small-header-2-2 {
                padding-left: 1.5rem;
                padding-right: 1.5rem;
            }

            .div-button-header-2-2 {
                margin-left: 0;
                margin-right: 0.5rem;
            }

            .btn-try-header-2-2 {
                margin-right: 0.5rem;
            }
        }

        @media (min-width: 992px) {
            .header-2-2 .navbar-expand-lg .navbar-nav .nav-link {
                padding-right: 1.25rem;
                padding-left: 1.25rem;
            }

            .header-2-2 .navbar {
                padding: 3rem 6rem;
            }

            .hero-header-2-2 {
                padding: 3rem 6rem 5rem 6rem;
            }

            .left-column-header-2-2 {
                width: 50%;
                margin-bottom: 0;
            }

            .right-column-header-2-2 {
                width: 50%;
            }

            .title-text-big-header-2-2 {
                font-size: 3.75rem;
                line-height: 1.2;
            }

            .title-text-small-header-2-2 {
                font-size: 3.75rem;
                line-height: 1.2;
            }

            .div-button-header-2-2 {
                margin-left: 0;
                margin-right: 2rem;
            }

            .btn-try-header-2-2 {
                margin-right: 2rem;
            }
        }

    </style>
    <div class="header-2-2" style="font-family: 'Poppins', sans-serif;">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a href="#">
                <img style="margin-right:0.75rem"
                    src="http://api.elements.buildwithangga.com/storage/files/2/assets/Header/Header2/Header-2-5.png"
                    alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="modal"
                data-bs-target="#targetModal-header-2-2">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="modal-header-2-2 modal fade" id="targetModal-header-2-2" tabindex="-1" role="dialog"
                aria-labelledby="targetModalLabel-header-2-2" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-content-header-2-2">
                        <div class="modal-header" style="padding:	2rem; padding-bottom: 0;">
                            <a class="modal-title" id="targetModalLabel-header-2-2">
                                <img style="margin-top:0.5rem"
                                    src="http://api.elements.buildwithangga.com/storage/files/2/assets/Header/Header2/Header-2-5.png"
                                    alt="">
                            </a>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body" style="padding:	2rem; padding-top: 0; padding-bottom: 0;">
                            <ul class="navbar-nav responsive-header-2-2 me-auto mt-2 mt-lg-0">
                                <li class="nav-item {{ request()->routeIs('user') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('user') }}">Home</a>
                                </li>
                                <li class="nav-item {{ request()->routeIs('user.foods') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('user.foods') }}">
                                        <lord-icon src="https://cdn.lordicon.com//jpdtnwas.json" trigger="loop-on-hover"
                                            colors="primary:#121331,secondary:#08a88a" stroke="100"
                                            style="width:32px;height:32px">
                                        </lord-icon> Foods
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->routeIs('user.drinks') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('user.drinks') }}">
                                        <lord-icon src="https://cdn.lordicon.com//vmhkxnfq.json" trigger="loop-on-hover"
                                            colors="primary:#121331,secondary:#08a88a" stroke="100"
                                            style="width:32px;height:32px">
                                        </lord-icon> Drinks
                                    </a>
                                </li>
                            </ul>
                            @if (Auth::guard('user')->user())
                                <ul class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="fas fa-bell"></i>
                                            <span class="badge rounded-pill bg-danger align-text-top">0</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            <lord-icon src="https://cdn.lordicon.com//slkvcfos.json"
                                                trigger="loop-on-hover" colors="primary:#000000,secondary:#08a88a"
                                                stroke="100" style="width:128px;height:128px">
                                            </lord-icon>
                                            @if (!empty($notif))
                                                <span
                                                    class="badge rounded-pill bg-danger align-text-top">{{ $notif }}</span>
                                            @endif
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            {{ Auth::guard('user')->user()->name }}
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end mb-3"
                                            aria-labelledby="navbarDarkDropdownMenuLink">
                                            <li>
                                                <a class="dropdown-item" href="{{ url('history') }}">
                                                    <i class="fa fa-list me-2"></i> Riwayat Pemesanan</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{ url('/ubahakun') }}">
                                                    <i class="fa fa-user-edit me-2"></i>Ubah Akun</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item text-danger" href="{{ route('logout') }}">
                                                    <i class="fas fa-sign-out-alt me-2"></i> Logout</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            @else
                                <a href="{{ route('register') }}"
                                    class="btn btn-default btn-no-fill-header-2-2 mt-2 mb-4">Register</a>
                                <a href="{{ route('login') }}" class="btn btn-fill-header-2-2 mt-2 mb-4">Login</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo-header-2-2">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item {{ request()->routeIs('user') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('user') }}">Home</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('user.foods') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('user.foods') }}">
                            <lord-icon src="https://cdn.lordicon.com//jpdtnwas.json" trigger="loop-on-hover"
                                colors="primary:#121331,secondary:#08a88a" stroke="100" style="width:32px;height:32px">
                            </lord-icon> Foods
                        </a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('user.drinks') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('user.drinks') }}">
                            <lord-icon src="https://cdn.lordicon.com//vmhkxnfq.json" trigger="loop-on-hover"
                                colors="primary:#121331,secondary:#08a88a" stroke="100" style="width:32px;height:32px">
                            </lord-icon> Drinks
                        </a>
                    </li>
                </ul>
                @if (Auth::guard('user')->user())
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.history') }}"><i class="fas fa-bell"></i>
                                @if (!empty($notifStatus))
                                    <span
                                        class="badge rounded-pill bg-danger align-text-top">{{ $notifStatus }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.cart') }}">
                                <lord-icon src="https://cdn.lordicon.com//slkvcfos.json" trigger="loop-on-hover"
                                    colors="primary:#000000,secondary:#08a88a" stroke="100"
                                    style="width:32px;height:32px">
                                </lord-icon>
                                @if (!empty($notif))
                                    <span
                                        class="badge rounded-pill bg-danger align-text-top">{{ $notif }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::guard('user')->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li>
                                    <a class="dropdown-item" href="{{ url('history') }}">
                                        <i class="fa fa-list me-2"></i> Riwayat Pemesanan</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ url('/ubahakun') }}">
                                        <i class="fa fa-user-edit me-2"></i>Ubah Akun</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}">
                                        <i class="fas fa-sign-out-alt me-2"></i> Logout</a>
                                </li>
                            </ul>
                        @else
                            <a href="{{ route('register') }}"
                                class="btn btn-default btn-no-fill-header-2-2">Register</a>
                            <a href="{{ route('login') }}" class="btn btn-fill-header-2-2">Login</a>
                @endif
                </li>
                </ul>
            </div>
        </nav>
    </div>


</section>

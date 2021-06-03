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
    $status = \App\Models\Transaction::where('users_id', Auth::guard('user')->user()->id)
    ->where('status', '>=', 2)->where('status', '<=', 4)
    ->count();
    $reject = \App\Models\Transaction::where('users_id', Auth::guard('user')->user()->id)
    ->where('status', 5)
    ->count();
    $notifStatus = $notPaid + $status + $reject;
    }
    ?>
@endif

<header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="index.html"><span>DimsFood</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="{{ asset('assets_home/img/logo.png') }}" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
            <li class="{{ request()->routeIs('user') ? 'active' : '' }}">
                <a href="{{ route('user') }}">Home</a>
            </li>
            <li class="{{ request()->routeIs('user.foods') ? 'active' : '' }}">
                <a href="{{ route('user.foods') }}">
                    <lord-icon src="https://cdn.lordicon.com//jpdtnwas.json" trigger="loop-on-hover"
                        colors="primary:#121331,secondary:#08a88a" stroke="100"
                        style="width:32px;height:32px">
                    </lord-icon> Foods
                </a>
            </li>
            <li class="{{ request()->routeIs('user.drinks') ? 'active' : '' }}">
                <a href="{{ route('user.drinks') }}">
                    <lord-icon src="https://cdn.lordicon.com//vmhkxnfq.json" trigger="loop-on-hover"
                        colors="primary:#121331,secondary:#08a88a" stroke="100"
                        style="width:32px;height:32px">
                    </lord-icon> Drinks
                </a>
            </li>

            {{-- Sudah Login --}}
            @if(Auth::guard('user')->user())
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.history') }}"><i class="fas fa-bell"></i>
                    @if (!empty($notifStatus))
                        <span
                            class="badge badge-danger align-text-top" style="padding: 2px 2px; margin-top: -6px; margin-left: -5px">{{ $notifStatus }}</span>
                    @endif
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.cart') }}"><i class="fas fa-shopping-cart"></i>
                    @if (!empty($notif))
                        <span
                            class="badge badge-danger align-text-top" style="padding: 2px 2px; margin-top: -6px;">{{ $notif }}</span>
                    @endif
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button"
                    data-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user mr-2"></i> {{ Auth::guard('user')->user()->name }}
                </a>
                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="{{ route('user.history') }}" style="color: #ffb03b">
                            <i class="fas fa-list mr-2"></i> Transaction History</a>
                    </li>
                    {{-- <li>
                        <a class="dropdown-item" href="{{ url('/ubahakun') }}" style="color: #ffb03b">
                            <i class="fas fa-user-edit mr-2"></i> Edit Account</a>
                    </li> --}}
                    <li>
                        <a class="dropdown-item text-danger" href="{{ route('logout') }}">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout</a>
                    </li>
                </ul>

            {{-- Belum Login --}}
            @else
                <li class="book-a-table text-center"><a href="{{route('login')}}">Login</a></li>
            @endif
        </ul>
      </nav>
      <!-- .nav-menu -->

    </div>
  </header>
  <!-- End Header -->

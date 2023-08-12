{{-- This is the navbar file --}}
<nav class="navbar navbar-expand-lg navbar-light bg-navy">
    {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
    <h3><a href="index.php" class="text-light"><b><i class="text-danger">M</i><i>apato</i><i class="text-danger">.</i></b></a></h3>
    <button class="navbar-toggler text-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon text-light"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                {{-- <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a> --}}
                <a href="{{ url('/dashboard') }}" class="nav-link text-light">Dashboard</a>
            </li>
            {{-- <li class="nav-item ">
                <a href="earnings.php" class="nav-link text-light">Budgets</a>
            </li> --}}
            <li class="nav-item ">
                {{-- <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a> --}}
                <a href="{{ route('income.index') }}" class="nav-link text-light">Earnings</a>
            </li>
            <li class="nav-item ">
                {{-- <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a> --}}
                <a href="{{ route('savings.index')}}" class="nav-link text-light">Savings</a>
            </li>
            <li class="nav-item ">
                {{-- <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a> --}}
                <a href="{{ route('expenses.index') }}" class="nav-link text-light">Expenses</a>
            </li>
            <li class="nav-item ">
                {{-- <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a> --}}
                <a href="earnings.php" class="nav-link text-light">Debts</a>
            </li>

        </ul>
        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link text-light dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="text-danger fa fa-user-tie"></i> {{ Auth::user()->fname.' '.Auth::user()->lname }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#"><b>Profile</b> </a>
                    <div class="dropdown-divider"></div>
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                    this.closest('form').submit();">
                            <i class="fas fa-power-off"> Log out</i>
                        </a>
                    </form>
                </div>
            </li>

        </ul>
    </div>
</nav>

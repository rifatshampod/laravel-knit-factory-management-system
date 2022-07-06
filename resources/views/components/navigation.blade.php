<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <ul>
                <div class="logo">
                    <a href="/">
                        <!-- <img src="assets/images/logo.png" alt="" /> --><span>KNIT</span>
                    </a>
                </div>
                <li class="label">Main</li>
                <li>
                    <a href="/"><i class="ti-home"></i>Dashboard</a>
                </li>

                <li class="label">Apps</li>
                @if (auth()->user()->role == 2)
                <li>
                    <a class="sidebar-sub-toggle"><i class="ti-gift"></i> Order<span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="create-order">Create Order</a></li>
                        <li><a href="order">All Order</a></li>
                    </ul>
                </li>
                @elseif (auth()->user()->role == 3)
                <li>
                    <a class="" href="plan"><i class="ti-gift"></i>Planning</a>
                </li>

                @elseif (auth()->user()->role == 4)
                <li>
                    <a class="sidebar-sub-toggle"><i class="ti-layers-alt"></i>Production<span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="all-production">All Production</a></li>
                        <li><a href="daily-production">Day wise production</a></li>
                    </ul>
                </li>
                @elseif (auth()->user()->role == 5)
                <li>
                    <a class="sidebar-sub-toggle"><i class="ti-truck"></i>Delivery<span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="all-delivery">All Delivery</a></li>
                        <li><a href="all-receive">Daily Receive</a></li>
                        <li><a href="daily-delivery">Daily Delivery</a></li>
                    </ul>
                </li>

                @endif

                {{-- admin users --}}
                @if(auth()->user()->role == 1)

                <li>
                    <a class="sidebar-sub-toggle"><i class="ti-shopping-cart"></i> Order<span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="create-order">Create Order</a></li>
                        <li><a href="order">All Order</a></li>
                    </ul>
                </li>

                <li>
                    <a class="" href="plan"><i class="ti-ruler-pencil"></i>Planning</a>
                </li>

                <li>
                    <a class="sidebar-sub-toggle"><i class="ti-layers-alt"></i>Production<span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="all-production">All Production</a></li>
                        <li><a href="daily-production">Day wise production</a></li>
                    </ul>
                </li>

                <li>
                    <a class="sidebar-sub-toggle"><i class="ti-truck"></i>Receive / Delivery<span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="all-delivery">All Data</a></li>
                        <li><a href="all-receive">Daily Receive</a></li>
                        <li><a href="daily-delivery">Daily Delivery</a></li>
                    </ul>
                </li>

                <li>
                    <a class="sidebar-sub-toggle"><i class="ti-bar-chart"></i>Report<span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="order-report">Order Report</a></li>
                        <li><a href="production-report">Production Report</a></li>
                        <li><a href="production-report-order">Date Wise Production</a></li>
                        <li><a href="allocation-report">Allocation Report</a></li>
                        <li><a href="delivery-report-date">Date Wise Delivery</a></li>
                        <li><a href="delivery-report-order">Order Wise Delivery</a></li>
                        <li><a href="receive-report-order">Order Wise Receive</a></li>

                    </ul>
                </li>
                <li>
                    <a class="sidebar-sub-toggle"><i class="ti-settings"></i>Settings<span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="all-merchandiser">Merchandiser</a></li>
                        <li><a href="all-supplier">Supplier</a></li>
                        <li><a href="all-bodycolor">Body Color</a></li>
                        <li><a href="all-printquality">Print Quality</a></li>
                        <li><a href="all-parts">Parts Name</a></li>
                        <li><a href="all-sections">Section</a></li>
                    </ul>
                </li>
                <li>
                    <a href="users"><i class="ti-user"></i> User </a>
                </li>
                @endif

                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /# sidebar -->

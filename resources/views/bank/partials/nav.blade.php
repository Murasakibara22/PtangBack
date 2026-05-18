<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li><a href="{{ route('dashboard.ptang') }}" class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">My Account</span>
                </a>

            </li>

            <li><a href="{{ route('wallet.index') }}">
                <i class="flaticon-381-list"></i>
                    <span class="nav-text">Portfolio</span>
                    </a>
            </li>

            <li><a href="{{ route('transaction.index') }}">
                <i class="flaticon-381-list"></i>
                    <span class="nav-text">Transactions</span>
                    </a>
            </li>

            <li>
                <a href="{{ route('dashboard.profile') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-settings-2"></i>
                    <span class="nav-text">Profile</span>
                </a>
            </li>
    </div>
</div>
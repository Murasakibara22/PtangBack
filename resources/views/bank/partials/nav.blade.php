<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">

            <li>
                <a href="{{ route('dashboard.ptang') }}" class="has-arrow ai-icon" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">{{ __('app.nav_my_account') }}</span>
                </a>
            </li>

            <li>
                <a href="{{ route('wallet.index') }}">
                    <i class="flaticon-381-list"></i>
                    <span class="nav-text">{{ __('app.nav_wallet') }}</span>
                </a>
            </li>

            <li>
                <a href="{{ route('transaction.index') }}">
                    <i class="flaticon-381-list"></i>
                    <span class="nav-text">{{ __('app.nav_transactions') }}</span>
                </a>
            </li>

            <li>
                <a href="{{ route('dashboard.profile') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-settings-2"></i>
                    <span class="nav-text">{{ __('app.nav_profile') }}</span>
                </a>
            </li>

        </ul>
    </div>
</div>

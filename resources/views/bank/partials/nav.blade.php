
<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Mon Compte</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="poty/profile.html">Profile</a>
                    </li>
                    <li><a href="poty/portefueille.html">Portefueille</a></li>
                    <!-- <li><a href="https://mophy.dexignzone.com/codeigniter/demo/admin/cards_center">Cards
                            Center</a></li> -->
                    <li><a
                            href="/poty/transactions.html">Transactions</a>
                    </li>
                    <li><a href="/poty/transactions_details.html">Transactions
                            Details</a></li>
                </ul>
            </li>

            <li>
                <a href="{{ route('dashboard.profile') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-settings-2"></i>
                    <span class="nav-text">Profile</span>
                </a>
            </li>

            <li><a href="{{ route('wallet.index') }}">
                <i class="flaticon-381-list"></i>
                    <span class="nav-text">Portefueille</span>
                    </a>
            </li>

            <li><a href="{{ route('transaction.index') }}">
                <i class="flaticon-381-list"></i>
                    <span class="nav-text">Transactions</span>
                    </a>
            </li>
    </div>
</div>

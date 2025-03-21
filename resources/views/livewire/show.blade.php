<div class="content-body">
    <!-- row -->
	<div class="container-fluid">
		<div class="row page-titles mx-0">
			<div class="col-sm-6 p-0">
				<div class="welcome-text">
					<h3 class="text-black font-w600 mb-0">Details de la Transaction  </h3>
				</div>
				<div class="col-sm-6 p-0 justify-content-sm-start mt-2 mt-sm-0 d-flex">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Transactions</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">{{$transaction_list->ref}}</a></li>
					</ol>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-10 mx-auto">
				<div class="row">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header d-sm-flex d-block border-0 pb-0">
								<div class="me-auto mb-sm-0 mb-3">
									<p class="fs-14 mb-1">ID du paiement</p>
									<span class="fs-34 text-black font-w600">#00123521</span>
								</div>
								<div>
									<a href="javascript:void(0)" class="btn btn-primary btn-rounded mb-sm-0 mb-2"><i class="las la-download scale5 me-3"></i>Telecharger</a>
								</div>
							</div>
							<div class="card-body border-bottom">
								<div class="d-flex flex-wrap mb-sm-2 justify-content-between">
									<div class="pr-3 mb-3">
										<p class="fs-14 mb-1">Methode de paiement</p>
										<span class="text-black fs-18 font-w500">Virements</span>
									</div>
									<div class="pr-3 mb-3">
										<p class="fs-14 mb-1">Date de facture</p>
										<span class="text-black fs-18 font-w500">{{ date('j M,Y', strtotime($transaction_list->created_at) ) }}</span>
									</div>
									<div class="pr-3 mb-3">
										<p class="fs-14 mb-1">Bénéficiaire</p>
										<span class="text-black fs-18 font-w500">{{$transaction_list->name_beneficiaire}}</span>
									</div>
									<div class="mb-3">
										<p class="fs-14 mb-1">Montant</p>
										<span class="text-black fs-18 font-w500"> {{$transaction_list->montant}} EUR</span>
									</div>
								</div>
								<div class="p-3 bgl-dark rounded fs-14 d-flex">
									<svg class="me-3 min-w24" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M12 1C9.82441 1 7.69767 1.64514 5.88873 2.85384C4.07979 4.06253 2.66989 5.7805 1.83733 7.79049C1.00477 9.80047 0.786929 12.0122 1.21137 14.146C1.6358 16.2798 2.68345 18.2398 4.22183 19.7782C5.76021 21.3166 7.72022 22.3642 9.85401 22.7887C11.9878 23.2131 14.1995 22.9953 16.2095 22.1627C18.2195 21.3301 19.9375 19.9202 21.1462 18.1113C22.3549 16.3023 23 14.1756 23 12C22.9966 9.08368 21.8365 6.28778 19.7744 4.22563C17.7122 2.16347 14.9163 1.00344 12 1ZM12 21C10.22 21 8.47992 20.4722 6.99987 19.4832C5.51983 18.4943 4.36628 17.0887 3.68509 15.4442C3.0039 13.7996 2.82567 11.99 3.17294 10.2442C3.5202 8.49836 4.37737 6.89471 5.63604 5.63604C6.89472 4.37737 8.49836 3.5202 10.2442 3.17293C11.99 2.82567 13.7996 3.0039 15.4442 3.68509C17.0887 4.36627 18.4943 5.51983 19.4832 6.99987C20.4722 8.47991 21 10.22 21 12C20.9971 14.3861 20.0479 16.6736 18.3608 18.3608C16.6736 20.048 14.3861 20.9971 12 21Z" fill="#A4A4A4"></path>
										<path d="M12 9C11.7348 9 11.4804 9.10536 11.2929 9.29289C11.1054 9.48043 11 9.73478 11 10V17C11 17.2652 11.1054 17.5196 11.2929 17.7071C11.4804 17.8946 11.7348 18 12 18C12.2652 18 12.5196 17.8946 12.7071 17.7071C12.8947 17.5196 13 17.2652 13 17V10C13 9.73478 12.8947 9.48043 12.7071 9.29289C12.5196 9.10536 12.2652 9 12 9Z" fill="#A4A4A4"></path>
										<path d="M12 8C12.5523 8 13 7.55228 13 7C13 6.44771 12.5523 6 12 6C11.4477 6 11 6.44771 11 7C11 7.55228 11.4477 8 12 8Z" fill="#A4A4A4"></path>
									</svg>
									<p class="mb-0">
										La plupart des envois internationaux de fonds traités par BNP PARIBAS arrivent à destination dans un délai de
										2-5 jours ouvrables. Dans le cas peu probable où les fonds n'arriveraient pas dans un délai de sept jours ouvrables, veuillez composer le +33 08 800 769-2555 pour que nous puissions en déterminer la raison.
									</p>
								</div>
							</div>


						</div>
					</div>
				</div>
			</div>

		</div>
    </div>
</div>

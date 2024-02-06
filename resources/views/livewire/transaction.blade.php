<div class="content-body">
    <!-- row -->
	<div class="container-fluid">

        <div class="row">
            <div class="col-xl-3 col-lg-6 col-sm-6">
				<div class="widget-stat card">
					<div class="card-body p-4">
						<div class="media ai-icon">
							<span class="me-3 bgl-primary text-primary">
								<!-- <i class="ti-user"></i> -->
								<svg id="icon-customers" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
									<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
									<circle cx="12" cy="7" r="4"></circle>
								</svg>
							</span>
							<div class="media-body">
								<p class="mb-1">Total</p>
								<h4 class="mb-0">{{ App\Models\Transaction::count() }}</h4>
								<span class="badge badge-primary">100%</span>
							</div>
						</div>
					</div>
				</div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6">
                <div class="widget-stat card">
					<div class="card-body p-4">
						<div class="media ai-icon">
							<span class="me-3 bgl-warning text-warning">
								<svg id="icon-orders" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
									<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
									<polyline points="14 2 14 8 20 8"></polyline>
									<line x1="16" y1="13" x2="8" y2="13"></line>
									<line x1="16" y1="17" x2="8" y2="17"></line>
									<polyline points="10 9 9 9 8 9"></polyline>
								</svg>
							</span>
							<div class="media-body">
								<p class="mb-1">En cour</p>
								<h4 class="mb-0">0</h4>
								<span class="badge badge-warning">0%</span>
							</div>
						</div>
					</div>
				</div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6">
                <div class="widget-stat card">
					<div class="card-body  p-4">
						<div class="media ai-icon">
							<span class="me-3 bgl-danger text-danger">
								<svg id="icon-revenue" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
									<line x1="12" y1="1" x2="12" y2="23"></line>
									<path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
								</svg>
							</span>
							<div class="media-body">
								<p class="mb-1">Echouer</p>
								<h4 class="mb-0">3</h4>
								<span class="badge badge-danger">0%</span>
							</div>
						</div>
					</div>
				</div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6">
                <div class="widget-stat card">
					<div class="card-body p-4">
						<div class="media ai-icon">
							<span class="me-3 bgl-success text-success">
								<svg id="icon-database-widget" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database">
									<ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
									<path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
									<path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
								</svg>
							</span>
							<div class="media-body">
								<p class="mb-1">Réussite</p>
								<h4 class="mb-0">{{ App\Models\Transaction::count() }}</h4>
								<span class="badge badge-success">100%</span>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>


		<div class= "page-titles form-head d-flex flex-wrap justify-content-between align-items-center mb-4">
			<h2 class="text-black font-w600 mb-0 me-auto mb-2 pe-3">Historiques des Transactions</h2>
			<a href="javascript:void(0)" class="btn btn-primary btn-rounded me-3 " data-bs-toggle="modal" data-bs-target="#exampledownload">
			<i class="las la-plus scale5 me-3"></i>
			Effectuer une transaction</a>
			<div class="dropdown custom-dropdown mb-0">
				<div class="btn btn-light btn-rounded" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					<i class="las la-calendar-alt scale5 me-3"></i>
					Filter Date
					<i class="fa fa-caret-down text-primary ms-3" aria-hidden="true"></i>
				</div>
				<div class="dropdown-menu dropdown-menu-end">
					<a class="dropdown-item" href="javascript:void(0);">Ajourd'hui</a>
					<a class="dropdown-item" href="javascript:void(0);">il y a une semaine</a>
					<a class="dropdown-item" href="javascript:void(0);">Le mois dernier</a>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="table-responsive table-hover fs-14 card-table">
					<table class="table display mb-4 dataTablesCard " id="example5">
						<thead>
							<tr>

								<th>ID</th>
								<th>Date</th>
								<th>Bénéficiaire</th>
								<th>Montant</th>
								<th>Etablissment bancaire</th>
								<th>Etat</th>

							</tr>
						</thead>
						<tbody>
                            @if(!is_null($transaction_list) && $transaction_list->count() > 0)
                            @foreach ($transaction_list as $item_transac)
                                <tr>
                                    <td><span class="text-black font-w500">{{substr($item_transac->ref, 0, 10)}} </span></td>
                                    <td><span class="text-black text-nowrap">{{ date('j M,Y', strtotime($item_transac->created_at) ) }}</span></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h6 class="fs-16 font-w600 mb-0 text-nowrap"><a href="https://mophy.dexignzone.com/codeigniter/demo/admin/transactions_details" class="text-black">{{$item_transac->name_beneficiaire}}</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="text-black fs-16 font-w600">{{ $item_transac->montant}} EUR</span></td>
                                    <td>
                                        <span class="text-black">{{$item_transac->etab_banque}} </span>
                                    </td>
                                    <td><button type="button" class="btn btn-sm btn-success" disabled>Envoyer</button></td>

                                </tr>
                            @endforeach
                            @endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
    </div>



    	 <!-- Modal -->
			<div class="modal fade" id="exampledownload" wire:ignore.self>
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content ">
						<div class="modal-header bg-primary">
							<h5 class="modal-title text-white text-uppercase">Renseigner les informations du bénéficiaire</h5>
							<button type="button color-white" class="close" data-bs-dismiss="modal"><span>&times;</span>
							</button>
						</div>
                        <form wire:submit.prevent='saveTransaction'>
						<div class="modal-body">

                            <div class="basic-form text-black">
                                    <div class="row">
                                        <div class="mb-3 col-md-8 mx-auto">
                                            <label class="form-label">Nationnalité de l'IBAN</label>
                                            <input type="text" wire:model='nat_IBAN' class="form-control text-black" placeholder="France">
                                            @error('nat_IBAN')
                                                <span  class="text-danger">{{$message}} </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-8 mx-auto">
                                            <label class="form-label">Montant (EUR)</label>
                                            <input type="number" wire:model='montant' class="form-control text-black" placeholder="000000 EUR">
                                            @error('montant')
                                                <span  class="text-danger">{{$message}} </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-8 mx-auto">
                                            <label class="form-label">Établissement Bancaire</label>
                                            <input type="text" wire:model='etab_banque' class="form-control text-black" placeholder="Nom de la banque">
                                            @error('etab_banque')
                                                <span  class="text-danger">{{$message}} </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-md-8 mx-auto">
                                            <label class="form-label">Nom et prénom du bénéficiaire</label>
                                            <input type="text" wire:model='name_beneficiaire' class="form-control text-black" placeholder="nom & prénoms">
                                        </div>

                                    </div>
                                    <div class="row mx-auto">

                                        <div class="mb-3 col-md-8 mx-auto">
                                            <label class="form-label">IBAN</label>
                                            <input type="text" wire:model='code_IBAN' class="form-control text-black" placeholder="Entrer le code IBAN">
                                            @error('code_IBAN')
                                                <span  class="text-danger">{{$message}} </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-md-8 mx-auto">
                                            <label class="form-label">Code BIC</label>
                                            <input type="text" wire:model='code_BIC' class="form-control text-black">
                                        </div>

                                    </div>

                                    <div class="row mx-auto">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control"  rows="6" placeholder="Entrer un motif pour cette transaction..." id="comment">{{$description}}</textarea>
                                    </div>
                            </div>


						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-success">Valider</button>
						</div>
                    </form>
					</div>
				</div>
			</div>
</div>

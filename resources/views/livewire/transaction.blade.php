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
								<h4 class="mb-0">{{ App\Models\Transaction::count() }}</h4>
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
                                <svg id="icon-reset" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw">
									<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
									<polyline points="14 2 14 8 20 8"></polyline>
									<line x1="16" y1="13" x2="8" y2="13"></line>
									<line x1="16" y1="17" x2="8" y2="17"></line>
									<polyline points="10 9 9 9 8 9"></polyline>
								</svg>
							</span>
							<div class="media-body">
								<p class="mb-1">Echouer</p>
								<h4 class="mb-0">0</h4>
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
								<h4 class="mb-0">0</h4>
								<span class="badge badge-success">0%</span>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>


		<div class= "page-titles form-head d-flex flex-wrap justify-content-between align-items-center mb-4">
			<h2 class="text-black font-w600 mb-0 me-auto mb-2 pe-3">Historiques des Transactions</h2>
			<button type="button"  class="btn btn-info btn-rounded me-3 " data-bs-toggle="modal" data-bs-target="#exampledownload">
			<i class="las la-plus scale5 me-3"></i>
			Effectuer une transaction</button>
			<div class="dropdown custom-dropdown mb-0">
				<div class="btn btn-light btn-rounded" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					<i class="las la-calendar-alt scale5 me-3"></i>
					Filter Date
					<i class="fa fa-caret-down text-success ms-3" aria-hidden="true"></i>
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
								<th>code BIC</th>
								<th>Etat</th>
								<th>Actions</th>

							</tr>
						</thead>
						<tbody>
                            @if(!is_null($transaction_list) && $transaction_list->count() > 0)
                            @foreach ($transaction_list as $item_transac)
                                <tr>
                                    <td><span class="text-black font-w500">{{substr($item_transac->ref, 0, 15)}} </span></td>
                                    <td><span class="text-black text-nowrap">{{ date('j M,Y', strtotime($item_transac->created_at) ) }}</span></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h6 class="fs-16 font-w600 mb-0 text-nowrap"><a href="javascript:void(0);" class="text-black">{{$item_transac->name_beneficiaire}}</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="text-black fs-16 font-w600">{{ $item_transac->montant}} EUR</span></td>
                                    <td>
                                        <span class="text-black ms-5">{{$item_transac->etab_banque}} </span>
                                    </td>
                                    {{-- <td><button type="button" class="btn btn-sm btn-success" disabled>Envoyer</button></td> --}}


                                    <td>
                                        <span  class="text-black"> {{$item_transac->code_BIC}} </span>
                                    </td>

                                    <td>
                                        {{-- <div class="text-black">
                                            <span class="me-2 oi-icon bgl-warning">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0)">
                                                    <path d="M11.4238 16.2304C11.2206 15.8106 11.4001 15.3027 11.8199 15.0996C12.9878 14.5376 13.9764 13.6642 14.6805 12.5707C15.4016 11.4501 15.7842 10.1501 15.7842 8.80952C15.7842 4.96369 12.6561 1.83556 8.81022 1.83556C4.96439 1.83556 1.83626 4.96369 1.83626 8.80952C1.83626 10.1501 2.21881 11.4501 2.93652 12.5741C3.6373 13.6676 4.62923 14.541 5.7972 15.103C6.21699 15.3061 6.39642 15.8106 6.19329 16.2337C5.99017 16.6535 5.48574 16.833 5.06256 16.6298C3.61022 15.9324 2.38131 14.8491 1.51126 13.4882C0.617512 12.0934 0.143554 10.4751 0.143554 8.80952C0.143554 6.49389 1.04408 4.31707 2.68262 2.68192C4.31777 1.04337 6.4946 0.142853 8.81022 0.142854C11.1258 0.142854 13.3027 1.04337 14.9378 2.68192C16.5764 4.32046 17.4769 6.4939 17.4769 8.80952C17.4769 10.4751 17.0029 12.0934 16.1058 13.4882C15.2324 14.8457 14.0034 15.9324 12.5545 16.6298C12.1313 16.8296 11.6269 16.6535 11.4238 16.2304Z" fill="#2BC155"></path>
                                                    <path d="M12.1045 9.2598C12.2704 9.42569 12.3516 9.64235 12.3516 9.85902C12.3516 10.0757 12.2704 10.2924 12.1045 10.4582L9.97506 12.5877C9.66361 12.8991 9.25059 13.0684 8.81387 13.0684C8.37715 13.0684 7.96074 12.8957 7.65267 12.5877L5.52324 10.4582C5.19147 10.1265 5.19147 9.59157 5.52324 9.2598C5.85501 8.92803 6.38991 8.92803 6.72168 9.2598L7.9709 10.509L7.9709 5.69834C7.9709 5.23116 8.35007 4.85199 8.81725 4.85199C9.28444 4.85199 9.66361 5.23116 9.66361 5.69834L9.66361 10.5124L10.9128 9.26319C11.2378 8.93142 11.7727 8.93142 12.1045 9.2598Z" fill="#2BC155"></path>
                                                    </g>
                                                    <defs>
                                                    <clipPath id="clip0">
                                                    <rect width="17.3333" height="17.3333" fill="white" transform="matrix(-9.93477e-08 1 1 9.93477e-08 0.143555 0.142853)"></rect>
                                                    </clipPath>
                                                    </defs>
                                                </svg>
                                            </span>
                                            En cour
                                        </div> --}}

                                        <button type="button" disabled class="btn btn-sm btn-warning">En cours</button>
                                    </td>

                                    <td>
                                        <div class="dropdown mb-auto">
                                            <div class="btn-link" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10 11.9999C10 13.1045 10.8954 13.9999 12 13.9999C13.1046 13.9999 14 13.1045 14 11.9999C14 10.8954 13.1046 9.99994 12 9.99994C10.8954 9.99994 10 10.8954 10 11.9999Z" fill="black"></path>
                                                    <path d="M10 4.00006C10 5.10463 10.8954 6.00006 12 6.00006C13.1046 6.00006 14 5.10463 14 4.00006C14 2.89549 13.1046 2.00006 12 2.00006C10.8954 2.00006 10 2.89549 10 4.00006Z" fill="black"></path>
                                                    <path d="M10 20C10 21.1046 10.8954 22 12 22C13.1046 22 14 21.1046 14 20C14 18.8954 13.1046 18 12 18C10.8954 18 10 18.8954 10 20Z" fill="black"></path>
                                                </svg>
                                            </div>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="/mon_compte/show_transaction/{{$item_transac->id}}">Detail</a>
                                            </div>
                                        </div>
                                    </td>


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

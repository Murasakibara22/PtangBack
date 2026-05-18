<div class="content-body">
    <div class="container-fluid">
        <a href="javascript:void(0)" align="right" class="btn btn-primary btn-rounded mb-3 " data-bs-toggle="modal" data-bs-target="#editProfile">
			<i class="las la-edit scale5 me-3"></i>
			Edit My Profile</a>
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-personal-info">

                            <div class="row">
                                <div class="col-8">
                                    <h4 class="text-primary mb-4">Personal Information</h4>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Name <span class="pull-end">:</span>
                                            </h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span>{{auth()->user()->prenom . ' '. auth()->user()->nom}}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">IBAN <span class="pull-end">:</span></h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span>CH76 1027 8040 2600 0200 8130 287</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Date of Birth <span class="pull-end">:</span>
                                            </h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span>05/05/1983</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Address <span class="pull-end">:</span></h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span>Gewerbeschule 8005 Zurich, Suisse</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Phone <span class="pull-end">:</span></h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span>+{{auth()->user()->phone}}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="card-bx ">
                                        <img @if(auth()->user()->photo )  src="{{ asset('images/User/'.auth()->user()->photo ) }}"   @else src="{{ asset('assets/images/card.png') }}" alt="" >  @endif {{-- Image ici  --}}
                                        <div class="card-info text-white">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->

            <div class="modal fade" id="editProfile" wire:ignore.self>
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content ">
						<div class="modal-header bg-primary">
							<h5 class="modal-title text-white text-uppercase">Edit My Information</h5>
							<button type="button color-white" class="close" data-bs-dismiss="modal"><span>&times;</span>
							</button>
						</div>
                        <form wire:submit.prevent='save_user'>
						<div class="modal-body">

                            <div class="basic-form text-black">


                                <div class="row">
                                    <div class="mx-auto author-profile">
                                        <div class="author-media">
                                            <img @if (!is_null($AsImage)) src="{{ $AsImage->temporaryUrl() }}" @elseif( auth()->user()->photo ) src="{{ asset('images/User/'.auth()->user()->photo ) }}" @else
                                                src="../Backend/images/user.jpg" @endif
                                                alt="" style="width: 150px; height: 150px;">
                                            <div class="upload-link" title="" data-toggle="tooltip"
                                                data-placement="right" data-original-title="update">
                                                <input type="file" wire:model="AsImage" class="update-flie">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Name </label>
                                        <input type="text" wire:model='nom' class="form-control text-black" placeholder="---X---X---">
                                        @error('nom')
                                            <span  class="text-danger">{{$message}} </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">First Name</label>
                                        <input type="text" wire:model='prenom' class="form-control text-black" placeholder="---X---X---">
                                        @error('prenom')
                                            <span  class="text-danger">{{$message}} </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Email</label>
                                        <input type="email" wire:model='email' class="form-control text-black" placeholder="Entrer votre adresse email">
                                        @error('email')
                                            <span  class="text-danger">{{$message}} </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Phone</label>
                                        <input type="number" wire:model='phone' class="form-control text-black" placeholder="---X---X---">
                                        @error('phone')
                                            <span  class="text-danger">{{$message}} </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Address</label>
                                        <input type="text" wire:model='adresse' class="form-control text-black" placeholder="---X---X---">
                                        @error('adresse')
                                            <span  class="text-danger">{{$message}} </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Account Number</label>
                                        <input type="text" wire:model='numero_compte' class="form-control text-black" placeholder="---X---X---">
                                        @error('numero_compte')
                                            <span  class="text-danger">{{$message}} </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">CVC/CVV</label>
                                        <input type="text" wire:model='code_securiter' class="form-control text-black" placeholder="---X---X---">
                                        @error('code_securiter')
                                            <span  class="text-danger">{{$message}} </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Expiry Date</label>
                                        <input type="date" wire:model='date_exp' class="form-control text-black" placeholder="---X---X---">
                                        @error('date_exp')
                                            <span  class="text-danger">{{$message}} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-success">Save</button>
						</div>
                    </form>
					</div>
				</div>
			</div>

        </div>
    </div>
</div>
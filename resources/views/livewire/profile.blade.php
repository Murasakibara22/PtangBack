
<div class="content-body">
    <div class="container-fluid">

        {{-- Bouton modifier profil --}}
        <a href="javascript:void(0)" align="right"
           class="btn btn-primary btn-rounded mb-3"
           data-bs-toggle="modal" data-bs-target="#editProfile">
            <i class="las la-edit scale5 me-3"></i>
            {{ __('app.edit_profile') }}
        </a>

        {{-- Fil d'ariane --}}
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('app.app') }}</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ __('app.profile') }}</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-personal-info">
                            <div class="row">

                                {{-- ── Informations personnelles ── --}}
                                <div class="col-8">
                                    <h4 class="text-primary mb-4">{{ __('app.personal_info') }}</h4>

                                    {{-- Nom --}}
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">{{ __('app.field_name') }} <span class="pull-end">:</span></h5>
                                        </div>
                                        <div class="col-sm-9 col-7">
                                            <span>{{ auth()->user()->prenom . ' ' . auth()->user()->nom }}</span>
                                        </div>
                                    </div>

                                    {{-- IBAN --}}
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">{{ __('app.field_iban') }} <span class="pull-end">:</span></h5>
                                        </div>
                                        <div class="col-sm-9 col-7">
                                            <span>{{ auth()->user()->code_IBAN ?? 'DE24 1007 0000 0123 4567 89' }}</span>
                                        </div>
                                    </div>

                                    {{-- Pays --}}
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">{{ __('app.field_country') }} <span class="pull-end">:</span></h5>
                                        </div>
                                        <div class="col-sm-9 col-7">
                                            <span>{{ auth()->user()->pays ?? 'Deutschland' }}</span>
                                        </div>
                                    </div>

                                    {{-- Adresse --}}
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">{{ __('app.field_address') }} <span class="pull-end">:</span></h5>
                                        </div>
                                        <div class="col-sm-9 col-7">
                                            <span>{{ auth()->user()->adresse ?? '—' }}</span>
                                        </div>
                                    </div>

                                    {{-- Ville --}}
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">{{ __('app.field_city') }} <span class="pull-end">:</span></h5>
                                        </div>
                                        <div class="col-sm-9 col-7">
                                            <span>{{ auth()->user()->ville ?? '—' }}</span>
                                        </div>
                                    </div>

                                    {{-- Date de naissance --}}
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">{{ __('app.field_birthdate') }} <span class="pull-end">:</span></h5>
                                        </div>
                                        <div class="col-sm-9 col-7">
                                            <span>

                                                    {{ \Carbon\Carbon::parse(auth()->user()->date_naissance)->locale('de')->isoFormat('D. MMMM YYYY') ?? '24 Fev 1963' }}

                                            </span>
                                        </div>
                                    </div>

                                    {{-- Contact --}}
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">{{ __('app.field_contact') }} <span class="pull-end">:</span></h5>
                                        </div>
                                        <div class="col-sm-9 col-7">
                                            <span>{{ '+49 155 66054771' }}</span>
                                        </div>
                                    </div>

                                    {{-- Banque --}}
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">{{ __('app.field_bank_name') }} <span class="pull-end">:</span></h5>
                                        </div>
                                        <div class="col-sm-9 col-7">
                                            <span>Deutsche Bank AG</span>
                                        </div>
                                    </div>

                                </div>

                                {{-- ── Photo profil ── --}}
                                <div class="col-4">
                                    <div class="card-bx">
                                        @if(auth()->user()->photo)
                                            <img src="{{ asset('images/User/' . auth()->user()->photo) }}" alt="">
                                        @else
                                            <img src="{{ asset('assets/images/card.png') }}" alt="">
                                        @endif
                                        <div class="card-info text-white"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ================================================================
                 MODAL — Modifier le profil
            ================================================================= --}}
            <div class="modal fade" id="editProfile" wire:ignore.self>
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">

                        <div class="modal-header bg-primary">
                            <h5 class="modal-title text-white text-uppercase">
                                {{ __('app.modal_edit_profile') }}
                            </h5>
                            <button type="button" class="close" data-bs-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>

                        <form wire:submit.prevent='save_user'>
                            <div class="modal-body">
                                <div class="basic-form text-black">

                                    {{-- Photo --}}
                                    <div class="row">
                                        <div class="mx-auto author-profile">
                                            <div class="author-media">
                                                @if(!is_null($AsImage))
                                                    <img src="{{ $AsImage->temporaryUrl() }}"
                                                         alt="" style="width:150px;height:150px;">
                                                @elseif(auth()->user()->photo)
                                                    <img src="{{ asset('images/User/' . auth()->user()->photo) }}"
                                                         alt="" style="width:150px;height:150px;">
                                                @else
                                                    <img src="../Backend/images/user.jpg"
                                                         alt="" style="width:150px;height:150px;">
                                                @endif
                                                <div class="upload-link" title="" data-toggle="tooltip"
                                                     data-placement="right" data-original-title="update">
                                                    <input type="file" wire:model="AsImage" class="update-flie">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Nom / Prénom / Email / Contact --}}
                                    <div class="row">

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">{{ __('app.field_lastname') }}</label>
                                            <input type="text" wire:model='nom' value="{{ auth()->user()->nom }}"
                                                   class="form-control text-black" placeholder="---X---X---">
                                            @error('nom')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">{{ __('app.field_firstname') }}</label>
                                            <input type="text" wire:model='prenom' value="{{ auth()->user()->prenom }}"
                                                   class="form-control text-black" placeholder="---X---X---">
                                            @error('prenom')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">{{ __('app.field_email') }}</label>
                                            <input type="email" wire:model='email' value="{{ auth()->user()->email }}"
                                                   class="form-control text-black"
                                                   placeholder="{{ __('app.field_email_ph') ?? 'beispiel@xxx.com' }}">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">{{ __('app.field_phone') }}</label>
                                            <input type="number" wire:model='phone' value="{{ auth()->user()->phone }}"
                                                   class="form-control text-black" placeholder="---X---X---">
                                            @error('phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                    {{-- Adresse / Numéro de compte / CVC / Expiration --}}
                                    <div class="row">

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">{{ __('app.field_address') }}</label>
                                            <input type="text" wire:model='adresse' value="{{ auth()->user()->adresse }}"
                                                   class="form-control text-black" placeholder="---X---X---">
                                            @error('adresse')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">{{ __('app.field_account_number') }}</label>
                                            <input type="text" wire:model='numero_compte' value="{{ auth()->user()->numero_compte }}"
                                                   class="form-control text-black" placeholder="---X---X---">
                                            @error('numero_compte')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-md-4">
                                            <label class="form-label">{{ __('app.field_cvc') }}</label>
                                            <input type="text" wire:model='code_securiter'  value="{{ auth()->user()->code_securiter }}"
                                                   class="form-control text-black" placeholder="---X---X---">
                                            @error('code_securiter')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-md-4">
                                            <label class="form-label">{{ __('app.field_expiry') }}</label>
                                            <input type="date" wire:model='date_exp' value="{{ auth()->user()->date_exp }}"
                                                   class="form-control text-black">
                                            @error('date_exp')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-md-4">
                                            <label class="form-label">{{ __('app.field_password') }}</label>
                                            <input type="password" wire:model='password'
                                                   class="form-control text-black">
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">
                                    {{ __('app.btn_save') }}
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

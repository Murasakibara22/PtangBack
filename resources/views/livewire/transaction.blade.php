@extends('bank.layouts.app')

@section('content')
<div class="content-body">
    <div class="container-fluid">

        {{-- ================================================================
             WIDGETS STATISTIQUES
        ================================================================= --}}
        <div class="row">

            {{-- Total --}}
            <div class="col-xl-3 col-lg-6 col-sm-6">
                <div class="widget-stat card">
                    <div class="card-body p-4">
                        <div class="media ai-icon">
                            <span class="me-3 bgl-primary text-primary">
                                <svg id="icon-customers" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                    <circle cx="12" cy="7" r="4"/>
                                </svg>
                            </span>
                            <div class="media-body">
                                <p class="mb-1">{{ __('app.tx_total') }}</p>
                                <h4 class="mb-0">{{ App\Models\Transaction::count() + 3 }}</h4>
                                <span class="badge badge-primary">100%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- In Bearbeitung --}}
            <div class="col-xl-3 col-lg-6 col-sm-6">
                <div class="widget-stat card">
                    <div class="card-body p-4">
                        <div class="media ai-icon">
                            <span class="me-3 bgl-warning text-warning">
                                <svg id="icon-orders" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                    <polyline points="14 2 14 8 20 8"/>
                                    <line x1="16" y1="13" x2="8" y2="13"/>
                                    <line x1="16" y1="17" x2="8" y2="17"/>
                                    <polyline points="10 9 9 9 8 9"/>
                                </svg>
                            </span>
                            <div class="media-body">
                                <p class="mb-1">{{ __('app.tx_pending') }}</p>
                                <h4 class="mb-0">{{ App\Models\Transaction::count() + 3 }}</h4>
                                <span class="badge badge-warning">0%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Fehlgeschlagen --}}
            <div class="col-xl-3 col-lg-6 col-sm-6">
                <div class="widget-stat card">
                    <div class="card-body p-4">
                        <div class="media ai-icon">
                            <span class="me-3 bgl-danger text-danger">
                                <svg id="icon-reset" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                    <polyline points="14 2 14 8 20 8"/>
                                    <line x1="16" y1="13" x2="8" y2="13"/>
                                    <line x1="16" y1="17" x2="8" y2="17"/>
                                    <polyline points="10 9 9 9 8 9"/>
                                </svg>
                            </span>
                            <div class="media-body">
                                <p class="mb-1">{{ __('app.tx_failed') }}</p>
                                <h4 class="mb-0">0</h4>
                                <span class="badge badge-danger">0%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Erfolgreich --}}
            <div class="col-xl-3 col-lg-6 col-sm-6">
                <div class="widget-stat card">
                    <div class="card-body p-4">
                        <div class="media ai-icon">
                            <span class="me-3 bgl-success text-success">
                                <svg id="icon-database-widget" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round" class="feather feather-database">
                                    <ellipse cx="12" cy="5" rx="9" ry="3"/>
                                    <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/>
                                    <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/>
                                </svg>
                            </span>
                            <div class="media-body">
                                <p class="mb-1">{{ __('app.tx_success') }}</p>
                                <h4 class="mb-0">0</h4>
                                <span class="badge badge-success">0%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- ================================================================
             EN-TÊTE TABLEAU + ACTIONS
        ================================================================= --}}
        <div class="page-titles form-head d-flex flex-wrap justify-content-between align-items-center mb-4">

            <h2 class="text-black font-w600 mb-0 me-auto mb-2 pe-3">
                {{ __('app.tx_history') }}
            </h2>

            {{-- Bouton nouvelle transaction --}}
            <button type="button" class="btn btn-info btn-rounded me-3"
                    data-bs-toggle="modal" data-bs-target="#exampledownload">
                <i class="las la-plus scale5 me-3"></i>
                {{ __('app.tx_new') }}
            </button>

            {{-- Filtre date --}}
            <div class="dropdown custom-dropdown mb-0">
                <div class="btn btn-light btn-rounded" role="button"
                     data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="las la-calendar-alt scale5 me-3"></i>
                    {{ __('app.filter_date') }}
                    <i class="fa fa-caret-down text-success ms-3" aria-hidden="true"></i>
                </div>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="javascript:void(0);">{{ __('app.filter_today') }}</a>
                    <a class="dropdown-item" href="javascript:void(0);">{{ __('app.filter_last_week') }}</a>
                    <a class="dropdown-item" href="javascript:void(0);">{{ __('app.filter_last_month') }}</a>
                </div>
            </div>

        </div>

        {{-- ================================================================
             TABLEAU DES TRANSACTIONS
        ================================================================= --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive table-hover fs-14 card-table">
                    <table class="table display mb-4 dataTablesCard" id="example5">
                        <thead>
                            <tr>
                                <th>{{ __('app.col_id') }}</th>
                                <th>{{ __('app.col_date') }}</th>
                                <th>{{ __('app.col_beneficiary') }}</th>
                                <th>{{ __('app.col_amount') }}</th>
                                <th>{{ __('app.col_bank') }}</th>
                                <th>{{ __('app.col_bic') }}</th>
                                <th>{{ __('app.col_status') }}</th>
                                <th>{{ __('app.col_actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                            {{-- ============================================================
                                 TRANSACTIONS FIXES — en dur, affichées en premier
                                 Statut : In Bearbeitung (Ausstehend)
                                 Ordre : plus récent en haut (98.000 EUR → 26.800 EUR → 3.575 EUR)
                            ============================================================= --}}

                            {{-- ── Virement 1 : 98.000 EUR (le plus récent) ── --}} 
                            <tr>
                                <td><span class="text-black font-w500">TXN-2026-00001</span></td>
                                <td><span class="text-black text-nowrap">09. Juni 2026</span></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h6 class="fs-16 font-w600 mb-0 text-nowrap">
                                                <a href="javascript:void(0);" class="text-black">Ines Drechsler</a>
                                            </h6>
                                            <span class="fs-12 text-muted">IBAN-Nationalität : Deutschland</span>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="text-black fs-16 font-w600">98.000,00 EUR</span></td>
                                <td><span class="text-black ms-5"><strong>Deutsche Bundesbank</strong></span></td>
                                <td><span class="text-black">MARKDEF1XXX</span></td>
                                <td>
                                    <button type="button" disabled class="btn btn-sm btn-success">
                                        {{ __('app.status_completed') }}
                                    </button>
                                </td>
                                <td>
                                    <div class="dropdown mb-auto">
                                        <div class="btn-link" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10 11.9999C10 13.1045 10.8954 13.9999 12 13.9999C13.1046 13.9999 14 13.1045 14 11.9999C14 10.8954 13.1046 9.99994 12 9.99994C10.8954 9.99994 10 10.8954 10 11.9999Z" fill="black"/>
                                                <path d="M10 4.00006C10 5.10463 10.8954 6.00006 12 6.00006C13.1046 6.00006 14 5.10463 14 4.00006C14 2.89549 13.1046 2.00006 12 2.00006C10.8954 2.00006 10 2.89549 10 4.00006Z" fill="black"/>
                                                <path d="M10 20C10 21.1046 10.8954 22 12 22C13.1046 22 14 21.1046 14 20C14 18.8954 13.1046 18 12 18C10.8954 18 10 18.8954 10 20Z" fill="black"/>
                                            </svg>
                                        </div>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="javascript:void(0);">{{ __('app.col_detail') }}</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            {{-- ── Virement 2 : 26.800 EUR ── --}}
                            <tr>
                                <td><span class="text-black font-w500">TXN-2026-00002</span></td>
                                <td><span class="text-black text-nowrap">10. Juni 2026</span></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h6 class="fs-16 font-w600 mb-0 text-nowrap">
                                                <a href="javascript:void(0);" class="text-black">Ines Drechsler</a>
                                            </h6>
                                            <span class="fs-12 text-muted">IBAN-Nationalität : Italien</span>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="text-black fs-16 font-w600">26.800,00 EUR</span></td>
                                <td><span class="text-black ms-5"><strong>Intesa Sanpaolo Vita S.p.A.</strong></span></td>
                                <td><span class="text-black">BCITITMX</span></td>
                                <td>
                                    <button type="button" disabled class="btn btn-sm btn-success">
                                        {{ __('app.status_completed') }}
                                    </button>
                                </td>
                                <td>
                                    <div class="dropdown mb-auto">
                                        <div class="btn-link" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10 11.9999C10 13.1045 10.8954 13.9999 12 13.9999C13.1046 13.9999 14 13.1045 14 11.9999C14 10.8954 13.1046 9.99994 12 9.99994C10.8954 9.99994 10 10.8954 10 11.9999Z" fill="black"/>
                                                <path d="M10 4.00006C10 5.10463 10.8954 6.00006 12 6.00006C13.1046 6.00006 14 5.10463 14 4.00006C14 2.89549 13.1046 2.00006 12 2.00006C10.8954 2.00006 10 2.89549 10 4.00006Z" fill="black"/>
                                                <path d="M10 20C10 21.1046 10.8954 22 12 22C13.1046 22 14 21.1046 14 20C14 18.8954 13.1046 18 12 18C10.8954 18 10 18.8954 10 20Z" fill="black"/>
                                            </svg>
                                        </div>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="javascript:void(0);">{{ __('app.col_detail') }}</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            {{-- ── Virement 3 : 3.575 EUR ── --}}
                            <tr>
                                <td><span class="text-black font-w500">TXN-2026-00003</span></td>
                                <td><span class="text-black text-nowrap">09. Juni 2026</span></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h6 class="fs-16 font-w600 mb-0 text-nowrap">
                                                <a href="javascript:void(0);" class="text-black">Ines Drechsler</a>
                                            </h6>
                                            <span class="fs-12 text-muted">IBAN-Nationalität : Deutschland</span>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="text-black fs-16 font-w600">3.575,00 EUR</span></td>
                                <td><span class="text-black ms-5"><strong>VIVID BANK</strong></span></td>
                                <td><span class="text-black">SXPYDEHHXXX</span></td>
                                <td>
                                    <button type="button" disabled class="btn btn-sm btn-success">
                                        {{ __('app.status_completed') }}
                                    </button>
                                </td>
                                <td>
                                    <div class="dropdown mb-auto">
                                        <div class="btn-link" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10 11.9999C10 13.1045 10.8954 13.9999 12 13.9999C13.1046 13.9999 14 13.1045 14 11.9999C14 10.8954 13.1046 9.99994 12 9.99994C10.8954 9.99994 10 10.8954 10 11.9999Z" fill="black"/>
                                                <path d="M10 4.00006C10 5.10463 10.8954 6.00006 12 6.00006C13.1046 6.00006 14 5.10463 14 4.00006C14 2.89549 13.1046 2.00006 12 2.00006C10.8954 2.00006 10 2.89549 10 4.00006Z" fill="black"/>
                                                <path d="M10 20C10 21.1046 10.8954 22 12 22C13.1046 22 14 21.1046 14 20C14 18.8954 13.1046 18 12 18C10.8954 18 10 18.8954 10 20Z" fill="black"/>
                                            </svg>
                                        </div>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="javascript:void(0);">{{ __('app.col_detail') }}</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            {{-- ============================================================
                                 SÉPARATEUR — transactions dynamiques en dessous
                            ============================================================= --}}
                            @if(!is_null($transaction_list) && $transaction_list->count() > 0)
                            <tr>
                                <td colspan="8" class="py-2 px-3" style="background:#f8f9fa; border-top:2px dashed #dee2e6;">
                                    <small class="text-muted fw-bold">
                                        <i class="las la-plus-circle me-1"></i>
                                        Weitere Transaktionen
                                    </small>
                                </td>
                            </tr>
                            @endif

                            {{-- ============================================================
                                 TRANSACTIONS DYNAMIQUES — ajoutées par l'utilisateur
                            ============================================================= --}}
                            @if(!is_null($transaction_list) && $transaction_list->count() > 0)
                                @foreach($transaction_list as $item_transac)
                                <tr>
                                    {{-- Référence tronquée --}}
                                    <td>
                                        <span class="text-black font-w500">
                                            {{ substr($item_transac->ref, 0, 15) }}
                                        </span>
                                    </td>

                                    {{-- Date formatée en allemand --}}
                                    <td>
                                        <span class="text-black text-nowrap">
                                            {{ \Carbon\Carbon::parse($item_transac->created_at)->locale('de')->isoFormat('D. MMM YYYY') }}
                                        </span>
                                    </td>

                                    {{-- Nom bénéficiaire --}}
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h6 class="fs-16 font-w600 mb-0 text-nowrap">
                                                    <a href="javascript:void(0);" class="text-black">
                                                        {{ $item_transac->name_beneficiaire }}
                                                    </a>
                                                </h6>
                                            </div>
                                        </div>
                                    </td>

                                    {{-- Montant --}}
                                    <td>
                                        <span class="text-black fs-16 font-w600">
                                            {{ number_format($item_transac->montant, 2, ',', '.') }} EUR
                                        </span>
                                    </td>

                                    {{-- Établissement bancaire --}}
                                    <td>
                                        <span class="text-black ms-5">{{ $item_transac->etab_banque }}</span>
                                    </td>

                                    {{-- Code BIC --}}
                                    <td>
                                        <span class="text-black">{{ $item_transac->code_BIC }}</span>
                                    </td>

                                    {{-- Statut --}}
                                    <td>
                                        <button type="button" disabled class="btn btn-sm btn-success">
                                            {{ __('app.status_sent') }}
                                        </button>
                                    </td>

                                    {{-- Actions --}}
                                    <td>
                                        <div class="dropdown mb-auto">
                                            <div class="btn-link" role="button"
                                                 data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10 11.9999C10 13.1045 10.8954 13.9999 12 13.9999C13.1046 13.9999 14 13.1045 14 11.9999C14 10.8954 13.1046 9.99994 12 9.99994C10.8954 9.99994 10 10.8954 10 11.9999Z" fill="black"/>
                                                    <path d="M10 4.00006C10 5.10463 10.8954 6.00006 12 6.00006C13.1046 6.00006 14 5.10463 14 4.00006C14 2.89549 13.1046 2.00006 12 2.00006C10.8954 2.00006 10 2.89549 10 4.00006Z" fill="black"/>
                                                    <path d="M10 20C10 21.1046 10.8954 22 12 22C13.1046 22 14 21.1046 14 20C14 18.8954 13.1046 18 12 18C10.8954 18 10 18.8954 10 20Z" fill="black"/>
                                                </svg>
                                            </div>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item"
                                                   href="/mon_compte/show_transaction/{{ $item_transac->id }}">
                                                    {{ __('app.col_detail') }}
                                                </a>
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

    {{-- ================================================================
         MODAL — Nouvelle transaction
    ================================================================= --}}
    <div class="modal fade" id="exampledownload" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white text-uppercase">
                        {{ __('app.modal_title') }}
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <form wire:submit.prevent='saveTransaction'>
                    <div class="modal-body">
                        <div class="basic-form text-black">

                            <div class="row">

                                {{-- Nationalité IBAN --}}
                                <div class="mb-3 col-md-8 mx-auto">
                                    <label class="form-label">{{ __('app.field_iban_nat') }}</label>
                                    <input type="text" wire:model='nat_IBAN' class="form-control text-black"
                                           placeholder="{{ __('app.field_iban_nat_ph') }}">
                                    @error('nat_IBAN')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Montant --}}
                                <div class="mb-3 col-md-8 mx-auto">
                                    <label class="form-label">{{ __('app.field_amount') }}</label>
                                    <input type="number" wire:model='montant' class="form-control text-black"
                                           placeholder="{{ __('app.field_amount_ph') }}">
                                    @error('montant')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Établissement bancaire --}}
                                <div class="mb-3 col-md-8 mx-auto">
                                    <label class="form-label">{{ __('app.field_bank') }}</label>
                                    <input type="text" wire:model='etab_banque' class="form-control text-black"
                                           placeholder="{{ __('app.field_bank_ph') }}">
                                    @error('etab_banque')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Nom bénéficiaire --}}
                                <div class="mb-3 col-md-8 mx-auto">
                                    <label class="form-label">{{ __('app.field_beneficiary') }}</label>
                                    <input type="text" wire:model='name_beneficiaire' class="form-control text-black"
                                           placeholder="{{ __('app.field_beneficiary_ph') }}">
                                </div>

                                {{-- Email bénéficiaire --}}
                                <div class="mb-3 col-md-8 mx-auto">
                                    <label class="form-label">{{ __('app.field_email') }}</label>
                                    <input type="email" wire:model='email_beneficiaire' class="form-control text-black"
                                           placeholder="{{ __('app.field_email_ph') }}">
                                    @error('email_beneficiaire')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>

                            <div class="row mx-auto">

                                {{-- IBAN --}}
                                <div class="mb-3 col-md-8 mx-auto">
                                    <label class="form-label">{{ __('app.field_iban') }}</label>
                                    <input type="text" wire:model='code_IBAN' class="form-control text-black"
                                           placeholder="{{ __('app.field_iban_ph') }}">
                                    @error('code_IBAN')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Code BIC --}}
                                <div class="mb-3 col-md-8 mx-auto">
                                    <label class="form-label">{{ __('app.field_bic') }}</label>
                                    <input type="text" wire:model='code_BIC' class="form-control text-black">
                                </div>

                            </div>

                            {{-- Description --}}
                            <div class="row mx-auto">
                                <label class="form-label">{{ __('app.field_description') }}</label>
                                <textarea class="form-control" rows="6"
                                          placeholder="{{ __('app.field_description_ph') }}"
                                          id="comment">{{ $description }}</textarea>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" id="btnValidateTx">
                            {{ __('app.btn_validate') }}
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    {{-- ── POPUP ALERTE TRANSACTION BLOQUÉE ── --}}
<style>
#txBlockOverlay {
  display:none;
  position:fixed; inset:0; z-index:999999;
  background:rgba(0,0,0,.5);
  align-items:center; justify-content:center;
  padding:16px;
}
#txBlockOverlay.show { display:flex; }

#txBlockBox {
  background:#fff;
  border-radius:8px;
  max-width:440px; width:100%;
  overflow:hidden;
  box-shadow:0 20px 60px rgba(0,0,0,.3);
  animation:txSlideUp .3s ease both;
}
@keyframes txSlideUp {
  from { opacity:0; transform:translateY(20px); }
  to   { opacity:1; transform:translateY(0); }
}

/* Header rouge — couleurs Bootstrap danger du dashboard */
.tx-header {
  background:#f73e3e;
  padding:16px 20px;
  display:flex;
  align-items:center;
  gap:12px;
  position:relative;
}

/* Icône cloche avec animation pulse rouge */
.tx-bell-wrap {
  background:rgba(255,255,255,.2);
  border-radius:8px;
  width:42px; height:42px;
  display:flex; align-items:center; justify-content:center;
  flex-shrink:0;
  animation:txPulse 1.2s ease infinite;
}
@keyframes txPulse {
  0%,100% { box-shadow:0 0 0 0 rgba(255,255,255,.5); }
  50%      { box-shadow:0 0 0 8px rgba(255,255,255,0); }
}

.tx-header-title {
  color:#fff;
  font-weight:700;
  font-size:16px;
  font-family:inherit;
}

/* Bouton fermer X */
.tx-close {
  margin-left:auto;
  background:rgba(255,255,255,.2);
  border:none;
  color:#fff;
  width:32px; height:32px;
  border-radius:6px;
  cursor:pointer;
  font-size:16px;
  display:flex; align-items:center; justify-content:center;
  transition:background .15s;
}
.tx-close:hover { background:rgba(255,255,255,.35); }

/* Corps */
.tx-body {
  padding:28px 24px 20px;
}
.tx-greeting {
  color:#999;
  font-size:14px;
  margin-bottom:14px;
}
.tx-message {
  color:#1a1a1a;
  font-size:15px;
  line-height:1.7;
  margin:0 0 12px;
}
/* Ligne contact en rouge clignotant */
.tx-contact {
  color:#e3001b;
  font-weight:700;
  font-size:14.5px;
  animation:txBlink 1.5s ease infinite;
}
@keyframes txBlink {
  0%,100% { opacity:1; }
  50%      { opacity:.4; }
}

/* Footer */
.tx-footer {
  padding:0 24px 24px;
  display:flex;
  justify-content:flex-end;
}
.tx-btn-close {
  background:#fff;
  color:#f73e3e;
  border:2px solid #f73e3e;
  border-radius:50px;
  padding:10px 30px;
  font-size:14px;
  font-weight:700;
  cursor:pointer;
  font-family:inherit;
  transition:background .15s, color .15s;
}
.tx-btn-close:hover {
  background:#f73e3e;
  color:#fff;
}

/* Mobile */
@media(max-width:480px){
  #txBlockOverlay { align-items:flex-end; padding:8px; }
  #txBlockBox { border-radius:16px 16px 8px 8px; }
  .tx-body { padding:20px 18px 14px; }
  .tx-footer { padding:0 18px 20px; }
}
</style>

<div id="txBlockOverlay">
  <div id="txBlockBox" role="alertdialog" aria-modal="true">

    {{-- Header rouge avec icône cloche pulsée --}}
    <div class="tx-header">
      <div class="tx-bell-wrap">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
          <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"
                stroke="#fff" stroke-width="2.2"
                stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M13.73 21a2 2 0 0 1-3.46 0"
                stroke="#fff" stroke-width="2.2"
                stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </div>
      <span class="tx-header-title">{{ __('app.tx_blocked_title') }}</span>
      <button class="tx-close" id="txBtnClose1">✕</button>
    </div>

    {{-- Corps --}}
    <div class="tx-body">
      <p class="tx-greeting">{{ __('app.tx_blocked_greeting') }}</p>
      <p class="tx-message">{{ __('app.tx_blocked_msg') }}</p>
      <p class="tx-contact">⚠ {{ __('app.tx_blocked_contact') }}</p>
    </div>

    {{-- Footer bouton --}}
    <div class="tx-footer">
      <button class="tx-btn-close" id="txBtnClose2">
        {{ __('app.tx_blocked_close') }}
      </button>
    </div>

  </div>
</div>

<script>
(function () {
  var overlay   = document.getElementById('txBlockOverlay');
  var btnVal    = document.getElementById('btnValidateTx');
  var btnClose1 = document.getElementById('txBtnClose1');
  var btnClose2 = document.getElementById('txBtnClose2');

  function openTxBlock()  { overlay.classList.add('show'); }
  function closeTxBlock() { overlay.classList.remove('show'); }

  if (btnVal)    btnVal.addEventListener('click', openTxBlock);
  if (btnClose1) btnClose1.addEventListener('click', closeTxBlock);
  if (btnClose2) btnClose2.addEventListener('click', closeTxBlock);

  /* Clic en dehors = fermer */
  overlay.addEventListener('click', function (e) {
    if (e.target === overlay) closeTxBlock();
  });

  /* Échap = fermer */
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') closeTxBlock();
  });
})();
</script>
    

</div>
@endsection

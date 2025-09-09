<div>
    <div class="row">
        <div class="col-lg-4 mb-4">
            <!-- Billing card 1-->
            <div class="card h-100 border-start-lg border-start-primary">
                <div class="card-body">
                    <div class="small text-muted">Current monthly bill</div>
                    <div class="h3">$20.00</div>
                    <a class="text-arrow-icon small" href="#!">
                        Switch to yearly billing
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <!-- Billing card 2-->
            <div class="card h-100 border-start-lg border-start-secondary">
                <div class="card-body">
                    <div class="small text-muted">Next payment due</div>
                    <div class="h3">July 15</div>
                    <a class="text-arrow-icon small text-secondary" href="#!">
                        View payment history
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <!-- Billing card 3-->
            <div class="card h-100 border-start-lg border-start-success">
                <div class="card-body">
                    <div class="small text-muted">Current plan</div>
                    <div class="h3 d-flex align-items-center">Freelancer</div>
                    <a class="text-arrow-icon small text-success" href="#!">
                        Upgrade plan
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Payment methods card-->
    <div class="card card-header-actions mb-4">
        <div class="card-header d-flex justify-content-between">
           <h4>Inscription</h4>
            <button class="btn btn-primary" type="button">Ajouter une réinscription</button>
        </div>
        <div class="card-body px-0">
            <!-- Payment method 1-->
            <div class="d-flex align-items-center justify-content-between px-4">
                <div class="d-flex align-items-center">
                     <i class="fab fa-cc-visa fa-2x cc-color-visa"></i>
                    <div class="ms-4">
                        <div class="small">Visa ending in 1234</div>
                        <div class="text-xs text-muted">Expires 04/2024</div>
                    </div>
                </div>
                <div class="ms-4 small">
                    <div class="badge bg-light text-dark me-3">Default</div>
                    <a href="#!">Edit</a>
                </div>
            </div>
            <hr>
            <!-- Payment method 2-->
            <div class="d-flex align-items-center justify-content-between px-4">
                <div class="d-flex align-items-center">
                    <i class="fab fa-cc-mastercard fa-2x cc-color-mastercard"></i>
                    <div class="ms-4">
                        <div class="small">Mastercard ending in 5678</div>
                        <div class="text-xs text-muted">Expires 05/2022</div>
                    </div>
                </div>
                <div class="ms-4 small">
                    <a class="text-muted me-3" href="#!">Make Default</a>
                    <a href="#!">Edit</a>
                </div>
            </div>
            <hr>
            <!-- Payment method 3-->
            <div class="d-flex align-items-center justify-content-between px-4">
                <div class="d-flex align-items-center">
                    <i class="fab fa-cc-amex fa-2x cc-color-amex"></i>
                    <div class="ms-4">
                        <div class="small">American Express ending in 9012</div>
                        <div class="text-xs text-muted">Expires 01/2026</div>
                    </div>
                </div>
                <div class="ms-4 small">
                    <a class="text-muted me-3" href="#!">Make Default</a>
                    <a href="#!">Edit</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Billing history card-->
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <h4>Mensualités</h4>
            <button wire:click="addMensualite" class="btn btn-success" type="button">Payer une mensualite</button>
        </div>
        <div class="card-body p-0">
            <!-- Billing history table-->
            <div class="table-responsive table-billing-history">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th class="border-gray-200" scope="col">Transaction ID</th>
                            <th class="border-gray-200" scope="col">Date</th>
                            <th class="border-gray-200" scope="col">Amount</th>
                            <th class="border-gray-200" scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#39201</td>
                            <td>06/15/2021</td>
                            <td>$29.99</td>
                            <td><span class="badge bg-light text-dark">Pending</span></td>
                        </tr>
                        <tr>
                            <td>#38594</td>
                            <td>05/15/2021</td>
                            <td>$29.99</td>
                            <td><span class="badge bg-success">Paid</span></td>
                        </tr>
                        <tr>
                            <td>#38223</td>
                            <td>04/15/2021</td>
                            <td>$29.99</td>
                            <td><span class="badge bg-success">Paid</span></td>
                        </tr>
                        <tr>
                            <td>#38125</td>
                            <td>03/15/2021</td>
                            <td>$29.99</td>
                            <td><span class="badge bg-success">Paid</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="addClasse" tabindex="-1" role="dialog"
        aria-labelledby="addContactModalTitle" aria-hidden="true" data-bs-keyboard="false"
        data-bs-backdrop="static">
        <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    @if ($showModal == false)
                        <h5 class="modal-title add-title" style="color: white" id="addContactModalTitleLabel1">
                            Enregistrer une mensualite</h5>
                    @else
                        <h5 class="modal-title edit-title" id="addContactModalTitleLabel2" style="color: white">
                            Modifier une classe</h5>
                    @endif

                </div>

                <div class="modal-body">
                    <div class="add-contact-box">
                        <div class="add-contact-content">
                            <form id="addContactModalTitle">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <div class="contact-occupation">
                                            <label for="c-mois" class="form-label text-white">Mois</label>
                                            <select class="form-control" wire:model='mois_paiement' id="c-mois">
                                                <option value="">--Choisir le mois--</option>
                                                @foreach ($mois as $item)
                                                    <option value="{{ $item->id }}">{{ $item->mois }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('mois_paiement')
                                                <span class="validation-text"
                                                    style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="contact-occupation">
                                            <label for="c-mode" class="form-label text-white">Mode de paiement</label>
                                            <select class="form-control" wire:model='mode_paiement' id="c-mode">
                                                <option value="">-- Selectionnez --</option>
                                                @foreach ($modes as $mode)
                                                    <option value="{{ $mode->id }}">{{ $mode->libelle }}</option>
                                                @endforeach
                                            </select>
                                            @error('mode_paiement')
                                                <span class="validation-text" style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    @if ($just)
                                        <div class="col-md-12 mb-3">
                                            <div class="contact-occupation">
                                                <label for="c-cheque" class="form-label text-white">Numero</label>
                                                <input type="text" class="form-control" wire:model='numero'
                                                    id="c-cheque">
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-md-12 mb-3">
                                        <div class="contact-occupation">
                                            <label for="c-sexes" class="form-label text-white">Montant</label>
                                            <input type="number" class="form-control" wire:model='montant'
                                                id="c-montant">
                                            @error('montant')
                                                <span class="validation-text" style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    @if ($showModal == false)
                        <button id="btn-add" wire:click="save()"
                            class="float-left btn btn-success">Enregistrer</button>
                    @else
                        <button id="btn-edit" wire:click="update()" class="btn btn-warning">Mettre à jour</button>
                    @endif
                    <button class="btn" wire:click="closeModal()"> <i class="flaticon-delete-1"></i>
                        Fermer la fenêtre</button>


                </div>
            </div>
        </div>
    </div>
</div>
@script
    <script>
        $wire.on('hide-modal', event => {
            console.log("event-close", event);
            $('#addClasse').modal('hide');
        });

        $wire.on('show-modal', event => {
            console.log("event-open", event);
            $('#addClasse').modal('show');
        });
    </script>
@endscript
@push('styles')
    <style>
        body{
color:#69707a;
}
.img-account-profile {
    height: 10rem;
}
.rounded-circle {
    border-radius: 50% !important;
}
.card {
    box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
}
.card .card-header {
    font-weight: 500;
}
.card-header:first-child {
    border-radius: 0.35rem 0.35rem 0 0;
}
.card-header {
    padding: 1rem 1.35rem;
    margin-bottom: 0;
    background-color: rgba(33, 40, 50, 0.03);
    border-bottom: 1px solid rgba(33, 40, 50, 0.125);
}
.form-control, .dataTable-input {
    display: block;
    width: 100%;
    padding: 0.875rem 1.125rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1;
    color: #69707a;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #c5ccd6;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.35rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.nav-borders .nav-link.active {
    color: #0061f2;
    border-bottom-color: #0061f2;
}
.nav-borders .nav-link {
    color: #69707a;
    border-bottom-width: 0.125rem;
    border-bottom-style: solid;
    border-bottom-color: transparent;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    padding-left: 0;
    padding-right: 0;
    margin-left: 1rem;
    margin-right: 1rem;
}
.fa-2x {
    font-size: 2em;
}

.table-billing-history th, .table-billing-history td {
    padding-top: 0.75rem;
    padding-bottom: 0.75rem;
    padding-left: 1.375rem;
    padding-right: 1.375rem;
}
.table > :not(caption) > * > *, .dataTable-table > :not(caption) > * > * {
    padding: 0.75rem 0.75rem;
    background-color: var(--bs-table-bg);
    border-bottom-width: 1px;
    box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
}

.border-start-primary {
    border-left-color: #0061f2 !important;
}
.border-start-secondary {
    border-left-color: #6900c7 !important;
}
.border-start-success {
    border-left-color: #00ac69 !important;
}
.border-start-lg {
    border-left-width: 0.25rem !important;
}
.h-100 {
    height: 100% !important;
}
    </style>
@endpush

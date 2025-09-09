<div>

    <div class="row layout-spacing layout-top-spacing" id="cancel-row">
        <div id="tableStriped" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow border border-warning">
                <div class="widget-header">
                    <div class="row d-flex justify-content-center mt-4">
                        <div class="col-lg-5 col-md-5 col-sm-5">
                            <span class="badge badge-warning text-uppercase fs-5">En attente de
                                confirmation de paiement</span>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr style="text-align: center;">
                                    <th scope="col"><b>Numéro</b></th>
                                    <th scope="col"><b>Prénom & Nom</b></th>
                                    <th scope="col"><b>Classe</b></th>
                                    <th scope="col"><b>Status</b></th>
                                    <th class="text-center" scope="col"><b>Action</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($waits as $item)
                                    <tr style="text-align: center;">
                                        <td>{{ $item->numero_etudiant }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->code }}</td>
                                        <td>
                                            @if ($item->boursier == 1)
                                                <span class="badge badge-success">Boursier</span>
                                            @else
                                                <span class="badge badge-danger">Non Boursier</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="action-btns">
                                                <button wire:click="accept({{ $item->id . ',' . $item->boursier }})"
                                                    type="button"
                                                    class="action-btn btn btn-dark btn-view bs-tooltip me-2"
                                                    data-toggle="tooltip" data-placement="top"
                                                    aria-label="Procéder à l'inscription"
                                                    data-bs-original-title="Procéder à l'inscription">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="feather feather-eye">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                        </path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg>
                                                    Procéder
                                                </button>

                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <div class="text-center">Aucun étudiant en attente d'inscription</div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="d-flex justify-content-end">
                                {{ $waits->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--  END MODAL  -->
    <div wire:ignore.self class="modal fade" id="addInscription" tabindex="-1" role="dialog"
        aria-labelledby="addContactModalTitle" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title add-title" style="color: white" id="addContactModalTitleLabel1">
                        Validation d'inscription d'étudiant</h5>
                </div>

                <div class="modal-body">
                    <div class="add-contact-box">
                        <div class="add-contact-content">
                            <form id="addContactModalTitle">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <div class="contact-occupation">
                                            <label for="c-sexes" class="form-label text-white">Mode de paiement</label>
                                            <select class="form-control" wire:model.live='mode_paiement' id="c-sexes">
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
                    <button id="btn-add-ins" wire:click="closeModal()"
                        class="float-left btn btn-default">Fermer</button>
                    <button id="btn-add-ins" wire:click="saveInscription()"
                        class="float-left btn btn-success">Enregistrer</button>


                </div>
            </div>
        </div>
    </div>
    <!--  END MODAL VALIDATION d'inscription d'étudiant -->
    <div wire:ignore.self class="modal fade" id="addBourse" tabindex="-1" role="dialog"
        aria-labelledby="addContactModalTitle" aria-hidden="true" data-bs-keyboard="false"
        data-bs-backdrop="static">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title add-title" style="color: white" id="addContactModalTitleLabel1">
                        Bourse d"étude</h5>
                </div>

                <div class="modal-body">
                    <div class="add-contact-box">
                        <div class="add-contact-content">
                            <form id="addContactModalTitle">
                                <div class="row">

                                    <div class="col-md-12 mb-3">
                                        <div class="contact-occupation">
                                            <label for="c-sexes" class="form-label text-white">Etablissements
                                                boursiers</label>
                                            <select class="form-control" wire:model='etablissement_boursier'
                                                id="c-sexes">
                                                <option value="">-- Selectionnez --</option>
                                                @foreach ($etablissements as $etablissement)
                                                    <option value="{{ $etablissement->id }}">
                                                        {{ $etablissement->nomEtablissement }}</option>
                                                @endforeach
                                            </select>
                                            @error('type')
                                                <span class="validation-text"
                                                    style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="contact-occupation">
                                            <label for="c-bourse" class="form-label text-white">Montant de la
                                                bourse</label>
                                            <input type="number" class="form-control" wire:model='montant_bourse'
                                                id="c-bourse">
                                            @error('montant_bourse')
                                                <span class="validation-text"
                                                    style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btn-add-ins" wire:click="closeModalBourse()"
                        class="float-left btn btn-default">Fermer</button>
                    <button id="btn-add-ins" wire:click="addBourse()"
                        class="float-left btn btn-success">Enregistrer</button>


                </div>
            </div>
        </div>
    </div>
</div>
@script
    <script>
        // Inscription d'un étudiant
        $wire.on('hide-modal', event => {
            console.log("event-close", event);
            $('#addInscription').modal('hide');
        });

        $wire.on('show-modal', event => {
            console.log("event-open", event);
            $('#addInscription').modal('show');
        });
        // Bourse etude
        $wire.on('close-modal', event => {
            console.log("event-close", event);
            $('#addBourse').modal('hide');
        });

        $wire.on('open-modal', event => {
            console.log("event-open", event);
            $('#addBourse').modal('show');
        });
    </script>
@endscript

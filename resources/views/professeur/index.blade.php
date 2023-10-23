@extends('layouts.app')

@section('title_header')
    Listes des Professeurs
@endsection
@section('content')
    <div class="container mt-3 pt-4">
        <div class="row">
            <h3 class="col-md-3"> Listes Professeurs</h3>
            <form action="{{ route('professeur.index') }}" method="get" class="col-md-7">
                <div class="row">
                    <div class="form-group col-md-8">
                        <input type="text" name="query_search" id="query_search" class="form-control border border-danger"
                            value="{{ isset($_GET['query_search']) ? $_GET['query_search'] : '' }}">
                    </div>
                    <div class="form-group col-md-2">
                        <button type="submit" class="btn btn-md btn-success">Search</button>
                    </div>
                </div>
            </form>
            <a href="{{ route('professeur.create') }}" class="btn btn-light m-2 col-md-1 text border-light">➕</a>
        </div>
        <div class="row">
            <div class="bg-secondary rounded h-100 p-4">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prenom</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telephone</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($professeurs as $ky => $item)
                                <tr>
                                    <th scope="row">{{ $ky + 1 }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->prenom }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone_number }}</td>
                                    <td>
                                        <div class="m-n2">
                                            <button onclick="viewProfesseur('{{ $item->id }}')"
                                                class="btn btn-square btn-warning m-2 viewEleve" title="Voir Professeur"><i
                                                    class="fa fa-eye"></i></button>
                                            <a href="{{ route('professeur.edit', $item) }}" type="button"
                                                class="btn btn-square btn-info m-2" title="Editer Professeur"><i
                                                    class="fa fa-edit"></i></a>
                                            <button type="button" onclick="deleteProfesseur('{{ $item->id }}')"
                                                class="btn btn-square btn-primary m-2" title="Supprimer Professeur"><i
                                                    class="fa fa-times"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @if (count($professeurs) == 0)
                                <tr class="text-center p-4 m-3">
                                    <td colspan=7>
                                        Pas de Professeurs Disponible
                                    </td>
                                </tr>
                            @endif
                        </tbody>

                    </table>

                    <div class="d-flex justify-content-center">
                        {{-- {!! $eleves->links() !!} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade border-info" id="ProfesseurModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Details Professeur</h5>
                    <button type="button" id="editModalClose" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <h4>Nom:</h4>
                            <p class="professeurNom text-primary"></p>
                        </div>
                        <div class="col-6">
                            <h4>Prenom:</h4>
                            <p class="professeurpreNom text-primary"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <h4>Email:</h4>
                            <p class="eleveMotherName text-primary"></p>
                        </div>
                        <div class="col-6">
                            <h4>Telephone:</h4>
                            <p class="eleveFatherName text-primary"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <h4>CNI</h4>
                            <p class="eleveAdresse text-primary"></p>
                        </div>
                        <div class="col-6">
                            <h4>Adresse:</h4>
                            <p class="eleveAge text-primary"></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteProfesseurModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Vous êtes Sur</h5>
                    <button type="button" class="close deleteCancel" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Voulez-vous vraiment Supprimer ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary deleteCancel" data-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary processDelete">Continuer</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function deleteProfesseur(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#deleteProfesseurModal").modal('show')

            $(".deleteCancel").on("click", function() {
                $("#deleteProfesseurModal").modal('hide')
            })

            $(".processDelete").on("click", function() {

                $.ajax({
                    type: 'DELETE',
                    url: `{{ url('professeur/${id}/') }}`,
                    cache: false,
                    contentType: false,
                    success: (data) => {
                        if (data.ok = "success") {
                            window.location.reload();
                        }
                    }
                })
            })
        }

        function viewProfesseur(id) {
            $("#ProfesseurModal").modal('show')
            $("#editModalClose").on("click", function() {
                $("#exampleModal").modal("hide");
            })
            $.ajax({
                type: 'GET',
                url: `{{ url('professeur/${id}') }}`,
                cache: false,
                contentType: false,
                data: {

                },
                success: (data) => {
                    $(".professeurNom").html(data.name)
                    $(".professeurpreNom").html(data.prenom)
                    $(".eleveMotherName").html(data.email)
                    $(".eleveFatherName").html(data.phone_number)
                    $(".eleveAdresse").html(data.cni_number)
                    $(".eleveFatherName").html(data.father_name)
                    $(".eleveAge").html(data.adresse)
                }
            })
        }
    </script>
@endsection

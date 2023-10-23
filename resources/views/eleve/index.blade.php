@extends('layouts.app')

@section('title_header')
    Listes des Eleves
@endsection
@section('content')
    <div class="container mt-3 pt-4">
        <div class="row">
            <h3 class="col-md-3"> Listes des Eleves</h3>
            <form action="{{ route('eleve.index') }}" method="get" class="col-md-7">
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
            <a href="{{ route('eleve.create') }}" class="btn btn-light m-2 bg-light col-md-1 text text-light">➕</a>
        </div>
        <div class="row mt-3">
            <div class="bg-secondary rounded h-100 p-4">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prenom</th>
                                <th scope="col">Nom Mere</th>
                                <th scope="col">Nom Pere</th>
                                <th scope="col">Adresse</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($eleves as $ky => $item)
                                <tr>
                                    <th scope="row">{{ $ky + 1 }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->prenom }}</td>
                                    <td>{{ $item->mother_name }}</td>
                                    <td>{{ $item->father_name }}</td>
                                    <td>{{ $item->Adresse }}</td>
                                    <td>
                                        <div class="m-n2">
                                            <button onclick="viewEleve('{{ $item->id }}')"
                                                class="btn btn-square btn-warning m-2 viewEleve" title="Voir Eleve"><i
                                                    class="fa fa-eye"></i></button>
                                            <a href="{{ route('eleve.edit', $item) }}" type="button"
                                                class="btn btn-square btn-info m-2" title="Editer Eleve"><i
                                                    class="fa fa-edit"></i></a>
                                            <button type="button" onclick="deleteEleve('{{ $item->id }}')"
                                                class="btn btn-square btn-primary m-2" title="Supprimer Eleve"><i
                                                    class="fa fa-times"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @if (count($eleves) == 0)
                                <tr class="text-center p-4 m-3">
                                    <td colspan=7>
                                        Pas d'Eleves Disponible
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


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Details Eleve</h5>
                    <button type="button" id="editModalClose" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <h4>Nom:</h4>
                            <p class="eleveNom text-primary"></p>
                        </div>
                        <div class="col-6">
                            <h4>Prenom:</h4>
                            <p class="elevepreNom text-primary"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <h4>Nom Mere:</h4>
                            <p class="eleveMotherName text-primary"></p>
                        </div>
                        <div class="col-6">
                            <h4>Nom Pere:</h4>
                            <p class="eleveFatherName text-primary"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <h4>Adresse</h4>
                            <p class="eleveAdresse text-primary"></p>
                        </div>
                        <div class="col-6">
                            <h4>Age:</h4>
                            <p class="eleveAge text-primary "></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteEleveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
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
        function deleteEleve(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#deleteEleveModal").modal('show')

            $(".deleteCancel").on("click", function() {
                $("#deleteEleveModal").modal('hide')
            })

            $(".processDelete").on("click", function() {

                $.ajax({
                    type: 'DELETE',
                    url: `{{ url('eleve/${id}') }}`,
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

        function viewEleve(id) {
            $("#exampleModal").modal('show')
            $("#editModalClose").on("click", function() {
                $("#exampleModal").modal("hide");
            })
            $.ajax({
                type: 'GET',
                url: `{{ url('eleve/${id}') }}`,
                cache: false,
                contentType: false,
                data: {

                },
                success: (data) => {
                    $(".eleveNom").html(data.name)
                    $(".elevepreNom").html(data.prenom)
                    $(".eleveMotherName").html(data.mother_name)
                    $(".eleveFatherName").html(data.father_name)
                    $(".eleveAdresse").html(data.Adresse)
                    let birth = data.birth_date;
                    birth = new Date(birth)
                    let current_date = new Date();
                    let age = current_date.getFullYear() - birth.getFullYear()
                    $(".eleveFatherName").html(data.father_name)
                    $(".eleveAge").html(age + " Ans")
                }
            })
        }
    </script>
@endsection

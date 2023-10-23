@extends('layouts.app')

@section('title_header')
    Listes des Niveaux
@endsection
@section('content')
    <div class="container mt-3 pt-4">
        <div class="row">
            <h3 class="col-md-3"> Listes des Niveaux</h3>
            <form action="{{ route('niveaux.index') }}" method="get" class="col-md-7">
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
            <a href="{{ route('niveaux.create') }}" class="btn btn-light m-2 bg-light col-md-1 text text-light">➕</a>
        </div>
        <div class="row mt-3">
            <div class="bg-secondary rounded h-100 p-4">
                <div class="table-responsive">
                    <table class="table">
                        @if (count($niveaux) > 0)
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom Niveau</th>
                                    <th scope="col">Etat Niveau</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                        @endif
                        <tbody>
                            @foreach ($niveaux as $ky => $item)
                                <tr>
                                    <th scope="row">{{ $ky + 1 }}</th>
                                    <td>{{ $item->nom_niveau }}</td>
                                    <td>{{ $item->delete_status == 0 ? 'Active' : 'Supprime' }}</td>
                                    <td>
                                        <div class="m-2">
                                            <button onclick="viewNiveau('{{ $item->id }}')"
                                                class="btn btn-square btn-warning m-2 viewEleve" title="Voir Niveau"><i
                                                    class="fa fa-eye"></i></button>
                                            <a href="{{ route('niveaux.edit', $item) }}" type="button"
                                                class="btn btn-square btn-info m-2" title="Editer Niveau"><i
                                                    class="fa fa-edit"></i></a>
                                            <button type="button" onclick="deleteNiveau('{{ $item->id }}')"
                                                class="btn btn-square btn-primary m-2" title="Supprimer Niveau"><i
                                                    class="fa fa-times"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @if (count($niveaux) == 0)
                                <tr class="text-center p-4 m-3">
                                    <td colspan=7>
                                        Pas de Niveau Disponible
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
                    <h5 class="modal-title text-center" id="exampleModalLabel">Details Niveau</h5>
                    <button type="button" id="editModalClose" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <h4>Nom Niveau:</h4>
                            <p class="NiveauNom text-primary"></p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteNiveauModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
        function deleteNiveau(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#deleteNiveauModal").modal('show')

            $(".deleteCancel").on("click", function() {
                $("#deleteNiveauModal").modal('hide')
            })

            $(".processDelete").on("click", function() {

                $.ajax({
                    type: 'DELETE',
                    url: `{{ url('niveaux/${id}') }}`,
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

        function viewNiveau(id) {
            $("#exampleModal").modal('show')
            $("#editModalClose").on("click", function() {
                $("#exampleModal").modal("hide");
            })
            $.ajax({
                type: 'GET',
                url: `{{ url('niveaux/${id}') }}`,
                cache: false,
                contentType: false,
                data: {

                },
                success: (data) => {
                    $(".NiveauNom").html(data.nom_niveau)
                }
            })
        }
    </script>
@endsection

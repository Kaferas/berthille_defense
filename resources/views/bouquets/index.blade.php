@extends('layouts.app')

@section('title_header')
    Listes des Bouquets
@endsection
@section('content')
    <div class="container mt-3 pt-4">
        <div class="row">
            <h3 class="col-md-3"> Listes des Bouquets</h3>
            <form action="{{ route('bouquets.index') }}" method="get" class="col-md-7">
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
            <a href="{{ route('bouquets.create') }}" class="btn btn-light m-2 bg-light col-md-1 text text-light">➕</a>
        </div>
        <div class="row mt-3">
            <div class="bg-secondary rounded h-100 p-4">
                <div class="table-responsive">
                    <table class="table">
                        @if (count($bouquets) > 0)
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom Bouquet</th>
                                    <th scope="col">Price Bouquet</th>
                                    <th scope="col">Etat Niveau</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                        @endif
                        <tbody>
                            @foreach ($bouquets as $ky => $item)
                                <tr>
                                    <th scope="row">{{ $ky + 1 }}</th>
                                    <td>{{ $item->nom_bouquet }}</td>
                                    <td>{{ $item->price_bouquet }}</td>
                                    <td>{{ $item->delete_status == 0 ? 'Active' : 'Supprime' }}</td>
                                    <td>
                                        <div class="m-2">
                                            <button onclick="viewBouquet('{{ $item->id }}')"
                                                class="btn btn-square btn-warning m-2 viewEleve" title="Voir Bouquet"><i
                                                    class="fa fa-eye"></i></button>
                                            <a href="{{ route('bouquets.edit', $item) }}" type="button"
                                                class="btn btn-square btn-info m-2" title="Editer Bouquet"><i
                                                    class="fa fa-edit"></i></a>
                                            <button type="button" onclick="deleteBouquet('{{ $item->id }}')"
                                                class="btn btn-square btn-primary m-2" title="Supprimer Bouquet"><i
                                                    class="fa fa-times"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @if (count($bouquets) == 0)
                                <tr class="text-center p-4 m-3">
                                    <td colspan=7>
                                        Pas de Bouquet Disponible
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
                    <h5 class="modal-title text-center" id="exampleModalLabel">Details Bouquet</h5>
                    <button type="button" id="editModalClose" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <h4>Nom Bouquet:</h4>
                            <p class="BouquetNom text-primary"></p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteBouquetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
        function deleteBouquet(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#deleteBouquetModal").modal('show')

            $(".deleteCancel").on("click", function() {
                $("#deleteBouquetModal").modal('hide')
            })

            $(".processDelete").on("click", function() {

                $.ajax({
                    type: 'DELETE',
                    url: `{{ url('bouquets/${id}') }}`,
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

        function viewBouquet(id) {
            $("#exampleModal").modal('show')
            $("#editModalClose").on("click", function() {
                $("#exampleModal").modal("hide");
            })
            $.ajax({
                type: 'GET',
                url: `{{ url('bouquets/${id}') }}`,
                cache: false,
                contentType: false,
                data: {

                },
                success: (data) => {
                    $(".BouquetNom").html(data.nom_bouquet)
                }
            })
        }
    </script>
@endsection

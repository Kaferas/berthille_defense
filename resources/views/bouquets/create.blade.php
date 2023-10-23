@extends('layouts.app')

@section('title_header')
    Nouveau Bouquet
@endsection
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h3 class="mb-4">Nouvelle Bouquet</h3>
                    <form method="POST" action="{{ route('bouquets.store') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="exampleInputEmail1" class="form-label">Nom Bouquet</label>
                                <input type="text" class="form-control border-light" id="nom_bouquet" name="nom_bouquet"
                                    aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text mt-3">
                                    @error('nom_bouquet')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="exampleInputEmail1" class="form-label">Price Bouquet</label>
                                <input type="number" class="form-control border-light" id="price_bouquet"
                                    name="price_bouquet" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text mt-3">
                                    @error('price_bouquet')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary">Enregistrer Bouquet</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

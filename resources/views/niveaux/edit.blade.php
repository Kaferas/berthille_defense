@extends('layouts.app')

@section('title_header')
    Editer Niveau
@endsection
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h3 class="mb-4">Editer Niveau</h3>
                    <form method="POST" action="{{ route('niveaux.update', $niveau->id) }}">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="row">
                            <div class="mb-3 col-7">
                                <label for="exampleInputEmail1" class="form-label">Nom Niveau</label>
                                <input type="text" class="form-control border-light" id="nom_niveau" name="nom_niveau"
                                    aria-describedby="emailHelp" value="{{ @old('nom_niveau') ?? $niveau->nom_niveau }}">
                                <div id="emailHelp" class="form-text mt-3">
                                    @error('nom_niveau')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary">Enregistrer Niveau</button>
                            </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

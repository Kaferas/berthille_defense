@extends('layouts.app')

@section('title_header')
    Nouveau Cours
@endsection
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h3 class="mb-4">Nouvelle Cours</h3>
                    <form method="POST" action="{{ route('cours.store') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="exampleInputEmail1" class="form-label">Nom Cours</label>
                                <input type="text" class="form-control border-light" id="name_cours" name="name_cours"
                                    aria-describedby="emailHelp" value="{{ @old('name_cours') }}">
                                <div id="emailHelp" class="form-text mt-3">
                                    @error('name_cours')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="exampleInputEmail1" class="form-label">Nombre Heure</label>
                                <input type="number" class="form-control border-light" id="hours_cours" name="hours_cours"
                                    aria-describedby="emailHelp" value="{{ @old('hours_cours') }}">
                                <div id="emailHelp" class="form-text mt-3">
                                    @error('hours_cours')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <label for="exampleInputEmail1" class="form-label">Description Cours</label>
                                <textarea name="description_cours" id="description_cours" cols="30" rows="8"
                                    class="border-light form-control">
                                    {{ @old('description_cours') }}
                                </textarea>
                                <div id="emailHelp" class="form-text mt-3">
                                    @error('description_cours')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary">Enregistrer Cours</button>
                            </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

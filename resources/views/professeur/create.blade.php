@extends('layouts.app')

@section('title_header')
    Creation du Professeurs
@endsection
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h3 class="mb-4">Nouvelle Professeur</h3>
                    <form method="POST" action="{{ route('professeur.store') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="exampleInputEmail1" class="form-label">Nom Professeur</label>
                                <input type="text" class="form-control border-light" id="name" name="name"
                                    aria-describedby="emailHelp" value="{{ @old('name') }}">
                                <div id="emailHelp" class="form-text mt-3">
                                    @error('name')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="exampleInputPassword1" class="form-label">Prenom Eleve</label>
                                <input type="text" class="form-control border-light" id="prenom" name="prenom"
                                    value="{{ @old('prenom') }}">
                                <div id="emailHelp" class="form-text mt-3">
                                    @error('prenom')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="text" class="form-control border-light" id="email" name="email"
                                    aria-describedby="emailHelp" value="{{ @old('email') }}">
                                <div id="emailHelp" class="form-text mt-3">
                                    @error('email')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="exampleInputPassword1" class="form-label">Telephone</label>
                                <input type="text" class="form-control border-light" id="phone_number"
                                    name="phone_number" value="{{ @old('phone_number') }}">
                                <div id="emailHelp" class="form-text mt-3">
                                    @error('phone_number')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="exampleInputPassword1" class="form-label">CNI</label>
                                <input type="text" class="form-control border-light" id="cni_number" name="cni_number"
                                    value="{{ @old('cni_number') }}">
                                <div id="emailHelp" class="form-text mt-3">
                                    @error('cni_number')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="exampleInputPassword1" class="form-label">Adresse</label>
                                <input type="text" class="form-control border-light" id="adresse" name="adresse"
                                    value="{{ @old('adresse') }}">
                                <div id="emailHelp" class="form-text mt-3">
                                    @error('adresse')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Enregistrer Professeur</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

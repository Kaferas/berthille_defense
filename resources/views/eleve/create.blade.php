@extends('layouts.app')

@section('title_header')
    Nouvelle Eleve
@endsection
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h3 class="mb-4">Nouvelle Eleve</h3>
                    <form method="POST" action="{{ route('eleve.store') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="exampleInputEmail1" class="form-label">Nom Eleve</label>
                                <input type="text" class="form-control border-light" id="name" name="name"
                                    aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text mt-3">
                                    @error('name')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="exampleInputPassword1" class="form-label">Prenom Eleve</label>
                                <input type="text" class="form-control border-light" id="prenom" name="prenom">
                                <div id="emailHelp" class="form-text mt-3">
                                    @error('prenom')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="exampleInputEmail1" class="form-label">Nom Mere</label>
                                <input type="text" class="form-control border-light" id="mother_name" name="mother_name"
                                    aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text mt-3">
                                    @error('mother_name')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="exampleInputPassword1" class="form-label">Nom Pere</label>
                                <input type="text" class="form-control border-light" id="father_name" name="father_name">
                                <div id="emailHelp" class="form-text mt-3">
                                    @error('father_name')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="exampleInputEmail1" class="form-label">Phone Pere</label>
                                <input type="text" class="form-control border-light" id="parent_phone1"
                                    name="parent_phone1" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">
                                    @error('parent_phone1')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="exampleInputPassword1" class="form-label">Phone Mere</label>
                                <input type="text" class="form-control border-light" id="parent_phone2"
                                    name="parent_phone2">
                                <div id="emailHelp" class="form-text">
                                    @error('parent_phone2')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="exampleInputEmail1" class="form-label">Email Mere</label>
                                <input type="email" class="form-control border-light" id="email1" name="email1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="exampleInputPassword1" class="form-label text-light">Email Pere</label>
                                <input type="email" class="form-control border-light" id="email2" name="email2">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="exampleInputEmail1" class="form-label">Date Naissance</label>
                                <input type="date" class="form-control border-light" id="birth_date" name="birth_date"
                                    aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">
                                    @error('birth_date')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="exampleInputEmail1" class="form-label">Adresse</label>
                                <input type="text" class="form-control border-light" id="Adresse" name="Adresse"
                                    aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">
                                    @error('Adresse')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Enregistrer Eleve</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

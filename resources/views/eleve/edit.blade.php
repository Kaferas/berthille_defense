@extends('layouts.app')

@section('title_header')
    Modifier Eleve
@endsection
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h3 class="mb-4">Modifier </h3>
                    <form method="POST" action="{{ route('eleve.update', $eleve->id) }}">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="exampleInputEmail1" class="form-label">Nom Eleve</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') ?? $eleve->name }}" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text mt-3">
                                    @error('name')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="exampleInputPassword1" class="form-label">Prenom Eleve</label>
                                <input type="text" class="form-control" id="prenom" name="prenom"
                                    value="{{ old('prenom') ?? $eleve->prenom }}">
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
                                <input type="text" class="form-control" id="mother_name" name="mother_name"
                                    value="{{ old('mother_name') ?? $eleve->mother_name }}" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text mt-3">
                                    @error('mother_name')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="exampleInputPassword1" class="form-label">Nom Pere</label>
                                <input type="text" class="form-control" id="father_name" name="father_name"
                                    value="{{ old('father_name') ?? $eleve->father_name }}">
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
                                <input type="text" class="form-control" id="parent_phone1" name="parent_phone1"
                                    aria-describedby="emailHelp"
                                    value="{{ old('parent_phone1') ?? $eleve->parent_phone1 }}">
                                <div id="emailHelp" class="form-text">
                                    @error('parent_phone1')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="exampleInputPassword1" class="form-label">Phone Mere</label>
                                <input type="text" class="form-control" id="parent_phone2" name="parent_phone2"
                                    value="{{ old('parent_phone2') ?? $eleve->parent_phone2 }}">
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
                                <input type="email" class="form-control" id="email1" name="email1"
                                    aria-describedby="emailHelp" value="{{ old('email1') ?? $eleve->email1 }}">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="exampleInputPassword1" class="form-label text-light">Email Pere</label>
                                <input type="email" class="form-control" id="email2" name="email2"
                                    value="{{ old('email2') ?? $eleve->email2 }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="exampleInputEmail1" class="form-label">Date Naissance</label>
                                <input type="date" class="form-control" id="birth_date" name="birth_date"
                                    aria-describedby="emailHelp" value="{{ old('birth_date') ?? $eleve->birth_date }}">
                                <div id="emailHelp" class="form-text">
                                    @error('birth_date')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="exampleInputEmail1" class="form-label">Adresse</label>
                                <input type="text" class="form-control" id="Adresse" name="Adresse"
                                    aria-describedby="emailHelp" value="{{ old('Adresse') ?? $eleve->Adresse }}">
                                <div id="emailHelp" class="form-text">
                                    @error('Adresse')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Modifier Eleve</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

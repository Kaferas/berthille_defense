@extends('layouts.app')

@section('title_header')
    Nouveau Group
@endsection
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h3 class="mb-4">Nouveau Group</h3>
                    <form method="POST" action="{{ route('groups.store') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="mb-3 col-7">
                                <label for="exampleInputEmail1" class="form-label">Nom Group</label>
                                <input type="text" class="form-control border-light" id="name_group" name="name_group"
                                    aria-describedby="emailHelp" value="{{ @old('name_group') }}">
                                <div id="emailHelp" class="form-text mt-3">
                                    @error('name_group')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary">Enregistrer Group</button>
                            </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@extends('layouts.app')

@section('title_header')
    Editer Batch
@endsection
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h3 class="mb-4">Editer Batch</h3>
                    <form method="POST" action="{{ route('batchs.update', $batch->id) }}">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="row">
                            <div class="mb-3 col-12">
                                <label for="exampleInputEmail1" class="form-label">Nom Batch</label>
                                <input type="text" class="form-control border-light" id="name_batch" name="name_batch"
                                    aria-describedby="emailHelp" value="{{ @old('name_batch') ?? $batch->name_batch }}">
                                <div id="emailHelp" class="form-text mt-3">
                                    @error('name_batch')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="exampleInputEmail1" class="form-label">Heure Debut Batch</label>
                                <input type="time" class="form-control border-light" id="begin_hour" name="begin_hour"
                                    aria-describedby="emailHelp" value="{{ @old('begin_hour') ?? $batch->begin_hour }}">
                                <div id="emailHelp" class="form-text mt-3">
                                    @error('begin_hour')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="exampleInputEmail1" class="form-label">Heure Fin Batch</label>
                                <input type="time" class="form-control border-light" id="end_hour" name="end_hour"
                                    aria-describedby="emailHelp" value="{{ @old('end_hour') ?? $batch->end_hour }}">
                                <div id="emailHelp" class="form-text mt-3">
                                    @error('end_hour')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary">Modifier Batch</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

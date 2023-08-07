@extends('Admin.app')
@section('main')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                @if( Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <div class="alert-body">
                    {{ Session::get('success') }}
                    </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                {{ Session::forget('success') }}
                @if(Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <div class="alert-body">
                        {{ Session::get('error') }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Create Artikel Baru</h3>
                        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data" class="mt-3">
                            @csrf
                            <div class="form-body">
                                <label class="form-label">Title</label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <input type="text" class="form-control" name="title"
                                                placeholder="Title">
                                        </div>
                                    </div>
                                </div>
                                <label class="form-label">Description</label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <textarea type="text" class="form-control" name="description"
                                                placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <label class="form-label">Isi</label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <textarea type="text" class="form-control" name="isi"
                                                placeholder="Isi"></textarea>
                                        </div>
                                    </div>
                                </div>
                                {{-- //USE THE DATE THING FOR FORMS --}}
                                <label class="form-label">Tanggal</label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <input type="text" class="form-control" name="tanggal"
                                                placeholder="Tanggal">
                                        </div>
                                    </div>
                                </div>
                                {{-- //USE THE IMAGE THING FOR FORMS --}}
                                <label class="form-label">Image</label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <input type="file" class="form-control" name="image"
                                                placeholder="Image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions mt-5">
                                <div class="float-end">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                    <button type="reset" class="btn btn-dark">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
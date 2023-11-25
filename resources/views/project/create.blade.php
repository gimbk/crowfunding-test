@extends('layouts.empty')


@section('content')

<h2>CREATE A NEW PROJECT</h2>
<p>Create your solidarity action </p>
    @if ($errors->any())

        <div class="alert alert-danger">

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif

    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <form action="{{ url('project') }}" method="POST">
                @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label for="nom">Title :</label>
                        <input type="text" class="form-control" id="title" placeholder="Your project title" name="title">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label for="nom">Objectif :</label>
                        <input type="text" class="form-control" id="objectif" placeholder="Enter the objectif" name="objectif">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label for="nom">Beneficiary :</label>
                        <input type="text" class="form-control" id="benef" placeholder="Enter beneficiary" name="benef">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label for="nom">Start Date :</label>
                        <input type="date" class="form-control" id="start_date" name="start_date">
                    </div>
                </div>
            </div>  
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label for="nom">End Date :</label>
                        <input type="date" class="form-control" id="end_date" name="end_date">
                    </div>
                </div>
                <div class="col-lg-6" style="display: none">
                    <div class="form-group mb-3">
                        <label for="nom">ID</label>
                        <input type="text" class="form-control" id="personnage_id" name="personnage_id" value="{{ auth()->id() }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label for="nom">Description :</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                </div>
            </div>        
            <button type="submit" class="btn btn-primary" style="background-color: #01d262; border:none">Save</button>
        
            </form>
        </div>
        <div class="col-lg-3"></div>
    </div>

@endsection
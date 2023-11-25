@extends('layouts.empty')


@section('content')

<h2>ADD DON TO {{ $don_pr->title }}</h2>
<p>{{ $don_pr->description}}</p>
    @if ($errors->any())

        <div class="alert alert-danger">

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif

    @if ($message = Session::get('success'))

        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>

    @endif
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <form action="{{ url('don/'. $don_pr->id) }}" method="POST">
            @csrf
    
            <div class="form-group mb-3">
                <label for="nom">Amount :</label>
                <input type="text" class="form-control" id="amount" placeholder="enter amount of donation" name="amount">
            </div>
            <div class="col-lg-6" style="display: none">
                <div class="form-group mb-3">
                    <label for="nom">ID</label>
                    <input type="text" class="form-control" id="personnage_id" name="personnage_id" value="{{ auth()->id() }}">
                </div>
            </div>
    
            <button type="submit" class="btn btn-primary" style="background-color: #01d262; border:none">Save</button>
    
        </form>
    </div>
    <div class="col-lg-3"></div>
</div>
   

@endsection
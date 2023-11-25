@extends('layouts.empty')


@section('content')

<h2>CREATE YOUR ACCOUNT</h2>
<p>You must create an account before start give a don or create a solidarity action. </p>
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
        <form action="{{ url('user') }}" method="POST">
            @csrf
    
            <div class="form-group mb-3">
                <label for="nom">Name :</label>
                <input type="text" class="form-control" id="name" placeholder="Your name" name="name">
            </div>

            <div class="form-group mb-3">
                <label for="detail">Email:</label>
                <input type="text" class="form-control" id="email" placeholder="Email" name="email">
            </div>
            
            <div class="form-group mb-3">
                <label for="fortune">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="password" name="password">
            </div>
    
    
            <button type="submit" class="btn btn-primary" style="background-color: #01d262; border:none">Save</button>
    
        </form>
    </div>
    <div class="col-lg-3"></div>
</div>
   

@endsection
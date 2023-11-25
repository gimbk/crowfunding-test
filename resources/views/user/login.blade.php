@extends('layouts.empty')


@section('content')

<h2>LOGIN</h2>
<p>To login please enter registerd email </p>
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
        <form action="{{ url('signin') }}" method="POST">
            @csrf
    
            <div class="form-group mb-3">
                <label for="nom">Email :</label>
                <input type="email" class="form-control" id="email" placeholder="Your email" name="email">
            </div>

            <div class="form-group mb-3">
                <label for="nom">Password :</label>
                <input type="password" class="form-control" id="password" placeholder="Your password" name="password">
            </div>
    
            <button type="submit" class="btn btn-primary" style="background-color: #01d262; border:none">Save</button>
    
        </form>
    </div>
    <div class="col-lg-3"></div>
</div>
   

@endsection
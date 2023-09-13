
@extends('layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container" style="padding: 3em;">
            <label>Transaction Header</label>
                @csrf
                <div class="col-md-6" style="margin-bottom: 20px; border: 1px solid darkgray; padding: 2em;">
                    <div class="d-flex align-items-center">
                        <img class="mr-3" src="{{ Storage::url('product/rinso.jpg') }}" alt="Your Image" style="width: 200px; height: 200px;">
                        <div class="col-md-12">
                            <h5 class="card-title">Document Code : {{ $transactions->document_code }}</h5>
                            <p class="card-text">Document Number : {{ $transactions->document_number }}</p>
                             <p class="card-text">User : {{ $transactions->user }}</p>
                            <a href="{{ url('/transactions/confrim/' . $transactions['id']) }}" class="btn btn-info ml-auto">Confrim</a>

                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>

@endsection

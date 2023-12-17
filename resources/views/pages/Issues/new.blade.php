@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
@endsection

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Issue</div>
                    <div class="card-body mt-5">
                        <form method="POST" action="{{ route('Donation.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="issuer_id" class="col-md-4 col-form-label text-md-right">Issue From</label>
                                <div class="col-md-6">
                                    <select id="issuer_id" class="form-select form-control" data-allow-clear="true" name="issuer_id" required>
                                        @foreach ($issuers as $issuer)
                                            <option value="{{ $issuer->id }}">{{ $issuer->email }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('issuer_id'))
                                        <span class="text-danger text-left">{{ $errors->first('issuer_id') }}</span>
                                    @endif
                                    <div class="invalid-feedback">
                                        Issue From field is required
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="product_id" class="col-md-4 col-form-label text-md-right">Product</label>
                                <div class="col-md-6">
                                    <select id="product_id" class="form-select form-control" data-allow-clear="true" name="product_id" required>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('product_id'))
                                        <span class="text-danger text-left">{{ $errors->first('product_id') }}</span>
                                    @endif
                                    <div class="invalid-feedback">
                                        Product field is required
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="amount" class="col-md-4 col-form-label text-md-right">Amount</label>
                                <div class="col-md-6">
                                    <input id="amount" type="text" class="form-control" name="amount" required autofocus>
                                </div>
                                @if ($errors->has('amount'))
                                    <span class="text-danger text-left">{{ $errors->first('amount') }}</span>
                                @endif
                                <div class="invalid-feedback">
                                    Amount field is required
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date" class="col-md-4 col-form-label text-md-right">Issue Date</label>
                                <div class="col-md-6">
                                    <input id="date" type="date" class="form-control" name="date" required>
                                </div>
                                @if ($errors->has('date'))
                                    <span class="text-danger text-left">{{ $errors->first('date') }}</span>
                                @endif
                                <div class="invalid-feedback">
                                    Donation Date field is required
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

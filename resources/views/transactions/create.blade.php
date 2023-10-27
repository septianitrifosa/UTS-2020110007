@extends('layouts.template')

@section('title', 'Add New transaction')

@section('content')
    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>Add New transaction</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row my-5">
        <div class="col-12 px-5">
            <form action="{{ route('transactions.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="title" class="form-label">ID</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('id') }}">
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="text" pattern="\d*" class="form-control" id="amount" name="amount"
                        value="{{ old('amount') }}" placeholder="Jumlah">
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="type" class="form-label">Type</label>
                    <select class="form-select" aria-label="Default select example" name="type" id="type">
                        <option selected>Pilih Menu</option>
                        <option value="Income">Income</option>
                        <option value="Expense">Expense</option>
                    </select>
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" aria-label="Default select example" name="category" id="category">
                        <option selected>Pilih Menu</option>
                        <option value="Food">Food & Drink</option>
                        <option value="Shopping">Shopping</option>
                        <option value="Charty">Charity</option>
                        <option value="Housing">Housing</option>
                        <option value="Insurance">Insurance</option>
                        <option value="Taxes">Tax</option>
                        <option value="Transportation">Transportation</option>
                    </select>
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="body" class="form-label">Note</label>
                    <textarea class="form-control" rows="10" name="body">{{ old('body') }}</textarea>
                </div>
                <div class="form-check form-switch mb-3">
                    <label class="form-check-label" for="is_published">Publish?</label>
                    <input class="form-check-input" type="checkbox" id="is_published" name="is_published">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </form>
        </div>
    </div>
@endsection

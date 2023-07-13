@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h3>Employee</h3><hr>
            <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="first_name">First name</label>
                    <input type="text" name="first_name" class="form-control input-sm" value="{{ old('first_name') }}">
                    @if ($errors->has('first_name'))
                        <span class="text-danger">{{ $errors->first('first_name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="last_name">Last name</label>
                    <input type="text" name="last_name" class="form-control input-sm" value="{{ old('last_name') }}">
                    @if ($errors->has('last_name'))
                        <span class="text-danger">{{ $errors->first('last_name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="phone">Company</label>
                    <select class="form-control input-sm" name="company_id" aria-label="Default select example" required>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control input-sm" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" class="form-control input-sm" value="{{ old('phone') }}">
                    @if ($errors->has('phone'))
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
                <input type="submit" class="btn btn-primary btn-save">
                <a href="{{ url('employee') }}" class="btn btn-secondary"> Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
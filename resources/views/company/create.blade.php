@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h3>Company</h3><hr>
            <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control input-sm" value="{{ old('name') }}" required>
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control input-sm" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="website">Web Site</label>
                    <input type="text" name="website" class="form-control input-sm" value="{{ old('website') }}" required>
                    @if ($errors->has('website'))
                        <span class="text-danger">{{ $errors->first('website') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Logo</label>
                    <input type="file" name="attachment" class="form-control" required>
                </div>
                <input type="submit" class="btn btn-primary btn-save">
                <a href="{{ url('company') }}" class="btn btn-secondary"> Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
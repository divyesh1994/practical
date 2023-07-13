@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">

            <h3>Company <a href="{{ url('company/create') }}" class="btn btn-xs btn-primary float-right add"> Add </a> </h3>
            <hr>
            <table id="customers" class="table table-bordered table-condensed table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Website</th>
                        <th width="70">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $company)
                        <tr>
                            <td>{{ $company->id }}</td>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->email }}</td>
                            <td>{{ $company->website }}</td>
                            <td width="140">
                                <a href="{{ url('company/'.$company->id.'/edit')}}" class="btn btn-sm btn-secondary btn-edit">Edit</a>

                                <form id="delete-form-{{$company->id}}" method="POST" action="{{ route('company.destroy', $company->id) }}" style="display: none">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                </form>

                                <a href="" onclick="
                                    if(confirm('Are You sure Want to {{ $company->name }} delete.'))
                                    {
                                        event.preventDefault();
                                        document.getElementById('delete-form-{{$company->id}}').submit();
                                    }
                                    else
                                    {
                                        event.preventDefault();
                                    }" class="btn btn-sm btn-danger btn-delete" style="float: none;margin: 5px;" title="Delete Record">Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $companies->links() !!}
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">

            <h3>Employee <a href="{{ url('employee/create') }}" class="btn btn-xs btn-primary float-right add"> Add </a> </h3>
            <hr>
            <table id="customers" class="table table-bordered table-condensed table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Company</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th width="70">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->company->name }}</td>
                            <td>{{ $employee->first_name }}</td>
                            <td>{{ $employee->last_name }}</td>
                            <td>{{ $employee->email  }}</td>
                            <td>{{ $employee->phone  }}</td>
                          
                            <td width="140">
                                <a href="{{ url('employee/'.$employee->id.'/edit')}}" class="btn btn-sm btn-secondary btn-edit">Edit</a>

                                <form id="delete-form-{{$employee->id}}" method="POST" action="{{ route('employee.destroy', $employee->id) }}" style="display: none">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                </form>

                                <a href="" onclick="
                                    if(confirm('Are You sure Want to {{ $employee->first_name }} delete.'))
                                    {
                                        event.preventDefault();
                                        document.getElementById('delete-form-{{$employee->id}}').submit();
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
            {!! $employees->links() !!}
        </div>
    </div>
</div>
@endsection
@extends('master')

@section('title', 'Master Role')

@section('content')
<div class="panel" id="spy5">
    <div class="panel-heading add-new">
        <span class="panel-title">
            <span class="glyphicons glyphicons-table"></span>Master Role</span>
        <div class="pull-right">
            <a type="button" class="btn btn-primary btn-gradient dark btn-block" href="{{ URL($url.'/add') }}">Add New</a>
        </div>
    </div>
    <div class="panel-body pn">
        <table class="table table-striped table-responsive table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Num</th>
                    <th class="text-center">Role Name</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($models as $index => $model)
                <tr>
                    <td class="text-center">{{ $index+1 }}</td>
                    <td>{{ $model->getRoleName() }}</td>
                    <td class="text-center">
                        <a class="btn btn-sm btn-primary" href="{{ URL($url.'/edit/'.$model->getId()) }}"><i class="fa fa-edit"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
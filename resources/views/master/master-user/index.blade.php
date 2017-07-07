@extends('master')

@section('title', 'Master User')

@section('content')
<div class="panel" id="spy5">
    <div class="panel-heading add-new">
        <span class="panel-title">
            <span class="glyphicons glyphicons-table"></span>Master User</span>
        @if(Gate::check('access', [$resource, 'insert']))
        <div class="pull-right">
            <a type="button" class="btn btn-primary btn-gradient dark btn-block" href="{{ URL($url.'/add') }}">Add New</a>
        </div>
        @endif
    </div>
    <div class="panel-body pn">
        <table class="table table-striped table-responsive table-bordered">
            <thead>
                <tr>
                    <th class="text-center">{{ trans('fields.num') }}</th>
                    <th class="text-center">{{ trans('fields.name') }}</th>
                    <th class="text-center">{{ trans('fields.user-name') }}</th>
                    <th class="text-center">{{ trans('fields.email') }}</th>
                    <th class="text-center">{{ trans('fields.role') }}</th>
                    <th class="text-center">{{ trans('fields.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($models as $index => $model)
                <tr>
                    <td class="text-center">{{ $index+1 }}</td>
                    <td>{{ $model->getName() }}</td>
                    <td>{{ $model->getUserName() }}</td>
                    <td>{{ $model->getEmail() }}</td>
                    <td>{{ $model->getRole()->getRoleName() }}</td>
                    <td class="text-center">
                    @if(Gate::check('access', [$resource, 'update']))
                        <a class="btn btn-sm btn-primary" href="{{ URL($url.'/edit/'.$model->getId()) }}"><i class="fa fa-edit"></i></a>
                    @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
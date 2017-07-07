@extends('master')

@section('title', 'Add Master User')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">Add Master User</span>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" role="form" action="{{ URL($url.'/save') }}">
                    <div class="col-md-6">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $model->getId() }}">
                        <div class="form-group">
                            <label for="name" class="col-lg-4 control-label">{{ trans('fields.name') }}</label>
                            <div class="col-lg-8">
                                <input type="text" id="name" name="name" class="form-control" value="{{ count($errors) > 0 ? old('name') : $model->getName() }}">
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="userName" class="col-lg-4 control-label">{{ trans('fields.user-name') }}</label>
                            <div class="col-lg-8">
                                <input type="text" id="userName" name="userName" class="form-control" value="{{ count($errors) > 0 ? old('userName') : $model->getUserName() }}">
                                <span class="help-block">{{ $errors->first('userName') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-lg-4 control-label">{{ trans('fields.email') }}</label>
                            <div class="col-lg-8">
                                <input type="email" id="email" name="email" class="form-control" value="{{ count($errors) > 0 ? old('email') : $model->getEmail() }}">
                                <span class="help-block">{{ $errors->first('email') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="role" class="col-sm-4 control-label">{{ trans('fields.role') }}</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="roleId">
                                    <?php
                                    $roleId = !empty($model->getRole()) ? $model->getRole()->getId() : 0;
                                    $roleId = count($errors) > 0 ? old('roleId') : $roleId; 
                                    ?>
                                    <option value="">{{ trans('fields.please-select') }}</option>
                                    @foreach($roleOptions as $role)
                                        <option value="{{ $role->getId() }}" {{ $role->getId() == $roleId ? 'selected' : '' }}>{{ $role->getRoleName() }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-lg-4 control-label">{{ trans('fields.password') }}</label>
                            <div class="col-lg-8">
                                <input type="password" class="form-control" id="password" name="password" value="{{ count($errors) > 0 ? old('password') : '' }}">
                                <span class="help-block">{{ $errors->first('password') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="pull-left">
                            <a href="{{ URL($url) }}" class="btn btn-md btn-warning btn-block">
                                <i class="fa fa-reply"></i> {{ trans('fields.cancel') }}
                            </a>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-md btn-success btn-block">
                                <i class="fa fa-save"></i> {{ trans('fields.save') }}
                            </button>
                        </div>
                    </div>                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
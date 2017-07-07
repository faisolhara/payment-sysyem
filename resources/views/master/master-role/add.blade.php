@extends('master')

@section('title', 'Add Master Role')

@section('head')
    @parent
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/plugins/nestable/nestable.css') }}">
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">Add Master Role</span>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" role="form" action="{{ URL($url.'/save') }}">
                    <div class="col-md-6">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $model->getId() }}">
                        <div class="form-group">
                            <label for="roleName" class="col-lg-3 control-label">{{ trans('fields.name') }}</label>
                            <div class="col-lg-8">
                                <input type="text" id="roleName" name="roleName" class="form-control" value="{{ count($errors) > 0 ? old('roleName') : $model->getRoleName() }}">
                                <span class="help-block">{{ $errors->first('roleName') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <!-- List 1 -->
                        <div class="dd mb35" id="nestable">
                            <ol class="dd-list">
                                @foreach($resources as $module => $moduleResources)
                                <li class="dd-item" data-id="3">
                                    <div class="dd-handle">{{ ucfirst($module) }}</div>
                                    <ol class="dd-list">
                                        @foreach($moduleResources as $resource => $privileges)
                                        <li class="dd-item" data-id="3">
                                            <div class="dd-handle">{{ ucfirst($resource) }}</div>
                                            <ol class="dd-list">
                                                <li class="dd-item li-all" data-id="4">
                                                    <div class="dd-handle">
                                                        <input type="checkbox" name="check-all" class="check-all" value="1"> Check All
                                                    </div>
                                                </li>
                                                @foreach($privileges as $privilege)
                                                <?php
                                                    $access = !empty(old('privileges')) ? !empty(old('privileges')[$resource][$privilege]) : $model->canAccess($resource, $privilege);
                                                ?>
                                                <li class="dd-item li-privilege" data-id="4">
                                                    <div class="dd-handle">
                                                        <input type="checkbox" name="privileges[{{ $resource }}][{{ $privilege }}]" value="1" {{ $access ? 'checked' : '' }}> {{ ucfirst($privilege) }}
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ol>
                                        </li>
                                        @endforeach
                                    </ol>
                                </li>
                                @endforeach
                            </ol>
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

@section('script')
    @parent
        <script type="text/javascript" src="{{ asset('vendor/plugins/nestable/jquery.nestable.js') }}"></script>
        <script type="text/javascript">
        jQuery(document).ready(function() {
            // Nestable Output
            var updateOutput = function(e) {
                var list = e.length ? e : $(e.target),
                    output = list.data('output');
                if (window.JSON) {
                    output.val(window.JSON.stringify(list.nestable('serialize'))); //, null, 2));
                } else {
                    output.val('JSON browser support required for this demo.');
                }
            };

            // Init Nestable on list 1
            $('#nestable').nestable().nestable('collapseAll');
            
            $('.li-all').on('click', function(){
                $(this).find('input').click();
            });

            $('.li-privilege').on('click', function(){
                $(this).find('input').click();
            });

            $('.check-all').on('click', function(){
                var $inputs = $(this).parent().parent().parent().find('input');
                if (!$(this).is(':checked')) {
                    $inputs.prop('checked', false);
                } else {
                    $inputs.prop('checked', true);
                }
            });

            $(".dd-handle").on('mousedown', function(event){
                    event.preventDefault();

                    return false;
            })
        });
        </script>
@endsection
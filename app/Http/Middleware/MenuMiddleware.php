<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Gate;

class MenuMiddleware
{
    protected $tempNavigation = [];
    protected $arrNavigation = [];

    public function handle($request, Closure $next)
    {
        // Perform action
        $user = \Auth::user();
        $navigations = config('app.navigations');
        foreach ($navigations as $navigation) {
            $this->addMenu($navigation);
        }
        View::share('navigations', $this->arrNavigation);
        return $next($request);
    }

    protected function addMenu($navigation)
    {
        $this->tempNavigation = null;
        if (!$this->isMenuAllowed($navigation)) {
            return;
        }

        if(!empty($navigation['children'])){
            foreach($navigation['children'] as $navigationChild){
                if ($this->isMenuAllowed($navigationChild)) {
                    $this->tempNavigation[] = [
                        'label' => trans('menu.'.$navigationChild['label']),
                        'icon'  => trans($navigationChild['icon']),
                        'route' => trans($navigationChild['route']),
                    ];
                }
            }
            $this->arrNavigation[] = [
                'label'    => trans('menu.'.$navigation['label']),
                'icon'     => trans($navigation['icon']),
                'children' =>$this->tempNavigation
            ];
        }else{
            $this->arrNavigation[] = [
                    'label' => trans('menu.'.$navigation['label']),
                    'icon'  => trans($navigation['icon']),
                    'route' => !empty(trans($navigation['route'])) ? trans($navigation['route']) : '#',
                ];
        }
    }

    protected function isMenuAllowed($navigation)
    {
        $resource='';
        $privilege='';
        if (!empty($navigation['children'])) {
            $allowed = false;
            foreach ($navigation['children'] as $child) {
                $allowed = $this->isMenuAllowed($child) ? true : $allowed;
            }
        } else {
            $allowed   = true;
            $resource  = !empty($navigation['resource']) ? $navigation['resource'] : '';
            $privilege = !empty($navigation['privilege']) ? $navigation['privilege'] : '';
            if (!empty($resource) && !empty($privilege)) {
                $allowed = \Gate::allows('access', [$resource, $privilege]);
            }
        }

      
        return $allowed;
    }
}
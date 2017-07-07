<?php

namespace App\Http\Controllers\Master;

use App\Entities\Master\Role;
use App\Entities\Master\AccessControl;
use App\Http\Controllers\Controller;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;

class MasterRoleController extends Controller
{
    const RESOURCE = 'Master\MasterRole';
    const URL      = 'master/master-role';
    
    public function __construct(){
        $this->middleware('auth');      
    }

    public function index(EntityManagerInterface $em, Request $request)
    {
        if (!\Gate::allows('access', [self::RESOURCE, 'view'])) {
            // return view('errors.403');
        }

        $model = $em->createQueryBuilder()
                    ->select('roles')
                    ->from(Role::class, 'roles')
                    ->getQuery()
                    ->getResult();
        /* @var Role $role */

        return view('master.master-role.index', [
            'url'    => SELF::URL,
            'models' => $model
        ]);         
    }
    
    public function add(EntityManagerInterface $em)
    {
        $model = new Role();

        return view('master.master-role.add', [
            'title'     => trans('fields.add'),
            'model'     => $model,
            'url'       => SELF::URL,
            'resources' => config('app.resources'),
        ]);
    }

    public function edit(EntityManagerInterface $em, Request $request, $id)
    {
        $model = $em->getRepository(Role::class)->find($id);
        return view('master.master-role.add', [
            'title' => trans('fields.edit'),
            'model' => $model,
            'url'   => SELF::URL,
            'resources' => config('app.resources'),
        ]);
    }
    
    public function save(EntityManagerInterface $em, Request $request)
    {
        $id = intval($request->get('id'));
        /* @var Role $role */
        $this->validate($request, [
            'roleName'        => 'required|unique:App\Entities\Master\Role,roleName,'.$id.',id',
        ]);

        $now = new \DateTime();
        if(empty($id)){
            $role = new Role();
            $role->setCreatedBy(\Auth::user()->getId());
            $role->setCreatedDate($now);
        }else{
            $role = $em->getRepository(Role::class)->find($id);
            $role->setUpdatedBy(\Auth::user()->getId());
            $role->setUpdatedDate($now);
        }


        $role->setRoleName($request->get('roleName'));

        $em->persist($role);

        foreach($role->getAccessControl() as $accessControl) {
            $em->remove($accessControl);
        }

        foreach ($request->get('privileges', []) as $resource => $privileges) {
            foreach ($privileges as $privilege => $access) {
                $accessControl = new AccessControl();
                $accessControl->setResource($resource);
                $accessControl->setPrivilege($privilege);
                $accessControl->setCreatedBy(\Auth::user()->getId());
                $accessControl->setCreatedDate($now);
                $accessControl->setUpdatedBy(\Auth::user()->getId());
                $accessControl->setUpdatedDate($now);

                $role->addAccessControl($accessControl);
                $em->persist($accessControl);
            }
        }

        $em->flush();

        $request->session()->flash(
            'successMessage',
            trans('fields.saved-message', ['variable' => trans('menu.master-role').' '.$role->getRoleName()])
            );

        return redirect(self::URL);
    }
}

<?php

namespace App\Http\Controllers\Master;

use App\Entities\Master\User;
use App\Entities\Master\Role;
use App\Http\Controllers\Controller;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;

class MasterUserController extends Controller
{
    const RESOURCE = 'Master\MasterUser';
    const URL      = 'master/master-user';
    
    public function __construct(){
        $this->middleware('auth');      
    }

    public function index(EntityManagerInterface $em)
    {
        $model = $em->createQueryBuilder()
                    ->select('users')
                    ->from(User::class, 'users')
                    ->getQuery()
                    ->getResult();
        /* @var User $user */

        return view('master.master-user.index', [
            'url'         => SELF::URL,
            'resource'    => SELF::RESOURCE,
            'models'      => $model
        ]);         
    }
    
    public function add(EntityManagerInterface $em)
    {
        $model = new User();

        return view('master.master-user.add', [
            'title' => trans('fields.add'),
            'model' => $model,
            'url'   => SELF::URL,
            'roleOptions' => $this->getOptionRole($em),
        ]);
    }

    public function edit(EntityManagerInterface $em, Request $request, $id)
    {
        $model = $em->getRepository(User::class)->find($id);
        return view('master.master-user.add', [
            'title' => trans('fields.edit'),
            'model' => $model,
            'url'   => SELF::URL,
            'roleOptions' => $this->getOptionRole($em),
        ]);
    }
    
    public function save(EntityManagerInterface $em, Request $request)
    {
        $id = intval($request->get('id'));
        /* @var User $user */
        $this->validate($request, [
            'name'        => 'required',
            'userName'    => 'required|unique:App\Entities\Master\User,name,'.$id.',id',
            'email'       => 'required|unique:App\Entities\Master\User,email,'.$id.',id',
            'roleId'      => 'required',
        ]);

        if(empty($id)){
            $this->validate($request, [
                'password' => 'required',
            ]);
            $user = new User();
        }else{
            $user = $em->getRepository(User::class)->find($id);
        }

        $user->setName($request->get('name'));
        $user->setUsername($request->get('userName'));
        $user->setEmail($request->get('email'));

        if(!empty($request->get('password'))){
            $user->setPassword($request->get('password'));
        }

        $role = $em->getRepository(Role::class)->find($request->get('roleId'));
        $user->setRole($role);

        $em->persist($user);
        $em->flush();

        $request->session()->flash(
            'successMessage',
            trans('fields.saved-message', ['variable' => trans('menu.master-user').' '.$user->getName()])
            );

        return redirect(self::URL);
    }

    protected function getOptionRole(EntityManagerInterface $em){
        $model = $em->createQueryBuilder()
                    ->select('roles')
                    ->from(Role::class, 'roles')
                    ->getQuery()
                    ->getResult();
        return $model;
    }
}

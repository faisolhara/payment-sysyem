<?php

namespace App\Entities\Master;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;
use Illuminate\Contracts\Auth\Authenticatable;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User implements Authenticatable
{
    use \LaravelDoctrine\ORM\Auth\Authenticatable;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $username;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\Column(type="string")
     */
    private $email;

    /**
    * @ORM\ManyToOne(targetEntity="Role", inversedBy="user")
    * @var Role
    */
    private $role;

    /**
     * User constructor.
     * @param $name
     * @param $email
     * @param $password
     */
    public function __construct($name = NULL, $email = NULL)
    {
        $this->name  = $name;
        $this->email = $email;

        $this->tasks = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
    

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = bcrypt($password);
    }

    public function setRole(Role $role){
        $this->role = $role;
    }

    public function getRole(){
        return $this->role;
    }

    public function hasRole($roleId)
    {
        if ($this->getRole() !== null && $this->getRole->getId() == $roleId) {
            return true;
        }
        return false;
    }
}
<?php

namespace App\Entities\Master;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="roles")
 */
class Role
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", name="role_name")
     */
    private $roleName;

    /**
     * @ORM\Column(type="integer", name="created_by")
     */
    private $createdBy;

    /**
     * @ORM\Column(type="integer", nullable=true, name="last_update_by")
     */
    private $lastUpdateBy;

    /**
     * @ORM\Column(type="datetimetz", name="created_date")
     */
    private $createdDate;

    /**
     * @ORM\Column(type="datetimetz", nullable=true, name="last_update_date")
     */
    private $lastUpdateDate;
    
    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="roles", cascade={"persist"})
     * @var ArrayCollection|User[]
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity="AccessControl", mappedBy="role", cascade={"persist"})
     * @var ArrayCollection|User[]
     */
    private $accessControl;

    public function __construct()
    {
        $this->user = new ArrayCollection();
        $this->accessControl = new ArrayCollection();
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
    public function getRoleName()
    {
        return $this->roleName;
    }

    public function getAccessControl()
    {
        return $this->accessControl;
    }

    public function canAccess($resource, $privilege)
    {
        foreach ($this->getAccessControl() as $access) {
            if ($access->getResource() == $resource && $access->getPrivilege() == $privilege) {
                return true;
            }
        }
        return false;
    }

    public function setRoleName($roleName)
    {
        $this->roleName = $roleName;
    }

    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
    }

    public function setUpdatedBy($updateBy)
    {
        $this->updateBy = $updateBy;
    }

    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
    }

    public function setUpdatedDate($updateDate)
    {
        $this->updateDate = $updateDate;
    }

    public function addAccessControl(AccessControl $accessControl)
    {
        if(!$this->accessControl->contains($accessControl)) {
            $accessControl->setRole($this);
            $this->accessControl->add($accessControl);
        }
    }
}
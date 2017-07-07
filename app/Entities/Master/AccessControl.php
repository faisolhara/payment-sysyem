<?php

namespace App\Entities\Master;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="access_control")
 */
class AccessControl
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $resource;

    /**
     * @ORM\Column(type="string")
     */
    private $privilege;

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
    * @ORM\ManyToOne(targetEntity="Role", inversedBy="access_control")
    * @var Role
    */
    private $role;

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
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * @return mixed
     */
    public function getPrivilege()
    {
        return $this->privilege;
    }

    public function setResource($resource)
    {
        $this->resource = $resource;
    }
    
    public function setPrivilege($privilege)
    {
        $this->privilege = $privilege;
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

    public function setRole(Role $role){
        $this->role = $role;
    }
}
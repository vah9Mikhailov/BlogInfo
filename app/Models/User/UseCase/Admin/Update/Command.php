<?php


namespace App\Models\User\UseCase\Admin\Update;


use DomainException;

class Command
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $roleId;

    /**
     * Command constructor.
     * @param int $id
     * @param int $roleId
     */
    public function __construct(int $id, int $roleId)
    {
        if ($id !== 0) {
            $this->id = $id;
        } else {
            throw new DomainException("Некорректный id");
        }
        $this->roleId = $roleId;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getRoleId(): int
    {
        return $this->roleId;
    }
}

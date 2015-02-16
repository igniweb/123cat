<?php namespace App\Repositories\Eloquent;

use App\User;
use App\Repositories\UserRepository as UserRepositoryInterface;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UserRepository implements UserRepositoryInterface {

    /**
     * Users Eloquent model.
     *
     * @var \App\User
     */
    protected $user;

    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->user = new User;
    }

    /**
     * Return all users ordered by name.
     *
     * @return array
     */
    public function all()
    {
        return $this->user->select('id', 'name', 'email')->orderBy('name')->get()->toArray();
    }

    /**
     * Return user of given ID.
     *
     * @param int $id
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @return array
     */
    public function findById($id)
    {
        $user = $this->user->find($id);

        if (empty($user))
        {
            throw new HttpException('User #' . $id . ' not found.');
        }

        return $user->toArray();
    }

}

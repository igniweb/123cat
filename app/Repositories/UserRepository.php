<?php namespace App\Repositories;

interface UserRepository {

    /**
     * Return all users ordered by name.
     *
     * @return array
     */
    public function all();

    /**
     * Return user of given ID.
     *
     * @param int $id
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @return array
     */
    public function findById($id);

}

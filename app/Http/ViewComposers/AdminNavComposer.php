<?php namespace App\Http\ViewComposers;

use Session;
use App\Repositories\UserRepository;
use Illuminate\Contracts\View\View;

class AdminNavComposer {

    /**
     * Users repository.
     *
     * @var \App\Repositories\UserRepository
     */
    protected $users;

    /**
     * Class constructor.
     *
     * @param \App\Repositories\UserRepository $users.
     * @return void
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    /**
     * Bind data to the view.
     *
     * @return void
     */
    public function compose(View $view)
    {
        $users = $this->users->all();

        $view->with('loggedUser', Session::get('user'))->with('users', $users);
    }

}

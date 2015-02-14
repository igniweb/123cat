<?php namespace App\Http\ViewComposers;

use Session;
use App\User;
use Illuminate\Contracts\View\View;

class AdminNavComposer {

    /**
     * Bind data to the view.
     *
     * @return void
     */
    public function compose(View $view)
    {
        $loggedUser = Session::get('user');

        $users = User::select('id', 'email')->orderBy('email')->get()->toArray();

        $view->with('loggedUser', $loggedUser)->with('users', $users);
    }

}

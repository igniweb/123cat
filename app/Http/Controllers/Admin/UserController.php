<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller {

    protected $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

	public function create()
	{
		return view('admin.user.edit');
	}

	public function store()
	{
		//
	}

	public function edit($id)
	{
        $user = $this->users->findById($id);

		return view('admin.user.edit', compact('user'));
	}

	public function update($id)
	{
		//
	}

	public function destroy($id)
	{
		//
	}

}

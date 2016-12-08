<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleStore;
use App\Http\Requests\RoleUpdate;
use App\Service\DataMessage;
use App\Service\Role;
use Illuminate\Http\Request;

use App\Http\Requests;

class RoleController extends Controller
{
    use DataMessage;

    private $roleService;

    /**
     * RoleController constructor.
     * @param Role $roleService
     */
    public function __construct(Role $roleService)
    {
        $this->roleService = $roleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('roles.list');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return $this->roleService->datatableData();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['permissions'] = $this->roleService->permission()->all();
        return view('roles.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoleStore $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleStore $request)
    {
        $this->roleService->store($request->except('_token'));

        return redirect('role')->with($this->getMessage('store'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['role'] = $this->roleService->getRoleById($id);
        $data['permissions'] = $this->roleService->permission()->all();
        $data['selectedPermissions'] = $this->roleService->selectedPermissions($id);

        return view('roles.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RoleUpdate $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleUpdate $request, $id)
    {
        $this->roleService->update($id, $request->only(['name', 'permissions']));

        return redirect('role')->with($this->getMessage('update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->roleService->destroy($id);

        return redirect('role')->with($this->getMessage('delete'));
    }
}

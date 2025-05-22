<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Branch\StoreBranchRequest;
use App\Http\Requests\Branch\UpdateBranchRequest;
use App\Services\Branch\BranchService;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    protected $branchService;

    public function __construct(BranchService $branchService)
    {
        $this->branchService = $branchService;
    }

    public function index()
    {
        $branches = $this->branchService->all();
        $country = $this->branchService->countryAll();
        return view('admin.rules.branch', compact('branches','country'));
    }

    public function store(StoreBranchRequest $request)
    {
        $this->branchService->store($request->validated());
  return response()->json([
            'success' => true,
            'message' => 'Branch Addedd successfully.'
        ]);    }

    public function edit($id)
    {
        $branch = $this->branchService->findById($id);
        return response()->json($branch);
    }

    public function update(UpdateBranchRequest $request, $id)
    {
        $this->branchService->update($id, $request->validated());
  return response()->json([
            'success' => true,
            'message' => 'Branch Updated successfully.'
        ]);    }

  public function destroy($id)
{
    $this->branchService->delete($id);

    if (request()->expectsJson()) {
        return response()->json([
            'success' => true,
            'message' => 'Branch deleted successfully.'
        ]);
    }

}

}

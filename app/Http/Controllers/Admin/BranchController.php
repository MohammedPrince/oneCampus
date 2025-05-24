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

        // echo "done";
        $result = $this->branchService->store($request->validated());

        if($result){
            return redirect()->route('admin.rule.branch')->with('success', 'Branch added successfully!');

        }else{
            return redirect()->route('admin.rule.branch')->with('error', 'Branch Not added!');
            
        }


        // return redirect()->route('admin.rule.branch')->with('success', 'Branch added successfully!');
        
        // return response()->json([
        //     'success' => true,
        //     'message' => 'Branch Addedd successfully.'
        // ]);   
    
    }

    public function edit($id)
    {
        $branch = $this->branchService->findById($id);
        return response()->json($branch);
    }

    public function update(UpdateBranchRequest $request)
    {
        // echo "done";
        $id = $request->validated('branch_id');

        // dd($request->validated());  

        $result = $this->branchService->update($id, $request->validated());

        if($result){
            return redirect()->route('admin.rule.branch')->with('success', 'Branch updated successfully!');
        }else{
            return redirect()->route('admin.rule.branch')->with('error', 'Branch Not updated!');
        }

    }

  public function destroy($id)
{

   $result = $this->branchService->delete($id);

   if($result){

        return redirect()->route('admin.rule.branch')->with('success', 'Branch Deleted successfully!');

   }else{
        return redirect()->route('admin.rule.branch')->with('success', 'Branch Not Deleted !');


   }


}

}

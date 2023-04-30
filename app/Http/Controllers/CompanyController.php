<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Exception;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function getAll(){
        return Response(
            CompanyResource::collection(Company::all())
        , Response::HTTP_OK);
    }

    public function addNew(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        try{
            if(Company::where('name', $request->name)->first()){
                return Response([
                    'message' => 'The company name is already in use.'
                ], Response::HTTP_UNPROCESSABLE_ENTITY);   
            }
            $company = Company::create([
                'name' => $request->name,
                'admin_id' => $request->user()->id
            ]);

            return Response([
                'data' => CompanyResource::make($company),
            ],Response::HTTP_ACCEPTED);

        }catch(Exception $e){
            return Response([
                'message' => $e->getMessage()
            ],Response::HTTP_INTERNAL_SERVER_ERROR); 
        }
        
    }

    public function update(Request $request) {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
        ]);
        
        try{
            if(Company::where('name', $request->name)->first()){
                return Response([
                    'message' => 'The company name is already in use.'
                ], Response::HTTP_UNPROCESSABLE_ENTITY);   
            }

            $company = Company::find($request->id);

            if(!$company){
                return Response([
                    'message' => 'Company was not found'
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            $company->name = $request->name;
            $company->save();

            return Response([
                'data' => CompanyResource::make($company),
            ],Response::HTTP_OK);

        }catch(Exception $e){
            return Response([
                'message' => $e->getMessage()
            ],Response::HTTP_INTERNAL_SERVER_ERROR); 
        }

    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);

        try{
            $company = Company::find($request->id);

            if(!$company){
                return Response([
                    'message' => 'Company was not found'
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            if($company->employees()->get()->count() > 0){
                return Response([
                    'message' => 'A Company that has associated employees cannot be deleted.'
                ], Response::HTTP_CONFLICT);
            }

            $company->delete();

            return Response([
                'message' => 'Company successfully deleted.'
            ], Response::HTTP_OK);

        }catch(Exception $e){
            return Response([
                'message' => $e->getMessage()
            ],Response::HTTP_INTERNAL_SERVER_ERROR); 
        }
        return $request->id;
    }
}

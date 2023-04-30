<?php

namespace App\Http\Controllers;

use App\Mail\EmployeeInvitation;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Invitation;
use App\Models\InvitationHistory;
use App\Models\Status;
use Exception;
use Illuminate\Http\Request;
use App\Services\ApiError;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class InvitationController extends Controller
{
   public function addNew(Request $request)
   {
        $request->validate([
            'employeeEmail' => 'required',
            'companyName' => 'required',
        ]);

        try{
            $company = Company::where('name', $request->companyName)->first();
            $employeeEmail = Employee::where('email', $request->employeeEmail)->first();
            

            if(!$company && $employeeEmail){

                return Response([
                    'message' => 'Non traitable',
                    'errors' => [
                        'companyName' => 'l\'entreprise ajouté n\'existe pas',
                        'employeeEmail' => 'l\'email donné existe déjà'
                    ]
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            if(!$company && !$employeeEmail) 
            {
               return Response([
                    'message' => 'Non traitable',
                    'errors' => [
                        'companyName' => 'l\'entreprise ajouté n\'existe pas',
                    ]
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            } 
            if(!$company && $employeeEmail) 
            {
               return Response([
                    'message' => 'Non traitable',
                    'errors' => [
                        'employeeEmail' => 'l\'email donné existe déjà'
                    ]
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            $employee = Employee::create([
                'email' => $request->employeeEmail,
                'company_id' => $company->id,
            ]);

            $invitation = Invitation::create([
                'link_code' => 'EMP' . Str::random(7) . $employee->id,
                'admin_id' =>  Auth::user()->id,
                'employee_id' => $employee->id,
                'status_id' => Status::where('name', 'En attente')->first()->id
            ]);

            InvitationHistory::create([
                'action' => 'envoyé',
                'invitation_id' => $invitation->id
            ]);

            $domain = $request->getHost();
            $uri = $request->uri ?  $request->uri : '/invitation';
            $link =  $domain . $uri . '?code='.$invitation->link_code;

            Mail::send(New EmployeeInvitation($employee, $link));

            return Response([
                'message' => 'Invitation envoyée'
            ], Response::HTTP_OK);
            

        }catch(Exception $e){
            $error = new ApiError($e);

            return $error->filter();
        }
   }
}

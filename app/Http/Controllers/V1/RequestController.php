<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Program;
use App\Models\LoanRequest;

class RequestController extends Controller
{
    
    /**
     * store
     *
     * @param  Request $request
     * @return Response 
     */
    public function store(Request $request){
        $success = true;
        $request->validate([
            'carId' => 'required|integer',
            'programId' => 'required|integer',
            'initialPayment' => 'required|integer',
            'loanTerm' => 'required|integer',
        ]);
        if(!Car::findOrFail($request->input('carId'))){
            $success = false;
            //Car not found
        }
        $program = Program::findOrFail($request->input('programId'));
        if(!$program){
            $success = false;
            //Program not found
        }
        else if($program->loan_term < $request->input('loanTerm')){
                $success = false;
                //Loan term too long 
        }
        if($success === true){
            $code = 201;
            LoanRequest::create([
                'car_id' => $request->input('carId'),
                'program_id' => $request->input('programId'),
                'initial_payment' => $request->input('initialPayment'),
                'loan_term' => $request->input('loanTerm'),
            ]);
        }
        else{
            $code = 400;
        }
        return response()->json(['success' => $success], $code);
    }
}

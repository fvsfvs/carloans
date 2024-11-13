<?php

namespace App\Http\Controllers\V1\Credit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;

class CalculateController extends Controller
{    
    /**
     * index
     *
     * @param  Request $request
     * @return Response
     */
    public function index(Request $request){
        $request->validate([
            'price' => 'required|integer',
            'initialPayment' => 'required|regex:/^\d*.?\d{1,2}$/',
            'loanTerm' => 'required|integer'
        ]);

        if($request->input('initialPayment') > 200000) {
            $program = Program::where('interest_rate', '<', 20)->first();
        }
        else {
            $program = Program::where('loan_term', '>=', $request->input('loanTerm'))->orderBy('interest_rate')->first();
        }
        if(!empty($program)){
            $sum = $request->input('price') - $request->input('initialPayment');
            if($sum > 0){
                $interestRate = $program->interest_rate / 100;
                $annuite = ($interestRate * pow((1 + $interestRate), $request->input('loanTerm'))) / 
                    (pow((1 + $interestRate), $request->input('loanTerm')) - 1);
                $monthlyPayment = ceil($sum * $annuite);
                $answer = [
                    'programId' => $program->id,
                    'interestRate' => $program->interest_rate,
                    'monthlyPayment' => $monthlyPayment,
                    'title' => $program->title
                ];
                $code = 200;
            }
            else {
                $code = 400;
                $answer = ['message' => 'Bad request'];
            }
        }
        else{
            $answer = ['message' => 'Not found'];
            $code = 404;
        }
        return response()->json($answer, $code);
    }   
}

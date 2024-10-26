<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    public function home(): View
    {
        return view('home');
    }

    public function generateExercises(Request $request)
    {
        // form validation
        $request->validate([
           'check_sum' => 'required_without_all:check_subtraction,check_multiplication,check_division',
            'check_subtraction' => 'required_without_all:check_sum,check_multiplication,check_division',
            'check_multiplication' => 'required_without_all:check_sum,check_subtraction,check_division',
            'check_division' => 'required_without_all:check_sum,check_subtraction,check_multiplication',
            'number_one' => 'required|integer|min:0|max:999|lt:number_two', 
            'number_two' => 'required|integer|min:0|max:999',
            //'number_two' => 'same:number_one',
            'number_exercises' => 'required|integer|min:5|max:50',
        ], [
            'check_sum.required' => 'Selecione pelo menos um exercício',
            'check_subtraction.required' => 'Selecione pelo menos um exercício',
            'check_multiplication.required' => 'Selecione pelo menos um exercício',
            'check_division.required' => 'Selecione pelo menos um exercício',
            'number_one.integer' => 'O primeiro número deve ser um número inteiro',
            'number_one.required' => 'O primeiro número é obrigatório',
            'number_one.min' => 'O primeiro número deve estar entre 0 e :max',
            'number_one.max' => 'O primeiro número deve estar entre 0 e :max',
            'number_one.lt' => 'O primeiro número deve ser menor que o segundo',
            'number_two.required' => 'O segundo número é obrigatório',
            'number_two.integer' => 'O segundo número deve ser um número inteiro',
            'number_two.min' => 'O segundo número deve estar entre 0 e :max',
            'number_two.max' => 'O segundo número deve estar entre 0 e :max',
            'number_exercises.required' => 'O número de exercícios é obrigatório',
            'number_exercises.integer' => 'O número de exercícios deve ser um número inteiro',
            'number_exercises.min' => 'O número de exercícios deve estar entre 5 e :max',
            'number_exercises.max' => 'O número de exercícios deve estar entre 5 e :max',
        ]);

        dd($request->all());
    }

    public function printExercises()
    {
        return 'imprimir exercícios';
    }

    public function exportExercises()
    {
        return 'exportar exercícios para arquivo de texto';
    }
}

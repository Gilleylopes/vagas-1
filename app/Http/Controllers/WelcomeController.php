<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\VagaRepository;

class WelcomeController extends Controller {

    //
    protected $repository;

    public function __construct(VagaRepository $repository) {
        $this->repository = $repository;
    }

    public function welcome() {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $vagas = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                        'data' => $vagas,
            ]);
        }

        return view('welcome', compact('vagas'));
    }

}

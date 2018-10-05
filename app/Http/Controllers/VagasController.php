<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\VagaCreateRequest;
use App\Http\Requests\VagaUpdateRequest;
use App\Repositories\VagaRepository;
use App\Validators\VagaValidator;
use App\Repositories\StatusVagaRepository;
use App\Repositories\StatusCandidatoRepository;
use App\Repositories\CandidatoRepository;
use App\Entities\Vaga;

/**
 * Class VagasController.
 *
 * @package namespace App\Http\Controllers;
 */
class VagasController extends Controller {

    /**
     * @var VagaRepository
     */
    protected $repository;
    protected $candidatoRepository;
    protected $statusVagaRepository;
    protected $statusCandidatoRepository;

    /**
     * @var VagaValidator
     */
    protected $validator;

    /**
     * VagasController constructor.
     *
     * @param VagaRepository $repository
     * @param VagaValidator $validator
     */
    public function __construct(VagaRepository $repository, VagaValidator $validator, StatusVagaRepository $statusVagaRepository, StatusCandidatoRepository $statusCandidatoRepository, CandidatoRepository $candidatoRepository) {
        $this->middleware('auth');

        $this->repository = $repository;
        $this->validator = $validator;
        $this->statusVagaRepository = $statusVagaRepository;
        $this->statusCandidatoRepository = $statusCandidatoRepository;
        $this->candidatoRepository = $candidatoRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        $statusVagas_list = $this->statusVagaRepository->selectBoxList();


        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $vagas = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                        'data' => $vagas,
            ]);
        }

        return view('vagas.index', compact('vagas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  VagaCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(VagaCreateRequest $request) {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $vaga = $this->repository->create($request->all());

            $response = [
                'message' => 'Vaga created.',
                'data' => $vaga->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                            'error' => true,
                            'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        
        $vaga = $this->repository->find($id);
        $statusCandidatos_list = $this->statusCandidatoRepository->selectBoxList();
        $candidatos_list = $vaga->candidatos;

        return view('vagas.show', [
            'vaga' => $vaga,
            'candidatos_list' => $candidatos_list,
            'statusCandidatos_list' => $statusCandidatos_list,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        
        $statusVagas_list = $this->statusVagaRepository->selectBoxList();
        $vaga = Vaga::find($id);

        return view('vagas.edit', [
            'vaga' => $vaga,
            'statusVagas_list' => $statusVagas_list,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        
        $statusVagas_list = $this->statusVagaRepository->selectBoxList();


        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $vagas = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                        'data' => $vagas,
            ]);
        }

        return view('vagas.form', [
            'vagas' => $vagas,
            'statusVagas_list' => $statusVagas_list,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  VagaUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(VagaUpdateRequest $request, $id) {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $vaga = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Vaga updated.',
                'data' => $vaga->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                            'error' => true,
                            'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function updateCandidato(VagaUpdateRequest $request, $id) {

        $candidato = $this->candidatoRepository->update($request->all(), $request->id_candidato);
        dd($candidato);
//            $user->update($request->only(['name', 'email', 'password']));
        $candidato = $this->candidatoRepository->find($request->id_candidato);
        $vaga = $this->candidatoRepository->find($candidato->vaga->id);
        $statusCandidatos_list = $this->statusCandidatoRepository->selectBoxList();
        $candidatos_list = $vaga->candidatos;

        return redirect()->back()->with('message', 'Vaga update.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                        'message' => 'Vaga deleted.',
                        'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Vaga deleted.');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CandidatoCreateRequest;
use App\Http\Requests\CandidatoUpdateRequest;
use App\Repositories\CandidatoRepository;
use App\Repositories\StatusCandidatoRepository;
use App\Repositories\VagaRepository;
use App\Repositories\NivelLinguaEstrangeiraRepository;
use App\Validators\CandidatoValidator;

/**
 * Class CandidatosController.
 *
 * @package namespace App\Http\Controllers;
 */
class CandidatosController extends Controller {

    /**
     * @var CandidatoRepository
     */
    protected $repository;
    protected $vagaRepository;
    protected $nivelRepository;
    protected $statusCandidatoRepository;

    /**
     * @var CandidatoValidator
     */
    protected $validator;

    /**
     * CandidatosController constructor.
     *
     * @param CandidatoRepository $repository
     * @param CandidatoValidator $validator
     */
    public function __construct(CandidatoRepository $repository, CandidatoValidator $validator, VagaRepository $vagaRepository, NivelLinguaEstrangeiraRepository $nivelRepository, StatusCandidatoRepository $statusCandidatoRepository) {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->vagaRepository = $vagaRepository;
        $this->nivelRepository = $nivelRepository;
        $this->statusCandidatoRepository = $statusCandidatoRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id) {
        
        $vaga = $this->vagaRepository->find($id);
        $niveis = $this->nivelRepository->selectBoxList();

        return view('candidatos.form', [
            'vaga' => $vaga,
            'niveis' => $niveis,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CandidatoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CandidatoCreateRequest $request) {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);


            $candidato = $this->repository->create($request->all());

            $response = [
                'message' => 'Candidato created.',
                'data' => $candidato->toArray(),
            ];

            $file = $request->file('file_name');
            $upload = $file->storeAs('candidatos', 'candidato_' . $candidato->id . '_inscrito.jpg');

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            $this->vagaRepository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
            $vagas = $this->vagaRepository->all();

            if (request()->wantsJson()) {

                return response()->json([
                            'data' => $vagas,
                ]);
            }

            return view('welcome', compact('vagas'));
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
        
        $candidato = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                        'data' => $candidato,
            ]);
        }

        return view('candidatos.show', compact('candidato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        
        $vaga = $this->vagaRepository->find($id);
        $niveis = $this->nivelRepository->selectBoxList();

        return view('candidatos.form', [
            'vaga' => $vaga,
            'niveis' => $niveis,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CandidatoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(CandidatoUpdateRequest $request, $id) {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $candidato = $this->repository->update($request->all(), $request->id_candidato);
            $candidato = $this->repository->find($request->id_candidato);
            $vaga = $candidato->vaga;
            $statusCandidatos_list = $this->statusCandidatoRepository->selectBoxList();


            return view('vagas.show', [
                'vaga' => $vaga,
                'statusCandidatos_list' => $statusCandidatos_list,
            ]);
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
                        'message' => 'Candidato deleted.',
                        'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Candidato deleted.');
    }

}

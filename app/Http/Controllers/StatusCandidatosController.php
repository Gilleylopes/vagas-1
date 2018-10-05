<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\StatusCandidatoCreateRequest;
use App\Http\Requests\StatusCandidatoUpdateRequest;
use App\Repositories\StatusCandidatoRepository;
use App\Validators\StatusCandidatoValidator;

/**
 * Class StatusCandidatosController.
 *
 * @package namespace App\Http\Controllers;
 */
class StatusCandidatosController extends Controller {

    /**
     * @var StatusCandidatoRepository
     */
    protected $repository;

    /**
     * @var StatusCandidatoValidator
     */
    protected $validator;

    /**
     * StatusCandidatosController constructor.
     *
     * @param StatusCandidatoRepository $repository
     * @param StatusCandidatoValidator $validator
     */
    public function __construct(StatusCandidatoRepository $repository, StatusCandidatoValidator $validator) {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $statusCandidatos = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                        'data' => $statusCandidatos,
            ]);
        }

        return view('statusCandidatos.index', compact('statusCandidatos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StatusCandidatoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(StatusCandidatoCreateRequest $request) {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $statusCandidato = $this->repository->create($request->all());

            $response = [
                'message' => 'StatusCandidato created.',
                'data' => $statusCandidato->toArray(),
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
        $statusCandidato = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                        'data' => $statusCandidato,
            ]);
        }

        return view('statusCandidatos.show', compact('statusCandidato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $statusCandidato = $this->repository->find($id);

        return view('statusCandidatos.edit', compact('statusCandidato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StatusCandidatoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(StatusCandidatoUpdateRequest $request, $id) {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $statusCandidato = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'StatusCandidato updated.',
                'data' => $statusCandidato->toArray(),
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
                        'message' => 'StatusCandidato deleted.',
                        'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'StatusCandidato deleted.');
    }

}

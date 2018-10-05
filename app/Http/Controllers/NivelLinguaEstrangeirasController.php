<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\NivelLinguaEstrangeiraCreateRequest;
use App\Http\Requests\NivelLinguaEstrangeiraUpdateRequest;
use App\Repositories\NivelLinguaEstrangeiraRepository;
use App\Validators\NivelLinguaEstrangeiraValidator;

/**
 * Class NivelLinguaEstrangeirasController.
 *
 * @package namespace App\Http\Controllers;
 */
class NivelLinguaEstrangeirasController extends Controller {

    /**
     * @var NivelLinguaEstrangeiraRepository
     */
    protected $repository;

    /**
     * @var NivelLinguaEstrangeiraValidator
     */
    protected $validator;

    /**
     * NivelLinguaEstrangeirasController constructor.
     *
     * @param NivelLinguaEstrangeiraRepository $repository
     * @param NivelLinguaEstrangeiraValidator $validator
     */
    public function __construct(NivelLinguaEstrangeiraRepository $repository, NivelLinguaEstrangeiraValidator $validator) {
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
        $nivelLinguaEstrangeiras = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                        'data' => $nivelLinguaEstrangeiras,
            ]);
        }

        return view('nivelLinguaEstrangeiras.index', compact('nivelLinguaEstrangeiras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  NivelLinguaEstrangeiraCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(NivelLinguaEstrangeiraCreateRequest $request) {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $nivelLinguaEstrangeira = $this->repository->create($request->all());

            $response = [
                'message' => 'NivelLinguaEstrangeira created.',
                'data' => $nivelLinguaEstrangeira->toArray(),
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
        $nivelLinguaEstrangeira = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                        'data' => $nivelLinguaEstrangeira,
            ]);
        }

        return view('nivelLinguaEstrangeiras.show', compact('nivelLinguaEstrangeira'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $nivelLinguaEstrangeira = $this->repository->find($id);

        return view('nivelLinguaEstrangeiras.edit', compact('nivelLinguaEstrangeira'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  NivelLinguaEstrangeiraUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(NivelLinguaEstrangeiraUpdateRequest $request, $id) {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $nivelLinguaEstrangeira = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'NivelLinguaEstrangeira updated.',
                'data' => $nivelLinguaEstrangeira->toArray(),
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
                        'message' => 'NivelLinguaEstrangeira deleted.',
                        'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'NivelLinguaEstrangeira deleted.');
    }

}

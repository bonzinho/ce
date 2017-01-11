<?php

namespace codeFin\Http\Controllers\Admin;

use Illuminate\Http\Request;

use codeFin\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use codeFin\Http\Requests\EventAbrangenceCreateRequest;
use codeFin\Http\Requests\EventAbrangenceUpdateRequest;
use codeFin\Repositories\EventAbrangenceRepository;
use codeFin\Validators\EventAbrangenceValidator;


class EventAbrangencesController extends Controller
{

    /**
     * @var EventAbrangenceRepository
     */
    protected $repository;

    /**
     * @var EventAbrangenceValidator
     */
    protected $validator;

    public function __construct(EventAbrangenceRepository $repository, EventAbrangenceValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $eventAbrangences = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $eventAbrangences,
            ]);
        }

        return view('eventAbrangences.index', compact('eventAbrangences'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EventAbrangenceCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(EventAbrangenceCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $eventAbrangence = $this->repository->create($request->all());

            $response = [
                'message' => 'EventAbrangence created.',
                'data'    => $eventAbrangence->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
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
    public function show($id)
    {
        $eventAbrangence = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $eventAbrangence,
            ]);
        }

        return view('eventAbrangences.show', compact('eventAbrangence'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $eventAbrangence = $this->repository->find($id);

        return view('eventAbrangences.edit', compact('eventAbrangence'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  EventAbrangenceUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(EventAbrangenceUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $eventAbrangence = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'EventAbrangence updated.',
                'data'    => $eventAbrangence->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
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
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'EventAbrangence deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'EventAbrangence deleted.');
    }
}

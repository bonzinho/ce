<?php

namespace codeFin\Http\Controllers;

use Illuminate\Http\Request;

use codeFin\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use codeFin\Http\Requests\EventStateCreateRequest;
use codeFin\Http\Requests\EventStateUpdateRequest;
use codeFin\Repositories\EventStateRepository;
use codeFin\Validators\EventStateValidator;


class EventStatesController extends Controller
{

    /**
     * @var EventStateRepository
     */
    protected $repository;

    /**
     * @var EventStateValidator
     */
    protected $validator;

    public function __construct(EventStateRepository $repository, EventStateValidator $validator)
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
        $eventStates = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $eventStates,
            ]);
        }

        return view('eventStates.index', compact('eventStates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EventStateCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(EventStateCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $eventState = $this->repository->create($request->all());

            $response = [
                'message' => 'EventState created.',
                'data'    => $eventState->toArray(),
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
        $eventState = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $eventState,
            ]);
        }

        return view('eventStates.show', compact('eventState'));
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

        $eventState = $this->repository->find($id);

        return view('eventStates.edit', compact('eventState'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  EventStateUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(EventStateUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $eventState = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'EventState updated.',
                'data'    => $eventState->toArray(),
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
                'message' => 'EventState deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'EventState deleted.');
    }
}

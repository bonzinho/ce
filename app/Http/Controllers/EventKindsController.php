<?php

namespace codeFin\Http\Controllers;

use Illuminate\Http\Request;

use codeFin\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use codeFin\Http\Requests\EventKindCreateRequest;
use codeFin\Http\Requests\EventKindUpdateRequest;
use codeFin\Repositories\EventKindRepository;
use codeFin\Validators\EventKindValidator;


class EventKindsController extends Controller
{

    /**
     * @var EventKindRepository
     */
    protected $repository;

    /**
     * @var EventKindValidator
     */
    protected $validator;

    public function __construct(EventKindRepository $repository, EventKindValidator $validator)
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
        $eventKinds = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $eventKinds,
            ]);
        }

        return view('eventKinds.index', compact('eventKinds'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EventKindCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(EventKindCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $eventKind = $this->repository->create($request->all());

            $response = [
                'message' => 'EventKind created.',
                'data'    => $eventKind->toArray(),
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
        $eventKind = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $eventKind,
            ]);
        }

        return view('eventKinds.show', compact('eventKind'));
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

        $eventKind = $this->repository->find($id);

        return view('eventKinds.edit', compact('eventKind'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  EventKindUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(EventKindUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $eventKind = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'EventKind updated.',
                'data'    => $eventKind->toArray(),
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
                'message' => 'EventKind deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'EventKind deleted.');
    }
}

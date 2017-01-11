<?php

namespace codeFin\Http\Controllers\Admin;

use Illuminate\Http\Request;

use codeFin\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use codeFin\Http\Requests\EventTypeCreateRequest;
use codeFin\Http\Requests\EventTypeUpdateRequest;
use codeFin\Repositories\EventTypeRepository;
use codeFin\Validators\EventTypeValidator;


class EventTypesController extends Controller
{

    /**
     * @var EventTypeRepository
     */
    protected $repository;



    public function __construct(EventTypeRepository $repository)
    {
        $this->repository = $repository;

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $eventTypes = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $eventTypes,
            ]);
        }

        return view('eventTypes.index', compact('eventTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EventTypeCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(EventTypeCreateRequest $request)
    {

        try {



            $eventType = $this->repository->create($request->all());

            $response = [
                'message' => 'EventType created.',
                'data'    => $eventType->toArray(),
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
        $eventType = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $eventType,
            ]);
        }

        return view('eventTypes.show', compact('eventType'));
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

        $eventType = $this->repository->find($id);

        return view('eventTypes.edit', compact('eventType'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  EventTypeUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(EventTypeUpdateRequest $request, $id)
    {

        try {



            $eventType = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'EventType updated.',
                'data'    => $eventType->toArray(),
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
                'message' => 'EventType deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'EventType deleted.');
    }
}

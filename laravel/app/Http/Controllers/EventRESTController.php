<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EventRESTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();

        $responseJSON = new \stdClass;
        $responseJSON->success = true;
        $responseJSON->total = count($events);
        $responseJSON->data = $events;

        return response()->json($responseJSON);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Event;
        if($event)
        {
            $event->name = Request::input('name');
            $event->type = Request::input('type');
            $event->place = Request::input('place');
            $event->town = Request::input('town');
            $event->dateTime = Request::input('dateTime');
            $event->creator = Request::input('creator');
            $event->save();
        }

        $responseJSON = new \stdClass;
        $responseJSON->success = true;
        $responseJSON->data = $event;

        return response()->json($responseJSON);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);

        $responseJSON = new \stdClass;
        $responseJSON->success = true;
        $responseJSON->data = $event;

        return response()->json($responseJSON);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        if($event)
        {
            $event->name = Request::input('name');
            $event->type = Request::input('type');
            $event->place = Request::input('place');
            $event->town = Request::input('town');
            $event->dateTime = Request::input('dateTime');
            $event->save();
        }

        $responseJSON = new \stdClass;
        $responseJSON->success = true;
        $responseJSON->data = $event;

        return response()->json($responseJSON);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        if($event)
        {
            $event->delete();
        }

        $responseJSON = new \stdClass;
        $responseJSON->success = true;

        return response()->json($responseJSON);
    }
}

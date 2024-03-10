<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VacationPlan;
use Exception;


class VacationController extends Controller
{

    public function index()
    {
        return VacationPlan::All();
    }

    public function show($id)
    {
        $vacation = VacationPlan::findOrFail($id);

        return  response()->json(['data' => $vacation]);
    }

    public function store(Request $request)
    {

        $data = $request->json()->all();



        try {
            VacationPlan::create($data);
        } catch (Exception $error) {
            return $error;
        }
    }


    public function update(Request $request, $id)
    {
        $vacation = VacationPlan::findOrFail($id);
        $data = $request->json()->all();

        $vacation->update($data);

        return response()->json(['data' => $vacation]);
    }


    public function delete($id)
    {
        $vacation = VacationPlan::findOrFail($id)->delete();

        return response()->json([], 204);
    }


    public function pdf($id)
    {
        $plan =  VacationPlan::findOrFail($id);
        $html =  "<h1>Vacation Plan</h1> </br> <p>Title: </p>" . $plan->title .
            "</br> <p>Description:</p>" . $plan->description .
            "</br> <p>Date:</p>"  . $plan->date .
            "</br> <p>Location:</p>"  . $plan->location .
            "</br> <p>Participants:</p>"  . $plan->participants .

            $snappy = app('snappy.pdf');

        $snappy->generateFromHtml($html, storage_path("vacatioPlan" . $plan->id . ".pdf"));
    }
}

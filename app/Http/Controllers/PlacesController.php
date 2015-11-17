<?php
/**
 * Places controller
 */
namespace App\Http\Controllers;

use App\Transformers\CheckinTransformer;
use App\Transformers\PlaceTransformer;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use Illuminate\Http\Request;
use League\Fractal\Resource\Item;
use App\Place;

class PlacesController extends ApiController {

    protected $place;

    function __construct(Place $place)
    {
        $this->place = $place;
    }

    public function index(Manager $fractal, PlaceTransformer $placeTransformer)
    {
        $places = $this->place->take(10)->get();
        $collection = new Collection($places, $placeTransformer);
        $data = $fractal->createData($collection)->toArray();
        return $this->respondWithCORS($data);
    }

    public function store(Request $request)
    {
        //$this->validate($request, $this->validationRules);
        $this->place->name = $request->get('name');
        $this->place->lat = $request->get('lat');
        $this->place->lon = $request->get('lon');
        $this->place->address1 = $request->get('address1');
        $this->place->address2 = $request->get('address2');
        $this->place->city = $request->get('city');
        $this->place->state = $request->get('state');
        $this->place->zip = $request->get('zip');
        $this->place->website = $request->get('website');
        $this->place->phone = $request->get('phone');
        $this->place->save();
        return $this->respondCreated('Place was created');
    }

    /**
     * @param Manager $fractal
     * @param PlaceTransformer $placeTransformer
     * @param $placeId
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Manager $fractal, PlaceTransformer $placeTransformer, $placeId)
    {
        $place = $this->place->find($placeId);
        $item = new Item($place, $placeTransformer);
        $data = $fractal->createData($item)->toArray();
        return $this->respond($data);
    }

    /**
     * @param $placeId
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($placeId)
    {
        $place = $this->place->findOrFail($placeId);
        $place->delete();
        return $this->respondOk('Place was deleted');
    }

    /**
     * @param Manager $fractal
     * @param PlaceTransformer $placeTransformer
     * @param $placeId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCheckins(Manager $fractal, PlaceTransformer $placeTransformer, $placeId)
    {
        $place = $this->place->with(['checkins'])->get();
        $collection = new Collection($place, $placeTransformer);
        $data = $fractal->createData($collection)->toArray();
        return $this->respond($data);
    }

    // What if we wanted to show a list of comments that users had left?
    // HINT: You will need to add migrations, edit models, and edit transformers

}

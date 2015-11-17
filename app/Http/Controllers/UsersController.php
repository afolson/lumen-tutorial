<?php
/**
 * Users controller
 */
namespace App\Http\Controllers;

use App\Transformers\CheckinTransformer;
use App\Transformers\UserTransformer;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use Illuminate\Http\Request;
use League\Fractal\Resource\Item;
use App\User;

class UsersController extends ApiController {

    // "user" is protected in some places, so we'll use "luser"
    protected $luser;

    function __construct(User $luser)
    {
        $this->luser = $luser;
    }
    
    public function index()
    {
        // Do stuff here!
    }

    public function show()
    {
        // AND HERE!
    }

    public function getCheckins()
    {
        // By now I hope you know what to do
    }

    // What if we wanted to show a list of comments a user had left?
}
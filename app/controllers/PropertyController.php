<?php
/**
 * Created by PhpStorm.
 * User: q
 * Date: 2/9/15
 * Time: 10:34 PM
 */

use Parse\ParseClient;
use Parse\ParseObject;
use Parse\ParseQuery;
use Parse\ParseACL;
use Parse\ParsePush;
use Parse\ParseUser;
use Parse\ParseInstallation;
use Parse\ParseException;
use Parse\ParseAnalytics;
use Parse\ParseFile;
use Parse\ParseCloud;
use Illuminate\Support\Collection;

class PropertyController extends BaseController {
    public function __construct()
    {
        ParseClient::initialize(APP_ID, REST_KEY, MASTER_KEY);
        $this->beforeFilter('parseAuth');
    }

    public function index()
    {
        return View::make('property.index');
    }

    public function addNewProperty()
    {
        return View::make('property.add');
    }

    public function submitNewProperty()
    {
        try {
            // Create Property Obj
            $propertyObj = new ParseObject("Property");
            $propertyObj->set("name", trim(Input::get('property_name')));
            $propertyObj->set("ownBy", trim(Input::get('constuction_by')));
            $propertyObj->set("address", trim(Input::get('address')));
            $propertyObj->set("province", trim(Input::get('province')));
            $propertyObj->set("postcode", trim(Input::get('postcode')));
            $propertyObj->set("country", trim(Input::get('country')));
            $propertyObj->set("latitude", trim(Input::get('latitude')));
            $propertyObj->set("logitude", trim(Input::get('logitude')));
            $propertyObj->save();

            return Redirect::to('properties');
            //echo 'New object created with objectId: ' . $store->getObjectId();
        } catch (ParseException $ex) {
            //echo 'Failed to create new object, with error message: ' + $ex->getMessage();
            return View::make('error');
        }
    }
}
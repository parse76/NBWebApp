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
        try{
            //Get Property list.
            $propertyQuery = new ParseQuery("Property");
            $propertyArray = $propertyQuery->find();

            return View::make('property.index')->with(array('propertyArray' => $propertyArray));
        }
        catch (ParseException $ex) {
            return View::make('error');
        }

//        return View::make('property.index');
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
            $propertyObj->set("contact", trim(Input::get('contact')));
            $propertyObj->set("email", trim(Input::get('email')));
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

    public function editProperty($id)
    {
        try{
            //Get Property list.
            $propertyQuery = new ParseQuery("Property");
            $propertyQuery->equalTo("objectId", $id);
            $propertyArray = $propertyQuery->find();

            return View::make('property.edit')->with(array('propertyObj' => $propertyArray));
        }
        catch (ParseException $ex) {
            return View::make('error');
        }
    }

    public function submitEditProperty()
    {
        $query = new ParseQuery("Property");
        $id = Input::get('id');
        $propertyObj = $query->get($id);

        $propertyObj->set("name", trim(Input::get('property_name')));
        $propertyObj->set("ownBy", trim(Input::get('constuction_by')));
        $propertyObj->set("address", trim(Input::get('address')));
        $propertyObj->set("contact", trim(Input::get('contact')));
        $propertyObj->set("email", trim(Input::get('email')));
        $propertyObj->set("province", trim(Input::get('province')));
        $propertyObj->set("postcode", trim(Input::get('postcode')));
        $propertyObj->set("country", trim(Input::get('country')));
        $propertyObj->set("latitude", trim(Input::get('latitude')));
        $propertyObj->set("logitude", trim(Input::get('logitude')));

        try
        {
            $propertyObj->save();
            return Redirect::to('properties');
        }
        catch (ParseException $ex) {
            return View::make('error');
        }
    }
}
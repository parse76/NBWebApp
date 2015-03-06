<?php
/**
 * Created by PhpStorm.
 * User: q
 * Date: 2/9/15
 * Time: 10:32 PM
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

class AnnouncementController extends BaseController {
    public function __construct()
    {
        ParseClient::initialize(APP_ID, REST_KEY, MASTER_KEY);
        $this->beforeFilter('parseAuth');
    }

    public function index()
    {
        try{
            //Get Property list.
//            $userQuery =  ParseUser::query();
//            $userQuery->equalTo("isAdmin", false);
//            $userArray = $userQuery->find();

            return View::make('announcement.index');
        }
        catch (ParseException $ex) {
            return View::make('error');
        }
    }

    public function addAnnounce()
    {
        return View::make('announcement.add');
    }

    public function submitAnnounce()
    {
        try{
            return View::make('announcement.index');
        }
        catch (ParseException $ex) {
            return View::make('error');
        }
    }
}
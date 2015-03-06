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
//        try{
//            //Get Property list.
////            $userQuery =  ParseUser::query();
////            $userQuery->equalTo("isAdmin", false);
////            $userArray = $userQuery->find();
//
//            return View::make('announcement.index');
//        }
//        catch (ParseException $ex) {
//            return View::make('error');
//        }

        try {
            $currentUser = Session::get('userSession');

            // Post By user
            $queryPost = new ParseQuery("PostActivity");
            $queryPost->equalTo("postByUser", $currentUser);
            $queryPost->descending("createdAt");
            $userPost = $queryPost->find();

            $userPostHistory = array();

            for ($i = 0; $i < count($userPost); $i++)
            {
                $object = $userPost[$i];

                if ($object->get('isPostWithImage') == true)
                {
                    // PostImage By user
                    $queryImage = new ParseQuery("PostImageActivity");
                    $queryImage->includeKey("postObject");
                    $queryImage->equalTo("postObject", $object);
                    $imagePost = $queryImage->find();

                    $postImage = $this->getPostImageArray($imagePost[key($imagePost)]);

                    $postObj = array(
//                        'likeCount' => $object->get('likeCount'),
//                        'postTitle' => $object->get('likeCount'),
                        'postDescription' => $object->get('postDescription'),
//                        'postLocation' => $object->get('likeCount'),
                        'postImage' => $postImage,
                        'isPostWithImage' => $object->get('isPostWithImage'),
                        'postBy' => $currentUser->get('firstname'),
                        'timestamp' => $object->get('timestamp'),
                        'postId' => $object->getObjectId());
                    array_push($userPostHistory, $postObj);
                }
                else
                {
                    $postObj = array(
//                        'likeCount' => $object->get('likeCount'),
//                        'postTitle' => $object->get('likeCount'),
                        'postDescription' => $object->get('postDescription'),
//                        'postLocation' => $object->get('likeCount'),
                        'postImage' => null,
                        'isPostWithImage' => $object->get('isPostWithImage'),
                        'postBy' => $currentUser->get('firstname'),
                        'timestamp' => $object->get('timestamp'),
                        'postId' => $object->getObjectId());
                    array_push($userPostHistory, $postObj);
                }
            }

//            $userMessageResult = $this->getMessageUser($user);

            return View::make('announcement.index')->with(array('user' => $currentUser, 'userPostHistory' => $userPostHistory));
        } catch (ParseException $ex) {
            return View::make('error');
        }
    }

    public function addAnnounce()
    {
        return View::make('announcement.add');
    }

    public function submitAnnounce()
    {
        try {
            // Create Property Obj
            $currentUser = Session::get('userSession');
            $announceObj = new ParseObject("PostActivity");
            $announceObj->set("postByUser", $currentUser);
            $announceObj->set("postByUserType", "ADMIN");
            $announceObj->set("timestamp", "1425900000");
            $announceObj->set("postDescription", trim(Input::get('desc')));
            $announceObj->set("postTitle", trim(Input::get('title')));
            $announceObj->set("isPostWithImage", Input::hasFile('file'));
            $announceObj->set("postType", "ANNOUNCE");
            $announceObj->save();

            if (Input::hasFile('file'))
            {
                // Add Promo Image
                $announceImage = new ParseObject("PostImageActivity");
                $announceImage->set("postObject", $announceObj);

                // logo upload
                $filePath = Input::file('file')->getRealPath();
                $fileName = Input::file('file')->getClientOriginalName();
                $fileType = Input::file('file')->getClientMimeType();
                $promoImg = ParseFile::createFromFile($filePath, $fileName, $fileType);
                $promoImg->save();
                $announceImage->set("image", $promoImg);
                $announceImage->save();
            }

            return Redirect::to('announcement');
            //echo 'New object created with objectId: ' . $store->getObjectId();
        } catch (ParseException $ex) {
            //echo 'Failed to create new object, with error message: ' + $ex->getMessage();
            return View::make('error');
        }
    }

    public function getPostImageArray($post)
    {
        $postItem = array(
            'id' => $post->getObjectId(),
            'postImage' => $post->get('image'));

        return $postItem;
    }
}
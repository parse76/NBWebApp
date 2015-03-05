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

class UserController extends BaseController {
    public function __construct()
    {
        ParseClient::initialize(APP_ID, REST_KEY, MASTER_KEY);
        $this->beforeFilter('parseAuth');
    }

    public function index()
    {
        try{
            //Get Property list.
            $userQuery =  ParseUser::query();
            $userQuery->equalTo("isAdmin", false);
            $userArray = $userQuery->find();

            return View::make('user.index')->with(array('userArray' => $userArray));
        }
        catch (ParseException $ex) {
            return View::make('error');
        }
    }

    public function userDetail($id)
    {
        $query = ParseUser::query();
        try {
            $user = $query->get($id);

            // Post By user
            $queryPost = new ParseQuery("PostActivity");
            $queryPost->equalTo("postByUser", $user);
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
                    $queryImage->includeKey("postID");
                    $queryImage->equalTo("postID", $object);
                    $imagePost = $queryImage->find();

                    $postItem = $this->getPostImageArray($imagePost[key($imagePost)]);

                    $postObj = array(
//                        'likeCount' => $object->get('likeCount'),
//                        'postTitle' => $object->get('likeCount'),
                        'postDescription' => $object->get('postDescription'),
//                        'postLocation' => $object->get('likeCount'),
                        'postImage' => $postItem,
                        'isPostWithImage' => $object->get('isPostWithImage'),
                        'postBy' => $user->get('firstname'),
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
                        'postBy' => $user->get('firstname'),
                        'timestamp' => $object->get('timestamp'),
                        'postId' => $object->getObjectId());
                    array_push($userPostHistory, $postObj);
                }
            }

//            $userMessageResult = $this->getMessageUser($user);

            return View::make('user.detail')->with(array('user' => $user, 'userPostHistory' => $userPostHistory));
        } catch (ParseException $ex) {
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
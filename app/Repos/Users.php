<?php
/**
 * @author smaosa@strathmore.edu
 *
 */
namespace App\Repos;

use GuzzleHttp\Client;

class Users
{
    public static function getUserFromWs($username) {
        //AUTOMATICALLY CREATE THE USER
        $baseURL = env('WEBSERVICE_BASEURL');
        // 1. Check if the username is numeric or not to determine if it is a student
        if (is_numeric($username)) {
            $isStudent = true;
        } else {
            $isStudent = false;
        }
        // 2. Call the appropriate endpoint on the dataservice to get user details
        $endpoint = $isStudent ? env('STUDENTS_ENDPOINT') : env('STAFF_ENDPOINT');
        $wsurl = "$baseURL/$endpoint/$username";
        $client = new Client();
        $response = $client->get($wsurl);
        return json_decode($response->getBody()->getContents());
    }
}

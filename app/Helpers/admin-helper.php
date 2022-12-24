<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

function upload_file($file, $dir)
{
    $file_name = time();
    $file_name .= rand();
    $file_name = sha1($file_name);
    $file->move(public_path() . "/uploads/" . $dir, $file_name . "." . $file->getClientOriginalExtension());
    $local_url = $file_name . "." . $file->getClientOriginalExtension();
    return 'uploads/' . $dir . '/' . $local_url;
}
function remove_file($file)
{
    if (File::delete($file)) {
        return true;
    }
    return false;
}
function getDays()
{
    return [
        array(
            'id' => 'Mo',
            'name' => 'Monday'
        ),
        array(
            'id' => 'Tu',
            'name' => 'Tuesday'
        ),
        array(
            'id' => 'We',
            'name' => 'Wednesday'
        ),
        array(
            'id' => 'Th',
            'name' => 'Thursday'
        ),
        array(
            'id' => 'Fr',
            'name' => 'Friday'
        ),
        array(
            'id' => 'Sa',
            'name' => 'Saturday'
        ),
        array(
            'id' => 'Su',
            'name' => 'Sunday'
        )
    ];
}

function getDayName($str)
{
    switch ($str) {
        case 'Mo':
            return 'Monday';
            break;
        case 'Tu':
            return 'Tuesday';
            break;
        case 'We':
            return 'Wednesday';
            break;
        case 'Th':
            return 'Tursday';
            break;
        case 'Fr':
            return 'Friday';
            break;
        case 'Sa':
            return 'Saturday';
            break;
        case 'Su':
            return 'Sunday';
            break;
    }
}

function chargesType($id)
{
    if ($id == 0)
        return 'Norminal';
    return 'Multiplier';
}

function getGender($gender)
{
    switch ($gender) {
        case 0:
            return 'Other';
            break;
        case 1:
            return 'Male';
            break;
        case 2:
            return 'Female';
            break;
    }
}

function getUserType($user_type)
{
    switch ($user_type) {
        case 1:
            return 'Rider';
            break;
        case 2:
            return 'Driver';
            break;
        case 3:
            return 'Partner';
            break;
    }
}

function getPromoType($type)
{
    switch ($type) {
        case 1:
            return 'Norminal';
            break;
        case 2:
            return 'Percentage';
            break;
    }
}

function getRideStatusName($status)
{
    switch ($status) {
        case 0:
            return 'New Booking';
            break;
        case 1:
            return 'Cancelled By User';
            break;
        case 2:
            return 'Accepted By Driver';
            break;
        case 3:
            return 'Cancelled By Driver';
            break;
        case 4:
            return 'Driver Arrived';
            break;
        case 5:
            return 'Trip Started';
            break;
        case 6:
            return 'Trip Completed';
            break;
        case 7:
            return 'Trip Book By Admin';
            break;
        case 8:
            return 'Trip Cancel By Admin';
            break;
    }
}

function currency_format($str)
{
    return 'A$'.$str;
}

function send_email($page, $subject, $email, $email_data)
{
    if (env('MAIL_USERNAME') && env('MAIL_PASSWORD')) {
        try {
            Log::info("email data are " . print_r($email_data, true));
            $site_url = url('/');
            Mail::send($page, array('email_data' => $email_data, 'site_url' => $site_url), function ($message) use ($email, $subject) {
                $message->to($email)->subject($subject);
            });
            Log::info('email sent');
        } catch (Exception $e) {
            Log::info("email not sent" . print_r($e, true));
            return "Something went wrong in mail configuration";
        }
        return "Invalid email or password.";
    } else {
        Log::info("Email is not sent env problem");
        return "Something went wrong in mail configuration";
    }
}

<?php

namespace App\Traits;

use App\Models\Company;
use App\Models\Invite;
use App\Models\ShortUrl;
use Illuminate\Support\Facades\Auth;

trait CompanyTrait
{
    public function shortUrlList()
    {
         $user = Auth::user();
        if ($user->hasRole('Admin')) {
            // Get all users invited by this admin (where user is inviter or invitee)
            $invite_id = $user->id;
             $users = Invite::where('invite_id', $invite_id)->get();
             if ($users->isEmpty()) {
                 $userIds = [$invite_id];
             }else{
                 $userIds = $users->pluck('user_id')->merge($invite_id)->all();
             }
             $shortUrls = ShortUrl::whereIn('user_id',  $userIds)->paginate(2);

        } elseif ($user->hasRole('Member')) {
            $shortUrls = ShortUrl::where('user_id', $user->id)->paginate(2);
        } else {
            $shortUrls = ShortUrl::paginate(2);
        }
        return $shortUrls;
    }

    public function inviteList()
    {
        $user = Auth::user();
        if ($user->hasRole('Admin')) {
            // Get all invites where this user is the inviter
            return Invite::where('invite_id', $user->id)->paginate(2);
        } elseif ($user->hasRole('SuperAdmin')) {
            // Get all invites where this user is invited
            return Invite::paginate(2);
        }else{
             return '';
        }

       // return Invite::paginate(2);
    }



}

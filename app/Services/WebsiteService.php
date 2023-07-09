<?php

namespace App\Services;

use App\Models\Website;

class WebsiteService
{
    public function getAllWebsites()
    {
        return Website::all();
    }

    public function getWebsiteById($id)
    {
        return Website::findOrFail($id);
    }

    public function subscribeToWebsite($website, $email)
    {
        $subscriber = SubscriberService::getsubscriber($email);

        if (!$subscriber) {
            $subscriber = SubscriberService::createsubscriber($email);
        }

        if ($website->subscribers()->where('subscribers.id', $subscriber->id)->first()) {

            return 'You have already subscribed.';
        } else {


            $subscriber->websites()->attach($website->id);
            return 'Subscription created successfully.';
        }
    }
}

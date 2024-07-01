<?php 
namespace App\Http\Helpers\Writer;

use App\Http\Helpers\Writer\Traits\WriterPaypal;
use App\Http\Helpers\Writer\Traits\WriterArticles;
use App\Http\Helpers\Writer\Traits\WriterCompetetion;
use App\Http\Helpers\Subscription\Traits\Subscriptions;
use App\Http\Helpers\Writer\Traits\WriterRegistration;


class Writer
{
	use WriterCompetetion,WriterArticles,WriterRegistration,Subscriptions,WriterPaypal;
}

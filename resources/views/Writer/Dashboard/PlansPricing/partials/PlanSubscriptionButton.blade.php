@if(Writer::SubscriptionIsActive(Auth::user()->id,$plan->id))
<button class="btn btn-info btn-lg btn-block">Subscribed</button>
@else
<button type="submit" formaction="{{ route('WriterChoosePlan',$plan->price_id) }}" class="btn btn-info btn-lg btn-block">Subscribe Now</button>
@endif

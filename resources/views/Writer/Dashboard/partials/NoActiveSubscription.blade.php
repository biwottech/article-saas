@if(!$activeplan = Writer::hasAnyActiveSubscription(Auth::user()->id))
<!-- Alert with content -->
<div class="alert alert-danger">
    <div class="card bg-transparent mb-0">
        <div class="card-body">
            <h3 class="text-danger"><i class="fa fa-info-circle"></i> Subscription</h3><strong>You don't have any active Subscription.<a href="{{ route('WriterPlansPricing') }}" class="btn-link">View Plans & Pricing</a></strong>
            <br>
        </div>
    </div>
</div>
@endif

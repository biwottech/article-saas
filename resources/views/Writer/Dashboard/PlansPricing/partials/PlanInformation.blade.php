@if($activeplan = Writer::hasAnyActiveSubscription(Auth::user()->id))
<!-- Alert with content -->
<div class="alert alert-info">
    <div class="card bg-transparent mb-0">
        <div class="card-body">
            <h3 class="text-info"><i class="fa fa-info-circle"></i> Subscription</h3><strong>You have an active Subscription.</strong>
        </div>
    </div>
</div>
@else
<!-- Alert with content -->
<div class="alert alert-danger">
    <div class="card bg-transparent mb-0">
        <div class="card-body">
            <h3 class="text-danger"><i class="fa fa-info-circle"></i> Subscription</h3><strong>You don't have any active Subscription.</strong>
        </div>
    </div>
</div>
@endif

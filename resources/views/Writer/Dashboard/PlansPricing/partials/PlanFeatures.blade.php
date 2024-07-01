@if($features = Writer::PlanFeatures($plan->id))
<li><strong>Can Join Max {{ $features->competetion_quantity}} Competetions </strong></li>
<br>
<li><strong>Can only Write {{ $features->writing_quantity}} Articles</strong></li>
<br>
<li><strong>Can Submit Max {{ $features->submit_quantity}} Articles</strong></li>
<br>
<li><strong>Need to Read {{ $features->reading_quantity}} Articles</strong></li>
<br>
<li><strong>Need to Rate {{ $features->rating_quantity}} Articles</strong></li>
@endif

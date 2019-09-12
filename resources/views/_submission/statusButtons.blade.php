<?php

use App\SubmissonInterface;
?>
<!-- Request Quote:  Users without permission can "Request Quote" -->
@if(!$submission->status)
<div class="row mt-3">
    <div class="col-sm" style="text-align:right;">

        <form method="POST" action="./{{$submission->display_id }}/quoteRequest">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-success btn-lg btn-block">Request Quote</button>
        </form>
    </div>
</div>
@endif

@if(Auth::check() && Auth::user()->canApproveBind())
@if($submission->status == SubmissonInterface::STATUS_RequestToQuote)
<!-- Approve Quote:  Users with permission can "Approve Quote" -->
<div class="row mt-3">
    <div class="col-sm" style="text-align:right;">

        <form method="POST" action="./{{$submission->display_id }}/quote">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-success btn-lg btn-block">Approve Quote</button>
        </form>
    </div>
</div>
@endif
@endif

<!-- Request Bind:  Users without permission can "Request to Bind" -->
@if($submission->status == SubmissonInterface::STATUS_Quoted)
<div class="row mt-3">
    <div class="col-sm" style="text-align:right;">
        <form method="POST" action="./{{$submission->display_id }}/bindRequest">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-success btn-lg btn-block">Request to Bind</button>
        </form>
    </div>
</div>
@endif
@if(Auth::check() && Auth::user()->canApproveBind())
@if($submission->status == SubmissonInterface::STATUS_RequestToBind)
<!-- Bind:  Users with permission can "Approve Bind" -->
<div class="row mt-3">
    <div class="col-sm" style="text-align:right;">
        <form method="POST" action="./{{$submission->display_id }}/bind">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-success btn-lg btn-block">Approve Bind</button>
        </form>
    </div>
</div>
@endif
@endif

@if($submission->status == SubmissonInterface::STATUS_Bound)
<div class="row mt-3">
    <div class="col-sm" style="text-align:right;">
        <form method="POST" action="./{{$submission->display_id }}/cancel">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger btn-lg btn-block">Cancel Policy</button>
        </form>
    </div>
</div>
@endif
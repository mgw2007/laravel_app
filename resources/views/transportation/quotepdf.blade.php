<style>
@page {
	header: page-header;
	footer: page-footer;
} 
th {
  font-weight: bold; 
  border-bottom: 1px solid #333;
  background-color: #11375B;
  color: #FFF;
  text-align: left;
  padding: 8px;
}
  
tr:nth-child(even) {
  background-color: #f2f2f2
}
  
td {
  padding: 8px;
}
  
ul {
  padding-left: 20px;
}
</style>

<body>
  
<div style="font-family:Arial, Helvetica, sans-serif;color:#333;">


<htmlpageheader name="page-header" margin-top="50">
<table style="font-family:Arial, Helvetica, sans-serif;" cellspacing="0">
  <tr>
    <td><img src="{{ asset('img/CWIS-Logo-Docs-150.png') }}"></td>
    <td width="500" align="right">
      APPLICATION<br />
      <span style="font-size:10px;">
        #{{ $submission->display_id }}<br />
        {{ $submission->legal_name}}
      </span>
    </td>
  </tr>
</table>
</htmlpageheader>
 

<htmlpagefooter name="page-footer">
<div style="text-align: center;font-family:Arial, Helvetica, sans-serif;">Cover Whale Insurance Solutions, Inc.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CA License No 0M87896&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page {PAGENO} of {nbpg}</div>
</htmlpagefooter>

<h1 style="text-align:center;">Commercial Trucking Application for:</h1>
<h2 style="text-align:center;">{{ $submission->legal_name}}</h2>
<h4 style="text-align:center;">USDOT # {{ $submission->dot_number}}</h4>
  
<img src="{{ asset('img/MotorTruck-800px.jpg') }}">  

<br /><br />
  
<table style="font-family:Arial, Helvetica, sans-serif; border:1px solid #333;" cellspacing="0">
  <thead>
  <tr>
    <th width="200" style="font-weight:bold;">Info</th>
    <th width="25"></th>
    <th width="500" style="font-weight:bold;">Applicant</th>
  </tr>
  </thead>
  <tr>
    <td style="font-weight:bold;">Legal Name:</td>
    <td></td>
    <td>{{ $submission->legal_name}}</td>
  </tr>
  <tr>
    <td style="font-weight:bold;">Address:</td>
    <td></td>
    <td>{{ $submission->phy_street }}<br />{{ $submission->phy_city }}, {{ $submission->phy_state }} {{ $submission->phy_zip }}</td>
  </tr>
</table>
  
  <br />
<h1 style="text-align:center;">BigRigInsure.com by CWIS</h1>
  <p style="text-align:center;">
    30211 Ave de Las Banderas, Suite 200 | Rancho Santa Margarita, CA 92688<br />
hello@CoverWhale.com
  </p>
  
<!--  
<p>{{ date_format($submission->created_at,"F d, Y") }}</p>
  
<p>Address Line 1<br />City, State ZIP</p>

<p>Submission #{{$submission->id }} <br />Dot Number #{{$submission->dot_number}}</p>


<p>Thank you and we're happy to provide you with the following quote indication.  Our goal is to provide you with the simplest web platform to bind accounts quickly.</p>
  
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> 

<p>Thank you,</p>  
<p>The Cover Whale Team</p>
  
  <br /><br /><br /><br />
  <p>Check out our other products!   [List of products and more info here]</p>
-->

<pagebreak>

  
  

<!--
<h2>Price Indication</h2>
  
<table align="center" style="font-family:Arial, Helvetica, sans-serif;" cellspacing="0">
  <tr>
    <th width="300" align="center" style="border:1px solid #333;font-size:2em;">Monthly</th>
    <td width="150"></td>
    <th width="300" align="center" style="border:1px solid #333;font-size:2em;">Yearly</th>  
  </tr>
  <tr>
    <td width="200" align="center" style="border-right: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;font-size:2em;"><br />${{(($submission->value_power_units * 0.06) - ($submission->value_power_units * 0.06 * 0.25)) / 12 * 1.1}} <small>/ month<br />&nbsp;<br /></td>
    <td width="100" align="center" style="font-weight:bold;font-size:1.2em;"><br />- OR -<br /></td>
    <td width="200" align="center" style="border-right: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;font-size:2em;"><br />${{$submission->value_power_units * 0.06}} <small>/ year<br />&nbsp;<br /></td>  
  </tr> 
</table>  
-->
    
<h2>Coverages and Limits</h2>
<table style="font-family:Arial, Helvetica, sans-serif; border:1px solid #333;" cellspacing="0">
  <tr>
    <th width="400" style="font-weight:bold;">Coverage</th>
    <th width="25"></th>
    <th width="50" align="right" style="font-weight:bold;">Limit</th>
    <th width="200"></th>
  </tr>
  <tr>
    <td >Aubomobile Physical Damage - Aggregate Limit</td>
    <td></td>
    <td align="right">${{ number_format("$submission->value_power_units",0) }}</td>
    <td></td>
  </tr> 
  <tr>
    <td>Aubomobile Physical Damage - Occurrence Limit</td>
    <td></td>
    <td align="right">${{ number_format("$submission->value_power_units",0) }}</td>
    <td>&nbsp;&nbsp;per scheduled vehicle</td>
  </tr> 
  <tr>
    <td>Aubomobile Physical Damage - Deductible</td>
    <td></td>
    <td align="right">$2,500</td>
    <td></td>
  </tr>
  <tr>
    <td>Motor Truck Cargo - Aggregate Limit</td>
    <td></td>
    <td align="right">$100,000</td>
    <td></td>
  </tr>
  <tr>
    <td>Motor Truck Cargo - Occurrence Limit</td>
    <td></td>
    <td align="right">$100,000</td>
    <td></td>
  </tr>
  <tr>
    <td>Motor Truck Cargo - Deductible</td>
    <td></td>
    <td align="right">$2,500</td>
    <td></td>
  </tr>
</table>

  <!--
<h2>Premium and Fees</h2>
<table style="font-family:Arial, Helvetica, sans-serif; border:1px solid #333;" cellspacing="0">
  <tr>
    <th width="400" style="font-weight:bold;">Coverage or Fee</th>
    <th width="25"></th>
    <th width="50" align="right" style="font-weight:bold;">Amount</th>
    <th width="200"></th>
  </tr>
  <tr>
    <td>Aubomobile Physical Damage Premium</td>
    <td></td>
    <td align="right">${{ number_format($submission->value_power_units * 0.06,2) }}</td>
    <td></td>
  </tr> 
  <tr>
    <td>Motor Truck Cargo Premium</td>
    <td></td>
    <td align="right">${{ number_format($submission->num_power_units * 1500,2) }}</td>
    <td></td>
  </tr> 
  <tr>
    <td>Policy Fee</td>
    <td></td>
    <td align="right">$475.00</td>
    <td></td>
  </tr>
  <tr>
    <td>Taxes</td>
    <td></td>
    <td align="right">$0.00</td>
    <td></td>
  </tr>
  <tr>
    <td>Total Cost</td>
    <td></td>
    <td align="right">$12345.00</td>
    <td></td>
  </tr>
</table>  
-->
  
<h2>Vehicle Schedule</h2>
  
@if ($submission->vehicles->count())

<table style="font-family:Arial, Helvetica, sans-serif; border:1px solid #333;" cellspacing="0">
  <thead>
  <tr>
    <th width="200">VIN</th>
    <th width="100">Year</th>
    <th width="150">Make</th>
    <th width="200">Model</th>
    <th width="100" align="right" >Value</th>
  </tr>
  </thead>
  
@foreach ($submission->vehicles as $vehicle)
{{ $vehicle->vehicle_id_number }} - {{ $vehicle->year }} - {{ $vehicle->make }}<br />
  <tr>
    <td>{{ $vehicle->vehicle_id_number }}</td>
    <td>{{ $vehicle->year }}</td>
    <td >{{ $vehicle->make }}</td>
    <td>{{ $vehicle->model }}</td>
    <td align="right">${{  number_format("$vehicle->value",0) }}</td>
  </tr>   
@endforeach
</table>   

@else
Vehicles must be scheduled before requesting a quote and to bind
  
@endif
      
<h2>Driver Schedule</h2>
  
@if ($submission->drivers->count())
  
<p>It is hereby noted and agreed that the vehicle(s) and trailer(s) specified in the schedule are only covered while being operated by the following person(s):</p>  

<table style="font-family:Arial, Helvetica, sans-serif; border:1px solid #333;" cellspacing="0">
  <thead>
  <tr>
    <th width="100" style="font-weight:bold;">First Name</th>
    <th width="100" style="font-weight:bold;">Last Name</th>
    <th width="200" style="font-weight:bold;">License State</th>
    <th width="200" style="font-weight:bold;">License Number</th>
    <th width="100" style="font-weight:bold;">Date of Birth</th>
  </tr>
  </thead>
@foreach ($submission->drivers as $driver)
  <tr>
    <td>{{ $driver->name_first }}</td>
    <td>{{ $driver->name_last }}</td>
    <td>{{ $driver->driver_license_state }}</td>
    <td>{{ $driver->driver_license_number}}</td>
    <td>{{ $driver->driver_date_of_birth}}</td>
  </tr>
@endforeach  
</table>

@else
Drivers must be scheduled before requesting a quote and to bind 
  
@endif  

<pagebreak>
  
<h2>Application Questionnaire</h2>
 
<table style="font-family:Arial, Helvetica, sans-serif; border:1px solid #333;" cellspacing="0">
  <thead>
  <tr>
    <th width="500" style="font-weight:bold;">Question</th>
    <th width="25"></th>
    <th width="200" style="font-weight:bold;">Answer</th>
  </tr>
  </thead>
  <tr>
    <td style="border-right:1px solid #333;">Best Description of Operations</td>
    <td></td>
    <td>
      
      <ul>
      @if ($submission->ops_local == 'Y')
       <li>Local Trucker</li>
      @endif
      
      @if ($submission->ops_long_haul == 'Y')
        <li>Long Haul Trucker</li>
      @endif
      
      @if ($submission->ops_intermodal_port == 'Y')
        <li>Intermodal or Port</li>
      @endif
      
      @if ($submission->ops_dump_truck_other == 'Y')
        <li>Dump Trucks (Other)</li>
      @endif
      
      @if ($submission->ops_dump_truck_sand_gravel == 'Y')
        <li>Dump Trucks (Sand and Gravel)</li>
      @endif
      
      @if ($submission->ops_end_dumper == 'Y')
        <li>End Dumper Units</li>
      @endif
      
      @if ($submission->ops_logging == 'Y')
        <li>Logging</li>
      @endif
      
      @if ($submission->ops_refrigerated == 'Y')
        <li>Refrigerated Trailer</li>
      @endif
      
      @if ($submission->ops_oversized_overnight == 'Y')
        <li>Oversized or Overweight</li>
      @endif
      
      @if ($submission->ops_automobile_hauler == 'Y')
        <li>Automobile Hauler</li>
      @endif
      
      @if ($submission->ops_household_goods == 'Y')
        <li>Household Goods Mover</li>
      @endif
      
      @if ($submission->ops_tanker == 'Y')
        <li>Tankers</li>
      @endif
      </ul>
    </td>
  </tr> 
  <tr>
    <td style="border-right:1px solid #333;">Does insured conduct any of the following Ineligible Operations:<br /><br />
      <ul>
        <li>New Ventures</li>
        <li>Haul in Mexico, Canada, Alaska, Hawaii, US Islands or Territories</li>
        <li>Contingent cargo or freight broker operation</li>
        <li>Buses, taxis, livery operations</li>
        <li>Rental leasing firms</li>
        <li>Mobile cranes, drill rigs</li>
        <li>Cement, Ready Mix, pumpers</li>
        <li>Auto Haulers, Private Passenger Autos</li>
        <li>Tow trucks, repossession work</li>
        <li>Hazmat, Nuclear, Biological</li>
      </ul>
    </td>
    <td></td>
    <td>{{ $submission->ineligible_operations }}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Number of Years in Business</td>
    <td></td>
    <td>{{ $submission->years_business }}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">% of Hauls over 500 miles</td>
    <td></td>
    <td>{{ $submission->percent_hauls_over_500 }}%</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Top 3 States insured Hauls in</td>
    <td></td>
    <td>{{ $submission->top_states_insured_hauls }}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Are over 10% of loads brokered to other truckers?</td>
    <td></td>
    <td>{{ $submission->over_loads_brokered }}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Gross Annual Trucking Revenue</td>
    <td></td>
    <td>${{ number_format($submission->annual_revenue,0) }}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Annual Mileage</td>
    <td></td>
    <td>{{ $submission->annual_mileage }}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Do you haul non-owned trailers and require Trailer Interchange coverage?</td>
    <td></td>
    <td>{{ $submission->trailer_interchange }}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Cargo: Top 3 Commodities:</td>
    <td></td>
    <td>
      {{ $submission->commodity_1 }}: {{ $submission->commodity_1_percentage }}%<br />
      {{ $submission->commodity_2 }}: {{ $submission->commodity_2_percentage }}%<br />
      {{ $submission->commodity_3 }}: {{ $submission->commodity_3_percentage }}%<br />
    </td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Prohibited Commodities - Does the insured transport any of the following?
    <br /><br />
      <ul>
        <li>Live Animals, Hanging meat</li>
        <li>Pharmaceuticals, controlled substances</li>
        <li>Arms, ammunition, tobacco, fireworks, fire arms</li>
        <li>Autos, Boats, motorcycles, ATV’s</li>
        <li>Overweight or oversize hauls</li>
        <li>Mobile cranes, rigs</li>
        <li>Mobile homes, buildings, RV’s</li>
        <li>Courier operations</li>
        <li>Household Goods Movers</li>
        <li>Chlorine, liquid gas, LPG, ammonia, Explosive material, Radioactive Materials</li>
        <li>Fine arts, Furs, Money, currency, bullion, precious stones, jewelry, antiques</li>
        <li>Human tissue, organs, specimens</li>
      </ul>
    </td>
    <td></td>
    <td>{{ $submission->prohibited_commodities_insured_transport }}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Refrigeration</td>
    <td></td>
    <td>{{ $submission->refrigeration }}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Do any drivers have more than 2 accidents in prior 3 years?</td>
    <td></td>
    <td>{{ $submission->driver_2_accidents }}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Do any drivers have more than 3 moving violations in prior 3 years?</td>
    <td></td>
    <td>{{ $submission->driver_3_moving }}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Do any drivers have a DUI, reckless driving, racing, manslaughter, or drug violation in prior 5 years?</td>
    <td></td>
    <td>{{ $submission->driver_reckless }}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Do any drivers exceed the threshold for prior 36 months:</td>
    <td></td>
    <td>{{ $submission->ineligible_drivers }}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Has the insured had 3 or more claims (Liability, Physical Damage, Cargo) in prior 3 years?</td>
    <td></td>
    <td>{{ $submission->loss_2_claims }}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Has the insured incurred over $75,000 in Auto Physical Damage or Liability or Cargo losses in prior 3 years?</td>
    <td></td>
    <td>{{ $submission->loss_exceeding }}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Do insured paid, open or reserves claims (Liability, Physical Damage, Cargo) exceed $75,000 in the prior 36 months?</td>
    <td></td>
    <td>{{ $submission->ineligible_loss_experience }}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Total losses for prior 3 years (Liability, Physical Damage, Cargo)</td>
    <td></td>
    <td>{{ $submission->total_losses_for_prior_3_years }}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Do you act as a freight broker or freight forwarder or arrange loads for others?</td>
    <td></td>
    <td>{{ $submission->freight_broker }}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Do any entities derive revenue from sources other than "for hire" trucking?</td>
    <td></td>
    <td>{{ $submission->for_hire }}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Do you use double and or triple trailers?</td>
    <td></td>
    <td>{{ $submission->multi_trailer }}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Are passengers ever allowed to accompany driver?</td>
    <td></td>
    <td>{{ $submission->passengers }}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Do you lease, loan, or rent any of the vehicles to others?</td>
    <td></td>
    <td>{{ $submission->loan_lease_others }}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Are all vehicles owned or operated under the applicants authority scheduled on this application?</td>
    <td></td>
    <td>{{ $submission->owned_operated_applicant }}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Do you own, lease or use vehicles other than scheduled below, except personal vehicles?</td>
    <td></td>
    <td>{{ $submission->other_nonscheduled_vehicles }}</td>
  </tr>
  
</table>

  
<pagebreak>
  
<h2 style="text-align:center;">LEGAL STATEMENT OF LOSS EXPERIENCE</h2>

<table style="font-family:Arial, Helvetica, sans-serif; border:1px solid #333;" cellspacing="0">
  <thead>
  <tr>
    <th width="200" style="font-weight:bold;">Instructions</th>
    <th width="500" style="font-weight:bold;">Please complete all sections. If you have questions or disagree with statements below contact Insurance Broker.</th>
  </tr>
  </thead>
  <tr>
    <td style="font-weight:bold;border-right:1px solid #333;">Coverage &amp; Term</td>
    <td>Commercial Trucking: Automobile Physical Damage and Motor Truck Cargo</td>
  </tr>
  <tr>
    <td style="font-weight:bold;border-right:1px solid #333;">Insured Loss Experience</td>
    <td>Have any claims been Paid, Open, or Reserved for Applicable Coverages? Indicate by marking “X” on the appropriate [box] below.</td>
  </tr>
  <tr>
    <td style="font-weight:bold;border-right:1px solid #333;">2016-2017</td>
    <td>[    ] Zero claims&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[    ] Yes, claim reported $__________</td>
  </tr>
  <tr>
    <td style="font-weight:bold;border-right:1px solid #333;">2017-2018</td>
    <td>[    ] Zero claims&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[    ] Yes, claim reported $__________</td>
  </tr>
  <tr>
    <td style="font-weight:bold;border-right:1px solid #333;">2018-2019</td>
    <td>[    ] Zero claims&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[    ] Yes, claim reported $__________</td>
  </tr>
  <tr>
    <td style="font-weight:bold;border-right:1px solid #333;">Claims notes, if applicable</td>
    <td></td>
  </tr>
</table>

<p>
I CERTIFY, UNDER PENALTY OF PERJURY AND MISREPRESENTATION, THAT THE CLAIMS STATEMENT ABOVE IS ACCURATE FOR THE PRIOR 3 POLICY YEARS. THIS STATEMENT IS MATERIAL TO THE INSURANCE UNDERWRITING, ACCEPTABILITY AND QUOTATION.
</p>

<p><b>California Fraud Statement:</b> For your protection, California law requires the following to appear on this form: Any person who knowingly presents a false or fraudulent claim for the payment of a loss is guilty of a crime and may be subject to fines and confinement in state prison.</p>

<p><b>California Legal Declaration:</b> I the undersigned, Declare: That I am the legal authorized person stated in this action. I am over the age of 18 years. I have personal knowledge of the facts contained in this declaration, and if called upon to testify I could and would testify competently testify to the truth of the facts stated herein. I make this Declaration in support of my Insurance application and loss experience. I have provided honest evidence of the Named Insured loss experience. I declare under penalty of perjury under the laws of the State of California that the foregoing is truthful and correct and that this Declaration is executed on [Date stated above].</p>
  
<table style="font-family:Arial, Helvetica, sans-serif; border:1px solid #333;" cellspacing="0">
 
  <tr>
    <td style="font-weight:bold;"><br /><br />Signature:</td>
    <td><br /><br />______________________________________________________</td>
    <td style="font-weight:bold;"><br /><br />Date:</td>
    <td><br /><br />_____________________________________</td>
  </tr>
  <tr>
    <td style="font-weight:bold;"><br /><br />Printed Name:</td>
    <td><br /><br />______________________________________________________</td>
    <td style="font-weight:bold;"><br /><br />Title:</td>
    <td><br /><br />_____________________________________</td>
  </tr>
</table>  
  
<pagebreak>
  
<h2 style="text-align:center;">DISCLOSURES, TERMS &amp; CONDITIONS</h2>

<p><b>Disclosure Statement for Brokered Business (In compliance with Texas Administrative Code 19.905)</b></p>
  

  <p>In order to serve your insurance needs, our agency has referred your application to Cover Whale Insurance Solutions, Inc. We do not have appointment with the insurance company through which this insurance is issued, and therefore we are not authorized to bind coverage or to execute or issue the policy. We have the authority to prepare the application, collect and remit the premium, and deliver the policy and any endorsements. Please contact our agency if you require any changes to this policy or need to report a claim. </p>

<p><b>Disclosure of Surplus Lines Placement</b></p>
  
<ul>

 <li>Despite our efforts to place your coverage with an insurance company that is licensed in CA, your policy will be placed through a Surplus Lines Company. This company is different from a licensed company in several respects. Please review applicable disclosure forms.</li>

<li>
Surplus lines insurance companies must be approved by the CA Department of Insurance to operate in CA, but policies written through these companies are not protected by the state guaranty fund in the event the company becomes insolvent. The company we will place your coverage with is rated “A (Excellent)” by the A. M. Best Company.</li>

<li>In addition, surplus lines companies are not required to submit their policy forms to the Department of Insurance for approval, so the coverage may differ from a licensed insurance company. </li>

<li>Before we can issue your policy, we need for you to sign below, indicating that you understand and acknowledge your coverage may not be as broad as it has been in the past and that coverage will be placed through a surplus lines company. Please read your policy carefully when you receive it and call us if you have any questions. Thank you for your business. I acknowledge that I have reviewed and understand the Disclosure Statements above.</li>
  
</ul>
  
  
<p><b>Surplus Lines Insurance Information</b></p>
  
<p>Submitting producer must make sure the issuance of the policy complies with all countersignature and disclosure requirements, and surplus lines filings will be completed in compliance with state surplus lines procedures.
No Representation or Warranty- Broker makes no warranty regarding:  (a) the financial solvency, or ability to pay claims, of any insurer (or insurers) with whom customer policies may be placed; or (b) the sufficiency of coverage or coverages in the policy or policies obtained for customer
Surplus Lines Fees & Taxes:  We are disclosing the following fees and taxes are applicable: Surplus Lines Tax: 3.00% + Stamping fee: 0.25% = Total 3.25%

<p><b>Standard Fee Statement - Pursuant CA Insurance Code Section 1623</b></p>
  
<p>We may charge fees in addition to the monies received for assistance with this coverage placement, servicing, or renewal of insurance coverages.  Other parties wholesale brokers may also receive compensation for their participation in providing insurance products to you.  The fees charged to you have been disclosed to you within this proposal, and you have given your consent.
Customer agrees to pay Broker a fee for Brokers services. The full amount of the broker fee being charged by Broker is $400.00 and is non-refundable.  Broker also may be entitled to receive compensation from the insurer, directly or indirectly, for the customer purchase of any insurance as a part of this agreement.

<p><b>Commission Disclosure </b></p>
  
<p>As a wholesale insurance broker, we provides brokerage and other services to retail agents and brokers and does not solicit insurance from the public.   
  
<p>We are compensated in a variety of ways, primarily in the form of commissions paid by carriers and/ or fees paid by clients.  
We may also receive other forms of compensation from carriers or MGA’s such as employee training and development, fees, contingent income, and supplemental commissions.  

<p>Contingent or supplemental commissions can be based on profitability, premium volume and/ or growth with a carrier.  
From time-to-time, we may place business with affiliated insurance intermediators that may also receive compensation.
Please feel free to ask any questions about our compensation generally by contacting us at hello@coverwhale.com

<p><b>TRIA</b></p>
I acknowledge that I have been notified of the Terrorism Risk Insurance Act (TRIA) of 2007, the premium attributable to this coverage, and the option to accept or decline. I have declined this coverage and signed form.

<p><b>Recommendation to obtain Legal Advice &amp; Representation</b></p>

  <p><p>The discussion and items reviewed are a risk management perspective and do NOT represent legal advice.  We are not authorized to provide legal advice, and recommend you seek advice of legal counsel to become apprised of the legal implications related to issues and coverage.

<p><b>Personal information</b></p>
<p>Personal information, including information from a credit or other investigation report, may be collected from persons other than you In connection with this application. Such information as well as other personal and privileged information collected by us or our agents may in circumstances disclosed to third parties without your authorization. You may have the right to review your personal information in our files and request correction of any inaccuracies. These rights may be limited in some states. Please contact your agent to learn how these rights may apply in your state or instructions on how to submit a request to us for more detailed description of your rights.

<p><b>Electronic forms and communication</b></p>
<p>The policyholder elects to allow for insurance policy and/or other supporting documents in connection with the insurance policy to be sent to the electronic mail address provided and will update the broker and insurer in the event that the email address changes.

  <p>I select the option to receive the following documents in connection with my insurance policy electronically, for myself and all those covered under the policy. I acknowledge I may no longer receive paper copies of my insurance policy, unless I advise my insurer to continue to provide paper copies in addition to electronic copies. Insurance Policy, Notices of Cancellation, Invoice, Finance Statements, Insurance company notices, Broker notices, Other supporting documents in connection with my insurance policy.

<p><b>Complaints Procedure: </b></p>
  
  <p>Should you wish to make a complaint please submit in writing to: hello@coverwhale.com
  
<p><b>The Gramm Leach Bliley Act</b></p>

<p>The Gramm Leach Bliley Act (GLBA) is a comprehensive law governing the use of customer information by financial institutions that imposes a series of privacy requirements.</p>

<p>Individuals Protected Under the GLBA<p>

<ul>
    <li>Consumers and Customers</li>
    <li>Under the National Association of Insurance Commissioners (NAIC) Model Act, all claimants including first party claimants, under any contract of insurance, as consumers.</li>
</ul>

<p>Information Protected Under the GLBA</p>

<ul>
    <li>Nonpublic Personal Information</li>
    <li>Any personally identifiable financial information.</li>
    <li>Any list or grouping of consumers that is derived using personally identifiable financial information not available to the public.</li>
    <li>Personally Identifiable Financial Information</li>
    <li>Any information that a consumer provides or that is obtained in connection with a transaction involving a financial product or service.</li>
    <li>Any list of names and addresses that is derived from such information.</li>
    <li>Information provided on applications and other forms, information from a consumer report, information collected through an Internet “cookie.”</li>
</ul>

<p>Information Not Protected Under the GLBA</p>

<ul>
    <li>Publicly available information</li>
    <li>Any information that an agency has a reasonable basis to believe is lawfully available to the general public.</li>
    <li>Federal, state, or local government records and disclosures, widely distributed media such as a telephone book, newspaper, or publicly accessible web site.</li>
</ul>


<p>Risk Management’s Privacy Policy</p>

<ul>
    <li>We may disclose the following kinds of nonpublic personal information about your firm:</li>
    <li>Information we receive from your firm on applications or other forms, such as your name, address, tax ID number, income;</li>
    <li>Information about your transactions with us, our affiliates or others, such as your policy coverage, premiums, and payment history; and</li>
    <li>Information we receive from a consumer reporting agency, such as your creditworthiness and credit history.</li>
</ul>

<p><b>Our Commitment to Customers</b></p>
<p>We are committed to handling all customers’ complaints received promptly, fairly and in line with regulatory guidelines.  We deem a complaint to be any expression of dissatisfaction, whether oral or written, and whether justified or not, from or on behalf of an eligible complainant about the firm’s provision of, or failure to provide, insurance.</p>

<p><b>Duty of Disclosure: </b></p>
<p>Since an insurance contract is based upon the duty of utmost good faith, it is important that those seeking insurance should provide full disclosure of all material facts to insurers and that this information should be kept updated. Courts will find a fact to be ‘material’ where it would affect the judgement of a prudent Underwriter as to whether or not to accept the risk at the particular terms offered. The practical advice, which we give to clients or producers, is this: if you are in doubt we recommend that you advise the information to insurers.</p>

<p><b>Underwriting:</b></p>
<p>I agree to inspection of company may be conducted and all requested information will be provided including driver list, MVR’s, vehicle lists, loss data, or maintenance records.</p>
<p>I authorized company to order Motor Vehicle Reports for drivers stated and midterm changes.</p>

<p><b>Insurance Term Glossary:</b></p>
<p>It is incumbent upon the insured or representative to ask your licensed insurance agent for clarification if you do not understand any questions, limits, terms, conditions, definitions or statements in the application, quote proposal, policy or any other insurance document. Common glossary of Insurance terms to assist you with terminology: </p>
<p>http://insurancecommunityuniversity.com/UniversityResources/InsuranceGlossaryFREE.aspx</p>
<p>http://www.irmi.com/online/insurance-glossary/default.aspx</p>

<p><b>Policy Terms</b></p>
<p>Your policy will contain all the terms and conditions applicable in the event of a loss or claim. This proposal is an outline of the coverage proposed by the insurers based on the information provided by you and your company. </p> 
<p>This proposal does not include all of the terms, exclusions, limitations, and conditions of the actual policy contract language. For exact policy provisions and conditions, please refer to your policy.  </p>
<p>In the event of disparity between the proposal and actual policy form, the policy terms always prevail.
Read your insurance policies and review the specific details of coverage, conditions, exclusions, and limitations afforded under the policy.</p>

<p><b>Important Notice</b></p>
<p>I understand that the coverage selection and limits choices will apply to all future renewal policies unless I notify company in writing 
<p>My signature confirms that I have reviewed, read, understand and agree to terms and conditions outlined in this proposal and will notify us if any changes are required.</p>
  
<p>Claims Reporting: All claims or accidents are to be reported promptly regardless of severity or fault.
Loss data: It is unlawful to misrepresented or concealed claims data and it has been reported accurately.
MInimum Earned Premium: The policy include a minimum earned premium, service fee, and taxes which may non-refundable after binding. Subject to state laws.</p>
  
<p>DOT Filings: No federal or state cargo insurance filings will be made for the insured.</p>

<p><b>Quote Proposal Terms</b></p>
<p>The policy descriptions in this proposal are issued for informational purposes only. They do not alter, amend, or extend coverage. Only the policy can afford coverage.</p>
<p>This proposal is based on information provided by you, is subject to underwriting approval, and may changed without notice.  This proposal is valid for 30 days.  We rely on complete and accurate information provided by you for this proposal.  Should any changes or corrections need to be made please notify us immediately. Acceptability of this risk is dependent upon company underwriting approval.</p>
<p>Please review proposal carefully as the terms and conditions of coverage may differ from requested on application.</p>
<p>This is not a binder of insurance. This is only an indication and may be withdrawn at any time prior to acceptance and will cancel after expiration date of any existing policy.</p>
<p>I have reviewed the proposal and request that you bind coverage, subject to the premiums and terms outlined in this proposal and governed by the policy terms and conditions in current use by the insurance company.</p>
<p>This proposal does not represent a binder of insurance.  We will request binding upon receipt of payment and signatures on all required documentation, and will provide you with confirmation of coverage as well as policy number(s) from the insurance company.</p>

<p><b>Invoice &amp; Payment terms</b></p>
<p>In the event the finance company issues a cancellation, the insurance company and broker have the right to honor the finance company’s cancellation date without any further notice. </p>
<p>We reserves the right to not request reinstatement on accounts that have cancelled more than once for non-payment of premium, returned checks or failure to pay.  Furthermore, the insurance company may deny claims.</p>
<p>I agree to 10-day payment terms of all invoices.</p>
<p>Premium financing requires Down payments and policy fee are due prior to binding any coverage. </p>
<p>Acceptance of this proposal also authorizes us to act as our exclusive representative as respects to receiving premium and/or claim payments and/or reviewing loss history, claim details, etc.</p>
<p>Any cancellation after the acceptance of this proposal is subject to the Policy Cancellation Clause.</p>
<p>All other applicable fee(s) are earned in full and non-refundable.</p>

<p><b>Scheduled Vehicles</b></p>
<p>All vehicles scheduled on the policy must be owned or registered to the named insured or have a written lease agreement between the insured and vehicle owner.</p>
<p>I certify that this is my correct and current driver list.  I acknowledge that any and all changes need to be reported to immediately.</p>
<p>Coverage does not apply driver or vehicle not scheduled on policy.</p>
<p>Any claim involving an unreported driver/vehicle may result in cancellation of your policy </p>

<p><b>Brokerage Agreement</b></p>
<p>I agree to the terms and conditions stated in the Broker Agreement which can be reviewed at: www.coverwhale.com/Documents.</p>

<p><b>Fraud Statement:</b></p>
  
<p>Any person who knowingly and with intent to defraud any insurance company or an application for insurance containing any false information or conceals for the purpose of misleading information concerning any fact material there to commits a fraudulent insurance act which is a crime with possible criminal and or civil penalties as well as voiding insurance contract.</p>

  <p>The insured acknowledges that they are applying for insurance on the basis of statements contained therein. The insured agrees that such policy shall be null and void if such information is false, misleading, or would materially affect acceptance of the risk by the Company.</p>
  
<p>  
The undersigned is an authorized representative and certifies that reasonable inquiry has been made to obtain answers to all questions on insurance company applications. By signing below, you certify that all answers on all applications are true, correct, and complete to the best of your knowledge.</p>

<table style="font-family:Arial, Helvetica, sans-serif; border:1px solid #333;" cellspacing="0">
 
  <tr>
    <td style="font-weight:bold;"><br /><br />Signature:</td>
    <td><br /><br />______________________________________________________</td>
    <td style="font-weight:bold;"><br /><br />Date:</td>
    <td><br /><br />_____________________________________</td>
  </tr>
  <tr>
    <td style="font-weight:bold;"><br />Printed Name:</td>
    <td><br />______________________________________________________</td>
    <td style="font-weight:bold;"><br />Title:</td>
    <td><br />_____________________________________</td>
  </tr>
</table>   
  
  
<pagebreak>
  
<h2 style="text-align:center;">POLICYHOLDER DISCLOSURE - NOTICE OF TERRORISM INSURANCE COVERAGE</h2>
  
<p>  
You are hereby notified that under the Terrorism Risk Insurance Act, as amended, you have a right to purchase insurance coverage for losses resulting from acts of terrorism. As defined in Section 102(1) of the Act: The term “act of terrorism” means any act or acts that are certified by the Secretary of the Treasury—in consultation with the Secretary of Homeland Security, and the Attorney General of the United States—to be an act of terrorism; to be a violent act or an act that is dangerous to human life, property, or infrastructure; to have resulted in damage within the United States, or outside the United States in the case of certain air carriers or vessels or the premises of a United States mission; and to have been committed by an individual or individuals as part of an effort to coerce the civilian population of the United States or to influence the policy or affect the conduct of the United States Government by coercion.
</p>  

<p>  
YOU SHOULD KNOW THAT WHERE COVERAGE IS PROVIDED BY THIS POLICY FOR LOSSES RESULTING FROM CERTIFIED ACTS OF TERRORISM, SUCH LOSSES MAY BE PARTIALLY REIMBURSED BY THE UNITED STATES GOVERNMENT UNDER A FORMULA ESTABLISHED BY FEDERAL LAW. HOWEVER, YOUR POLICY MAY CONTAIN OTHER EXCLUSIONS WHICH MIGHT AFFECT YOUR COVERAGE, SUCH AS AN EXCLUSION FOR NUCLEAR EVENTS. UNDER THE FORMULA, THE UNITED STATES GOVERNMENT GENERALLY REIMBURSES 85% THROUGH 2015; 84% BEGINNING ON JANUARY 1, 2016; 83% BEGINNING ON JANUARY 1, 2017; 82% BEGINNING ON JANUARY 1, 2018; 81% BEGINNING ON JANUARY 1, 2019 and 80% BEGINNING ON JANUARY 1, 2020, OF COVERED TERRORISM LOSSES EXCEEDING THE STATUTORILY ESTABLISHED DEDUCTIBLE PAID BY THE INSURANCE COMPANY PROVIDING THE COVERAGE. THE PREMIUM CHARGED FOR THIS COVERAGE IS PROVIDED BELOW AND DOES NOT INCLUDE ANY CHARGES FOR THE PORTION OF LOSS THAT MAY BE COVERED BY THE FEDERAL GOVERNMENT UNDER THE ACT.
</p>  
  
<p>  
YOU SHOULD ALSO KNOW THAT THE TERRORISM RISK INSURANCE ACT, AS AMENDED, CONTAINS A $100 BILLION CAP THAT LIMITS U.S. GOVERNMENT REIMBURSEMENT AS WELL AS INSURERS’ LIABILITY FOR LOSSES RESULTING FROM CERTIFIED ACTS OF TERRORISM WHEN THE AMOUNT OF SUCH LOSSES IN ANY ONE CALENDAR YEAR EXCEEDS $100 BILLION. IF THE AGGREGATE INSURED LOSSES FOR ALL INSURERS EXCEED $100 BILLION, YOUR COVERAGE MAY BE REDUCED.
</p>

<table style="font-family:Arial, Helvetica, sans-serif; border:1px solid #333;" cellspacing="0">
 
  <tr>
    <td style="font-weight:bold;border-right:1px solid #333;">Applicant’s Signature in one of the boxes below:</td>
    <td style="font-weight:bold;">Acceptance or Rejection of Terrorism Insurance Coverage</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">&nbsp;</td>
    <td>ACCEPT - I hereby ELECT to purchase terrorism coverage for a prospective additional premium of 1.5% of the quoted premium.</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">&nbsp;</td>
    <td>REJECT - I hereby DECLINE to purchase terrorism coverage for certified acts of terrorism. I understand that I will have no coverage for losses resulting from certified acts of terrorism.</td>
  </tr>
</table>  
  
<pagebreak>
  
<h2 style="text-align:center;">Standard Broker Disclosure</h2>

<p>
This disclosure was prepared by the California Insurance Commissioner. Please READ IT CAREFULLY!
Do not sign any broker fee agreement unless all of its blank lines and spaces have been filled-in and you have read this entire document and the agreement carefully.
</p>
  
<p>  
Your insurance broker represents you, the consumer, and is entitled to charge a broker fee if he/she chooses. This fee is not set by law, and may be negotiable between you and the broker.
</p>  
 
<p>  
It is illegal or improper for an insurance broker to charge you a fee for placing coverage solely with the California Automobile Assigned Risk Plan or the California FAIR Plan. Fees may be charged for placement of other coverages.
</p>
  
<p>  
Broker fees are often non-refundable even if you cancel your coverage. Refer to your broker fee agreement to see if your broker fee is non-refundable. However, you may be entitled to a full refund of a broker fee if your broker acted incompetently or dishonestly. Unresolved disputes over non-refunded broker fees can be forwarded to the Department of Insurance for review.
</p>
  
<p>  
You are entitled to obtain and keep a completed copy of this disclosure and any broker fee agreement you sign.
Your broker may receive commission from insurance company(ies) for placing your insurance. This commission may be paid to your broker by the insurance company(ies) in addition to any broker fee you pay.
</p>  
  
<p>  
If you will be paying your premium in installments to a finance company, by law you must receive a copy of a premium finance disclosure and agreement. Be sure to obtain and read those documents before signing a premium finance agreement. Also, ask the broker if the insurer offers its own installment payment plan. Insurer installment plans are often cheaper than premium financing through a separate premium finance company.
</p> 
  
<p>  
If your broker is placing automobile coverage, your broker must provide you with a copy of the current Department of Insurance Automobile Insurance pamphlet. If your broker is placing residential coverage, your broker must provide you with a copy of the current Department of Insurance Residential Insurance pamphlet. By signing this disclosure you acknowledge receipt of the appropriate pamphlet(s).
</p>
  
  
<pagebreak>  
  

<div style="font-weight:bold;font-size:14px;">  
<p style="text-align:center;">NOTICE:</p>

<p>
1. THE INSURANCE POLICY THAT YOU ARE APPLYING TO
PURCHASE IS BEING ISSUED BY AN INSURER THAT IS NOT
LICENSED BY THE STATE OF CALIFORNIA. THESE COMPANIES
ARE CALLED “NONADMITTED” OR “SURPLUS LINE” INSURERS.
</p><p>  
2. THE INSURER IS NOT SUBJECT TO THE FINANCIAL
SOLVENCY REGULATION AND ENFORCEMENT THAT APPLY TO
CALIFORNIA LICENSED INSURERS.</p><p>
3. THE INSURER DOES NOT PARTICIPATE IN ANY OF THE
INSURANCE GUARANTEE FUNDS CREATED BY CALIFORNIA
LAW. THEREFORE, THESE FUNDS WILL NOT PAY YOUR CLAIMS
OR PROTECT YOUR ASSETS IF THE INSURER BECOMES
INSOLVENT AND IS UNABLE TO MAKE PAYMENTS AS
PROMISED.</p><p>
4. THE INSURER SHOULD BE LICENSED EITHER AS A
FOREIGN INSURER IN ANOTHER STATE IN THE UNITED STATES
OR AS A NON-UNITED STATES (ALIEN) INSURER. YOU SHOULD
ASK QUESTIONS OF YOUR INSURANCE AGENT, BROKER, OR
“SURPLUS LINE” BROKER OR CONTACT THE CALIFORNIA
DEPARTMENT OF INSURANCE AT THE FOLLOWING TOLL-FREE
TELEPHONE NUMBER: 1-800-927-4357 OR INTERNET WEB SITE
WWW.INSURANCE.CA.GOV. ASK WHETHER OR NOT THE
INSURER IS LICENSED AS A FOREIGN OR NON-UNITED
STATES (ALIEN) INSURER AND FOR ADDITIONAL INFORMATION
ABOUT THE INSURER. YOU MAY ALSO CONTACT THE NAIC’S
INTERNET WEB SITE AT WWW.NAIC.ORG.</p><p>
5. FOREIGN INSURERS SHOULD BE LICENSED BY A STATE IN
THE UNITED STATES AND YOU MAY CONTACT THAT STATE’S
DEPARTMENT OF INSURANCE TO OBTAIN MORE INFORMATION
ABOUT THAT INSURER.</p><p>
6. FOR NON-UNITED STATES (ALIEN) INSURERS, THE INSURER
SHOULD BE LICENSED BY A COUNTRY OUTSIDE OF THE
UNITED STATES AND SHOULD BE ON THE NAIC’S
INTERNATIONAL INSURERS DEPARTMENT (IID) LISTING OF

APPROVED NONADMITTED NON-UNITED STATES INSURERS.
ASK YOUR AGENT, BROKER, OR “SURPLUS LINE” BROKER TO
OBTAIN MORE INFORMATION ABOUT THAT INSURER.</p><p>
7. CALIFORNIA MAINTAINS A LIST OF APPROVED SURPLUS
LINE INSURERS. ASK YOUR AGENT OR BROKER IF THE
INSURER IS ON THAT LIST, OR VIEW THAT LIST AT THE
INTERNET WEB SITE OF THE CALIFORNIA DEPARTMENT OF
INSURANCE: WWW.INSURANCE.CA.GOV.</p><p>
8. IF YOU, AS THE APPLICANT, REQUIRED THAT THE
INSURANCE POLICY YOU HAVE PURCHASED BE BOUND
IMMEDIATELY, EITHER BECAUSE EXISTING COVERAGE WAS
GOING TO LAPSE WITHIN TWO BUSINESS DAYS OR BECAUSE
YOU WERE REQUIRED TO HAVE COVERAGE WITHIN TWO
BUSINESS DAYS, AND YOU DID NOT RECEIVE THIS DISCLOSURE
FORM AND A REQUEST FOR YOUR SIGNATURE UNTIL AFTER
COVERAGE BECAME EFFECTIVE, YOU HAVE THE RIGHT TO
CANCEL THIS POLICY WITHIN FIVE DAYS OF RECEIVING THIS
DISCLOSURE. IF YOU CANCEL COVERAGE, THE PREMIUM WILL
BE PRORATED AND ANY BROKER’S FEE CHARGED FOR THIS
INSURANCE WILL BE RETURNED TO YOU.</p>
  
<p style="text-align:right;">
Date: _______________________________</p>
<p style="text-align:right;">
Insured: _____________________________</p>
<p>
D-1 (Effective January 1, 2017)  
</p>
  
</div>
  

<pagebreak>  
  
<p>
 Para información en español, visite www.consumerfinance.gov/learnmore o escribe a la Consumer Financial Protection Bureau, 1700 G Street N.W., Washington, DC 20552.
</p>
  
  
<h3 style="text-align:center;">A Summary of Your Rights Under the Fair Credit Reporting Act</h3>
  
<p>The federal Fair Credit Reporting Act (FCRA) promotes the accuracy, fairness, and privacy of information in the files of consumer reporting agencies. There are many types of consumer reporting agencies, including credit bureaus and specialty agencies (such as agencies that sell information about check writing histories, medical records, and rental history records). Here is a summary of your major rights under FCRA. For more information, including information about additional rights, go to www.consumerfinance.gov/learnmore or write to: Consumer Financial Protection Bureau, 1700 G Street N.W., Washington, DC 20552.</p>
  
<p>You must be told if information in your file has been used against you. Anyone who uses a credit report or another type of consumer report to deny your application for credit, insurance, or employment – or to take another adverse action against you – must tell you, and must give you the name, address, and phone number of the agency that provided the information.</p>
  
<p>You have the right to know what is in your file. You may request and obtain all the information about you in the files of a consumer reporting agency (your “file disclosure”). You will be required to provide proper identification, which may include your Social Security number. In many cases, the disclosure will be free. You are entitled to a free file disclosure if:</p>

<ul>
<li>a person has taken adverse action against you because of information in your credit report;</li>
<li>you are the victim of identity theft and place a fraud alert in your file;</li>
<li>your file contains inaccurate information as a result of fraud;</li>
<li>you are on public assistance;</li>
<li>you are unemployed but expect to apply for employment within 60 days.</li>
</ul>
  
<p>In addition, all consumers are entitled to one free disclosure every 12 months upon request from each nationwide credit bureau and from nationwide specialty consumer reporting agencies. See www.consumerfinance.gov/learnmore for additional information.</p>
  <p>You have the right to ask for a credit score. Credit scores are numerical summaries of your credit-worthiness based on information from credit bureaus. You may request a credit score from consumer reporting agencies that create scores or distribute scores used in residential real property loans, but you will have to pay for it. In some mortgage transactions, you will receive credit score information for free from the mortgage lender.</p>
  <p>You have the right to dispute incomplete or inaccurate information. If you identify information in your file that is incomplete or inaccurate, and report it to the consumer reporting agency, the agency must investigate unless your dispute is frivolous. See www.consumerfinance.gov/learnmore for an explanation of dispute procedures.</p>
  <p>Consumer reporting agencies must correct or delete inaccurate, incomplete, or unverifiable information. Inaccurate, incomplete, or unverifiable information must be removed or corrected, usually within 30 days. However, a consumer reporting agency may continue to report information it has verified as accurate.</p>
  <p>Consumer reporting agencies may not report outdated negative information. In most cases, a consumer reporting agency may not report negative information that is more than seven years old, or bankruptcies that are more than 10 years old.</p>
  <p>Access to your file is limited. A consumer reporting agency may provide information about you only to people with a valid need – usually to consider an application with a creditor, insurer, employer, landlord, or other business. The FCRA specifies those with a valid need for access.</p>
  <p>You must give your consent for reports to be provided to employers. A consumer reporting agency may not give out information about you to your employer, or a potential employer, without your written consent given to the employer. Written consent generally is not required in the trucking industry. For more information, go to www.consumerfinance.gov/learnmore.</p>
  <p>You may limit “prescreened” offers of credit and insurance you get based on information in your credit report. Unsolicited “prescreened” offers for credit and insurance must include a toll-free phone number you can call if you choose to remove your name and address form the lists these offers are based on. You may opt out with the nationwide credit bureaus at 1-888-5-OPTOUT (1-888-567-8688).</p>
  <p>The following FCRA right applies with respect to nationwide consumer reporting agencies:</p>
  
<h3 style="text-align:center;">CONSUMERS HAVE THE RIGHT TO OBTAIN A SECURITY FREEZE</h3>
  
  <p>You have a right to place a “security freeze” on your credit report, which will prohibit a consumer reporting agency from releasing information in your credit report without your express authorization. The security freeze is designed to prevent credit, loans, and services from being approved in your name without your consent. However, you should be aware that using a security freeze to take control over who gets access to the personal and financial information in your credit report may delay, interfere with, or prohibit the timely approval of any subsequent request or application you make regarding a new loan, credit, mortgage, or any other account involving the extension of credit.
  </p>
  <p>As an alternative to a security freeze, you have the right to place an initial or extended fraud alert on your credit file at no cost. An initial fraud alert is a 1-year alert that is placed on a consumer’s credit file. Upon seeing a fraud alert display on a consumer’s credit file, a business is required to take steps to verify the consumer’s identity before extending new credit. If you are a victim of identity theft, you are entitled to an extended fraud alert, which is a fraud alert lasting 7 years.
  </p>
  <p>A security freeze does not apply to a person or entity, or its affiliates, or collection agencies acting on behalf of the person or entity, with which you have an existing account that requests information in your credit report for the purposes of reviewing or collecting the account. Reviewing the account includes activities related to account maintenance, monitoring, credit line increases, and account upgrades and enhancements.
  </p>
  </p>You may seek damages from violators. If a consumer reporting agency, or, in some cases, a user of consumer reports or a furnisher of information to a consumer reporting agency violates the FCRA, you may be able to sue in state or federal court.
  </p>
  <p>Identity theft victims and active duty military personnel have additional rights. For more information, visit www.consumerfinance.gov/learnmore.
States may enforce the FCRA, and many states have their own consumer reporting laws. In some cases, you may have more rights under state law. For more information, contact your state or local consumer protection agency or your state Attorney General. For information about your federal rights, contact:
  </p>
  <p>States may enforce the FCRA, and many states have their own consumer reporting laws. In some cases, you may have more rights under state law. For more information, contact your state or local consumer protection agency or your state Attorney General. For information about your federal rights, contact:</p> 
  
<table style="font-family:Arial, Helvetica, sans-serif; border:1px solid #333; border-collapse: collapse;" >
  <tr>
    <td style="border:1px solid #333;">TYPE OF BUSINESS:</td>
    <td style="border:1px solid #333;">CONTACT:</td>
  </tr>
  <tr>
    <td style="border:1px solid #333;">1.a. Banks, savings associations, and credit unions with total assets of over $10 billion and their affiliates<br /><br />
b. Such affiliates that are not banks, savings associations, or credit unions also should list, in addition to the CFPB:</td>
    <td style="border:1px solid #333;">a. Consumer Financial Protection Bureau
1700 G Street, N.W.
Washington, DC 20552<br /><br />
b. Federal Trade Commission
Consumer Response Center
600 Pennsylvania Avenue, N.W.
Washington, DC 20580
(877) 382-4357</td>
  </tr>
  
    <tr>
    <td style="border:1px solid #333;">2. To the extent not included in item 1 above:<br />
a. National banks, federal savings associations, and federal branches and federal agencies of foreign banks<br /><br />
b. State member banks, branches and agencies of foreign banks (other than federal branches, federal agencies, and Insured State Branches of Foreign Banks), commercial lending companies owned or controlled by foreign banks, and organizations operating under section 25 or 25A of the Federal Reserve Act.<br /><br />
c. Nonmember Insured Banks, Insured State Branches of Foreign Banks, and insured state savings associations<br /><br />
d. Federal Credit Unions</td>
    <td style="border:1px solid #333;">a. Office of the Comptroller of the Currency
Customer Assistance Group
1301 McKinney Street, Suite 3450
Houston, TX 77010-9050<br /><br />
b. Federal Reserve Consumer Help Center
P.O. Box 1200
Minneapolis, MN 55480<br /><br />
c. FDIC Consumer Response Center
1100 Walnut Street, Box #11
Kansas City, MO 64106<br /><br />
d. National Credit Union Administration
Office of Consumer Financial Protection (OCFP)
Division of Consumer Compliance Policy and Outreach 1775 Duke Street
Alexandria, VA 22314</td>
  </tr>
  
  
  
  <tr>
    <td style="border:1px solid #333;">3. Air carriers</td>
    <td style="border:1px solid #333;">
      Asst. General Counsel for Aviation
      Enforcement &amp; Proceedings<br />
      Aviation Consumer Protection Division<br />
      Department of Transportation<br />
      1200 New Jersey Avenue, S.E.<br />
      Washington, DC 20590
    </td>
  </tr>
  
  <tr>
    <td style="border:1px solid #333;">4. Creditors Subject to the Surface Transportation Board</td>
    <td style="border:1px solid #333;">
    Office of Proceedings, Surface Transportation Board Department of Transportation<br />
    395 E Street, S.W.<br />
    Washington, DC 20423<br />
    </td>
  </tr>
  
  <tr>
    <td style="border:1px solid #333;">5. Creditors Subject to the Packers and Stockyards Act, 1921</td>
    <td style="border:1px solid #333;">Nearest Packers and Stockyards Administration area supervisor</td>
  </tr>
  
  <tr>
    <td style="border:1px solid #333;">6. Small Business Investment Companies</td>
    <td style="border:1px solid #333;">
    Associate Deputy Administrator for Capital Access<br />
    United States Small Business Administration<br />
    409 Third Street, S.W., 8th Floor<br />
    Washington, DC 20416
    </td>
  </tr>
  
  <tr>
    <td style="border:1px solid #333;">7. Brokers and Dealers</td>
    <td style="border:1px solid #333;">
      Securities and Exchange Commission<br />
      100 F Street, N.E.<br />
      Washington, DC 20549<br />
    </td>
  </tr>
  
  <tr>
    <td style="border:1px solid #333;">8. Federal Land Banks, Federal Land Bank Associations, Federal Intermediate Credit Banks, and Production Credit Associations</td>
    <td style="border:1px solid #333;">
      Farm Credit Administration<br />
      1501 Farm Credit Drive<br />
      McLean, VA 22102-5090<br />
    </td>
  </tr>
  
  <tr>
    <td style="border:1px solid #333;">9. Retailers, Finance Companies, and All Other Creditors Not Listed Above</td>
    <td style="border:1px solid #333;">
    FTC Regional Office for region in which the creditor operates or Federal Trade
    Commission: Consumer Response Center –
    FCRA<br />
    Washington, DC 20580<br />
    (877) 382-4357<br />
    </td>
  </tr>
</table>
  
  
<pagebreak>
<h3 style="text-align:center;">Disclosure Regarding Background Investigation</h3>
<p>
  Checkr (the “Company”) may obtain information about you from a third party consumer reporting agency
for employment purposes. Thus, you may be the subject of a “consumer report” and/or an “investigative
consumer report,” as defined in California, which may include information about your character, general
reputation, personal characteristics, and/or mode of living, and which can involve personal interviews
with sources such as your neighbors, friends, or associates. These reports may contain information
regarding your criminal history, motor vehicle records (“driving records”), verification of your education
or employment history, or other background checks.
  </p>
<p>
  You have the right, upon written request made within a reasonable time, to request whether a consumer
report has been run about you, and disclosure of the nature and scope of any investigative consumer
report and to request a copy of your report. Please be advised that the nature and scope of the most
common form of investigative consumer report is an employment history or verification. These searches
will be conducted by Checkr, Inc., One Montgomery Street, Suite 2000 San Francisco, CA 94104|
8448243257
| https://checkr.com/applicant . The scope of this disclosure is allencompassing,
however,
allowing the Company to obtain from any outside organization all manner of consumer reports throughout
the course of your employment to the extent permitted by law.  
  </p>
  
  <pagebreak>
  
  <h3 style="text-align:center;">Acknowledgment and Authorization for Background Check</h3>
<p>
  I acknowledge receipt of the separate documents entitled Disclosure Regarding Background Investigation
and A Summary of Your Rights Under the Fair Credit Reporting Act and certify that I have read and
understand both of those documents. I hereby authorize the obtaining of “consumer reports” and/or
“investigative consumer reports” by the Company at any time after receipt of this authorization and
throughout my employment, if applicable and to the extent permitted by law. For the purpose of preparing
a background check for Company, I hereby authorize any law enforcement agency, administrator, state or
federal agency, institution, school or university (public or private), information service bureau, past or
present employers, motor vehicle records agencies, or insurance company to furnish any and all
background information requested by Checkr, Inc., One Montgomery Street, Suite 2000 San
Francisco, CA 94104 | 8448243257
| https://checkr.com/applicant , as allowed by law, including
information concerning my employment and earnings history, education, credit history, motor vehicle
history, criminal history, military service, and professional credentials and licenses. I agree that an
electronic copy of this Authorization shall be as valid as the original.
    </p>

    <p>
      <b>Massachusetts applicants only:</b> Upon written request to the Company, you have the right to know
whether the Company ordered an investigative consumer report about you. You also have the right to
request from the consumer reporting agency a copy of any such report.
    </p>
<p>
  <b>Minnesota applicants only:</b> Upon a written request, you have the right to a complete and accurate
disclosure of the nature and scope of any consumer report the Company ordered about you. The consumer
reporting agency must provide you with this disclosure within 5 business days after its receipt of your
request or the report was requested by the Company, whichever date is later.
    </p>

    
    <p><b>Minnesota and Oklahoma applicants only:</b>
    </p>

    <p>[ ] Please check this box if you would like to receive a copy of a consumer report if one is obtained by
the Company.
    </p>

    <p><b>New Jersey applicants only:</b> You have the right to submit a request to the CRA for a copy of any
investigative consumer report the Company ordered about you.
    </p>

    <p><b>New York applicants only:</b> Upon request, you will be informed whether or not a consumer report was
requested by the Company, and if such report was requested, informed of the name and address of the
consumer reporting agency that furnished the report. You have the right to inspect and receive a copy of
any investigative consumer report requested by the Company by contacting the consumer reporting
agency identified above directly. By signing below, you acknowledge receipt of Article 23A
of the New
York Correction Law. Link to NY Article 23A: https://www.labor.ny.gov/formsdocs/wp/correction-law-article-23a.pdf
    </p>

    <p><b>New York City applicants only:</b> You acknowledge and authorize the Employer to provide any notices
required by federal, state or local law to you at the address(es) and/or email address(es) you provided to
the Employer.
    </p>

    <p><b>Washington State applicants only:</b> Upon written request to Company, you have the right to a complete
and accurate disclosure of the nature and scope of any investigative consumer report the Company
ordered about you. You are entitled to this disclosure within 5 business days after the date your request is
received or we ordered the report, whichever is later. You also have the right to request from the
consumer reporting agency a written summary of your rights and remedies under the Washington Fair
Credit Reporting Act.
    </p>

    <p><b>San Francisco applicants only:</b> Please click below for the San Francisco Fair Chance Act Notice.
    </p>
    <p>
    
● English (http://sfgov.org/olse/sites/default/files/FileCenter/Documents/11600-Art%20%2049%20Official%20Notice%20Final%20091114.pdf)
    </p>
    <p>
● Spanish (http://sfgov.org/olse/sites/default/files/FileCenter/Documents/12076-Art%20%2049%20Official%20Notice%20Final%20Spanish%20New%20%282%299.16.14.pdf)
    </p>
    <p>
● Tagalog (http://sfgov.org/olse/sites/default/files/FileCenter/Documents/12074-Art%20%2049%20Official%20Notice%20Final_Tagalog_addl%209.16.14.pdf)
    </p>
    <p>
● Chinese (http://sfgov.org/olse/sites/default/files/FileCenter/Documents/12075-Art%2049%20Official%20Notice%20Final%20Chinese%20%282%29%209.16.14.pdf)
    </p>
    <br /><br />
<p style="text-align:left;">
Date: _______________________________</p>
<p style="text-align:left;">
Applicant: _____________________________</p>    
  
</div> <!-- End Content div -->
</body>

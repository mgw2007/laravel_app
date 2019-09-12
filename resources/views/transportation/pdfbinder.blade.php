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
}  
</style>

<body>
<div style="font-family:Arial, Helvetica, sans-serif;color:#333;">
  

<htmlpagefooter name="page-footer">
<div style="text-align: center;font-family:Arial, Helvetica, sans-serif;">Cover Whale Insurance Solutions, Inc.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CA License No 0M87896&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page {PAGENO} of {nbpg}</div>
</htmlpagefooter>
  
<table style="font-family:Arial, Helvetica, sans-serif;" cellspacing="0">
  <tr>
    <td><img src="{{ asset('img/logo-cw.png') }}" width="300"></td>
    <td width="350" align="right">BINDER</td>
  </tr>
</table>
  
<br />

<p>{{ date_format($transportation->created_at,"F d, Y") }}</p>
  
<p>Address Line 1<br />City, State ZIP</p>

<p>Submission #{{$transportation->id }} <br />Dot Number #{{$transportation->dot_number}}</p>


<p>Thank you and we're happy to provide you with the following bind indication.</p>
  
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> 

<p>Thank you,</p>  
<p>The Cover Whale Team</p>
  
  <br /><br /><br /><br />
  <p>Check out our other products!   [List of products and more info here]</p>



<pagebreak>

<table style="font-family:Arial, Helvetica, sans-serif;" cellspacing="0">
  <tr>
    <td><img src="{{ asset('img/logo-cw.png') }}" width="300"></td>
    <td width="350" align="right">BINDER</td>
  </tr>
</table>
  
<br />
  


<h2>Price Indication</h2>
  
<table align="center" style="font-family:Arial, Helvetica, sans-serif;" cellspacing="0">
  <tr>
    <th width="300" align="center" style="border:1px solid #333;font-size:2em;">Monthly</th>
    <td width="150"></td>
    <th width="300" align="center" style="border:1px solid #333;font-size:2em;">Yearly</th>  
  </tr>
  <tr>
    <td width="200" align="center" style="border-right: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;font-size:2em;"><br />${{(($transportation->value_power_units * 0.06) - ($transportation->value_power_units * 0.06 * 0.25)) / 12 * 1.1}} <small>/ month<br />&nbsp;<br /></td>
    <td width="100" align="center" style="font-weight:bold;font-size:1.2em;"><br />- OR -<br /></td>
    <td width="200" align="center" style="border-right: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;font-size:2em;"><br />${{$transportation->value_power_units * 0.06}} <small>/ year<br />&nbsp;<br /></td>  
  </tr> 
</table>  
    
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
    <td align="right">${{ number_format("$transportation->value_power_units",0) }}</td>
    <td></td>
  </tr> 
  <tr>
    <td>Aubomobile Physical Damage - Occurrence Limit</td>
    <td></td>
    <td align="right">${{ number_format("$transportation->value_power_units",0) }}</td>
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
    <td align="right">${{ number_format($transportation->value_power_units * 0.06,2) }}</td>
    <td></td>
  </tr> 
  <tr>
    <td>Motor Truck Cargo Premium</td>
    <td></td>
    <td align="right">${{ number_format($transportation->num_power_units * 1500,2) }}</td>
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


  
  
<h2>Vehicle Schedule</h2>
  
@if ($transportation->vehicles->count())

<table style="font-family:Arial, Helvetica, sans-serif; border:1px solid #333;" cellspacing="0">
  <tr>
    <th width="200">VIN</th>
    <th width="100">Year</th>
    <th width="150">Make</th>
    <th width="200">Model</th>
    <th width="100" align="right" >Value</th>
  </tr>
  
@foreach ($transportation->vehicles as $vehicle)
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
Vehicles must be scheduled before requesting to bind
  
@endif
  
<h2>Driver Schedule</h2>
@if ($transportation->drivers->count())

<table style="font-family:Arial, Helvetica, sans-serif; border:1px solid #333;" cellspacing="0">
  <tr>
    <th width="100" style="font-weight:bold;">First Name</th>
    <th width="100" style="font-weight:bold;">Last Name</th>
    <th width="200" style="font-weight:bold;">License State</th>
    <th width="200" style="font-weight:bold;">License Number</th>
    <th width="100" style="font-weight:bold;">Date of Birth</th>
  </tr>
@foreach ($transportation->drivers as $driver)
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
Drivers must be scheduled before requesting to bind 
  
@endif  
  
<pagebreak>

<div style="font-weight:bold;">  
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
  

 
</div> 
</body>


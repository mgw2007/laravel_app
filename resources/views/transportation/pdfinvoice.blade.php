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
    <td width="350" align="right">Invoice</td>
  </tr>
</table>
  
<br />

<p>{{ date_format($transportation->created_at,"F d, Y") }}</p>
  
<p>Address Line 1<br />City, State ZIP</p>

<p>Submission #{{$transportation->id }} <br />Dot Number #{{$transportation->dot_number}}</p>


<table style="font-family:Arial, Helvetica, sans-serif; border:1px solid #333;" cellspacing="0">
  <tr>
    <th width="450" style="font-weight:bold;">Line Item</th>
    <th width="100"></th>
    <th width="100" align="right" style="font-weight:bold;">Amount</th>
  </tr>
  <tr>
    <td>Aubomobile Physical Damage Premium</td>
    <td></td>
    <td align="right">${{ number_format($transportation->value_power_units * 0.06,2) }}</td>
  </tr> 
  <tr>
    <td>Motor Truck Cargo Premium</td>
    <td></td>
    <td align="right">${{ number_format($transportation->num_power_units * 1500,2) }}</td>
  </tr> 
  <tr>
    <td>Policy Fee</td>
    <td></td>
    <td align="right">$475.00</td>
  </tr>
  <tr>
    <td>Taxes</td>
    <td></td>
    <td align="right">$0.00</td>
  </tr>
  <tr>
    <td>Total Cost</td>
    <td></td>
    <td align="right">${{ number_format(($transportation->value_power_units * 0.06 + $transportation->num_power_units * 1500) + 475,2) }}</td>
  </tr>
  <tr>
    <td>Commission (20% of Premium)</td>
    <td></td>
    <td align="right">-${{ number_format(($transportation->value_power_units * 0.06 + $transportation->num_power_units * 1500) * 0.2,2) }}</td>
  </tr>
  <tr>
    <td>Net Due</td>
    <td></td>
    <td align="right">${{ number_format(($transportation->value_power_units * 0.06 + $transportation->num_power_units * 1500) + 475 - ($transportation->value_power_units * 0.06 + $transportation->num_power_units * 1500) * 0.2,2) }}</td>
  </tr>
</table>  

  <br /> <br />
  
<p><b>ACH Transfer Instructions</b>
<br /><b>Bank Name:</b> Bank of America
<br /><b>Account Name:</b> Cover Whale Insurance Solutuins Inc.
<br /><b>Routing Number</b>: 4353222
<br /><b>Account Number:</b> 7456543222

  

</div>
</body>


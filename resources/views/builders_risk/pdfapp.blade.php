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
        {{ $submission->named_insured}}
      </span>
    </td>
  </tr>
</table>
</htmlpageheader>
 

<htmlpagefooter name="page-footer">
<div style="text-align: center;font-family:Arial, Helvetica, sans-serif;">Cover Whale Insurance Solutions, Inc.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CA License No 0M87896&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page {PAGENO} of {nbpg}</div>
</htmlpagefooter>

<h1 style="text-align:center;">Builders Risk Application for:</h1>
<h2 style="text-align:center;">{{ $submission->named_insured }}</h2>
  
<img src="{{ asset('img/BR-800px.jpg') }}">  

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
    <td>{{ $submission->named_insured}}</td>
  </tr>
  <tr>
    <td style="font-weight:bold;">Address:</td>
    <td></td>
    <td>{{ $submission->mailing_address }}<br />{{ $submission->mailing_city }}, {{ $submission->mailing_state }} {{ $submission->mailing_zip }}</td>
  </tr>
</table>
  
  <br />
<h1 style="text-align:center;">CalBuildersRisk.com by CWIS</h1>
  <p style="text-align:center;">
    30211 Ave de Las Banderas, Suite 200 | Rancho Santa Margarita, CA 92688<br />
hello@CoverWhale.com
  </p>
  

<pagebreak>
  
<h2>Application Questionnaire</h2>
 
<table style="font-family:Arial, Helvetica, sans-serif; border:1px solid #333;" cellspacing="0">
  <thead>
  <tr>
    <th width="500" style="font-weight:bold;">Question</th>
    <th width="200" style="font-weight:bold;">Answer</th>
  </tr>
  </thead>
  <tr>
    <td style="border-right:1px solid #333;">Named Insured</td>
    <td>{{ $submission->named_insured}}</td>
  </tr> 
  <tr>
    <td style="border-right:1px solid #333;">Mailing Address</td>
    <td>{{ $submission->mailing_address}}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Mailing City</td>
    <td>{{ $submission->mailing_city}}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Mailing State</td>
    <td>{{ $submission->mailing_state	}}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Mailing Zip</td>
    <td>{{ $submission->mailing_zip}}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Project Name</td>
    <td>{{ $submission->project_name}}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Project Start Date</td>
    <td>{{ $submission->project_start_date}}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Project End Date</td>
    <td>{{ $submission->project_end_date}}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Jobsite Address</td>
    <td>{{ $submission->jobsite_address}}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Jobsite City</td>
    <td>{{ $submission->jobsite_city}}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Jobsite State</td>
    <td>{{ $submission->jobsite_state}}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Jobsite Zip</td>
    <td>{{ $submission->jobsite_zip}}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Number Of Buildings</td>
    <td>{{ $submission->number_of_buildings}}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Construction Type</td>
    <td>{{ $submission->construction_type}}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Percent Of Structural Elements That Are Wood Frame</td>
    <td>{{ $submission->percent_of_structural_elements_that_are_wood_frame * 10 }}%</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Sq Ft</td>
    <td>{{ number_format($submission->sq_ft,0) }}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Stories Above Ground</td>
    <td>{{ $submission->stores_above_ground}}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Jobsite Within 50 Ft Of Water</td>
    <td>{{ $submission->jobsite_within_50_ft_of_water}}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Project Description</td>
    <td>{{ $submission->project_description}}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Intended Occupancy</td>
    <td>{{ $submission->intended_occupancy}}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Ground Up Construction Or Renovation</td>
    <td>{{ $submission->grond_up_construction_or_renovation}}</td>
  </tr><tr>
    <td style="border-right:1px solid #333;">Public Protection Class</td>
    <td>{{ $submission->public_protection_class}}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">List Site Security And Theft Controls</td>
    <td>{{ $submission->list_site_security_and_theft_controls}}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">List Any Unique Architecture Or Engineering Features</td>
    <td>{{ $submission->list_any_unique_architecture_or_engineering_features}}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Contractor Name</td>
    <td>{{ $submission->contractor_ame}}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Contractor Experience With Similar Projects</td>
    <td>{{ $submission->contractor_experience_with_similar_projects}}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">List Loss Payee Or Mortgagees</td>
    <td>{{ $submission->list_loss_payee_or_mortgagees}}</td>
  </tr><tr>
    <td style="border-right:1px solid #333;">Total Hard Cost (Physical Damage) Limit</td>
    <td align="right">${{ number_format($submission->total_hard_cost_physical_damage_limit,0) }}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">New Construction Value</td>
    <td align="right">${{ number_format($submission->new_construction_value,0) }}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Renovation Value (If Applicable)</td>
    <td align="right">${{ number_format($submission->renovation_value,0) }}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Existing Building / Shell Structure (If Applicable)</td>
    <td align="right">${{ number_format($submission->existing_building_shell_structure,0) }}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Total Soft Cost</td>
    <td align="right">${{ number_format($submission->total_soft_cost,0) }}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Total Loss Of Revenue Or Rents</td>
    <td align="right">${{ number_format($submission->total_loss_of_revenue_or_rents,0) }}</td>
  </tr>
  <tr>
    <td style="border-right:1px solid #333;">Flood Limit</td>
    <td align="right">${{ number_format($submission->flood_limit,0) }}</td>
  </tr><tr>
    <td style="border-right:1px solid #333;">Earthquake Limit</td>
    <td align="right">${{ number_format($submission->earthquake_limit,0) }}</td>
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
  

</div> <!-- End Content div -->
</body>

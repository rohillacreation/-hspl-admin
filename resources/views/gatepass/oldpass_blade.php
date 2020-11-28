<style>
        table {
            text-align: center;
            border-collapse: collapse;
        }
        table td,th {
            border: 1px solid black;
            /*background-color: #0000ff66;*/
        }
        table b 
        {
          color: black;
        }
        .rowspan {
            border-left-width: 10px;
        }
        table h4,h5,h6{

          color: #00000087;
        }
    </style>
    
@foreach($passdata as $key)
<table style="width: 100%;">
  <tr>
    <th colspan="7" style="text-align: center;">
      <h4><b>({{$key->CompanyName}})</b></h4>
      <p>{{$key->CompanyAddress}}</p>
    </th>
  </tr>
  <tr>
  <th colspan="7" style="text-align: right;">
  <h5>Sl. No : - {{$key->SINumber}}</h5>
  <h5>Date : - {{date('d-m-Y', strtotime($key->Date))}}</h5>
  <h4 style="text-align: center;"><b><u>{{$key->GatePassType}} GATE PASS</u></b></h4><br>
  <h4 style="text-align: left;">Security Officer may please allow Mr./Mrs <b>{{$key->PersonName}}</b> Designation <b>{{$key->DesignationName}}</b> of <b>{{$key->OrganisationName}}</b> to take out the following material(s) from <b>{{$key->CompanyName}}</b></h4><br>
  </th>
  </tr>
  <tr>
    <th colspan="1">Sl. No.</th>
    <th colspan="2">Description of Material(s)</th>
    <th colspan="2">Quantity</th>
    <th colspan="2">Remarks</th>
  </tr>
  
  @php $i = 1; @endphp
  @foreach($key->products as $p)
  <tr>
      <td colspan="1">{{$i++}}</td>
      <td colspan="2">{{$p->Descriptionofmaterial}}</td>
      <td colspan="2">{{$p->Quantity}}</td>
      <td colspan="2">{{$p->Remarks}}</td>
  </tr>
  @endforeach
    <tr>
    <th style="text-align: left;" colspan="7">
      <h5><b>Destination of material:-</b>{{$key->DestinationMaterial}}</h5>
      <h5><b>Reason for Taking Out:-</b>{{$key->ReasonTakingOut}}</h5>
    </th>
    </tr>
    <tr>
      <th style="text-align: left;" colspan="4"><b>For use of Security staff only</b>
        <h5>The Gate Pass has been entered in ___________Register at <br>Sl. No. _________ Page No._________</h5>
        <table style="margin-left: 5px;margin-bottom: 5px;"><br><br>
          <tr><th style="width: 140px;">Timeout</th><td style="width: 140px;">  </td></tr>
          <tr><th>Date</th><td></td></tr>
          <tr><th>Signature</th><td></td></tr>
          <tr><th>Name</th><td></td></tr>
          <tr><th>Organisation</th><td></td></tr>
        </table>
      </th>
      <th style="text-align: left;" colspan="3"><b>Signature of Officer In-Charge-Store</b><br><br>
        <h5><b>Name:</b> {{$key->OfficerName}}</h5>
        <h5><b>Desig:</b> {{$key->Designation}}</h5>
        <h5><b>Dept.:</b>  {{$key->Department}}</h5>
        <h5><b>Date:</b>  {{$key->PassDate}}</h5>
        <h5><b>Sign:</b> _________________________ </h5>
    </th>
    </tr>
    <tr>
      <th style="text-align: center;" colspan="7">
        <h6><u>Certified that the above-mentioned material(s) have been checked and found correct.</u></h6>
        <h4 style="text-align: left;"><b>Chief Security Officer/</b><br>
        <b>Sr. Security Assistant</b></h4>
        
      </th>
    </tr>
  
</table>
@endforeach
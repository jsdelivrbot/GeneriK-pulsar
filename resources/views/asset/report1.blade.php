<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pulsar Construction</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>
<body onload="window.print();" style="font-family: Helvetica;">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12" style="border-bottom: 2px solid black;">
        <h2 class="page-header">
          <i class="fa fa-tags"></i> ASSET PROFILE<br>
          <small>Asset Tag: {{$asset->tag}}</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
<br>
<!-- ASSET DETAILS -->
    <div class="row" style="border-bottom: 1px solid black;">
      <div class="col-md-12">
        <h4> <b>ASSET DETAILS</b> </h4>
          <div>
            <table border="1" width="100%" style="font-size:13px;">
              <tr>
              <th width="20%"></th>
              <th width="45%"></th>
              <th width="35%" rowspan="16" valign="top">
              	<img src="assets/dist/img/dumptruck_1024x768.jpg" style='width:250px;'> <br>
                <center> <img src="assets/dist/img/qrcode.png" style='width:250px;'> </center>
              </th>
            </tr>
              <tr>
                <td>Category:</td>
                <td>{{$asset->category}}</td>
              </tr>
              <tr>
                <td>Name:</td>
                <td>{{$asset->asset_name}}</td>
              </tr>
              <tr>
                <td>Description:</td>
                <td>{{$asset->description}}</td>
              </tr>
              <tr>
                <td>Asset ID:</td>
                <td>{{$asset->code}}</td>
              </tr>
              <tr>
                <td>Model:</td>
                <td>{{$asset->model}}</td>
              </tr>
              <tr>
                <td>Brand:</td>
                <td>{{$asset->brand}}</td>
              </tr>
              <tr>
                <td>Date Acquired:</td>
                <td>{{$asset->date_acquired}}</td>
              </tr>
              <tr>
                <td>Acquisition Cost:</td>
                <td>{{$asset->acquisition_cost}}</td>
              </tr>
              <tr>
                <td>Plate No:</td>
                <td>{{$asset->plate_no}}</td>
              </tr>
              <tr>
                <td>Engine/Serial No:</td>
                <td>{{$asset->engine_no}}</td>
              </tr>
              <tr>
                <td>Chassis No:</td>
                <td>{{$asset->chassis_no}}</td>
              </tr>
              <tr>
                <td>Warranty Date:</td>
                <td>{{$asset->warranty_date}}</td>
              </tr>
              <tr>
                <td>Location:</td>
                <td>{{$asset->model}}</td>
              </tr>
              <tr>
                <td>Assigned to:</td>
                <td>{{$asset->employee_name}}</td>
              </tr>
              <tr>
                <td>Status:</td>
                <td>{{$asset->status}}</td>
              </tr>
            </table>
            <br>
          </div>
      </div>
    </div>
<br>

<!-- MONITORING -->    
    <div class="row" style="border-bottom: 1px solid black;">
      <div class="col-md-12">
        <h4 style="padding-bottom: 6px;"><b>CURRENT OPERATING RECORD</b></h4>
          <table border="0" width="100%" style="font-size:13px;">
            <tr>
              <td style="border-top: 1px solid #e1e1e1;">Operating Hours</td>
              <td style="border-top: 1px solid #e1e1e1;"> {{$asset_monitoring->total_operating_hours}} </td>
              <td style="border-top: 1px solid #e1e1e1;">Diesel (L) Consumed</td>
              <td style="border-top: 1px solid #e1e1e1;"> {{$asset_monitoring->total_diesel_consumption}} </td>
            </tr>
            <tr>
              <td style="border-top: 1px solid #e1e1e1;">Kilometers Traveled</td>
              <td style="border-top: 1px solid #e1e1e1;"> {{$asset_monitoring->total_distance_travelled}} </td>
              <td style="border-top: 1px solid #e1e1e1;">Gas (L) Consumed</td>
              <td style="border-top: 1px solid #e1e1e1;"> {{$asset_monitoring->total_gas_consumption}} </td>
            </tr>
            <tr>
              <td style="border-top: 1px solid #e1e1e1;">Loads (m3)</td>
              <td style="border-top: 1px solid #e1e1e1;"> {{$asset_monitoring->total_number_loads}} </td>
              <td style="border-top: 1px solid #e1e1e1;">Oil (L) Consumed</td>
              <td style="border-top: 1px solid #e1e1e1;"> {{$asset_monitoring->total_oil_consumption}} </td>
            </tr>
          </table> <br>
      </div>
    </div> 
<br>

<!-- INSURANCE -->    
    <div class="row" style="border-bottom: 1px solid black;">
      <div class="col-md-12">
        <h4><b>INSURANCE</b></h4> 
          <table border="0" width="100%" style="font-size:13px;">
          <thead>
          <tr>
            <th align="left">Insurance Co.</th>
            <th align="left">Description</th>
            <th align="left">Contact Person</th>
            <th align="left">Start Date</th>
            <th align="left">End Date</th>
          </tr>
          </thead>
          <tbody>
          @foreach($insurance as $insurance)
          <tr>
            <td style="border-top: 1px solid #e1e1e1;" style="border-top: 1px solid #e1e1e1;"> {{$insurance->insurance_co}}</td>
            <td style="border-top: 1px solid #e1e1e1;"> {{$insurance->description}}</td>
            <td style="border-top: 1px solid #e1e1e1;"> {{$insurance->insurance_agent}}</td>
            <td style="border-top: 1px solid #e1e1e1;"> {{$insurance->date_issued}}</td>
            <td style="border-top: 1px solid #e1e1e1;"> {{$insurance->expiration_date}}</td>
          </tr>
          @endforeach
          </tbody>
        </table> <br>
      </div>
    </div>
<br><br><br><br><br>

<!-- MAINTENANCE HISTORY -->    
    <div class="row" style="border-bottom: 1px solid black;">
      <div class="col-md-12">
        <h4><b>MAINTENANCE HISTORY</b></h4> 
        <table border="0" width="100%" style="font-size:13px;">
          <thead>
          <tr align="left">
            <th>Control#</th>
            <th>JO Date</th>
            <th>Started</th>
            <th>Completed</th>
            <th>Conducted By</th>
            <th>Operating Details</th>
          </tr>
          </thead>
          <tbody>
          @foreach($jos as $jo)
          <tr>
            <td style="border-top: 1px solid #e1e1e1;">{{$jo->job_order_code}}</td>
            <td style="border-top: 1px solid #e1e1e1;">{{$jo->job_order_date}}</td>
            <td style="border-top: 1px solid #e1e1e1;">{{$jo->date_started}}</td>
            <td style="border-top: 1px solid #e1e1e1;">{{$jo->date_completed}}</td>
            <td style="border-top: 1px solid #e1e1e1;">{{$jo->conducted_by}}</td>
            <td style="border-top: 1px solid #e1e1e1;" id="operatingdetails">Operating Hours: 123 <br>
                Kilometers Traveled: 123 <br>
                Diesel (L) Consumed: 123 <br>
                Gas (L) Consumed: 123 <br>
                Oil (L) Consumed: 123 <br>
                Loads (m3): 123 <br>
            </td>
          </tr>
          @endforeach
          </tbody>
        </table> <br>
      </div>
    </div>
<br>

<!-- EVENTS -->    
    <div class="row" style="border-bottom: 1px solid black;">
      <div class="col-md-12">
        <h4><b>EVENTS</b></h4> 
        <table width="100%" style="font-size:13px;">
          <thead>
          <tr align="left">
            <th>Status</th>
            <th>Event Date</th>
            <th>Description/Remarks</th>
          </tr>
          </thead>
          <tbody>
          	@foreach($events as $event)
          <tr>
            <td style="border-top: 1px solid #e1e1e1;">{{$event->status}}</td>
            <td style="border-top: 1px solid #e1e1e1;">{{$event->event_date}}</td>
            <td style="border-top: 1px solid #e1e1e1;">{{$event->remarks}}</td>
          </tr>
           @endforeach
          </tbody>
        </table> 
      </div> <br>
    </div>
<br>

<center>* * * END OF ASSET PROFILE * * *</center>  
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<div class="divFooter"> <center> PULSAR &nbsp; ASSETERIK&copy; V.1.0 &nbsp; www.bizlogiks.ph </center> </div>

<!-- ./wrapper -->
</body>
</html>

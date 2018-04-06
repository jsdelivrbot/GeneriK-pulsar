<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><span class="fa fa-bus"> </span> List of Assets</h1>
  <ol class="breadcrumb">
    <li><a href="../../index.html"><i class="fa fa-th"></i> Dashboard</a></li>
    <li class="active">Maintenance</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-body">
      <table id="equipments" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Asset Tag</th>
          <th>Category</th>
          <th>Name</th>
          <th>Asset ID</th>
          <th>Model</th>
          <th>Brand</th>
          <th>Date Acquired</th>
          <th>Acquisition Cost</th>
          <th>Plate No.</th>
          <th>Engine No.</th>
          <th>Assigned to</th>
        </tr>
        </thead>
        <tbody> 
          <!-- ng-click="ac.assetInfo(asset.tag)" -->
          <!-- ui-sref="asset-equipments-view({tag:1212})" -->
          <!-- ui-sref="jo-create({assetTag:asset.tag})" -->
        <tr ng-repeat="asset in ac.assets">
          <td><a href="#" ui-sref="asset-list-equipmentsCopy({assetTag:asset.tag})"><b><%asset.tag%></b></a></td>
          <td><%asset.category%></td>
          <td><%asset.name%></td>
          <td><%asset.code%></td>
          <td><%asset.model%></td>
          <td><%asset.brand%></td>
          <td><%asset.date_acquired%></td>
          <td><%asset.acquisition_cost%></td>
          <td><%asset.plate_no%></td>
          <td><%asset.engine_no%></td>
          <td><%%></td>
        </tr>
        </tbody>
      </table>
    </div>
      <!-- /.box-body -->
</div>

<script type="text/ng-template" id="assetInfo.modal">
<div class="">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" ng-click="vm.ok()" ui-sref="asset-list-equipments">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Asset Tag: <%vm.formData.asset.tag%></h4>
      </div>
      <div class="modal-body">
        <!-- Custom Tabs (Pulled to the right) -->
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs pull-right">
            <li class="active"><a href="#tab_1-1" data-toggle="tab">Details</a></li>
            <li><a href="#tab_2-2" data-toggle="tab">History</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                Options <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Assign</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Lease</a></li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Donate</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Sell</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Dispose</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Lost / Missing</a></li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#" ui-sref="jo-create({assetTag:vm.formData.asset.tag})" ng-click="vm.ok()"><b>Create Job Order</b></a></li>
              </ul>
            </li>
            <li class="pull-left header"><i class="fa fa-bus"></i> Dump Truck DT1</li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_1-1">
              <div class="pull-left image col-xs-6">
                <img src="{{URL::to('assets/dist/img/dumptruck.jpg')}}" height="230px" class="img-square">
              </div>
              <div class="col-xs-5">
                <b>Name:</b> <%vm.formData.asset.name%><br>
                <b>Engine Serial:</b> <%vm.formData.asset.engine_no%><br>
                <b>Model/Serial:</b> <%vm.formData.asset.model%><br>
                <b>Plate No.:</b> <%vm.formData.asset.plate_no%><br>
                <b>Make/Brand:</b> <%vm.formData.asset.brand%><br>
                <b>ID:</b> <%vm.formData.asset.code%><br>
                <b>Date Acquired:</b> <%vm.formData.asset.date_acquired%><br>
                <b>Location:</b> <%vm.formData.asset.municipality_text%> <br>
                <b>Driver:</b> <%vm.formData.asset.employee_name%> <br>
                <b>Status:</b>  <%vm.formData.asset.status%> 
              </div>
                                
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2-2">
              <b>How to use:</b><br>
              <b>TABLE HERE.</b><br>

              A wonderful serenity has taken possession of my entire soul,
              like these sweet mornings of spring which I enjoy with my whole heart.
              I am alone, and feel the charm of existence in this spot,
              which was created for the bliss of souls like mine. I am so happy,
              my dear friend, so absorbed in the exquisite sense of mere tranquil existence,
              that I neglect my talents. I should be incapable of drawing a single stroke
              at the present moment; and yet I feel that I never was a greater artist than now.
              A wonderful serenity has taken possession of my entire soul,
              like these sweet mornings of spring which I enjoy with my whole heart.
              I am alone, and feel the charm of existence in this spot,
              which was created for the bliss of souls like mine. I am so happy,
              my dear friend, so absorbed in the exquisite sense of mere tranquil existence,
              that I neglect my talents. I should be incapable of drawing a single stroke
              at the present moment; and yet I feel that I never was a greater artist than now.
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>

        <!-- nav-tabs-custom -->
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary pull-right" ui-sref="asset-more-details({assetTag:vm.formData.asset.tag})" ng-click="vm.ok()">
          <li class="fa fa-navicon " "></li> More Details</button>
          <button type="button" class="btn btn-info pull-right" style="margin-right: 7px;"><li class="fa fa-print" ></li> Print</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal --> 
</script>

</section>
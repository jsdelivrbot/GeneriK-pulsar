

<!-- Content Header (Page header) -->
<section class="content-header">
<h1><span class="fa fa-user"> </span> Manage Employees</h1>
<ol class="breadcrumb">
  <li><a href="../../index.html"><i class="fa fa-th"></i> Dashboard</a></li>
  <li class="active">Employee Manager</li>
</ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
  <div class="col-sm-6">
<div class="box">
  <!-- form start -->
    <form role="form">
      <div class="box-body">
        <div class="form-group">
          <div class="col-sm-4">
          <select class="form-control select2" style="width: 100%;" required="">
          <option selected="selected" value="0">Select Division</option>
          <option value="1">ACCOUNTING</option>
          <option value="2">CONSTRUCTION</option>
          <option value="3">ENGINEERING</option>
          <option value="4">OPERATIONS</option>
          </select>
          </div>
          <div class="col-sm-3"> 
          <button type="button" class="btn btn-default"><li class="fa fa-refresh"></li> Filter Display</button>
          </div>
          <div class="col-sm-4"> 
          <button type="button" class="btn btn-primary" ui-sref="create-employee" ng-click="dtc.addNewEmployee()"><li class="fa fa-plus"></li> Add New Employee</button>
          </div>  
        </div>
      </div>
      <!-- /.box-body -->
    </form>
</div>
</div>
</div>
<div class="box box-primary">
      <div class="box-body">
        <table datatable="ng" class="table table-bordered table-hover" width="100%">
          <thead>
	          <tr>
	          	<th>#</th>
	            <th>Employee ID</th>
	            <th>Last Name</th>
	            <th>Suffix</th>
	            <th>First Name</th>
	            <th>Middle Name</th>
	            <th>Job Title</th>
	            <th>Birthdate</th>
	            <th>Email Account</th>
	            <th>Phone No.</th>
	            <th>Department</th>
	            <th>Division</th>
	            <th>Unit</th>
	          </tr>
          </thead>
          <tbody>
	          <tr ng-repeat="employee in dtc.employees">
	          	<td><%$index+1%></td>
	            <td><a href="#" ng-click="dtc.employeeInfo(employee.employee_id)"><b><%employee.employee_code%></b></a></td>
	            <td><%employee.lname%></td>
	            <td><%employee.affix%></td>
	            <td><%employee.fname%></td>
	            <td><%employee.mname%></td>
	            <td><%employee.position_text%></td>
	            <td><%employee.birthdate%></td>
	            <td><%employee.email_account%></td>
	            <td><%employee.phone_number%></td>
	            <td><%employee.department%></td>
	            <td><%employee.division%></td>
	            <td><%employee.unit%></td>
	          </tr>
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
</div>
</section>
<!-- MODAL CONTENTS -->
<script type="text/ng-template" id="employeeNewTpl.modal">
<div>
  <div class="modal-dialog">
  	<!-- form start -->
                <form class="form-horizontal" id="" ng-model="dtc.employeeDetails">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" ng-click="dtc.ok()">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add New Employee Information</h4>
      </div>
      <div class="modal-body">
        <!-- Custom Tabs (Pulled to the right) -->
        <div class="nav-tabs-custom">
         <!--  <ul class="nav nav-tabs pull-right">
            <li class="active"><a href="#tab_1-1" data-toggle="tab">Details</a></li>
            <li><a href="#tab_2-2" data-toggle="tab">History</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                Options <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Edit</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Mark as Finished</a></li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Print</a></li>
              </ul>
            </li>
            <li class="pull-left header"><i class="fa fa-user"></i> MICHAEL PADILLA CAPARAS</li>
          </ul> -->
          <div class="tab-content">
            <div class="tab-pane active" id="tab_1-1">
              
                  <div class="box-body">
                    <div class="form-group col-sm-12">
                      <label for="controlnumber" class="col-sm-3 control-label">Employee ID</label>
                      <div class="col-sm-9"><input type="text" class="form-control" id="emp_id" ng-model="vm.employeeDetails.emp_id"></div>
                    </div>
                    <div class="form-group col-sm-12">
                      <label for="controlnumber" class="col-sm-3 control-label">Last Name</label>
                      <div class="col-sm-9"><input type="text" class="form-control" id="emp_lname" ng-model="vm.employeeDetails.lname"></div>
                    </div>
                    <div class="form-group col-sm-12">
                      <label for="controlnumber" class="col-sm-3 control-label">Suffix</label>
                      <div class="col-sm-9"><input type="text" class="form-control" id="emp_sfx" ng-model="vm.employeeDetails.suffix"></div>
                    </div>
                    <div class="form-group col-sm-12">
                      <label for="controlnumber" class="col-sm-3 control-label">First Name</label>
                      <div class="col-sm-9"><input type="text" class="form-control" id="emp_fname" ng-model="vm.employeeDetails.fname"></div>
                    </div>
                    <div class="form-group col-sm-12">
                      <label for="controlnumber" class="col-sm-3 control-label">Middle Name</label>
                      <div class="col-sm-9"><input type="text" class="form-control" id="emp_mname" ng-model="vm.employeeDetails.mname"></div>
                    </div>
                    <div class="form-group col-sm-12">
                      <label class="col-sm-3 control-label">Job Title</label>
                      <div class="col-sm-9">
                      <select class="form-control select2" style="width: 100%;" required="" ng-model="vm.employeeDetails.position_code">
                        <option selected="selected" value="0">- - select job title - -</option>
                        <option ng-value="position.position_code" ng-repeat="position in dtc.positions"><%position.position_text%></option>
                      </select></div>
                    </div>
                    <div class="form-group col-sm-12">
                      <label class="col-sm-3 control-label">Birth Date</label>
                      <div class="col-sm-9">
                      <div class="input-group date">
                      <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                      <input type="text" class="form-control pull-right" id="datepicker-bday" ng-model="vm.employeeDetails.bday">
                    </div></div>
                    </div>
                    <div class="form-group col-sm-12">
                      <label for="controlnumber" class="col-sm-3 control-label">Email Account</label>
                      <div class="col-sm-9"><input type="text" class="form-control" id="emp_sfx" ng-model="vm.employeeDetails.email"></div>
                    </div>
                    <div class="form-group col-sm-12">
                      <label for="controlnumber" class="col-sm-3 control-label">Phone No.</label>
                      <div class="col-sm-9"><input type="text" class="form-control" id="emp_sfx" ng-model="vm.employeeDetails.phone_no"></div>
                    </div>
                    <div class="form-group col-sm-12">
                      <label class="col-sm-3 control-label">Department</label>
                      <div class="col-sm-9">
                      <select class="form-control select2" style="width: 100%;" required="" ng-model="vm.employeeDetails.department">
                        <option selected="selected" value="0">- - select department - -</option>
                        <option value="1">PULSAR CONSTRUCTION</option>
                        <option value="2">DEPTARTMENT 1</option>
                        <option value="3">DEPTARTMENT 2</option>
                      </select></div>
                    </div>
                    <div class="form-group col-sm-12">
                      <label class="col-sm-3 control-label">Division</label>
                      <div class="col-sm-9">
                      <select class="form-control select2" style="width: 100%;" required="" ng-model="vm.employeeDetails.division">
                        <option selected="selected" value="0">- - select division - -</option>
                        <option value="1">CONSTRUCTION</option>
                        <option value="2">OPERATIONS</option>
                        <option value="3">ACCOUNTING</option>
                        <option value="3">ENGINEERING</option>
                      </select></div>
                    </div>
                    <div class="form-group col-sm-12">
                      <label class="col-sm-3 control-label">Unit</label>
                      <div class="col-sm-9">
                      <select class="form-control select2" style="width: 100%;" required="" ng-model="vm.employeeDetails.unit">
                        <option selected="selected" value="0">- - select unit - -</option>
                        <option value="1">MAINTENANCE</option>
                        <option value="2">UNIT 2</option>
                        <option value="3">UNIT 3</option>
                      </select></div>
                    </div>
                  </div>
                  <!-- /.box-body -->
                
            </div>
            <!-- /.tab-pane -->

            <div class="tab-pane" id="tab_2-2">
              <b>EMPLOYEE ASSIGNMENT HISTORY.</b><br>
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
        <button type="button" class="btn btn-default pull-left" ng-click="dtc.ok()">Close</button>
        <button type="button" class="btn btn-primary" ui-sref="angular-data-tables" ng-click="dtc.submit(vm.employeeDetails);dtc.ok()">Save changesasdf</button>
      </div>

    </div>
    </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
</script>
<!-- /.modal -->

<!-- MODAL CONTENTS -->
<script type="text/ng-template" id="employeeEditTpl.modal">
<div>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" ng-click="vm.ok()">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Employee Information</h4>
      </div>
      <div class="modal-body">
        <!-- Custom Tabs (Pulled to the right) -->
        <div class="nav-tabs-custom">
         <!--  <ul class="nav nav-tabs pull-right">
            <li class="active"><a href="#tab_1-1" data-toggle="tab">Details</a></li>
            <li><a href="#tab_2-2" data-toggle="tab">History</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                Options <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Edit</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Mark as Finished</a></li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Print</a></li>
              </ul>
            </li>
            <li class="pull-left header"><i class="fa fa-user"></i> MICHAEL PADILLA CAPARAS</li>
          </ul> -->
          <div class="tab-content">
            <div class="tab-pane active" id="tab_1-1">
              <!-- form start -->
                <form class="form-horizontal" id="">
                  <div class="box-body">
                    <div class="form-group col-sm-12">
                      <label for="controlnumber" class="col-sm-3 control-label">Employee ID</label>
                      <div class="col-sm-9"><input type="text" class="form-control" id="emp_id" ng-model="vm.formData.employee_code"></div>
                    </div>
                    <div class="form-group col-sm-12">
                      <label for="controlnumber" class="col-sm-3 control-label">Last Name</label>
                      <div class="col-sm-9"><input type="text" class="form-control" id="emp_lname" ng-model="vm.formData.lname"></div>
                    </div>
                    <div class="form-group col-sm-12">
                      <label for="controlnumber" class="col-sm-3 control-label">Suffix</label>
                      <div class="col-sm-9"><input type="text" class="form-control" id="emp_sfx" ng-model="vm.formData.affix"></div>
                    </div>
                    <div class="form-group col-sm-12">
                      <label for="controlnumber" class="col-sm-3 control-label">First Name</label>
                      <div class="col-sm-9"><input type="text" class="form-control" id="emp_fname" ng-model="vm.formData.fname"></div>
                    </div>
                    <div class="form-group col-sm-12">
                      <label for="controlnumber" class="col-sm-3 control-label">Middle Name</label>
                      <div class="col-sm-9"><input type="text" class="form-control" id="emp_mname" ng-model="vm.formData.mname"></div>
                    </div>                    
                    <div class="form-group col-sm-12">
                      <label class="col-sm-3 control-label">Job Title</label>
                      <div class="col-sm-9">
                      <select class="form-control select2" style="width: 100%;" required="" ng-model="vm.employeeDetails.position_code">
                        <option selected="selected" value="0">- - select job title - -</option>
                        <option ng-value="position.position_code" ng-repeat="position in vm.positions" ng-init="vm.formData.position_code"><%position.position_text%></option>
                      </select></div>
                      <%vm.formData.position_code%>
                    </div>
                    <div class="form-group col-sm-12">
                      <label class="col-sm-3 control-label">Birth Date</label>
                      <div class="col-sm-9">
                      <div class="input-group date">
                      <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                      <input type="text" class="form-control pull-right" id="datepicker-bday" ng-model="vm.formData.birthdate">
                    </div></div>
                    </div>
                    <div class="form-group col-sm-12">
                      <label for="controlnumber" class="col-sm-3 control-label">Email Account</label>
                      <div class="col-sm-9"><input type="text" class="form-control" id="emp_sfx" ng-model="vm.formData.email_account"></div>
                    </div>
                    <div class="form-group col-sm-12">
                      <label for="controlnumber" class="col-sm-3 control-label">Phone No.</label>
                      <div class="col-sm-9"><input type="text" class="form-control" id="emp_sfx" ng-model="vm.formData.phone_number"></div>
                    </div>
                    <div class="form-group col-sm-12">
                      <label class="col-sm-3 control-label">Department</label>
                      <div class="col-sm-9">
                      <select class="form-control select2" style="width: 100%;" required="" ng-model="vm.formData.department">
                        <option selected="selected" value="0">- - select department - -</option>
                        <option value="1">PULSAR CONSTRUCTION</option>
                        <option value="2">DEPTARTMENT 1</option>
                        <option value="3">DEPTARTMENT 2</option>
                      </select></div>
                    </div>
                    <div class="form-group col-sm-12">
                      <label class="col-sm-3 control-label">Division</label>
                      <div class="col-sm-9">
                      <select class="form-control select2" style="width: 100%;" required="" ng-model="vm.formData.division">
                        <option selected="selected" value="0">- - select division - -</option>
                        <option value="1">CONSTRUCTION</option>
                        <option value="2">OPERATIONS</option>
                        <option value="3">ACCOUNTING</option>
                        <option value="3">ENGINEERING</option>
                      </select></div>
                    </div>
                    <div class="form-group col-sm-12">
                      <label class="col-sm-3 control-label">Unit</label>
                      <div class="col-sm-9">
                      <select class="form-control select2" style="width: 100%;" required="" ng-model="vm.formData.unit">
                        <option selected="selected" value="0">- - select unit - -</option>
                        <option value="1">MAINTENANCE</option>
                        <option value="2">UNIT 2</option>
                        <option value="3">UNIT 3</option>
                      </select></div>
                    </div>
                  </div>
                  <!-- /.box-body -->
                </form>
            </div>
            <!-- /.tab-pane -->

            <div class="tab-pane" id="tab_2-2">
              <b>EMPLOYEE ASSIGNMENT HISTORY.</b><br>
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
        <button type="button" class="btn btn-default pull-left" ng-click="vm.ok()">Close</button>
        <button type="button" class="btn btn-primary" ng-click="vm.updateEmployee(vm.formData)">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
</script>
<!-- /.modal -->
<?php
namespace App\Http\Controllers\Requisition
;
use Illuminate\Http\Request;

use DB;
use App\Organization;
use App\Warranty;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use PDF;

class RequisitionReportController extends Controller {

	public function export($requisitionSlipCode){

		$data['job_order_code'] 				= $this->requisition_slip($requisitionSlipCode)->reference_code;

		$data['requisition_slip'] 				= $this->requisition_slip($requisitionSlipCode);
		$data['requisition_slip_items']         = $this->requisition_slip_items($requisitionSlipCode);

		$data['job_order']        				= $this->job_order($data['job_order_code']);

		// return $data;

		$pdf = PDF::loadView('requisition.report_requisition', $data);
		return $pdf->stream('requisition.report_requisition.pdf');
	}

	public function requisition_slip($requisitionSlipCodeis){

		$data = DB::table('requisition_slips as rs')
		->select(
			'rs.requisition_slip_code',
			'rs.date_requested',
			'rs.date_needed',
			'rs.description',
			'rs.request_type',
			'rs.reference_code',
			'rs.received_by',
			DB::raw('CONCAT(trim(CONCAT(recby.lname," ",COALESCE(recby.affix,""))),", ", COALESCE(recby.fname,"")," ", COALESCE(recby.mname,"")) as received_by_name'),
			'rs.date_received',
			'rs.inspected_by',
			DB::raw('CONCAT(trim(CONCAT(insby.lname," ",COALESCE(insby.affix,""))),", ", COALESCE(insby.fname,"")," ", COALESCE(insby.mname,"")) as inspected_by_name'),
			'rs.date_inspected',
			'recbypos.position_text as received_by_position',
			'insbypos.position_text as inspected_by_position'
		)
		->leftjoin('employees as recby','recby.employee_code','=','rs.received_by')
		->leftjoin('employees as insby','insby.employee_code','=','rs.inspected_by')
		->leftjoin('positions as recbypos','recbypos.position_code','=','recby.position_code')
		->leftjoin('positions as insbypos','insbypos.position_code','=','insby.position_code')
		// ->leftjoin('job_orders as jo','insbypos.position_code','=','insby.position_code')
		->where('rs.requisition_slip_code', $requisitionSlipCodeis)
		->first();

		return $data;
	}

	public function job_order($jobOrderCode){

		$data = DB::table('job_orders as jo')
		->select(
			'jo.job_order_code',
			'jo.job_order_date',
			'jo.asset_tag',
			'jo.employee_code',
			'jo.organizational_unit',
			'jo.municipality_code',
			'jo.conducted_by'
		)
		->where('jo.job_order_code', $jobOrderCode)
		->first();

		return $data;
	}

	public function asset($assetTag){
		$asset = DB::table('Assets as a')
		// ->select('*')
		->select(
			DB::raw('CONCAT(trim(CONCAT(e.lname," ",COALESCE(e.affix,""))),", ", COALESCE(e.fname,"")," ", COALESCE(e.mname,"")) as employee_name'),
			'a.asset_id',
			'a.tag', 
			'a.code', 
			'a.are_code', 
			'a.name',
			'a.category',
			'a.model',
			'a.brand',
			'a.description',
			DB::raw('DATE_FORMAT(a.date_acquired, "%M %d, %Y") as date_acquired'),
			'a.acquisition_cost',
			'a.plate_no',
			'a.engine_no',
			'a.chassis_no',
			DB::raw('DATE_FORMAT(a.warranty_date, "%M %d, %Y") as warranty_date'),
			'a.project_code',
			'a.status',
			'sc.asset_category',
			'sc.asset_name',
			'e.organizational_unit',
			'org.org_name as organizational_unit_name',
			'org.barangay as barangay',
			'm.municipality_code as municipality_code',
			'm.municipality_text',
			'p.province_code as province_code',
			'p.province_text',
			'r.region_code as region_code',
			'r.region_text_short',
			'r.region_text_long'
		)
		->leftjoin('asset_categories as sc','sc.asset_code','=','a.category')
		->leftjoin('ares as are','are.are_code','=','a.are_code')
		->leftjoin('Employees as e','e.employee_code','=','are.employee_code')
		->leftjoin('organizations as org','org.org_code','=','e.organizational_unit')
		->leftjoin('municipalities as m','m.municipality_code','=','org.municipality_code')
		->leftjoin('provinces as p','p.province_code','=','m.province_code')
		->leftjoin('regions as r','r.region_code','=','p.region_code');
		$asset = $asset->where('a.tag', $assetTag);
		$asset = $asset->first();

		return $asset;
	}

	public function requisition_slips($jobOrderCode){

		$data = DB::table('requisition_slips as rs')
		->select(
			'rs.requisition_slip_code',
			'rs.date_requested',
			'rs.date_needed',
			'rs.description',
			'rs.request_type',
			'rs.reference_code',
			'rs.received_by',
			DB::raw('CONCAT(trim(CONCAT(recby.lname," ",COALESCE(recby.affix,""))),", ", COALESCE(recby.fname,"")," ", COALESCE(recby.mname,"")) as received_by_name'),
			'rs.date_received',
			'rs.inspected_by',
			DB::raw('CONCAT(trim(CONCAT(insby.lname," ",COALESCE(insby.affix,""))),", ", COALESCE(insby.fname,"")," ", COALESCE(insby.mname,"")) as inspected_by_name'),
			'rs.date_inspected'
		)
		->leftjoin('employees as recby','recby.employee_code','=','rs.received_by')
		->leftjoin('employees as insby','insby.employee_code','=','rs.inspected_by')
		->where('rs.reference_code', $jobOrderCode)
		->where('jo.request_type', "Asset") // for assets only
		->get();

		return $data;
	}

	public function requisition_slip_items($requisitionSlipCode){

		$data = DB::table('requisition_slips_items as rsi')
		->select(
			'rsi.requisition_slip_item_code',
			'rsi.requisition_slip_code',
			'rsi.supply_code',
			'rsi.item_description',
			'rsi.item_quantity',
			'rsi.item_cost',
			'rsi.item_stock_unit',
			'rsi.item_total',
			's.supply_name'
		)
		->leftjoin('supplies as s','s.supply_code','=','rsi.supply_code')
		->where('rsi.requisition_slip_code', $requisitionSlipCode)
		->get();

		return $data;
	}

	// public function asset_monitoring($assetTag){
	// 	$assets = DB::table('assets as a')
	// 	->select( 
	// 		'a.tag',
	// 		'a.name as asset_name', 
	// 		DB::raw("COALESCE(SUM(o.operating_hours), 0) as total_operating_hours"),
	// 		DB::raw("COALESCE(SUM(o.distance_travelled), 0) as total_distance_travelled"),
	// 		DB::raw("COALESCE(SUM(o.diesel_consumption), 0) as total_diesel_consumption"),
	// 		DB::raw("COALESCE(SUM(o.gas_consumption), 0) as total_gas_consumption"),
	// 		DB::raw("COALESCE(SUM(o.oil_consumption), 0) as total_oil_consumption"),
	// 		DB::raw("COALESCE(SUM(o.number_loads), 0) as total_number_loads")
	// 	)
	// 	->leftjoin('operations as o','o.asset_tag','=','a.tag')
	// 	->leftjoin('Projects as p','p.project_code','=','o.project_code')
	// 	->groupBy('a.tag', 'a.name')
	// 	->where('a.category', 'CONE');
	// 	$assets = $assets->where('tag', $assetTag);
	// 	$assets = $assets->first();

	// 	return $assets;
	// }

	// public function asset_photo($assetTag){

	// 	$data = DB::table('asset_photos as ap')->where('ap.asset_tag', $assetTag)->where('ap.asset_photo_status', 1)->first();
	// 	return $data;
	// }

	// public function events($assetTag){

	// 	$data = DB::table('asset_events as ae')->where('ae.asset_tag', $assetTag)->get();
	// 	return $data;
	// }

	// public function insurance($assetTag){

	// 	$data = DB::table('insurance_items as ii')->where('ii.asset_code', $assetTag)->leftjoin('insurance as i','i.insurance_code','=','ii.insurance_code')
	// 	->get();
	// 	return $data;
	// }

}
<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use DB;
use Auth;
use App\Asset;
use App\Asset_category;
use App\Employee;
use App\Log;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AssetsController extends Controller {
  	public function index(){
    	return view('layout.index');
   	}

    public function asset_categories(Request $request){

        $data = array(
            'assetCategory'=>$request->input('assetCategory')
        );

      	$asset_categories = DB::table('Asset_categories as ac');

        if ($data['assetCategory']){ 
          $asset_categories = $asset_categories->where('asset_category', $data['assetCategory']);
        }

        $asset_categories = $asset_categories->get();

        return response()-> json([
            'status'=>200,
            'data'=>$asset_categories,
            'message'=>''
        ]);
    }

    public function assets(Request $request){

        $data = array(
            'tag'=>$request->input('tag'),
            'name'=>$request->input('name'),
            'category'=>$request->input('category'),
        );


      	$asset = DB::table('Assets as a')
      			// ->select('*')
            ->select(
                DB::raw('concat(trim(concat(e.lname," ",e.affix)),", ", e.fName," ", e.mName) as employee_name'),
                'a.asset_id',
                'a.tag', 
                'a.code', 
                'a.name',
                'a.category',
                'a.model',
                'a.brand',
                DB::raw('DATE_FORMAT(a.date_acquired, "%M %d, %Y") as date_acquired'),
                'a.acquisition_cost',
                'a.plate_no',
                'a.engine_no',
                'a.assign_to',
                'a.project_code',
                'a.status',
                'm.municipality_text'
              )
            ->leftjoin('Employees as e','e.employee_id','=','a.assign_to')
            ->leftjoin('Projects as p','p.project_code','=','a.project_code')
      			->leftjoin('municipalities as m','m.municipality_code','=','p.municipality_code');

      	if ($data['tag']){ 
      		$asset = $asset->where('a.tag', $data['tag']);
      	}

        if ($data['name']){ 
          $asset = $asset->where('a.name', $data['name']);
        }

        if ($data['category']){ 
          $asset = $asset->where('a.category', $data['category']);
        }

      	$asset = $asset->get();

        return response()-> json([
            'status'=>200,
            'data'=>$asset,
            'message'=> ''
        ]);
    }

    public function methods(){

      	$methods = DB::table('methods')->get();

        return response()-> json([
            'status'=>200,
            'data'=>$methods
        ]);
    }

    public function asset_tag(Request $request)
    {
    	$assetTag = $request->input('categoryCode')."-".date('Ymd', strtotime($request->input('dateAcquired')))."-".$request->input('assetID');

    	return response()-> json([
            'status'=>200,
            'data'=>$assetTag
        ]);
    }

    public function save(Request $request){
        
        $data = array();

       	$data['assetName'] = $request->input('assetName');
       	$data['assetID'] = $request->input('assetID');
       	$data['modelnumber'] = $request->input('modelnumber');
       	$data['categoryCode'] = $request->input('categoryCode');
       	$data['description'] = $request->input('description');
       	$data['brand'] = $request->input('brand');
       	$data['dateAquired'] = $request->input('dateAquired');
       	$data['acquisitionCost'] = $request->input('acquisitionCost');
       	$data['dateAcquired'] = date('Y-m-d', strtotime($request->input('dateAcquired')));
       	$data['plateNumber'] = $request->input('plateNumber');
       	$data['engineNumber'] = $request->input('engineNumber');
       	// $data['assignTo'] = $request->input('assignTo');
       	// $data['fundSource'] = $request->input('fundSource');
       	// $data['costCenter'] = $request->input('costCenter');
       	// $data['depreciableCost'] = $request->input('depreciableCost');
       	// $data['salvageValue'] = $request->input('salvageValue');
        // $data['method'] = $request->input('method');
       	// $data['project_code'] = $request->input('projectCode');
       
        $transaction = DB::transaction(function($data) use($data){
        	try{

	            $asset = new Asset;
	            $asset->tag = $data['categoryCode']."-".date('Ymd', strtotime($data['dateAcquired']))."-".$data['assetID'];
	            $asset->name = $data['assetName'];
	            $asset->code = $data['assetID'];
	            $asset->model = $data['modelnumber'];
	            $asset->category = $data['categoryCode'];
	            $asset->description = $data['description'];
	            $asset->brand = $data['brand'];
	            $asset->date_acquired = $data['dateAcquired'];
	            $asset->acquisition_cost = $data['acquisitionCost'];
	            $asset->plate_no = $data['plateNumber'];
	            $asset->engine_no = $data['engineNumber'];
	            // $asset->assign_to = $data['assignTo'];
	            // $asset->fund_source = $data['fundSource'];
	            // $asset->cost_center = $data['costCenter'];
	            // $asset->depreciable_cost = $data['depreciableCost'];
	            // $asset->salvage_value = $data['salvageValue'];
	            // $asset->method_id = $data['method'];
             //  $asset->project_code = $data['project_code'];
	            $asset->status = "Active";
	            $asset->save();

	            // $assetCopy = DB::table('Assets')->where('tag', $asset->tag)->first();
	            // $assetCopy->asset_id;

	            // $log = new Log;
	            // $log->log_code = $assetCopy->asset_id;
	            // $log->log_desc = "Added new asset";
	            // $log->user_id = Auth::user()->id;
	            // $log->save();

	            return response()->json([
	                'status' => 200,
	                'data' => 'null',
	                'message' => 'Successfully saved.'
	            ]);
            } 
            catch (\Exception $e) 
            {
		    	    return response()->json([
	                'status' => 500,
	                'data' => 'null',
	                'message' => 'Error, please try again!'
	            ]);
		      }
        });

        return $transaction;
    }
}
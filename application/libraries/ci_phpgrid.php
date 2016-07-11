<?php
require_once('phpgrid/conf.php');

class CI_phpgrid {

    public function example_method($val = '')
    {
        $dg = new C_DataGrid("SELECT * FROM Orders", $val, "Orders");
        return $dg;
    }
	
	public function upload_temp($table){
		$upload = new C_DataGrid("SELECT * FROM ".$table,"ObjectID",$table);
		return $upload;
	}
	
	public function history_data(){
		$history = new C_DataGrid("SELECT * FROM tbl_Upload_STM","ObjectID","tbl_Upload_STM");
		return $history;
	}
	
	public function history_data2(){
		$history = new C_DataGrid("SELECT * FROM Vw_Upload_History","ObjectID","Vw_Upload_History");
		return $history;
	}
	
	public function recent(){
		$recent = new C_DataGrid("SELECT * FROM tbl_Upload_Temp","id_table","tbl_Upload_Temp");
		return $recent;
	}
	
	public function master_price(){
		$master = new C_DataGrid("SELECT * FROM tbl_Upload_Ms_Price","ObjectID","tbl_Upload_Ms_Price");
		return $master;
	}
	
	public function master_produk(){
		$master_product = new C_DataGrid("SELECT * FROM tbl_Upload_Ms_Produk","ObjectID","tbl_Upload_Ms_Produk");
		return $master_product;
	}
	
	/*public function master_area(){
		$master_area = new C_DataGrid("SELECT * FROM AREA","ID_AREA","AREA");
		return $master_area;
	}
	
	public function master_outlet(){
		$master_outlet = new C_DataGrid("SELECT * FROM Table_OUTLET","ID_OUTLET","Table_OUTLET");
		return $master_outlet;
	}
	
	/*public function master_product(){
		$master_product = new C_DataGrid("SELECT * FROM Ms_Product","ID_PRODUCT","Ms_Product");
		return $master_product;
	}
	
	public function master_category(){
		$master_category = new C_DataGrid("SELECT * FROM Table_PRODUCT_CATEGORY","ID_TIPE_PRODUCT","Table_PRODUCT_CATEGORY");
		return $master_category;
	}
	
	
	public function messages_original_header(){
		$header = new C_DataGrid("SELECT ObjectID as ParentObjectID , RefObjectID, ReceiveDt, ProcessedDt, TransDt, SenderNumber, ID_OUTLET, NAMA_OUTLET, ID_BA FROM  NewHeader","ParentObjectID","NewHeader");
		return $header;
	}
	
	public function messages_original_detail(){
		$detail = new C_DataGrid("SELECT ObjectID, ParentObjectID, TransDt, ID_OUTLET, ID_PRODUCT, NAMA_PRODUCT, PRODUCT_KODE_PRINCIPLE, DESCRIPTION_PRINCIPLE, Qty FROM  NewDetail","ObjectID","NewDetail");
		return $detail;
	}*/
}
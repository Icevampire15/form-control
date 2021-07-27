
<?php
  $objConnect = mysql_connect("localhost","root","");
  mysql_query("SET NAMES UTF8",$objConnect); // เอาไว้กรณีให้บังคับตัวหนังสือเป็น UTF 8
  mysql_select_db("spe_it_db");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>ลงข้อมูลการปฏิบัติงานจากผู้แจ้งงาน</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

	<link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">


  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
  
  
<!--===============================================================================================-->

<style>

.container-contact4 {
  width: 100%;  
  min-height: 100vh;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  padding: 15px;
  background: rgba(255,255,255,0.8);
}
.wrap-contact4 {
  width: 1200px;
  background: #80c64a;
  background: -webkit-linear-gradient(45deg, #56ab2f, #a8e063);
  background: -o-linear-gradient(45deg, #56ab2f, #a8e063);
  background: -moz-linear-gradient(45deg, #56ab2f, #a8e063);
  background: linear-gradient(45deg, #56ab2f, #a8e063);
  border-radius: 10px;
  overflow: hidden;
  padding: 72px 5px 65px 5px;
}
.bg-contact4 {
  width: 100%;  
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
}
  </style>


</head>

<body>

<?php

$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");
$thai_month_arr=array(
    "0"=>"",
    "1"=>"มกราคม",
    "2"=>"กุมภาพันธ์",
    "3"=>"มีนาคม",
    "4"=>"เมษายน",
    "5"=>"พฤษภาคม",
    "6"=>"มิถุนายน", 
    "7"=>"กรกฎาคม",
    "8"=>"สิงหาคม",
    "9"=>"กันยายน",
    "10"=>"ตุลาคม",
    "11"=>"พฤศจิกายน",
    "12"=>"ธันวาคม"                 
);
function thai_date($time){
    global $thai_day_arr,$thai_month_arr;
    $thai_date_return="วัน".$thai_day_arr[date("w",$time)];
    $thai_date_return.= "ที่ ".date("j",$time);
    $thai_date_return.=" เดือน".$thai_month_arr[date("n",$time)];
    $thai_date_return.= " พ.ศ.".(date("Yํ",$time)+543);
    $thai_date_return.= "  ".date("H:i",$time)." น.";
    return $thai_date_return;
}
$date_today=date("Y-m-d H:i:s");
$eng_date=strtotime($date_today);
//echo thai_date($eng_date);

?>


	<div class="bg-contact4" style="background-image: url('images/bg-03.jpg');">
  	   <div class="container-contact4">
			<div class="wrap-contact4">
			
				<center>	
					<div style="font-family: 'Prompt',serif;color:white;font-size: 200%;">ลงข้อมูลการปฏิบัติงาน</div>
          <a href="#" data-toggle="modal" data-target="#myModal001"><p style="font-family: 'Prompt',serif;color:white;font-size: 100%;">พิมพ์ใบแจ้งงาน</p></a>
			   </center><br><hr>


<!-- The Modal -->
<div class="modal" id="myModal001">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">เลือกช่วงเอกสารใบแจ้งซ่อม</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form action="print_fr-it-05.php" method="post">
      <!-- Modal body -->
      <div class="modal-body">
             
                <div class="form-group">
                   
                        <span style="text-align: left;">
                          <input type="text" class="form-control" name="s1">
                        </span>
                        <span style="text-align: left;">
                          <input type="text" class="form-control" name="s2">
                          <input type="hidden" name="print_page" value="true">
                        </span>
                    </div>
                  
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger">Close</button>
      </div>
      </form> 
    </div>
  </div>
</div>



<script>
$(document).ready(function() {
    $('#example').DataTable( {
        autoFill: true
    } );
} );
</script>	

<table id="example" class="table table-bordered nowrap" style="width:100%;font-family:'Prompt',serif;color:#004d00;font-size:80%;">
<!--<table id="example" class="display responsive nowrap" style="width:90%;font-family:'Prompt',serif;color:#004d00;font-size:80%;">-->
        <thead>
            <tr>
                <th>#</th>
                <th>ผู้แจ้ง</th>
                <th>สถานะ</th>
                <th>#</th>
              <!--  <th>สังกัด</th> -->
                <th>วันที่แจ้ง</th>
                <th>period</th>
                <th>สิ่งที่ให้ดำเนินการ</th>
                <th>การดำเนินการ</th>
            </tr>
        </thead>
        <tbody>
        <?php 
//    $sql=mysql_query("SELECT * FROM repair_notice WHERE finish_date IS NULL");

    $sql=mysql_query("SELECT * FROM repair_notice");
    $i=1;
    while($list_data=mysql_fetch_array($sql)){
    ?>

            <tr>
                <td><?=$i?>.</td>
                <td><?=$list_data["fl_name"]?> (<?=$list_data["idrepair_notice"]?>)</td>
                <td>
                <?php  
              if($list_data["finish_date"]== NULL && $list_data["how_to_fix"] == NULL){ ?>
    
                  <a href="#" data-toggle="modal" data-target="#myModal<?=$i?>">
                     <span style="width:100%;font-family:\'Prompt\',serif;color:#004d00;font-size:80%;">รอบันทึก..</span>
                  </a>

                  <?php
              }elseif($list_data["finish_date"]==NULL || $list_data["finish_date"]=='0000-00-00 00:00:00'){ ?>

                <a href="#" data-toggle="modal" data-target="#myModal<?=$i?>">
                    <span style="width:100%;font-family:\'Prompt\',serif;color:#004d00;font-size:80%;">
                    
                    <?php
                      if($list_data["date_fix"] == NULL || $list_data["date_fix"] == ''){
                        echo 'ยังไม่ปฏิบัติงาน';
                      }else{
                        echo $list_data["date_fix"];
                      } 
                    
                    ?>
                    
                    
                    </span>
                </a>

              <?php } else{
                echo'
                      <center><a href="#" data-toggle="modal" data-target="#myModal'.$i.'"><span>&#10003;</span></a>
                      
                      <a href="print_fr-it-05.php?id='.$list_data["idrepair_notice"].'" target="_blank"><img src="images/print.jpg" style="width:25px;"></a>
                      
                      
                      
                      </center>
                    ';
                }
                  ?>
                </td>
                <td><?=$list_data["code_m"]?></td>
<!--            <td><?=$list_data["dept"]?></td> -->
<!--            <td><font size="1"><?=$list_data["code_m"]?></font></td> -->
                <td><font size="1"><?=$list_data["date_notice"]?></font></td>
                <td><font size="1"><?=$list_data["period"]?></font></td>
                <td><textarea rows="1" cols="20" style="text-align: left;"><?=$list_data["cause_of_problem"]?></textarea></td>
                <td><textarea rows="1" cols="20" style="text-align: left;"><?=$list_data["how_to_fix"]?></textarea></td>
<!--				        <td><?=$list_data["period"]?></td> -->
                

<!-- The Modal -->
  <div id="myModal<?=$i?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title"><?=$list_data["fl_name"]?>(<?=$list_data["dept"]?>)&nbsp;&nbsp;&nbsp;<?=$list_data["date_notice"]?></h4>
            </div>
            <div class="modal-body" style="width:100%;font-family:'Prompt',serif;font-size:80%;">
              

            <form name="Form1" class="contact3-form validate-form" action="loader.php" method="post" autocomplete="on" onSubmit="if(!confirm('แน่ใจแล้วใช่ไหมที่จะส่งข้อมูล')){return false;}">
                
                    <input type="hidden" name="process1" value="true">
                    <input type="hidden" name="idrepair_notice" value="<?=$list_data["idrepair_notice"]?>">
                    <?=$list_data["cause_of_problem"]?>
                    <hr>
                    <div class="form-group">
                        <label class="control-label">ขั้นตอนการแก้ไข</label>
                        <span style="text-align: left;">
                           <textarea class="form-control" rows="2" name="comment_fix" required ><?=$list_data["how_to_fix"]?></textarea>
                        </span>
                    </div>
                    <div class="form-group">
                        <label class="control-label">อุปกรณ์ที่ใช้</label>
                        <span style="text-align: left;">
                               <textarea class="form-control" rows="1" name="comment_used"  required><?=$list_data["equipment_used"]?></textarea>
                        </span>
                    </div>
                   
                    <div class="form-group">
                        <label class="control-label">เริ่มงาน</label>
                        <span style="text-align: left;">
                               <textarea class="form-control" rows="1" name="date_fix"><?=$list_data["date_fix"]?></textarea>
                        </span>
                    </div>
                    <div class="form-group">
                        <label class="control-label">จบงาน</label>
                        <span style="text-align: left;">
                               <textarea class="form-control" rows="1" name="finish_date"><?=$list_data["finish_date"]?></textarea>
                        </span>
                    </div>


                    <div class="form-group">
                        <label class="control-label">สาเหตุ และอาการที่พบ</label>
                        <span style="text-align: left;">
                                <textarea class="form-control" rows="2" name="comment_case" style="text-align: left;" required><?=$list_data["cause_found"]?></textarea>
                        </span>
                        
                        </div>
                  
                  
                    <div class="form-group">
                        <label class="control-label">ผู้ซ่อม</label>
                        <span style="text-align: left;">
                               <textarea class="form-control" rows="1" name="who_fix"><?=$list_data["who_fix"]?></textarea>
                        </span>
                    </div>
                    </div>

                    <div class="form-group">
                        <div>
                        <center><button type="submit" class="btn btn-success btn-block" style="width:200px;">อัพเดทงานซ่อม</button>
                        
                        
                        </center>
                        <?php
                        
                        if($list_data["finish_date"] == '0000-00-00 00:00:00'){
                          echo'
                            <center><a href="print_fr-it-05.php?id='.$list_data["idrepair_notice"].'">พิมพ์เอกสาร FR-IT-05</a></center>
                          ';
                        }
                        ?>
                        </div>
                    </div>
                </form>

                <div class="form-group">
                        <div>
                  
            <!--          <form name="Form2" class="contact3-form validate-form" action="loader.php" method="post" autocomplete="on" onSubmit="if(!confirm('แน่ใจแล้วใช่ไหมที่จะส่งข้อมูลเริ่มซ่อม')){return false;}">
                             <input type="hidden" name="idrepair_notice" value="<?=$list_data["idrepair_notice"]?>">
                             <input type="hidden" name="process1" value="true">
                             <input type="hidden" name="start_job" value="true">
                     <center><button type="submit" class="btn btn-primary btn-block"style="width:200px;">เริ่มซ่อม</button></center>
                      </form><hr>  

                      <form name="Form3" class="contact3-form validate-form" action="loader.php" method="post" autocomplete="on" onSubmit="if(!confirm('แน่ใจแล้วใช่ไหมที่จะส่งข้อมูลซ่อมเสร็จ')){return false;}">
                            <input type="hidden" name="idrepair_notice" value="<?=$list_data["idrepair_notice"]?>">
                            <input type="hidden" name="process1" value="true">
                            <input type="hidden" name="end_job" value="true">
                    <center><button type="submit" class="btn btn-danger btn-block" style="width:200px;">ซ่อมเสร็จ</button></center>
                      </form>      -->
                        </div>
                    </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

  
        
            </tr>
            <?php $i++;} ?>          
        </tbody>
        <tfoot>
        <tr>
                <th>ผู้แจ้ง</th>
                <th>สถานะ</th>
                <th>สังกัด</th>
                <th>วันที่แจ้ง</th>
                <th>สิ่งที่ให้ดำเนินการ</th>
            </tr>
        </tfoot>
    </table>

				
				<br>
		<!--  <div style="font-family: 'Prompt',serif;color:white;"><center>ในกรณีที่ต้องให้ปฏิบัติหน้าที่โดยทันที<br>กรุณาติดต่อเบอร์ภายใน 123</center></div>-->
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>

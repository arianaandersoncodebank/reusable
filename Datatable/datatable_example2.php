<link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/scroller/2.0.1/css/scroller.dataTables.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.3.1.js" ></script>



<div style="overflow-x:auto;">
      <table class="" id="example" width="100%">
        <thead>
          <tr>
         <th>Id</th>
         <th>Name</th>
         <th>Mobile</th>
         <th>Email</th>
         <th>City</th>
         <th>State</th>
         <th>Country</th>
         <th>Address1</th>
         <th>Address2</th>
         <th>Skill</th>
         <th>Status</th>
			
          </tr>
        </thead>
        <tbody style="font-size:12px" id="myTable">
		
		</tbody></table></div>
			
<script>
$(document).ready(function($) {
    $('#example').DataTable( {
        "ajax": "trial5.php",
		"pageLength":50,
		 "paging": true,
         "deferRender": true,
         //"responsive": true,
		 //"processing": true,
         //"serverSide": true
    } );
});

</script>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" ></script>
<script src="https://cdn.datatables.net/scroller/2.0.1/js/dataTables.scroller.min.js	" ></script>
			
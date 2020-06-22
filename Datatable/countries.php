<style>
button#add_modal {
    margin-top: -12px;
    margin-bottom: -12px;
}
</style>
<?php include('header.php');?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Countries List</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">			   
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Home</a></li>
                            <li class="active">Countries</li>
                        </ol>
						<!--<button type="button" id="add_modal" data-target="#addDriverModal" data-toggle="modal">Add</button>-->
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                               <!-- <strong class="card-title">My Orders </strong>-->
							   <strong class="card-title"> <button type="button" id="add_modal" data-target="#addModal" data-toggle="modal" class="btn btn-primary pull-right">Add</button></strong>
                            </div>
                            <div class="card-body">
                                <div class="reposivetable">
                                <table id="bootstrap-data-table-export22" class="table table-striped table-bordered geotab_table">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Country Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->


			<script src="vendors/jquery/dist/jquery.min.js"></script>
			<script src="vendors/popper.js/dist/umd/popper.min.js"></script>
		   
		   <!-- <script src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
			<script src="vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>-->

			<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
			<script src="assets/js/main.js"></script>
</body>
<!---------------Delete Address Modal----------------->
 <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel">Delete Country</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                   Are you sure you want to delete ?
                                </p>
                            </div>
                            <div class="modal-footer">
							<input type="hidden" name="id" value="">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <button type="button" class="btn btn-primary" onclick="delete_country()">Yes</button>
                            </div>
                        </div>
                    </div>
                </div>


<button type="button" id="delete_modal" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#deleteModal" style="display:none;">Delete </button>

<!-------------------------Edit Address Modal----------------------->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="largeModalLabel">Edit Country</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			    <div class="form-group">
					<label for="firstName">Country Name</label>
					<input name="country_name" type="text" class="form-control" placeholder="Enter Country Name" maxlength="255">
                </div>
			</div>
			<input type="hidden" name="id" value="">
			<div class="err"></div>
			<div class="succ"></div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-primary" onclick="update()">Confirm</button>
			</div>
		</div>
	</div>  
	</div>  
	
<button type="button" id="edit_modal" data-target="#editModal" 
data-toggle="modal" style="display:none">Edit</button>	
<!---------------------Add Driver ----------->
 <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="largeModalLabel">Add Country</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			    <div class="form-group">
					<label for="firstName">Country Name</label>
					<input name="country_name" type="text" placeholder="Enter Country Name" class="form-control" maxlength="255">
                </div>
			</div>
			
			<div class="err"></div>
			<div class="succ"></div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-primary" onclick="add()">Confirm</button>
			</div>
		</div>
	</div>  
</div>  
<!-------------------------------->	
</html>
<script src="assets/js/api.js"></script>
<?php include('footer.php');?>
<script>
$(document).ready(function(){
	//$('.geotab_table').DataTable();
})


var usersList=[];
credentials = {
				"database":"demotestingmaymonth",
				"sessionId":"sPdNJoIqX6-ngccmdEESQg",
				"userName":"sharma.abhilasha456@gmail.com",
				"password":"Opulence@209"
			  };
						
						
api = GeotabApi(function (authenticationCallback) {});

var table;
$(document).ready(function(){
	
  table = $('.geotab_table').DataTable( {
        "ajax": "custom_functions.php/?action=get_countries",
		"pageLength":50,
		 "paging": true,
         "deferRender": true,
		 'destroy' : true,
		 //"retrieve":true,
         //"responsive": true,
		 //"processing": true,
         //"serverSide": true
    } );

})
/*
function get_countries(){
 $.ajax({
		url:'custom_functions.php',
		type:'POST',
		//dataType:'json',
		data:{action:'get_countries'},
		success:function(result){  //alert(result);console.log(result);
			$('.geotab_table tbody').html(result);
			$('.geotab_table').DataTable();			
		}
	});
}
get_countries();*/
function add_country(){
	
	var country_name = $('input[name="country_name"]').val();
	
	$.ajax({
		url:'custom_functions.php',
		type:'POST',
		data:{country_name:country_name,action:'add_country'},
		success:function(data){
			if(data==1){
				$('#addModal .succ').text('Country added successfully');
				setTimeout(function(){
					$('#addModal .succ').text('');
					$('#addModal .close').trigger('click');
					table.ajax.reload();
				},700);
			}
		}		
	});	
}
function add(){
	$('#addModal .err,#addModal .succ').html('');
	var country_name  	= $('#addModal input[name="country_name"]').val();
	
	if(country_name =='' ){
		$('#addModal .err').html('All fields are required');
		return false;
	}	
	
	$.ajax({
		url:'custom_functions.php',
		type:'POST',
		data:{country_name:country_name,action:'add_country'},
		success:function(data){
			if(data==1){
				$('#addModal .succ').text('Country added successfully');
				setTimeout(function(){
					$('#addModal .err,#addModal .succ').html('');
					$('#addModal .close').trigger('click');
					table.ajax.reload();
				},700);
			}
		}
		
	});    
       
}

function edit(id){ 
   $.ajax({
		url:'custom_functions.php',
		type:'POST',
		data:{id:id,action:'get_country_by_id'},
		dataType:'json',
		success:function(result){ console.log(result.name);
			$('#editModal input[name="country_name"]').val(result.name);	
			$('#editModal input[name="id"]').val(result.id);	
			$('#edit_modal').trigger('click');
		}		
	});		
}

function update(){
	$('#editModal .err,#editModal .succ').html('');
	var country_name  	= $('#editModal input[name="country_name"]').val();
	var id   		    = $('#editModal input[name="id"]').val();	
	
	//alert(country_name+'=='+id);
	if(country_name == '' || id == ''){
		$('#editModal .err').html('All fields are required');
		return false;
	}	
	
	$.ajax({
		url:'custom_functions.php',
		type:'POST',
		data:{country_name:country_name,id:id,action:'update_country'},
		success:function(data){
			if(data==1){
				$('#editModal .succ').text('Country updated successfully');
				setTimeout(function(){
					$('#editModal .err,#editModal .succ').html('');
					$('#editModal .close').trigger('click');
					table.ajax.reload();
				},700);
			}
		}
		
	});    
       
}
function confirmDelete(id){
	$('#deleteModal input[name="id"]').val(id);		
	$('#delete_modal').trigger('click');
}
function delete_country(){
	var id = $('#deleteModal input[name="id"]').val();
		
	$.ajax({
		url:'custom_functions.php',
		type:'POST',
		data:{id:id,action:'delete_country'},
		success:function(data){
			if(data==1){
				$('#deleteModal .succ').text('Country deleted successfully');
				setTimeout(function(){
					$('#deleteModal .succ').text('');
					$('#deleteModal .close').trigger('click');
					table.ajax.reload();
				},700);
			}
		}
		
	});  
}

</script>
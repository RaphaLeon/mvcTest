
<div class="col-md-12"><?php echo(!empty($message) ? $message : ""); ?></div>
<!-- <div class="col-md-12"><? php echo($rolViews); ?></div> -->
<div class="row">
	<div class="col-md-5">
		<h2>Create Rol</h2>
		<form method="post" action="<?= APP_PATH ?>/rol/create" class="form-horizontal">
		  <div class="box-body">
	        <div class="form-group">
	          <label for="name">Name:</label>
	          <input type="text" class="form-control" name="name" id="name">
	        </div>
	        <div class="form-group">
	          <label for="txtDescription">Description:</label>
	          <input type="text" class="form-control" name="description" id="txtDescription">
	        </div>
		  </div>
		  <button type="submit" class="btn btn-primary">Accept</button>
		</form>
	</div>
	<div class="col-md-7">
		<h2>Rol's</h2>
		<div class="row">
		  	<div class="col-md-1 col-md-offset-9" style="background-color:#fff;">
		  		<a href="#" id="btnCreate" onclick="showModal()" title="create" style="color:#3c8dbc; font-size:20px; float: right;">
		  			<i class="fa fa-plus"></i>
		  		</a>
		  	</div>
		</div>
			
		<table class="table table-hover">
			<thead>
				<tr>
					<!-- <th style="display: none;">id</th> -->
					<th>Name</th>
					<th>Description</th>
					<th>Action</th>
				</tr>
			</thead>

			<tbody>
				<?php
					if(count($rolList)>0){
						foreach($rolList as $rol) {
							echo "<tr>
									<td style=display:none; class='nr'>".$rol->id."</td>
									<td class='nr'>".$rol->name."</td>
									<td class='nr'>".$rol->description."</td>
									<td>
										<a href='".APP_PATH."/rol/delete/$rol->id' title='Delete'>
											<i class='fa fa-trash'></i>
										</a>
										<a href='#' title='edit' id='btnEdit'>
											<i class='fa fa-edit'></i>
										</a>
										<a href='#' title='views'>
											<i class='fa fa-search'></i>
										</a>								
									</td>
								</tr>";
						}
					}
				?>
			</tbody>
		</table>
	</div>
</div>
<div class="row">
	<div class="col-md-7">
		<table id="viewsTable" class="table table-hover">
		<thead>
			<tr>
				<th>View</th>
				<th>Url</th>
			</tr>
		</thead>

		<tbody>
			<?php
				if(count($rolViews)>0){
					foreach($rolViews as $view) {
						echo "<tr>
								<td style=display:none; class='nr'>".$view->rolId."__".$view->viewId."</td>
								<td class='nr'>".$view->name."</td>
								<td class='nr'>".$view->url."</td>
								<!--<td>
									<a href='".APP_PATH."/rol/delete/$rol->id' title='Delete'>
										<i class='fa fa-trash'></i>
									</a>
									<a href='#' title='edit' id='btnEdit'>
										<i class='fa fa-edit'></i>
									</a>								
								</td>-->
							</tr>";
					}
				}
			?>
		</tbody>
	</table>	
	</div>
</div>

<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Small modal</button>
 -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      	<div class="modal-header text-center">
      		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      		<h3 id="modalTitle" class="modal-title"></h3>
      	</div>
      	<form method="post" action="<?= APP_PATH ?>/rol/create" class="form-horizontal">
	      	<div class="modal-body">
			<div class="box-body">
		          <input type="hidden" class="form-control" name="id" id="idModal">			  
				  <div class="box-body">
			        <div class="form-group">
			          <label for="name">Name:</label>
			          <input type="text" class="form-control" name="name" id="nameModal">
			        </div>
			        <div class="form-group">
			          <label for="txtDescription">Description:</label>
			          <input type="text" class="form-control" name="description" id="descriptionModal">
			        </div>
				  </div>	  
	      	</div>
	      	<div class="modal-footer">
	      		<button type="submit" class="btn btn-primary">Accept</button>
	      		<button class="btn btn-danger" data-dismiss="modal">Cancel</button>
	      	</div>
      	</form>
    </div>
  </div>
</div>

<script type="text/javascript">
	function showModal(){
	   $("#modalTitle").text("Create Rol");
	   $("#idModal").val("");
	   $("#nameModal").val("");
	   $("#descriptionModal").val("");
	   $('#myModal').modal('show'); 
	}

	$('.fa-edit').click(function(){
	   $("#modalTitle").text("Edit Rol");
	   var row_index = $(this).closest('tr');
	   var row_value = row_index.find('.nr');
	   $("#idModal").val(row_value[0].innerHTML);
	   $("#nameModal").val(row_value[1].innerHTML);
	   $("#descriptionModal").val(row_value[2].innerHTML);
	   $('#myModal').modal('show'); 
	});

	$('.fa-search').click(function(){
	   var row_index = $(this).closest('tr');
	   var row_value = row_index.find('.nr');
	   var url = "<?= APP_PATH?>/rol/getViews";
	   var data = {'rolId': row_value[0].innerHTML}; 
	   console.log(url);
	   console.log(data);
	   //return false;
		$.ajax({
			url: "<?= APP_PATH?>/rol/getViews",
			type: 'post',
			dataType: 'json',
			data: data,
		})
		.done(function(data) {
			console.log(data);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	});

</script>
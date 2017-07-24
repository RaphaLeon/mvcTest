
<section class="col-md-7">
    <h2>Users</h2>
	    <table class="table table-hover">
			<thead>
			  <tr>
				 <th>Name</th>
				 <th>Rol</th>
				 <th>Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php foreach($userList as $user){
				echo "<tr>
							<td>".$user->name."</td>
							<td>".$user->rol."</td>
							<td>
								<!--<button onclick='deleteUser($user->id)' class='btn-xs btn-danger'>Delete</button>-->
								<a href='".APP_PATH."/user/update/".$user->id."/".$user->rolId."/".$user->name."' title='Edit'>
									<i class='fa fa-edit'></i>
								</a>
								<a href='".APP_PATH."/user/delete/".$user->id."' title='Delete' style='color:red;'>
									<i class='fa fa-trash'></i>
								</a>
							</td>
						</tr>";  
			}?>
			</tbody>
		 </table>
</section>
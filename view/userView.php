	<!--<h3><?= $title ?></h3>-->
	<?= $message ?>
     <form action="<?= APP_PATH ?>/user/create" method="post" class="col-md-5">
        <h2>Create User</h2>
        <div class="form-group">
          <label for="idRol">Rol:</label>
		  <select name="rolId" id="idRol" class="form-control">
			<?php foreach($rolList as $rol){
				echo "<option value='".$rol->id."'>".$rol->name."</option>";
			}?>
		  </select>
        </div>
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" name="name" id="name">
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" name="password" id="pwd">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php require_once "userListView.php";?>
    <!-- <section class="col-md-7">
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
				<?php 
					/*foreach($userList as $user){
						echo "<tr>
									<td>".$user->name."</td>
									<td>".$user->rol."</td>
									<td>
										<a href='http://localhost/mvcTest/user/update/".$user->id."/".$user->rolId."/".$user->name."' title='Edit'>
											<i class='fa fa-edit'></i>
										</a>
										<a href='http://localhost/mvcTest/user/delete/".$user->id."' title='Delete'>
											<i class='fa fa-trash'></i>
										</a>
									</td>
								</tr>";  
				}*/?>
				</tbody>
			 </table>
    </section> -->

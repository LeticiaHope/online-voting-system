<?php include '../includes/db.php'; ?>
<div class="card card-outline card-primary">
	
</div>
<div class="card-body">
    <div class="card-header">
        <h3 class="card-title">List of Administrators</h3>
        
    </div>
		<div class="container-fluid">
        <div class="container-fluid">
			<table class="table table-bordered table-stripped">
				<colgroup>
					<col width="5%">
					
					<col width="25%">
					<col width="20%">
					<col width="20%">
					
          <col width="10%">
				</colgroup>
				<thead>
					<tr>
						<th>#</th>
						
						<th>Name</th>
						<th>Email</th>
						<th>Candidates Added</th>
            
            <th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						$qry = $conn->query("SELECT *, full_name as name from `users` where role = 'admin' order by id desc ");
						while($row = $qry->fetch_assoc()):
					?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							
							<td><?php echo ucwords($row['full_name']); ?></td>

							<td><?php 
							$user_id = $row['id'];
							$query3 = $conn->query("SELECT email FROM users WHERE id = $user_id");
              if($query3->num_rows > 0){
                  $row3 = $query3->fetch_assoc();
                  echo  htmlspecialchars($row3['email']);
              } else {
                  echo "No Admin Found.";
              }?></td>
							<td><?php $query = $conn->query("SELECT COUNT(added_by) AS total FROM candidates where added_by = $user_id");
              $total = $query->fetch_assoc()['total']; 
              echo number_format($total);
          ?></td>
							
							
							
							<td align="center">
								 <button type="button" class="btn btn-flat btn-default btn-sm" data-toggle="dropdown"> <span class="bi bi-pencil"></span>    Edit
							</td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('.delete_data').click(function(){
			_conf("Are you sure to delete this Administartor?","delete_user",[$(this).attr('data-id')])
		})
		$('.table').dataTable();
	})
	function delete_user($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/functions.php?f=deleteadmin",
			method:"POST",
			data:{id: $id},
			dataType:"json",			
		})
		location.reload();
	}
</script>
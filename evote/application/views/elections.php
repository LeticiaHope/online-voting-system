<?php include '../includes/db.php'; ?>
<div class="card card-outline card-primary">
	
</div>
<div class="card-body">
    <div class="card-header">
        <h3 class="card-title">Schedule Elections</h3>
        
    </div>
		<div class="container-fluid">
        <div class="container-fluid">
			<table class="table table-bordered table-stripped">
				<colgroup>
					<col width="5%">
					
					<col width="25%">
					<col width="20%">
					<col width="20%">
					<col width="20%">
          <col width="10%">
				</colgroup>
				<thead>
					<tr>
						<th>#</th>
						
						<th>Title</th>
						<th>Date</th>
						<th>Status</th>
            <th>Added by</th>
            <th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						$qry = $conn->query("SELECT *, title as name from `elections` order by id desc ");
						while($row = $qry->fetch_assoc()):
					?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							
							<td><?php echo ucwords($row['name']); ?></td>
							<td><?php 
              $user_id = $row['id'];
              $query = $conn->query("SELECT position FROM candidates WHERE user_id = $user_id");

              if($query->num_rows > 0){
                  $row = $query->fetch_assoc();
                  echo  htmlspecialchars($row['position']);
              } else {
                  echo "No position Found";
              }?></td>
							<td><?php $query3 = $conn->query("SELECT email FROM users WHERE id = $user_id");
              if($query3->num_rows > 0){
                  $row3 = $query3->fetch_assoc();
                  echo  htmlspecialchars($row3['email']);
              } else {
                  echo "No Admin Found.";
              }?></td>
							<td><?php $query = $conn->query("SELECT added_by FROM candidates WHERE user_id = $user_id");
                $row = $query->fetch_assoc();
                $admin_id = $row['added_by'];
                $query2 = $conn->query("SELECT full_name FROM users WHERE id = $admin_id");
              if($query2->num_rows > 0){
                  $row2 = $query2->fetch_assoc();
                  echo  htmlspecialchars($row2['full_name']);
              } else {
                  echo "No Admin Found.";
              }?></td>
							
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
			_conf("Are you sure to delete this Movie?","delete_user",[$(this).attr('data-id')])
		})
		$('.table').dataTable();
	})
	function delete_user($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/functions.php?f=deletemovie",
			method:"POST",
			data:{id: $id},
			dataType:"json",			
		})
		location.reload();
	}
</script>
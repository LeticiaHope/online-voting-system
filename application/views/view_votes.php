<?php include '../includes/db.php'; ?>
<div class="card card-outline card-primary">
	
</div>
<div class="card-body">
    <div class="card-header">
        <h3 class="card-title">Candidates Votes Analysis</h3>
        
    </div>
		<div class="container-fluid">
        <div class="container-fluid">
			<table class="table table-bordered table-stripped">
				<colgroup>
					<col width="5%">
					
					<col width="25%">
					<col width="20%">
				
					<col width="20%">
        
				</colgroup>
				<thead>
					<tr>
						<th>#</th>
						
						<th>Name</th>
						<th>Position</th>
						
            <th>Vote Count</th>
         
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						$qry = $conn->query("SELECT *, full_name as name from `users` where role = 'candidate' order by id desc ");
						while($row = $qry->fetch_assoc()):
					?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							
							<td><?php echo ucwords($row['full_name']); ?></td>
							<td><?php 
              $user_id = $row['id'];
              $query = $conn->query("SELECT position FROM candidates WHERE user_id = $user_id");

              if($query->num_rows > 0){
                  $row = $query->fetch_assoc();
                  echo  htmlspecialchars($row['position']);
              } else {
                  echo "No position Found";
              }?></td>
							
							<td><?php $query = $conn->query("SELECT votes FROM candidates WHERE user_id = $user_id");

							if($query->num_rows > 0){
									$row = $query->fetch_assoc();
									echo  htmlspecialchars($row['votes']);
							} else {
									echo "NULL";
							}?></td>
							
						
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
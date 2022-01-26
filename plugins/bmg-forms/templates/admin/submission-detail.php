<div class="wrap">
		<h1 class="wp-heading-inline">Submission Detail</h1>
		<?php
		global $wpdb;
	$table_name = $_GET['table'];
	$id = $_GET['Id'];
	$table_id = $_GET['tableId'];

	$sql = "SHOW COLUMNS FROM $table_name";
				$result = $wpdb->get_results($sql);
				$count = 0;
				$fields = [];
				if($result) { 
				foreach($result as $row){
					$fields[$count] = $result[$count]->Field;
					$count++;	
				}
}
			$tab_col_names = implode(', ', $fields);	
	 $table_data = $wpdb->get_results("SELECT $tab_col_names FROM $table_name WHERE id=$id");
	 ?>
<table>
	 <?php
				 if($table_data) {
							foreach($table_data as $i => $value) {
								foreach($value as $k => $d) {
								
									$column_label = getTableColumnLable($table_id, $k);
									echo "<tr><td><label><b>$column_label</b></label><label> $d</label> </td></tr>";
								}
							}
					}
		?> 
</table>
</div>
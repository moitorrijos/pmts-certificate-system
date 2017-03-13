<?php

function create_table_with($col_number, $row_number){
	for ($i=0; $i<$row_number; $i++ ) {
		echo '<tr></tr>';
		for ($j=0; $j<$col_number; $j++) {
			echo '<td></td>';
		}
	}
}
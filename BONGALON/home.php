<div class="row">
    <div class="col-6" style="width:40%;"> 
        <div class="card">
            <div class="card-header fw-bold"style="border-bottom:5px solid #ADA06D;">TIMELINE</div>
            <div class="card-body">
            <div class="table-responsive " style="height:400px;">
					<table class="table">
 					<tbody class="table-warning">
					<?php
					// Define the loop counter
					$i = 1;

					// Define the maximum number of iterations
					$maxIterations = 8;

					// Start the while loop
					while ($i <= $maxIterations) {
					// Output table row and table data
					echo "<tr>";
					echo "<td>February 2$i,2023 <br> <a href='index.php'>CN-00000$i</a><br>
					JUAN CARLOS <span>|</span>HEARING</td>";
					echo "</tr>";

					// Increment the loop counter
					$i++;
					}
					?>
					</tbody>
					</table>
					</div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-header fw-bold"style="border-bottom:5px solid #ADA06D;">CALENDAR</div>
            <div class="card-body">
                sample
            </div>
        </div>
    </div>
</div>
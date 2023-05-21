<?php 

// index.php

include('admin/srms.php');

$object = new srms();

$object->query = "
SELECT * FROM exam_srms 
WHERE exam_result_published = 'Yes' 
AND exam_status = 'Enable'
";

$result = $object->get_result();

include('header.php');

?>

    <div class="card">
        <form method="post" action="result.php">
            <div class="card-header">
            	<h1 class="h3 mt-2 mb-2 fw-normal text-center">Search Your Result</h1>
            </div>
            <div class="card-body">
            
                <div class="form-group">
                    <label><b>Select Exam</b><span class="text-danger">*</span></label>
                    <div>
                        <select name="exam_name" class="form-control" required>
                            <option value="">Select Exam</option>
                            <?php
                            foreach($result as $row)
                            {
                                echo '<option value="'.$row["exam_id"].'">'.$row["exam_name"].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label><b>Enter Roll No.</b><span class="text-danger">*</span></label>
                    <div>
                        <input type="text" name="student_roll_no" class="form-control" placeholder=" For Example 19ABC123" required/>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <input type="submit" name="submit" class="btn btn-primary" value="Search" />
            </div>
        </form>
    </div>


<?php

include('footer.php');

?>
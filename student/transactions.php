<?php include 'toplayout.php';
$user_id = userID($userInput);

$userAllCourses = all_by_SPECIFIC_ID($CREATE_COURSE,'user_id',$user_id);

?>

<div class="container">
    <div class="card-header">
        <div class="row">
            <div class="col-md-8">
                <h4 class="card-title" style="display: flex"> <i class="fas fa-shopping-bag"></i> &nbsp;সকল ক্যাটাগরি
                </h4>
            </div>
        </div>
    </div>
    <table class="transaction_table" align="center">
        <tr>
            <th> কোর্সের নাম </th>
            <th> অনুমোদন অপেক্ষারত </th>
            <th> অনুমোদিত </th>
            <th> রিজেক্টেড </th>
        </tr>
        <?php foreach($userAllCourses  as $row) {?>
        <tr>
            <td><?php echo $row['course_name']; ?></td>
            <td>
                <div style="width: 100%">
                    <a href="pending_transactions">
                    <?php echo TotalNumberOfRowsWhereTWO_AND($TRANSACTIONS,'course_id','status',$row['id'],0); ?>
                    </a>
                </div>
            </td>
            <td>
            <div style="width: 100%">
                    <a href="approved_transactions">
                    <?php echo TotalNumberOfRowsWhereTWO_AND($TRANSACTIONS,'course_id','status',$row['id'],1); ?>
                    </a>
            </div>
            </td>
            <td>
            <div style="width: 100%">
                    <a href="rejected_transactions">
                    <?php echo TotalNumberOfRowsWhereTWO_AND($TRANSACTIONS,'course_id','status',$row['id'],2); ?>
                    </a>
            </div>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>
<br>
<?php include 'bottomlayout.php'; ?>
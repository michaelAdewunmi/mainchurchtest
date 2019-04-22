<?php
session_start();
require_once './config/config.php';
require_once 'includes/auth_validate.php';


// Sanitize if you want
$member_id = filter_input(INPUT_GET, 'member_id', FILTER_VALIDATE_INT);
$operation = filter_input(INPUT_GET, 'operation', FILTER_SANITIZE_STRING);
($operation == 'edit') ? $edit = true : $edit = false;
 $db = getDbInstance();

//Handle update request. As the form's action attribute is set to the same script, but 'POST' method,
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    //Get member id form query string parameter.
    $member_id = filter_input(INPUT_GET, 'member_id', FILTER_SANITIZE_STRING);

    //Get input data
    $data_to_update = filter_input_array(INPUT_POST);

    $data_to_update['updated_at'] = date('Y-m-d H:i:s');
    $db = getDbInstance();
    $db->where('id',$member_id);
    $stat = $db->update('members', $data_to_update);

    if($stat)
    {
        $_SESSION['success'] = "member updated successfully!";

        $db->where('id', $_SESSION['id']);
		$active_admin_user = $db->getOne('admin_accounts');

		$db->where('id', $member_id);
        $edited_member_info = $db->getOne('members');

        //Write accomplished task to a log file and the database. Function definition found in helpers.php
        save_general_admin_activity_to_log($data_to_update, "member", "edit", null, null, null, $edited_member_info);

        //Redirect to the listing page,
        header('location: members.php');
        //Important! Don't execute the rest put the exit/die.
        exit();
    }
}


//If edit variable is set, we are performing the update operation.
if($edit)
{
    $db->where('id', $member_id);
    //Get data to pre-populate the form.
    $member = $db->getOne("members");
}
?>


<?php
    include_once 'includes/header.php';
?>
<div id="page-wrapper">
    <div class="row">
        <h2 class="page-header">Update member</h2>
    </div>
    <!-- Flash messages -->
    <?php
        include('./includes/flash_messages.php')
    ?>

    <form class="" action="" method="post" enctype="multipart/form-data" id="contact_form">

        <?php
            //Include the common form for add and edit
            require_once('./forms/member_form.php');
        ?>
    </form>
</div>




<?php include_once 'includes/footer.php'; ?>
<?php

session_start();
$page_title = "resumeinfo1";
include('includes/header.php'); 
include('includes/navbar.php');

if(isset($_POST['next_btn'])){
    $workexp = $_POST['workexp'];
    $no_techskills = $_POST['no_techskills'];
    $no_certs = $_POST['no_certs'];
    $no_langs = $_POST['no_langs'];
    $work_sts = $_POST['work_sts'];
}
echo "$workexp<br>";
echo "$no_techskills<br>";
echo "$no_certs<br>";
echo "$no_langs<br>";
?>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                
                <div class="card shadow">
                    <div class="card-header">
                        <h3>Enter your details </h3>
                    </div>
                    <div class="card-body">
                        <form action="createresume.php" method="POST">
                            <input type="hidden" name="workexp" value="<?php echo $workexp; ?>">
                            <input type="hidden" name="no_techskills" value="<?php echo $no_techskills; ?>">
                            <input type="hidden" name="no_certs" value="<?php echo $no_certs; ?>">
                            <input type="hidden" name="no_langs" value="<?php echo $no_langs; ?>">
                            <input type="hidden" name="work_sts" value="<?php echo $work_sts; ?>">

                            <div class="form-group mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Working Role</label><br>
                                <label for="">(If you are a fresher Enter the role you are applying for:) </label>
                                <input type="text" name="working_role" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Phone Number</label>
                                <input type="text" name="phone_number" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Email id</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Linked in Profile url</label>
                                <input type="text" name="Linked_in" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Enter about yourself</label>
                                <label for="">(Not more than 40 words)</label>
                                <input type="text" name="personal_profile" class="form-control" required>
                            </div>
                            
                            <?php
                            if($work_sts!=1) {
                                for($i=1;$i<=$workexp;$i++){
                                    ?>
                                    <div class="form-group mb-3">
                                        <label for="">Enter Your Role <?php echo $i; ?> Name</label>
                                        <input type="text" name="role[]" class="form-control" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Enter Your Role <?php echo $i; ?> Starting and ending date</label>
                                        <input type="text" name="role_start_end[]; ?>" class="form-control" placeholder="Ex: Jan 2022 - Apr 2022" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Enter Your Description of role <?php echo $i; ?></label>
                                        <label for="">(Not more than 40 words per role)</label>
                                        <input type="text" name="role_description[]; ?>" class="form-control" required>
                                    </div>
                                    <?php
                                }
                            } else {
                                for($i=1;$i<=$workexp;$i++){
                                    ?>
                                    <div class="form-group mb-3">
                                        <label for="">Enter Your Project <?php echo $i; ?> Title</label>
                                        <input type="text" name="role[]" class="form-control" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Enter Your Project <?php echo $i; ?> Starting and ending date</label>
                                        <input type="text" name="role_start_end_[]?>" class="form-control" placeholder="Ex: Jan 2022 - Apr 2022" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Enter Your Description of Project <?php echo $i; ?></label>
                                        <label for="">(Not more than 40 words per Project)</label>
                                        <input type="text" name="role_description_[]?>" class="form-control" required>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                            <div class="form-group mb-3">
                                <label for="">Enter your institute name</label>
                                <label for=""> (Graduation college name):</label>
                                <input type="text" name="inst_name" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Enter your cgpa</label>
                                <input type="text" name="cgpa" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Enter your Graduation Period</label>
                                <input type="text" name="grad_period" class="form-control" placeholder="Ex: Jan 2018 - Apr 2022" required>
                            </div>
                            <?php
                            for($i=1; $i <=$no_techskills; $i++) {
                                ?>
                                <div class="form-group mb-3">
                                <label for="">Enter the Technical skill Name<?php echo $i;?></label>
                                <input type="text" name="tech_skills_[]" class="form-control" required>
                            </div>
                            <?php 
                            }
                            ?>
                            <?php
                            for($i=1; $i <=$no_certs; $i++) {
                                ?>
                                <div class="form-group mb-3">
                                <label for="">Enter the Certification Name<?php echo $i;?></label>
                                <input type="text" name="cert_name_[]" class="form-control" required>
                            </div>
                            <?php 
                            }
                            ?>
                            <?php
                            for($i=1; $i <=$no_langs; $i++) {
                                ?>
                                <div class="form-group mb-3">
                                <label for="">Enter the language(s) spoken<?php echo $i;?></label>
                                <input type="text" name="lang_name_[]" class="form-control" required>
                            </div>
                            <?php 
                            }
                            ?>
                            <div class="form-group mb-3">
                                <button type="submit" name="resume_next_btn" class="btn btn-primary">Create Resume</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

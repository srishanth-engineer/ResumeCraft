<?php 
session_start();
$page_title ="resume information";
include('includes/header.php'); 
include('includes/navbar.php');
?>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header">
                        <h3>Enter details to proceed furthur</h3>
                    </div>
                    <div class="card-body">
                        <form action="resumeinfo1a.php" method="POST">
                            <div>
                                <div><label for="">Select Number of Work Experiences you have:</label></div>
                                <div><label for="">(If you are a fresher, Enter number of projects you have)</label></div>
                            <input type="radio" class="btn-check" name="workexp" id="option1a" value="1">
                            <label class="btn btn-secondary" for="option1a">1</label>

                            <input type="radio" class="btn-check" name="workexp" id="option2a" value="2">
                            <label class="btn btn-secondary" for="option2a">2</label>
                            </div>
                            <div>
                                <div><label for="">Select Number of Technical skills you have</label></div>
                            <input type="radio" class="btn-check" name="no_techskills" id="option1b" value="1">
                            <label class="btn btn-secondary" for="option1b">1</label>

                            <input type="radio" class="btn-check" name="no_techskills" id="option2b" value="2">
                            <label class="btn btn-secondary" for="option2b">2</label>
                            <input type="radio" class="btn-check" name="no_techskills" id="option3b" value="3">
                            <label class="btn btn-secondary" for="option3b">3</label>
                            <input type="radio" class="btn-check" name="no_techskills" id="option4b" value="4">
                            <label class="btn btn-secondary" for="option4b">4</label>
                            </div>
                            <div>
                                <div><label for="">Select Number of Certifications you have</label></div>
                            <input type="radio" class="btn-check" name="no_certs" id="option1c" value="1">
                            <label class="btn btn-secondary" for="option1c">1</label>

                            <input type="radio" class="btn-check" name="no_certs" id="option2c" value="2">
                            <label class="btn btn-secondary" for="option2c">2</label>
                            <input type="radio" class="btn-check" name="no_certs" id="option3c" value="3">
                            <label class="btn btn-secondary" for="option3c">3</label>
                            <input type="radio" class="btn-check" name="no_certs" id="option4c" value="4">
                            <label class="btn btn-secondary" for="option4c">4</label>
                            </div>
                            <div>
                                <div><label for="">Select Number of languages you speak</label></div>
                            <input type="radio" class="btn-check" name="no_langs" id="option1d" value="1">
                            <label class="btn btn-secondary" for="option1d">1</label>

                            <input type="radio" class="btn-check" name="no_langs" id="option2d" value="2">
                            <label class="btn btn-secondary" for="option2d">2</label>
                            <input type="radio" class="btn-check" name="no_langs" id="option3d" value="3">
                            <label class="btn btn-secondary" for="option3d">3</label>
                            <input type="radio" class="btn-check" name="no_langs" id="option4d" value="4">
                            <label class="btn btn-secondary" for="option4d">4</label>
                            </div>
                            <div>
                                <div><label for="">Are you a fresher</label></div>
                                <input type="radio" class="btn-check" name="work_sts" id="option1e" value="1">
                                <label class="btn btn-secondary" for="option1e">Yes</label>

                                <input type="radio" class="btn-check" name="work_sts" id="option2f" value="0">
                                <label class="btn btn-secondary" for="option2f">NO</label>
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name="next_btn" class="btn btn-primary">Next</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>


<!-- 
    C:\Users\User\AppData\Local\Programs\Python\Python39\Scripts\
    C:\Users\User\AppData\Local\Programs\Python\Python39\
 -->
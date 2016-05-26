 <?php 
 include 'header.php'
   ?>
    <div class="container" style="margin-top:20px;">
        
    <div class= "breadcrumbs" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <a href="index.php">Home</a>
        </li>
        <li class="active">SignUp</li>
    </ul>
</div>
<div class="page-content">
    <div class="row">
        <div class="space-6"></div>
        <div class="col-sm-6 col-sm-offset-1">
            <div id="login-box" class="login-box visible widget-box no-border">
                <div class="widget-body">
                    <div class="widget-main">
                        <h4>Create your Handyman Account</h4>
                    </div>
                    <br/>
                    <form method="post" action="signup.php" name="signupForm" class="form-horizontal" role="form">

                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-right" for="fname">First Name</label>
                            <div class="col-sm-7">
                                <span class="block input-icon input-icon-right">
                                    <input type="text" class="form-control" placeholder="First name" name="fname" required/>
                                    
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label no-padding-right" >Last Name</label>
                            <div class="col-sm-7">
                                <span class="block input-icon input-icon-right">
                                    <input type="text" class="form-control" placeholder="Last name" name="lname" required/>
                                 
                            </div>
                        </div>
                        <div class="form-group">
                                <label class="col-sm-5 control-label no-padding-right" >Email</label>
                                <div class="col-sm-7">
                                    <span class="block input-icon input-icon-right">
                                        <input type="text" class="form-control" placeholder="Email" name="email" required/>
                                       
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label no-padding-right" for="password">Password</label>
                                <div class="col-sm-7">
                                    <span class="block input-icon input-icon-right">
                                <input type="password" class="form-control" name = "password" placeholder="Password" required/>
                                
                            </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label no-padding-right" for="password2">Confirm Password</label>
                                <div class="col-sm-7">
                                    <span class="block input-icon input-icon-right">
                                <input type="password" class="form-control" placeholder="Password Again" required/>      

                            </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label no-padding-right" for="phone">Phone</label>
                                <div class="col-sm-7">
                                    <span class="block input-icon input-icon-right">
                                <input type="text" class="form-control" placeholder="Phone" name="phone" required/>
                            </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label no-padding-right" for="address">City</label>
                                <div class="col-sm-7">
                                    <span class="block input-icon input-icon-right">
                                <select class="form-control" id="option" required>
                                <option>
                                    <?php
                                    $sql = "SELECT DISTINCT city_name FROM `city` ";

                                    $result = mysqli_query($conn, $sql) or die(mysqli_error());
                                    if (mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                    $city = $row['city_name'];
                                    echo"<option >".$city."</option>";
                                }
                                    
                                        } 

                                    ?>
                                    </option>
                                </select>
                            </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label no-padding-right" for="address">Area</label>
                                <div class="col-sm-7">
                                    <span class="block input-icon input-icon-right">
                                <select class="form-control" id="area" required>
                                    
                                </select>
                            </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="lbl col-sm-5"> </span>
                                <div class="col-sm-7">
                                    <button type="submit" name="signup" class="width-35 pull-right btn btn-sm btn-primary">
                                        Sign Up
                                    </button>
                                </div>
                            </div>
                    
                            <span class="lbl col-sm-3"> </span>

                            <div class="col-sm-10">Already have an account? <a href="login.html">SignIn</a>
                            </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $("#option").change(function(e){
        var selected = $(this).val();
        console.log('change:', selected);
    

    $.ajax({
        type:"POST",
        url:'drop.php',
        data:{city_name:selected},
        success:function(res){
        
        $('#area').html(res);
        }
    })
    });
});
    
</script>
</body>
</html>
<?php
require '../../../db.php';
?>

<?php
if(isset($_GET{'submit'}))
   {
    $name =$_GET{'name'};
    $email =$_GET{'email'};
    $message =$_GET{'message'};
    
        echo "Hello, $name <br>";
		echo "Your email is $email <br>";
		echo "Here is your message: $message <br>";
    
    //Prevent SQL Interjection
        $name = mysqli_real_escape_string($cnxn, $name);
        $email = mysqli_real_escape_string($cnxn, $email);
        $message = mysqli_real_escape_string($cnxn, $message);
        
        //Write to Database
        $sql = "INSERT INTO contact (name, email, message)
                VALUES ('$name', '$email', '$message')";
        @mysqli_query($cnxn, $sql)
            or die ("Error executing query: $sql");
        
		return;
   }
?>

<form action="" method="get" name="sentMessage" id="contactForm" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Name" id="name" value="<?php echo $_POST{'name'}; ?>" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div> 
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email Address</label>
                                <input type="email" name="email" class="form-control" placeholder="Email Address" id="email" value="<?php echo $_POST{'email'}; ?>" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Message</label>
                                <textarea rows="5" name="message" class="form-control" placeholder="Message" id="message" value="<?php echo $_POST{'message'}; ?>" required data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" name="submit" id="submit" class="btn btn-success btn-lg">Send</button>
                            </div>
                        </div>
                    </form>
<html>

<body>


    <form method="post" enctype='multipart/form-data'><br>
        <center>

            <h1>Please Fill The Form: </h1>
            <?php //echo validation_errors(''); 
            echo $this->session->flashdata('error');
            ?>
            </div>
            <label><b> Name: </b></label>
            <input type="text" name="name" placeholder="Enter Your Name" value="<?php echo set_value('name') ?>" id="name"><br>
            </td><br>

            <label><b> Email: </b></label>
            <input type="email" name="email" placeholder="Enter Your Email" value="<?php echo set_value('email') ?>" id="email"><br>

            <br>
            <label><b> Mobile: </b></label>
            <input type="number" name="mobile" placeholder="Enter Your Mobile Number" value="<?php echo set_value('mobile') ?>" id="mobile"><br><br>

            <label><b> Image: </b></label>
            <input type="file" name="image" value="<?php echo set_value('image') ?>" id="image"><br><br>


            <input type="submit" name="submit" value="Submit">

        </center>
    </form>
</body>

</html>
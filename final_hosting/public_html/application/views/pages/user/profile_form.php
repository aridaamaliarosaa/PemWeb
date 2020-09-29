<div class="container center-block" style="margin-top:64px;">
<div class="col-md-6 col-md-offset-3">
    <?php if(isset($user['user_image_path'])){ ?>
        <script>
            function deleteProfilePicture(){
                const target_url = "<?= base_url('index.php/home/delete_picture') ?>";
                
                $.post(target_url, (data, status, xhr) => {
                    if(xhr.readyState == 4){
                        if(xhr.status >= 200 && xhr.status < 400){
                            const response = JSON.parse(xhr.responseText);

                            if(response['status'] == 'success'){
                                alert("Profile Picture Deleted successfully!")
                                location.reload();
                            } else {
                                alert("Failed to delete profile picture!");
                            }
                        } else {
                            alert("A server-side error occurred!");
                        }
                    }
                });
            }
        </script>

        <button class="btn btn-danger" onclick="deleteProfilePicture()"> Delete Profile Picture </button>
        <img class="img-circle center-block" src="<?= $user['user_image_path'] ?>" alt="User_Profile_Image" style="object-fit:scale-down;" width="300">
    <?php } ?> 

    <?php
        echo form_open_multipart(current_url());
            echo '<div class="form-group">';
                echo form_label('Profile Picture', 'profile_image');
                echo form_upload([
                    'name' => 'profile_image',
                    'id' => 'profile_image',
                    'class' => 'form-control',
                ]);
                echo $upload_error;
            echo '</div>';
            
            echo "<div class='form-group'>";
                echo form_label('Date of Birth', 'dob');
                echo form_input([
                    'name'          => 'dob',
                    'id'            => 'dob',
                    'value'         => set_value('dob', isset($user['dob']) ? $user['dob'] : ''),
                    'required'      => 'required',
                    'type'          => 'date',
                    'class'         => 'form-control'
                ]);
                echo form_error('dob');
            echo "</div>";

            echo "<div class='form-group'>";
                echo form_label('Full Name', 'full_name');
                echo form_input([
                    'name'          => 'full_name',
                    'id'            => 'full_name',
                    'required'      => 'required',
                    'type'          => 'text',
                    'placeholder'   => 'Full Name (Max 100 chars)',
                    'value'         => set_value('full_name', isset($user['full_name']) ? $user['full_name'] : ''),
                    'maxlength'     => '100',
                    'class'         => 'form-control'
                ]);
                echo form_error('full_name');
            echo "</div>";

            echo "<div class='form-group'>";
                echo form_label('Gender', 'gender');
                echo form_dropdown('gender', $genders, set_value('gender', isset($user['gender_code']) ? $user['gender_code'] : ''), ['class' => 'form-control']);
                echo form_error('gender');
            echo "</div>";

            echo "<div class='form-group'>";
                echo form_label('Country', 'country');
                echo form_dropdown('country', $countries, set_value('country', isset($user['country_code']) ? $user['country_code'] : ''), ['class' => 'form-control']);
                echo form_error('country');
            echo "</div>";

            echo form_button([
                'type'      => 'submit',
                'class'     => 'btn btn-lg btn-block btn-success',
                'content'   => 'Update Profile'
            ]);
        echo form_close();
            echo anchor('home/profile', '<button class="btn btn-lg btn-block btn-danger" style="margin-top:8px;"> Cancel </button>');
    ?>
</div>
</div>

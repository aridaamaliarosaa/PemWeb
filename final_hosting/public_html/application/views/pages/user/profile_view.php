<div class="container center-block" style="margin-top:64px;">
    <img class="img-circle center-block" src="<?= isset($user['user_image_path']) ? $user['user_image_path'] : base_url('assets/images/default/user.png'); ?>" alt="User_Profile_Image" style="object-fit:scale-down;margin-bottom:16px;" width="300">
    
    <h5 class="text-center text-muted">Full Name</h5>
    <h4 class="text-center"> <?= $user['full_name'] ?> </h4>
    <br>
    <h5 class="text-center text-muted">Date of Birth</h5>
    <h4 class="text-center"> <?= $user['dob'] ?> </h4>
    <br>
    <h5 class="text-center text-muted"> Gender </h5>
    <h4 class="text-center"> <?= $user['description'] ?> </h4>
    <br>
    <h5 class="text-center text-muted"> Country </h5>
    <h4 class="text-center"> <?= $user['country_name'] ?> </h4>
    <br>
    <?= anchor('home/edit_profile', '<button class="btn btn-lg btn-info center-block"> Edit Profile </button>') ?>
</div>
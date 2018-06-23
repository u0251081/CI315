<?php
/**
 * Created by PhpStorm.
 * User: Xin-an
 * Date: 2018/5/16
 * Time: 下午 06:47
 */
?>
<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
<!--            <form>-->
            <?php echo form_open('admin/account/verified'); ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Account</label>
                    <input class="form-control" name="input_account" type="text" aria-describedby="need help?" placeholder="Enter account">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input class="form-control" name="input_password" type="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <label class="form-check-label">
                            <!--<input class="form-check-input" type="checkbox"> Remember Password-->
                        </label>
                    </div>
                </div>
                <a id="login" class="btn btn-primary btn-block" href="javascript:void(0)">Login</a>
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="#">Register an Account</a>
                <a class="d-block small" href="#">Forgot Password?</a>
            </div>
        </div>
    </div>
</div>
<script>
    $('a[id="login"]').on('click',function() {
        $('form').submit();
    });
    $('form').on('keydown',function(e) {
        if (e.which === 13) {
            $(this).submit();
        }
    });
    $('form').on('submit',function() {
        var pswd = $('[name="input_password"]').val();
        $('[name="input_password"]').val(md5(pswd));
    });
</script>
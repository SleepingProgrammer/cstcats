<form action="register" id="registerForm" method="post">
    {{csrf_field()}}
    <div class="form-group">
        <input type="text" class="form-control" name="name" placeholder="Enter name">
    </div>
    <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder="Enter email">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="password_confirmation" placeholder="Retype Password">
    </div>
    <button class="btn btn-success btn-full">Register</button>
    <input type="hidden" class="form-control" name="can_post" value="0">
    <input type="hidden" class="form-control" name="can_comment" value="0">
    <input type="hidden" class="form-control" name="approved" value="0">
    <input type="hidden" class="form-control" name="registeredFrom" value="Registration Form">
</form>

<div class="page-copyright">
    <p>Already have an account? <a href="login" style="color:green;">Login Here</a> </p>
</div>
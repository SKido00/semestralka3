<form method="post" action="{{$action}}">
    @csrf
    @method(($method))
    <div class="form-group">
        <label for="name">Full name</label>
        <input type="text" class="form-control" id="name" placeholder="Full name" value="">
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Email" value="">
        <small id="emailHelp" class="form-text text-muted">We will never share your email with anyone.</small>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
    <div class="form-group">
        <label for="password">Password again</label>
        <input type="password" class="form-control" id="password" name="password_confirmation" placeholder="Password">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary form-control">
    </div>











</form>

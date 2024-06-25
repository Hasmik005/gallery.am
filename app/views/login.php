<div class="login-content container-fluid">
  <div class="card">
    <h2>Login</h2>
      <?php if(!empty($error)){?>
          <span><?php echo $error?></span>
      <?php }?>
    <form method="post" action="/login">
      <input type="email" id="email" name="email" placeholder="Email" value="" required>
      <input type="password" id="password" name="password" placeholder="Password" value="" required>
        <a href="/register" class="ml-auto my-10"><sup>Register</sup></a>
      <button type="submit">Login</button>
    </form>
  </div>
</div>
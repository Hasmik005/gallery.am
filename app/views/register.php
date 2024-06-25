<div class="login-content container-fluid">
  <div class="card">
    <h2>Register</h2>
      <?php if (!empty($error)): ?>
          <p style="color: red;"><?php echo $error; ?></p>
      <?php endif; ?>

      <?php if (!empty($success)): ?>
          <p style="color: green;"><?php echo $success; ?></p>
      <?php endif; ?>

    <form method="post" action="/register">
        <input type="text" id="first_name" name="first_name" placeholder="First Name" required value="<?php echo isset($_POST['first_name']) ? htmlspecialchars($_POST['first_name'], ENT_QUOTES) : ''; ?>">
        <input type="text" id="last_name" name="last_name" placeholder="Last Name" required value="<?php echo isset($_POST['last_name']) ? htmlspecialchars($_POST['last_name'], ENT_QUOTES) : ''; ?>">
        <input type="email" id="email" name="email" placeholder="Email" required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES) : ''; ?>">
        <input type="password" id="password" name="password" placeholder="Password" required>
        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
        <a href="/login" class="ml-auto my-10"><sup>Login</sup></a>
        <button type="submit">Register</button>
    </form>
  </div>
</div>
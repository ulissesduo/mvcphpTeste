<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <title>How to Align Responsive Image in Center in Bootstrap</title>
  </head>
  <body>
    <div>
      <div class="row align-items-center" style="height: 100vh;">
        <div class="mx-auto col-10 col-md-8 col-lg-6">
          <!-- Form -->
          <form class="form-example" action="" method="post">
            <h1>Register form</h1>
            
            <!-- Input fields -->
            <div class="form-group">
              <label for="username">Username:</label>
              <input
                type="text"
                class="form-control username"
                id="username"
                placeholder="Username..."
                name="username"
              />
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input
                type="password"
                class="form-control password"
                id="password"
                placeholder="Password..."
                name="password"
              />
            </div>

            
            <button type="submit" class="btn btn-primary btn-customized mt-4">Login</button>
            <button type="button" class="btn btn-secondary btn-customized mt-4">Cancel</button>

          </form>
          <!-- Form end -->
        </div>
      </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
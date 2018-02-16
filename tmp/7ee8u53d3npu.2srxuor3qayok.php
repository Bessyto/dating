<!--
Bessy Torres-Miller
02/02/2018

The Profile page, prompt the user for the email, State, seeking and biography information. It shows error message
when an enter is not valid, and will post to itself until no error messages are posted.
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Dating Website</title>

    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

    <!--Link to local css style-->
    <link rel= "stylesheet" href="styles/profile.css">
</head>


<body>
    <header>
        <!-- Navigation bar -->
        <nav class="navbar navbar-light bg-faded bg-info text-white">
            <a class="navbar-brand" href="./">
                <h5>My Dating Website</h5>
            </a>
        </nav>
    </header>

    <div class="container border border-success">
        <form action="#" method="post" class="form-group">
            <h2 class="text-left">Profile</h2><hr>

            <!-- first row -->
            <div class="form-group row mb-0">
                <div class="form-group small col-md-6">

                    <div class="form-group">

                            <?php if ($errors['email']): ?>
                                <p class="text-danger"><?= ($errors['email']) ?></p>
                            <?php endif; ?>

                        <label for="email" class="label">Email</label>
                        <div class="input-group">
                            <input class="form-control input-lg" id="email" type="email" value="<?= ($email) ?>" name="email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="state" class="label">State</label>
                        <select name="state" id="state" class="form-control input-lg">
                            <?php foreach (($states?:[]) as $state): ?>
                                <option value="<?= ($state) ?>"><?= ($state) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>  <!--form group states -->


                    <div class="form-group">

                            <?php if ($errors['seeking']): ?>
                                <p class="text-danger"><?= ($errors['seeking']) ?></p>
                            <?php endif; ?>

                        <label class='form-control-label label' id="seekings">Seeking</label><br>
                            <?php foreach (($seekings?:[]) as $seekingOption): ?>
                                <input type="radio" name="seeking" value="<?= ($seekingOption) ?>"><?= ($seekingOption)."
" ?>
                            <?php endforeach; ?>
                    </div>

                </div>  <!-- first column -->

                <!-- second column -->
                <div class="form-group small col-md-6">
                    <div class="form-group">

                            <?php if ($errors['biography']): ?>
                                <p class="text-danger"><?= ($errors['biography']) ?></p>
                            <?php endif; ?>

                        <label for="biography" class="label">Biography</label>
                        <div class="input-group">
                            <textarea rows="5" cols="100" id="biography" name="biography" ><?= ($biography) ?></textarea>
                        </div>
                    </div>
                </div>

            </div>  <!-- row -->

            <!--second row -->
            <div class="form-group row">
                <div class="form-group small col-md-12 mb-0">
                    <div class="float-right">
                        <button type="submit" name="submit" class="btn btn-primary">Next > </button>
                    </div>
                </div>
            </div>

        </form>
    </div>  <!-- container -->

    <!-- bootstrap jquery/popper/javascript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>

</body>
</html>
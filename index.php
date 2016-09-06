<?php
/* * * * * * * ** * * * * * * * * * * * * * * * *
 *                  IMPORTANT                   *
 *   After DB import you should configure       *
 * the constants in `constants.php` to reflect  *
 * your project environment variables.          *
 * * * * * * * * * * * * * * ** * * * * * * * * */

// This ensure that all errors/warnings will be displayed. This should be used only under development environments.
error_reporting(-1);
ini_set('display_errors', 1);

header('Content-Type: text/html; charset=utf-8');

require_once 'constants.php';
require_once 'helper.php';

// Tries to stablish connection with Database.
try {
    getDatabase();
} catch (Exception $e) {
    // Something went wrong.
    echo "Make sure everything on the constants.php file is correct.</br></br>";

    die($e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ajax - Demo</title>

        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/assets/css/index.css">
    </head>
    <body>
        <main class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Search > States of Brazil</h3>
                        </div>
                        <div class="panel-body">
                            <form id="search-form">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                        <input type="search" class="form-control" id="search-input" name="search" placeholder="" autocomplete="false" autofocus>
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="submit">Send</button>
                                        </span>
                                    </div>
                                    <p class="help-block">The searched <i>term</i> will be sent back to <code>handler.php</code> (as can be seen in <code>/assets/js/index.js</code>) which will query the DB and return possible results that contains <i>term</i> in its title. The requests can be seen an examined through browser's console if you have the option <strong>Log XMLHttpRequests</strong> enabled (you should always keep this checked).</p>
                                </div>
                            </form>
                        </div>
                        <div class="panel-footer">
                            <p>Searching for the term <code class="search-term">...</code></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Search results</h3>
                        </div>
                        <div class="panel-body">
                            <output></output>
                        </div>
                        <div class="panel-footer">
                            <p class="results-count">No results was found</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="/assets/js/index.js"></script>
    </body>
</html>

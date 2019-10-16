<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="urf-8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <title>Form Post</title>
    </head>
    <body>
        <h3 style="text-align: center">Post On Facebook</h3>
        <form method="post" action="../bot.php">
            <div style="text-align: center">
                <label style="display: block;margin-bottom: 10px">Message Post</label>
                <textarea name="textPost" cols="40" rows="10"></textarea>
            </div>
            <div style="text-align: center">
                <input type="submit" value="Post on Facebook" id="submit" name="post_facebook" />
            </div>
        </form>
    </body>
</html>

<form id="div-signin" class="form-signin" method="post">
    <h4><strong>Input your short URL address:</strong></h4>
    <input type="url" class="form-control"
           <?php if (isset($url)): ?>
           value="<?php echo $url; ?>"
           <?php endif; ?>
           name="url" placeholder="Input URL address"
           required autofocus>
    <?php if (isset($error)): ?>
    <div class="error">
        <?php echo $error; ?>
    </div>
    <?php endif; ?>
    <br>
    <div class="result">
        <?php if (isset($count)): ?>
            <div class="count">
                <h5><strong>Count views</strong></h5>
                <h3><strong><?php echo $count; ?><strong></h3>
                <?php if (isset($data)): ?>
                    <h5><strong>Last visit</strong></h5>
                    <h3><strong><?php echo $data; ?><strong></h3>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="button_block">
        <button type="submit" class="btn btn-warning">Show statistics</button>
        <a href="/"  class="btn btn-primary">Go to minimizer</a>
    </div>
</form>
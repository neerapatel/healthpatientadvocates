<div class="container">
        <fieldset>
            <?php if (isset($info)): ?>
                <div class="alert alert-success">
                    <?php echo($info) ?>
                </div>
            <?php elseif (isset($error)): ?>
                <div class="alert alert-error">
                    <?php echo($error) ?>
                </div>
            <?php endif; ?>

        </fieldset>
    </form>
</div>
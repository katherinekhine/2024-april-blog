<div>
    <ul class="text-danger">
        <?php
        // if (isset($error)) {
        //     if ($error) {
        //         foreach ($error as $err) {
        //             echo "<li>" . $err . "</li>";
        //         }
        //     }
        // }
        ?>

        <?php if (isset($error)) : ?>
            <?php if ($error) : ?>
                <?php foreach ($error as $err) : ?>
                    <li><?php echo $err; ?></li>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endif; ?>
    </ul>
</div>
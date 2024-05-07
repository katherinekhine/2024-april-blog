<?php

include "db.php";
$query = "SELECT * FROM articles";
$result = mysqli_query($conn, $query);
if ($result) {
    $articles = $result;
} else {
    echo mysqli_connect_error();
}

?>

<?php
include("./component/header.php"); ?>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 mt-5">
    <?php while ($article = mysqli_fetch_assoc($articles)) : ?>
        <div class="col mb-3">
            <div class="flex flex-column justify-content-between border border-black rounded h-100">
                <div style="height: 200px;" class="border-bottom border-black ">
                    <img src="<?= $article['image'] ?>" class="rounded-top w-100 h-100" alt="Article Picture Here...">
                </div>
                <div style="max-height: 150px;" class="mt-2 p-2 flex-grow-1">
                    <h3><?= htmlspecialchars_decode($article['title']) ?></h3>
                    <p class="text-justify">
                        <?php
                        $str_to_arr = explode(" ", htmlspecialchars_decode($article['about']));
                        $slice_array = array_slice($str_to_arr, 0, 17);
                        $result = implode(" ", $slice_array);
                        $result .= " ... ";
                        echo $result;
                        ?>
                    </p>
                </div>
                <div class=" text-end me-2 mb-1 mt-md-3 mb-md-2 mb-lg-2 mt-lg-3">
                    <a href="article-view.php?id=<?= $article['id'] ?>">See more</a>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>



<?php
include("./component/footer.php"); ?>
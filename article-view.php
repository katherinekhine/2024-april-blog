<?php
include "db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM articles WHERE id='$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $article = mysqli_fetch_assoc($result);
    } else {
        echo mysqli_connect_error();
    }
}
?>

<?php
include("./component/header.php");
?>

<div class="mt-2 pt-4">
    <button class="rounded bg-dark-subtle border-primary-subtle">
        <a href="index.php" class="link-offset-2 link-underline link-underline-opacity-0">
            << Back to Home </a>
    </button>
    <?php if (isset($article)) : ?>
        <div class="mt-4 py-2">
            <h3 class="fw-semibold"><?= $article['title'] ?></h3>
            <p class="fw-medium lh-base text-justify font-size-17"><?= $article['about'] ?></p>
            <div style="height: 200px;" class="mt-3 w-50">
                <img src="<?= $article['image'] ?>" class="w-50 h-100" alt="">
            </div>
            <p>post at <i> <?= date_format(date_create($article['posted_at']), 'd-M-Y') ?> </i></p>

            <?php if (isset($_SESSION['auth'])) :  ?>
                <a href="article-edit.php?id=<?= $article['id'] ?>">Edit</a>
                <a href="article-delete.php?id=<?= $article['id'] ?>" class="text-danger">Delete</a>
            <?php endif; ?>
        </div>
    <?php else : ?>
        <p class="fs-2 text-center ">No Matching article</p>
    <?php endif ?>
</div>

<?php
include("./component/footer.php");
?>
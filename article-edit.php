<?php

include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM articles WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $article = mysqli_fetch_assoc($result);
    } else {
        echo mysqli_connect_error();
    }
}

if (isset($_POST['update-article'])) {
    $title = htmlspecialchars(trim($_POST['title']));
    $about = htmlspecialchars(trim($_POST['about']));
    $image = $_FILES['image'];
    $error = [];

    empty($title) ? ($error[] = 'Name is required') : '';
    empty($about) ? ($error[] = 'About is required') : '';

    $id = $_GET['id'];

    if (!$error) {
        if (is_uploaded_file($image['tmp_name'])) {
            $image_path = 'photo/' . $image['name'];
            move_uploaded_file($image['tmp_name'], $image_path);
            $query = "UPDATE articles SET title = '$title', about = '$about', image = '$image_path', posted_at=now() WHERE id = '$id'";
        } else {
            $query = "UPDATE articles SET title = '$title', about = '$about', posted_at=now() WHERE id = '$id'";
        }
        $result = mysqli_query($conn, $query);
        if ($result) {
            header('location: article-view.php?id=' . $id);
        } else {
            echo mysqli_connect_error();
        }
    }
}
?>


<?php
include("./component/header.php"); ?>

<?php if (isset($_SESSION['auth'])) :  ?>

    <div class="mt-2 pt-4">
        <div class="row">
            <div class="col-12  m-auto">
                <div class="card border-1 shadow">
                    <h2 class="fw-semibold ps-3 mt-2 ">Edit Blog</h2>
                    <div class="card-body">
                        <?php if (isset($article)) : ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <!-- error start -->
                                <?php
                                include 'error.php';
                                ?>
                                <!-- error end -->
                                <div class="my-3">
                                    <label for="title" class="fw-bold">Title:</label>
                                    <input type="text" name="title" id="title" placeholder="Add Your Article Title Here...." class="form-control border-black mt-1" value="<?= $article['title'] ?>">
                                </div>
                                <div class="my-3">
                                    <label for="about" class="fw-bold">About:</label for="">
                                    <textarea name="about" id="about" cols="30" rows="10" class="form-control border-black mt-1" style="height: 160px;"><?= htmlspecialchars_decode($article['about'])  ?></textarea>
                                </div>
                                <div class="my-3">
                                    <label for="image" class="fw-bold">Image:</label for="">
                                    <input type="file" id="image" name="image" class="form-control border-3 mt-1">
                                    <img src="<?= $article['image'] ?>" alt="this is pic" height="200px" class="border">
                                </div>
                                <button type="submit" class="btn btn-outline-dark mt-3" name="update-article">Edit</button>
                            </form>
                        <?php else : ?>
                            <p class="fs-2 text-center mt-2
                            ">No Matching article</p>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php else : ?>

    <p class="fs-2 text-center pt-5">
        <i class="bi bi-exclamation-triangle-fill text-danger"></i>
        You are not authorized.
    </p>

<?php endif; ?>

<?php
include("./component/footer.php"); ?>
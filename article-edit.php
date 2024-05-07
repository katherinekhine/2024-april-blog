<?php
include("./component/header.php"); ?>

<div class="mt-2 pt-4">
    <div class="row">
        <div class="col-12  m-auto">
            <div class="card border-1 shadow">
                <h2 class="fw-semibold ps-3 mt-2 ">Edit Blog</h2>
                <div class="card-body">
                    <form action="">
                        <div class="my-3">
                            <label for="title" class="fw-bold">Title:</label>
                            <input type="text" name="title" id="title" placeholder="Add Your Article Title Here...." class="form-control border-black mt-1">
                        </div>
                        <div class="my-3">
                            <label for="about" class="fw-bold">About:</label for="">
                            <textarea name="about" id="about" cols="30" rows="10" class="form-control border-black mt-1" style="height: 160px;"></textarea>
                        </div>
                        <div class="my-3">
                            <label for="image" class="fw-bold">Image:</label for="">
                            <input type="file" id="image" name="image" class="form-control border-3 mt-1">
                        </div>
                        <button type="submit" class="btn btn-outline-dark mt-3" name="add-article">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("./component/footer.php"); ?>
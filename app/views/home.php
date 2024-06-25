<!-- Gallery content -->
<?php if (!empty($data['photos'])): ?>
    <section class="gallery-content container-fluid">
        <div class="gallery-card-content">
            <?php foreach ($data['photos'] as $photo):?>
                <div class="gallery-card">
                    <div class="image-content">
                        <a href="/">
                            <img src="/<?= $photo->image;?>" alt="<?= $photo->name;?>">
                        </a>
                        <button class="btn-add-to-wishlist">
                            <svg fill="#000000" height="800px" width="800px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 viewBox="0 0 471.701 471.701" xml:space="preserve">
                            <g>
                                <path d="M433.601,67.001c-24.7-24.7-57.4-38.2-92.3-38.2s-67.7,13.6-92.4,38.3l-12.9,12.9l-13.1-13.1
                                    c-24.7-24.7-57.6-38.4-92.5-38.4c-34.8,0-67.6,13.6-92.2,38.2c-24.7,24.7-38.3,57.5-38.2,92.4c0,34.9,13.7,67.6,38.4,92.3
                                    l187.8,187.8c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-3.9l188.2-187.5c24.7-24.7,38.3-57.5,38.3-92.4
                                    C471.801,124.501,458.301,91.701,433.601,67.001z M414.401,232.701l-178.7,178l-178.3-178.3c-19.6-19.6-30.4-45.6-30.4-73.3
                                    s10.7-53.7,30.3-73.2c19.5-19.5,45.5-30.3,73.1-30.3c27.7,0,53.8,10.8,73.4,30.4l22.6,22.6c5.3,5.3,13.8,5.3,19.1,0l22.4-22.4
                                    c19.6-19.6,45.7-30.4,73.3-30.4c27.6,0,53.6,10.8,73.2,30.3c19.6,19.6,30.3,45.6,30.3,73.3
                                    C444.801,187.101,434.001,213.101,414.401,232.701z"/>
                            </g>
                        </svg>
                        </button>
                    </div>
                    <div class="information-content">
                        <h3 class="image-name"><?= $photo->name;?></h3>
                        <p class="added-by"><span>By:</span> <?= $photo->user_name;?></p>
                    </div>
                </div>
            <?php endforeach; ?>
    </div>
    <div class="gallery-page-control">
        <div class="next-prev-buttons">
            <?php if ($data['current_page'] > 1): ?>
                <a class="btn-blue" href="?page=<?= $data['current_page'] - 1 ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" fill="white"/>
                    </svg>
                    Prev Page
                </a>
            <?php else: ?>
                <a class="btn-blue disabled">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" fill="white"/>
                    </svg>
                    Prev Page
                </a>
            <?php endif; ?>

            <?php if ($data['current_page'] < $data['total_pages']): ?>
                <a class="btn-blue" href="?page=<?= $data['current_page'] + 1 ?>">
                    Next Page
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z" fill="white"/>
                    </svg>
                </a>
            <?php else: ?>
                <a class="btn-blue disabled">
                    Next Page
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z" fill="white"/>
                    </svg>
                </a>
            <?php endif; ?>
        </div>
    </div>
        <div class="pagination">
            <?php if ($data['current_page'] > 1): ?>
                <a href="?page=<?= $data['current_page'] - 1 ?>">Previous</a>
            <?php else: ?>
                <span class="disabled">Previous</span>
            <?php endif; ?>

            <?php if ($data['current_page'] < $data['total_pages']): ?>
                <a href="?page=<?= $data['current_page'] + 1 ?>">Next</a>
            <?php else: ?>
                <span class="disabled">Next</span>
            <?php endif; ?>
        </div>
</section>
<?php else: ?>
    <p>No photos available.</p>
<?php endif; ?>